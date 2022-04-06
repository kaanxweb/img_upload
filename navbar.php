<?php
$fileds_of_activity = $crud->read('fileds_of_activity');
?>

<header class="main-header clearfix">
            <nav class="main-menu clearfix">
                <div class="main-menu-wrapper clearfix">
                    <div class="main-menu-wrapper__left clearfix">
                        <div class="main-menu-wrapper__logo">
                            <!--<a href="index.html"><img src="assets/images/resources/logo.png" alt=""></a>-->
                            <a href="anasayfa"><img src="<?=take_link().'/' ?>assets/images/resources/main_logo.png" alt="Berke İnşaat"></a>
                        </div>
                        <!--
                        <div class="main-menu-wrapper__search-box">
                            <a href="#" class="main-menu-wrapper__search search-toggler icon-magnifying-glass"></a>
                        </div>
                        -->
                        <div class="main-menu-wrapper__social">
                            <?php if (!empty($company_info['twitter'])){ ?>
                            <a href="<?=$company_info['twitter']; ?>"><i class="fab fa-twitter"></i></a>
                            <?php } ?>
                            <?php if (!empty($company_info['facebook'])){ ?>
                            <a href="<?=$company_info['facebook']; ?>" class="clr-fb"><i class="fab fa-facebook"></i></a>
                            <?php } ?>
                            <?php if (!empty($company_info['linkedin'])){ ?>
                            <a href="#" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                            <?php } ?>
                            <?php if (!empty($company_info['instagram'])){ ?>
                            <a href="<?=$company_info['instagram'] ?>" class="clr-ins"><i class="fab fa-instagram"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler">
                            <span></span>
                        </a>
                        <ul class="main-menu__list">
                            <li><a href="<?=take_link().'/' ?>anasayfa">Ana Sayfa</a></li>
                            <li><a href="<?=take_link().'/' ?>hakkimizda">Hakkımızda </a></li>
                            <li class="dropdown">
                                <a href="#">Faaliyet Alanları</a>
                                <ul>
                                    <?php foreach ($fileds_of_activity as $fileds_pages){ ?>
                                    <li><a href="<?=take_link().'/' ?>faaliyet_alanlari/<?=$fileds_pages['id'] ?>"><?=$fileds_pages['title']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="<?=take_link().'/' ?>projelerimiz">Projelerimiz</a></li>
                            <li><a href="<?=take_link().'/' ?>blog-listesi">Blog</a></li>
                            <li><a href="<?=take_link().'/' ?>iletisim">İletişim</a></li>
                        </ul>
                    </div>
                    <div class="main-menu-wrapper__right">
                        <div class="main-menu-wrapper__right-contact-box">
                            <div class="main-menu-wrapper__right-contact-icon">
                                <span class="icon-phone-call"></span>
                            </div>
                            <div class="main-menu-wrapper__right-contact-number">
                                <a href="tel:<?=$company_info['phone']; ?>"><?=$company_info['phone']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->