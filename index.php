<?php
require_once 'settings/crud.php';
ob_start();
$crud = new crud();
//error_reporting(0);
$page = take_page();
$company_info = $crud->read('company_info')->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$company_info['company_name']; ?></title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=take_link().'/' ?>assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?=take_link().'/' ?>assets/images/favicons/32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=take_link().'/' ?>assets/images/favicons/16x16.png" />
    <link rel="manifest" href="<?=take_link().'/' ?>assets/images/favicons/site.webmanifest" />
    <?php
    switch ($page){
        case 'blog_details':
            $row = $crud->read_with_id('blog',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
            ?>

            <meta name="keywords" content="<?=$row['meta_keywords'] ?>">
            <meta name="description" content="<?=$row['meta_description'] ?>">

        <?php default: ?>
        <meta name="description" content="<?=divide($company_info['description'],20); ?>" />
        <?php break;
    }

    ?>




    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/berke_insaat-icons/style.css">
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/twentytwenty/twentytwenty.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/vendors/timepicker/timePicker.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/css/berke_insaat.css" />
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/css/berke_insaat-responsive.css" />

    <!-- RTL Styles -->
    <link rel="stylesheet" href="<?=take_link().'/' ?>assets/css/berke_insaat-rtl.css">

    <!-- color css -->
    <link rel="stylesheet" id="jssDefault" href="<?=take_link().'/' ?>assets/css/colors/color-default.css">
    <link rel="stylesheet" id="jssMode" href="<?=take_link().'/' ?>assets/css/modes/berke_insaat-normal.css">
    <link href="<?=take_link().'/' ?>assets/vendors/fontawesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?=take_link().'/' ?>assets/vendors/slick/slick-theme.css">

</head>

<body>

    <!-- .preloader (https://www.iscosoftware.com) -->
    <div class="preloader">
        <img class="preloader__image" width="60" src="<?=take_link().'/' ?>assets/images/loader.png" alt="Yükleniyor" />
    </div>
    <!-- /.preloader -->

    <!-- .page-wrapper -->
    <div class="page-wrapper">

        <?php include 'navbar.php'; ?>
        <?php switch ($page) {

        case 'for_modal': ?>

            <div class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php break;
            case 'index':

                if (@$_GET['status'] == 'ok'){ ?>
                    <div class="modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }


            $home_opening = $crud->read("home_opening_screen")->fetch(PDO::FETCH_ASSOC);
            $short_about = $crud->read('index_short_about')->fetch(PDO::FETCH_ASSOC);
            $stats = $crud->read('work_stats');
            $why_us = $crud->read('why_us');
            $what_we_do = $crud->read('what_we_do');
            $business_partners = $crud->read('business_partners');
            $blog = $crud->read_three('blog');
            $projects = $crud->read('project');
        ?>

                <!-- Banner One Start -->
                <section class="main-slider">
                    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                    "el": "#main-slider-pagination",
                    "type": "bullets",
                    "clickable": false
                },
                "navigation": {
                    "nextEl": "#",
                    "prevEl": "#"
                },
                "autoplay": {
                    "delay": 500000000
                }}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="image-layer" style="background-image: url(<?=take_link().'/' ?>assets/images/uploads/home_screen/<?=$home_opening['photo']; ?>);">
                                </div>

                                <div class="image-layer-overlay"></div>
                                <div class="main-slider-shape-1"></div>
                                <div class="main-slider-shape-2"></div>
                                <div class="main-slider-shape-3"></div>
                                <div class="main-slider-shape-4"></div>
                                <!-- /.image-layer -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-slider__content">
                                                <p><?=$home_opening['content']; ?></p>
                                                <h2><?=$home_opening['title']; ?></h2>
                                            </div>
                                            <!--
                                    <div class="main-slider__content mt-4">
                                        <a href="contact.html" class="thm-btn"><span>Yatırım İşleme</span></a>
                                    </div>
                                    <div class="main-slider__content mt-4">
                                        <a href="contact.html" class="thm-btn"><span>Gayrimenkul</span></a>
                                    </div>
                                    <div class="main-slider__content mt-4">
                                        <a href="contact.html" class="thm-btn"><span>Enerji Sektörü</span></a>
                                    </div>
-->
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </section>
                <!--Banner One End-->

                <!--Welcome One Start-->
                <section class="welcome-one">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="welcome-one__left wow fadeInLeft" data-wow-duration="1500ms">
                                    <div class="welcome-one__img-box">
                                        <div class="welcome-one__img">
                                            <img src="<?=take_link().'/' ?>assets/images/uploads/index_short_about/<?=$short_about['photo']; ?>" alt="<?=$short_about['title']; ?>">
                                            <div class="welcome-one__shape-1"></div>
                                            <div class="welcome-one__shape-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="welcome-one__right">
                                    <div class="section-title text-left">
                                        <span class="section-title__tagline">Hakkımızda</span>
                                        <h2 class="section-title__title"><?=$short_about['title']; ?></h2>
                                    </div>
                                    </div>
                                    <p class="welcome-one__right-text-1"><?=$short_about['sub_title']; ?></p>
                                    <p class="welcome-one__right-text-2 mb-3"><?=$short_about['content']; ?></p>
                                    <a href="hakkimizda" class="thm-btn"><span>Daha Fazla</span></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Welcome One End-->

                <!--Counter One Start-->
                <section class="counters-one">
                    <div class="container">
                        <ul class="counters-one__box list-unstyled">
                            <?php foreach ($stats as $work_stats){ ?>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="100ms">
                                <div class="counter-one__icon">
                                    <i class="<?=$work_stats['icon'] ?> fa-6x" aria-hidden="true"></i>
                                </div>
                                <h3 class="odometer" data-count="<?=$work_stats['number'] ?>"><?=$work_stats['number'] ?></h3>
                                <p class="counter-one__text"><?=$work_stats['content']; ?></p>
                            </li>
                            <?php } ?>
                            <li class="counter-one__shape wow fadeInUp" data-wow-delay="500ms"></li>
                        </ul>
                    </div>
                </section>
                <!--Counter One End-->

                <!--We Change Start-->
                <section class="we-change">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="we-change__left-faqs">
                                    <div class="section-title text-left">
                                        <span class="section-title__tagline">Neden Biz?</span>
                                        <h2 class="section-title__title">İnşaata bakış açınızı değiştirmeye geldik.</h2>
                                    </div>
                                    <div class="we-change__faqs">
                                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                            <?php $count = 0; $db_count = $why_us->rowCount(); foreach ($why_us as $come_why_us){ $count++; ?>
                                            <div class="accrodion <?= ($count == 1) ? "active" : NULL; ?><?= ($count == $db_count) ? "last-chiled" : NULL; ?>">
                                                <div class="accrodion-title">
                                                    <h4><?=$come_why_us['title']; ?></h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        <p><?=$come_why_us['content']; ?></p>
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="we-change__right">
                                    <div class="we-change__right-img">

                                        <img src="<?=take_link().'/' ?>assets/images/resources/success_project.png" alt="En son biten projemiz">

                                        <div class="we-change__agency">
                                            <div class="we-change__agency-icon">
                                                <span class="icon-development"></span>
                                            </div>
                                            <div class="we-change__agency-text">
                                                <h3>En son başarı ile <br> tamamladığımız projemiz</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--We Change End-->



                <!--Services One Start-->
                <section class="services-one">
                    <div class="services-one-bg" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/services-one-bg.jpg)">
                    </div>
                    <div class="container">
                        <div class="section-title text-center">
                            <span class="section-title__tagline">Hizmet Listemiz</span>
                            <h2 class="section-title__title">Neler Yapıyoruz?</h2>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($what_we_do as $list_we_do){
                            ?>
                            <div class="col-xl-4 col-lg-4">
                                <!--Services One Single-->
                                <div class="services-one__single wow fadeInUp" data-wow-delay="100ms">
                                    <div class="services-one__icon">
                                        <span class="icon-color-sample"></span>
                                    </div>
                                    <h3 class="services-one__title"><a href="website-design.html"><?=$list_we_do['title'] ?></a></h3>
                                    <p class="services-one__text"><?=$list_we_do['content']; ?></p>
                                    <a href="iletisim" class="service-one__arrow"><span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <!--Services One End-->

                <!--Portfolio One Start-->
                <section class="portfolio-one mb-3">
                    <div class="portfolio-one__container">
                        <div class="section-title text-center">
                            <span class="section-title__tagline">Berke İnşaat olarak tüm işlerimizi ayrıntılı olarak sizlerle paylaşıyoruz</span>
                            <h2 class="section-title__title">Bazı Projelerimiz</h2>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="portfolio-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                                    <li data-filter=".filter-item" class="active"><span class="filter-text">Tüm Projeler</span></li>
                                    <li data-filter=".bra"><span class="filter-text">Tamamlananlar</span></li>
                                    <li data-filter=".illus"><span class="filter-text">Devam Edenler</span></li>
                                    <!--
                            <li data-filter=".photo"><span class="filter-text">Photography</span></li>
                            <li data-filter=".web"><span class="filter-text last-pd-none">Web design</span></li>
                            -->
                                </ul>
                            </div>
                        </div>
                        <div class="row filter-layout masonary-layout">

                            <?php foreach ($projects as $project_details){
                                $photo = json_decode($project_details['photo']);
                                ?>


                                <div class="col-xl-9 col-lg-6 col-md-6 mb-4 filter-item <?php if ($project_details['status'] == 2) { ?>bra <?php } ?>  <?php if ($project_details['status'] == 1) { ?>illus <?php } ?> web photo">
                                    <!--Portfolio One Single-->
                                            <div class="col-xl-4 col-lg-6 col-md-6">
                                                <div class="blog-one__single wow fadeInUp" data-wow-delay="100ms">
                                                    <div class="blog-one__img-box">
                                                        <div class="blog-one__img">
                                                            <img src="<?=take_link().'/' ?>assets/images/uploads/projects/<?=$photo[0]; ?>" alt="<?=$project_details['name']; ?>">
                                                            <a href="proje/<?=$project_details['id']; ?>">
                                                                <span class="blog-one__plus"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="blog-one__content">
                                                        <h3 class="blog-one__title">
                                                            <a href="proje/<?=$project_details['id']; ?>"><?=$project_details['name']; ?></a>
                                                        </h3>
                                                        <p class="blog-one__text">Proje Adı: <b><?=$project_details['name']; ?></b></p>
                                                        <p class="blog-one__text">Proje Zamanı: <b><?=$project_details['time']; ?></b></p>
                                                        <p class="blog-one__text">Proje Durumu: <b><?=$project_details['status'] == 1 ? 'Devam Ediyor' : 'Tamamlandı'; ?></b></p>
                                                        <div class="blog-one__bottom">
                                                            <div class="blog-one__read-btn">
                                                                <a href="proje/<?=$project_details['id']; ?>"></a>
                                                                <a href="proje/<?=$project_details['id']; ?>">Devamını oku</a>
                                                            </div>
                                                            <div class="blog-one__arrow">
                                                                <a href="proje/<?=$project_details['id']; ?>"><span class="icon-right-arrow"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                        <?php } ?>
                        </div>
                        <div class="container">
                            <div class="col-md-12 text-center mb-5">
                                <a href="projelerimiz" class="thm-btn w-100"><span>Daha Fazla</span></a>
                            </div>
                        </div>

                    </div>
                </section>
                <!--Portfolio One End-->

                <!--Two Boxes Start-->
                <section class="two-boxes mt-5">
                    <div class="container">
                        <div class="two-boxes__inner">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="two-boxes__single two-boxes__single-one">
                                        <div class="two-boxes__content">
                                            <div class="two-boxes__icon">
                                                <span class="icon-web-design"></span>
                                            </div>
                                            <div class="two-boxes__text">
                                                <p><?=$company_info['company_name']; ?> hakkında</p>
                                            </div>
                                        </div>
                                        <div class="two-boxes__arrow">
                                            <a href="hakkimizda"><span class="icon-right-arrow"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="two-boxes__single two-boxes__single-two">
                                        <div class="two-boxes__content">
                                            <div class="two-boxes__icon">
                                                <span class="icon-graphic-design"></span>
                                            </div>
                                            <div class="two-boxes__text">
                                                <p><?=$company_info['company_name']; ?> iletişim</p>
                                            </div>
                                        </div>
                                        <div class="two-boxes__arrow">
                                            <a href="iletisim"><span class="icon-right-arrow"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Two Boxes End-->

                <!--Video One Start-->
                <section class="video-one">
                    <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%" style="background-image: url('<?=take_link().'/' ?>assets/images/backgrounds/video-bg.png')"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="video-one__inner">
                                    <div class="video-one__link">
                                        <a href="<?=$company_info['video']; ?>" class="video-one__btn video-popup">
                                            <div class="video-one__video-icon">
                                                <span class="icon-play-button"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <h2 class="video-one__text">Tanıtım videomuz</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Video One End-->


                <!--Brand Two-->
                <section class="brand-one">
                    <div class="container">
                        <div class="section-title text-center mb-5">
                            <span class="section-title__tagline">İş ortaklarımız ile ağımızı genişleterek sizlere daha kaliteli bir hizmet sunuyoruz</span>
                            <h2 class="section-title__title">İş Ortaklarımız</h2>
                        </div>

                        <div class="row">
                            <div class="owl-carousel">
                                <?php foreach ($business_partners as $partners){ ?>
                                <div><img src="<?=take_link().'/' ?>assets/images/uploads/partners/<?=$partners['photo']; ?>" alt="<?=$partners['alt']; ?>"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Brand Two End-->

                <!--Blog One Start-->
                <section class="blog-one">
                    <div class="container">
                        <div class="section-title text-center">
                            <span class="section-title__tagline">Blog yazıları yazarak sektördeki bilgilerimizi sizlere aktarıyoruz.</span>
                            <h2 class="section-title__title">Yazdığımız son blog yazıları</h2>
                        </div>
                        <div class="row">
                            <?php foreach($blog as $row){ ?>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <!--Blog One Single-->
                                    <div class="blog-one__single wow fadeInUp" data-wow-delay="100ms">
                                        <div class="blog-one__img-box">
                                            <div class="blog-one__img">
                                                <?php if (empty($row['photo'])){ ?>
                                                    <img src="<?=take_link().'/' ?>assets/images/blog/main_blog_photo.png" alt="<?=$row['title']; ?>">
                                                <?php } else{ ?>
                                                    <img src="<?=take_link().'/' ?>assets/images/uploads/blog/<?=$row['photo']; ?>" alt="<?=$row['title']; ?>">
                                                <?php } ?>
                                                <a href="blog/<?=$row['id']; ?>">
                                                    <span class="blog-one__plus"></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="blog-one__content">
                                            <h3 class="blog-one__title">
                                                <a href="blog/<?=$row['id']; ?>"><?=$row['title']; ?></a>
                                            </h3>
                                            <p class="blog-one__text"><?=$row['content']; ?></p>
                                            <div class="blog-one__bottom">
                                                <div class="blog-one__read-btn">
                                                    <a href="blog/<?=$row['id']; ?>"></a>
                                                    <a href="blog/<?=$row['id']; ?>">Devamını oku</a>
                                                </div>
                                                <div class="blog-one__arrow">
                                                    <a href="blog/<?=$row['id']; ?>"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <!--Blog One End-->
                <div class="container">
                    <div class="col-md-12 text-center mb-5">
                        <a href="blog-listesi" class="thm-btn w-100"><span>Daha Fazla</span></a>
                    </div>
                </div>

                <!--CTA One Start-->
                <section class="cta-one">
                    <div class="cta-one-bg" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/iscosoft_bg.png)"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="cta-one__inner">
                                    <p class="cta-one__tagline">A'dan Z'ye tüm kurumsal çözümlerinizde yardımcı olabiliriz</p>
                                    <h2 class="cta-one__title">Web Yazılım <br> <a href="https://www.iscosoftware.com">Isco Software</a></h2>
                                    <a href="https://www.iscosoftware.com" target="_blank" class="thm-btn cta-one__btn thm-btn--dark--light-hover"><span>Bize Ulaşın</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--CTA One End-->
            <?php break;
            case 'about':
                $row = $crud->read('about')->fetch(PDO::FETCH_ASSOC);
                ?>
                <!--Page Header Start-->
                <section class="page-header" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/about/about-bg.png);">
                    <div class="page-header-shape-1"></div>
                    <div class="page-header-shape-2"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="index.html">Ana Sayfa</a></li>
                                <li><span>.</span></li>
                                <li>Hakkımızda</li>
                            </ul>
                            <h2>Hakkımızda</h2>
                        </div>
                    </div>
                </section>
                <!--Page Header End-->

                <!--Reasons Start-->
                <section class="reasons">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="reasons__right">
                                    <div class="section-title text-left">
                                        <span class="section-title__tagline">Berke İnşaat</span>
                                        <h2 class="section-title__title"><?=$row['title']; ?></h2>
                                    </div>
                                    <p class="reasons__text"><?=$row['content']; ?></p>
                                    <ul class="list-unstyled reasons__list">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="text">
                                                <p>1995 Yılından beri emin adımlarla ilerliyoruz.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="text">
                                                <p>Müşterilerimize değer veriyor ve onlarla birlikte büyüyoruz.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>
                                            <div class="text">
                                                <p>Yurtiçinde ve Yurtdışında büyük projelere imza atıyoruz.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="iletisim" class="thm-btn reasons__btn w-50 text-center"><span>Bize Ulaşın</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Reasons End-->

                <!--Video One Start-->
                <section class="video-one video-two">
                    <div class="video-one-bg" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/video-bg.png)"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="video-one__inner">
                                    <div class="video-one__link">
                                        <a href="<?=$company_info['video']; ?>" class="video-one__btn video-popup">
                                            <div class="video-one__video-icon">
                                                <span class="icon-play-button"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <h2 class="video-one__text">Hakkımızda kısa bir <br> tanıtım videosu</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Video One End-->

                <!--Team One Start
                <section class="team-one">
                    <div class="container">
                        <div class="section-title text-center">
                            <span class="section-title__tagline">Berke İnşaat Ekibi</span>
                            <h2 class="section-title__title">Ekibimiz</h2>
                        </div>
                        <div class="row">
                            <?php for ($i = 0; $i < 4; $i++){ ?>
                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="team-one__single wow fadeInUp" data-wow-delay="100ms">
                                    <div class="team-one__img-box">
                                        <div class="team-one__img">
                                            <img src="<?=take_link().'/' ?>assets/images/team/team-1-1.jpg" alt="">
                                        </div>
                                        <div class="team-one__social">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                            <a href="#" class="clr-dri"><i class="fab fa-pinterest-p"></i></a>
                                            <a href="#" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="team-one__member-info">
                                        <h4 class="team-one__member-name">Berke İnşaat</h4>
                                        <p class="team-one__member-title">İnşaat</p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                -->


                <!--Team One End-->

                <!--Brand Two-->
                <section class="brand-one brand-two">
                    <div class="container">

                    </div>
                </section>
                <!--Brand Two End-->



            <?php break;
            case 'projects':
                $projects = $crud->read('project');
                ?>

                <div class="stricky-header stricked-menu main-menu">
                    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
                </div><!-- /.stricky-header -->

                <!--Page Header Start-->
                <section class="page-header" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/new_bg_header.png);">
                    <div class="page-header-shape-1"></div>
                    <div class="page-header-shape-2"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="anasayfa">Ana Sayfa</a></li>
                                <li><span>.</span></li>
                                <li>Projeler</li>
                            </ul>
                            <h2>Tüm Projeler </h2>
                        </div>
                    </div>
                </section>
                <!--Page Header End-->

                <!--Projects Page Start-->
                <section class="blog-one blog-grid">
                    <div class="container">
                        <div class="row">

                            <?php foreach($projects as $row){
                                $photo = json_decode($row['photo']);
                                ?>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <!--Blog One Single-->
                                <div class="blog-one__single wow fadeInUp" data-wow-delay="100ms">
                                    <div class="blog-one__img-box">
                                        <div class="blog-one__img">
                                            <img src="<?=take_link().'/' ?>assets/images/uploads/projects/<?=$photo[0]; ?>" alt="<?=$row['name']; ?>">
                                            <a href="<?=take_link().'/' ?>proje/<?=$row['id']; ?>">
                                                <span class="blog-one__plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <h3 class="blog-one__title">
                                            <a href="<?=take_link().'/' ?>proje/<?=$row['id']; ?>"><?=$row['name']; ?></a>
                                        </h3>
                                        <p class="blog-one__text">Proje Adı: <b><?=$row['name']; ?></b></p>
                                        <p class="blog-one__text">Proje Zamanı: <b><?=$row['time']; ?></b></p>
                                        <p class="blog-one__text">Proje Durumu: <b><?=$row['status'] == 1 ? 'Devam Ediyor' : 'Tamamlandı'; ?></b></p>
                                        <div class="blog-one__bottom">
                                            <div class="blog-one__read-btn">
                                                <a href="<?=take_link().'/' ?>proje/<?=$row['id']; ?>"></a>
                                                <a href="<?=take_link().'/' ?>proje/<?=$row['id']; ?>">Devamını oku</a>
                                            </div>
                                            <div class="blog-one__arrow">
                                                <a href="<?=take_link().'/' ?>proje/<?=$row['id']; ?>"><span class="icon-right-arrow"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <!--Project Page End-->



            <?php break;
            case 'project_details':
                $projects = $crud->read_with_id('project',$_GET['project_id'])->fetch(PDO::FETCH_ASSOC);
                $photo = json_decode($projects['photo']);
                ?>
                <!--Page Header Start-->
                <section class="page-header" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/new_bg_header.png);">
                    <div class="page-header-shape-1"></div>
                    <div class="page-header-shape-2"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="anasayfa">Ana Sayfa</a></li>
                                <li><span>.</span></li>
                                <li>Proje Detayı</li>
                            </ul>
                            <h2>X Projesi Detayı</h2>
                        </div>
                    </div>
                </section>
                <!--Page Header End-->

                <!--Blog Details Start-->
                <section class="blog-details">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-11">
                                <div class="blog-details__center">
                                    <div class="blog-details__img">
                                        <div class="responsive-slide">
                                            <?php for ($i = 0; $i < count($photo); $i++){ ?>
                                            <div><img src="<?=take_link().'/' ?>assets/images/uploads/projects/<?=$photo[$i]; ?>"> </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="blog-details__content mt-5">
                                        <h3 class="blog-details__title text-center pt-5"><?=$projects['name']; ?> Projesi Hakkında</h3>
                                        <p class="blog-details__text-1"><?=$projects['content']; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!--Blog Details End-->
                <?php break;
            case 'blog':
                $blog = $crud->read('blog');
                ?>
                <div class="stricky-header stricked-menu main-menu">
                    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
                </div><!-- /.stricky-header -->

                <!--Page Header Start-->
                <section class="page-header" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/new_bg_header.png);">
                    <div class="page-header-shape-1"></div>
                    <div class="page-header-shape-2"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="anasayfa">Ana Sayfa</a></li>
                                <li><span>.</span></li>
                                <li>Blog</li>
                            </ul>
                            <h2>Blog Yazıları</h2>
                        </div>
                    </div>
                </section>
                <!--Page Header End-->

                <!--Blog Page Start-->
                <section class="blog-one blog-grid">
                    <div class="container">
                        <div class="row">

                            <?php foreach($blog as $row){ ?>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <!--Blog One Single-->
                                    <div class="blog-one__single wow fadeInUp" data-wow-delay="100ms">
                                        <div class="blog-one__img-box">
                                            <div class="blog-one__img">
                                                <?php if (empty($row['photo'])){ ?>
                                                <img src="<?=take_link().'/' ?>assets/images/blog/main_blog_photo.png" alt="<?=$row['title']; ?>">
                                                <?php } else{ ?>
                                                    <img src="<?=take_link().'/' ?>assets/images/uploads/blog/<?=$row['photo']; ?>" alt="<?=$row['title']; ?>">
                                                <?php } ?>
                                                <a href="blog/<?=$row['id']; ?>">
                                                    <span class="blog-one__plus"></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="blog-one__content">
                                            <h3 class="blog-one__title">
                                                <a href="blog/<?=$row['id']; ?>"><?=$row['title']; ?></a>
                                            </h3>
                                            <p class="blog-one__text"><?=$row['content']; ?></p>
                                            <div class="blog-one__bottom">
                                                <div class="blog-one__read-btn">
                                                    <a href="proje/<?=$row['id']; ?>"></a>
                                                    <a href="blog/<?=$row['id']; ?>">Devamını oku</a>
                                                </div>
                                                <div class="blog-one__arrow">
                                                    <a href="blog/<?=$row['id']; ?>"><span class="icon-right-arrow"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <!--Blog Page End-->
            <?php break;
            case 'blog_details':
                $row = $crud->read_with_id('blog',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
                ?>
                <!--Page Header Start-->
                <section class="page-header" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/new_bg_header.png);">
                    <div class="page-header-shape-1"></div>
                    <div class="page-header-shape-2"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="anasayfa">Ana Sayfa</a></li>
                                <li><span>.</span></li>
                                <li>Blog Sayfası</li>
                            </ul>
                            <h2><?=$row['title']; ?></h2>
                        </div>
                    </div>
                </section>
                <!--Page Header End-->

                <!--Blog Details Start-->
                <section class="blog-details">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-11">
                                <div class="blgo-details__center">
                                    <?php if (!empty($row['photo'])){ ?>
                                    <div class="blog-details__img">
                                        <img src="<?=take_link().'/' ?>assets/images/uploads/blog/<?=$row['photo'] ?>" alt="<?=$row['title']; ?>">
                                    </div>
                                    <?php } ?>
                                    <div class="blog-details__content">
                                        <h3 class="blog-details__title"><?=$row['title']; ?></h3>
                                        <p class="blog-details__text-1"><?=$row['content']; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!--Blog Details End-->
                <?php break;
            case 'fileds_of_activity':
                $row = $crud->read_with_id('fileds_of_activity',$_GET['id'])->fetch(PDO::FETCH_ASSOC);
                ?>
                <!--Page Header Start-->
                <section class="page-header" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/new_bg_header.png);">
                    <div class="page-header-shape-1"></div>
                    <div class="page-header-shape-2"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="anasayfa">Ana Sayfa</a></li>
                                <li><span>.</span></li>
                                <li>Faaliyet Alanları</li>
                            </ul>
                            <h2><?=$row['title']; ?></h2>
                        </div>
                    </div>
                </section>
                <!--Page Header End-->

                <!--Blog Details Start-->
                <section class="blog-details">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-11">
                                <div class="blgo-details__center">
                                    <div class="blog-details__content text-center">
                                        <h3 class="blog-details__title"><?=$row['title']; ?></h3>
                                        <p class="blog-details__text-1"><?=$row['content']; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!--Blog Details End-->
                <?php break;
            case 'contact': ?>
                <!--Page Header Start-->
                <section class="page-header" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/about/about-bg.png);">
                    <div class="page-header-shape-1"></div>
                    <div class="page-header-shape-2"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="anasayfa">Ana Sayfa</a></li>
                                <li><span>.</span></li>
                                <li>İletişim</li>
                            </ul>
                            <h2>İletişim</h2>
                        </div>
                    </div>
                </section>
                <!--Page Header End-->
                <!--Contact Page Google Map Start-->
                <section class="contact-page-google-map mt-5 mb-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.5582324725733!2d28.996136515415625!3d41.05678887929593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab9ec0e422ee9%3A0xe48bbf2454159e09!2sBilgiyi%20Ticarile%C5%9Ftirme%20Merkezi!5e0!3m2!1str!2str!4v1637113207872!5m2!1str!2str" class="contact-page-google-map__box" allowfullscreen loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Contact Page Google Map End-->
                <!--Contact Page Start-->
                <section class="contact-page">
                    <div class="container">
                        <div class="section-title text-center">
                            <span class="section-title__tagline">Hemen mesaj gönderin</span>
                            <h2 class="section-title__title">Biz Size Ulaşalım</h2>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-page__form">
                                    <form action="#" class="comment-one__form contact-form-validated" id="contact_form" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="comment-form__input-box">
                                                    <input type="text" placeholder="İsminiz" name="name">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="comment-form__input-box">
                                                    <input type="text" placeholder="Soy İsminiz" name="surname">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="comment-form__input-box">
                                                    <input type="email" placeholder="Mail Adresiniz" name="email">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="comment-form__input-box">
                                                    <input type="text" placeholder="Telefon Numaranız" name="phone">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="comment-form__input-box">
                                                    <textarea name="message" placeholder="Mesajınız"></textarea>
                                                </div>
                                                <button type="submit" onclick="form_submit('#contact_form')"  class="thm-btn faqs-contact__btn"><span>Mesajınızı Gönderin</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-md-12">
                    <div class="text-center mx-auto align-items-center">
                    <img src="assets/images/add_company/b618867b-5797-4b94-b936-fe240f1e9e42.JPG" height="500px">
                    </div>
                </div>
                <!--Contact Page End-->
            <?php break;
            case '404': ?>
                <!--Page Header Start-->
                <section class="page-header" style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/page-header-bg.jpg);">
                    <div class="page-header-shape-1"></div>
                    <div class="page-header-shape-2"></div>
                    <div class="container">
                        <div class="page-header__inner">
                            <ul class="thm-breadcrumb list-unstyled">
                                <li><a href="index.html">Ana Sayfa</a></li>
                                <li><span>.</span></li>
                                <li>404 Sayfası</li>
                            </ul>
                            <h2>404 Sayfası</h2>
                        </div>
                    </div>
                </section>
                <!--Page Header End-->

                <!--Error Page Start-->
                <section class="error-page">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="error-page__inner">
                                    <h2 class="error-page__title">404</h2>
                                    <h3 class="error-page__tagline">Üzgünüz! Aradığınız sayfa mevcut değil.</h3>
                                    <p class="error-page__text mb-3">Aradığınız sayfa kısa bir süreliğine yayından kalkmış, veya silinmiş olabilir.
                                        <a href="anasayfa">Ana sayfaya</a> giderek gezintiye devam edebilirsiniz.
                                    </p>
                                    <!--
                                    <form class="error-page__form">
                                        <div class="error-page__form-input">
                                            <input type="search" placeholder="Search here">
                                            <button type="submit"><i class="icon-magnifying-glass"></i></button>
                                        </div>
                                    </form>
                                    -->
                                    <a href="anasayfa" class="thm-btn error-page__btn"><span>Ana Sayfa</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Error Page End-->
                <?php break;

            default:
                header('location:location:anasayfa');
            break;


                ?>





        <?php } ?>

        <!--Site Footer One Start-->
        <?php include 'footer.php'; ?>
        <!--Site Footer One End-->
    </div>
    <!-- /.page-wrapper -->


    <!-- .mobile-nav -->
    <?php include 'mobile_nav.php';  ?>
    <!-- /.mobile-nav -->


    <!-- .search-popup -->
    <?php // include 'search_popup.php';
    ?>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="<?=take_link().'/' ?>assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/odometer/odometer.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/swiper/swiper.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/wow/wow.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/isotope/isotope.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/countdown/countdown.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/twentytwenty/twentytwenty.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/twentytwenty/jquery.event.move.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/vegas/vegas.min.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="<?=take_link().'/' ?>assets/vendors/timepicker/timePicker.js"></script>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>



    <!-- template js -->
    <script src="<?=take_link().'/' ?>assets/js/berke_insaat.js"></script>





    <script type="text/javascript">
        $(document).ready(function() { //Owl Carousel Slider (İş ortaklarımız)
            $('.owl-carousel').owlCarousel({
                loop: true,
                lazyLoad: true,
                margin: 10,
                nav: false,
                center: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            })
        });
    </script>


    <script type="text/javascript">
        $('.responsive-slide').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    </script>

    <script type="text/javascript">
        function form_submit(which_form){
            $(which_form).submit(function(event){
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    type: "POST",
                    url: "<?=take_link().'/' ?>assets/contact_form/contact.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success:function (data){
                        console.log(JSON.stringify(data,null,4));
                        let status = JSON.parse(data);
                        Swal.fire({
                            title: status.title,
                            text: status.message,
                            icon: status.status,
                            confirmButtonText: 'Tamam',
                            showCancelButton: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = status.link;
                            }
                        })
                    }
                });
            });
        } //data_cu (Data Create & Update) Function END
    </script>


</body>

</html>