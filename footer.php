<footer class="site-footer">
            <div class="site-footer__top">
                <div class="site-footer-top-bg"
                    style="background-image: url(<?=take_link().'/' ?>assets/images/backgrounds/site-footer-bg.jpg)"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="index.php?page=index"><img src="<?=take_link().'/' ?>assets/images/resources/footer-logo.png" alt="Berke İnşaat"></a>
                                </div>
                                <p class="footer-widget__about-text">1995 yılından günümüze profesyonel ekipler ile çalışmalarını sürdüren Berke İnşaat'a hoş geldiniz.</p>
                                <div class="footer-widget__about-social-list">
                                    <?php if (!empty($company_info['twitter'])){ ?>
                                    <a href="<?=$company_info['twitter']; ?>"><i class="fab fa-twitter"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($company_info['facebook'])){ ?>
                                    <a href="<?=$company_info['facebook']; ?>" class="clr-fb"><i class="fab fa-facebook"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($company_info['linkedin'])){ ?>
                                    <a href="<?=$company_info['linkedin']; ?>" class="clr-dri"><i class="fab fa-linkedin"></i></a>
                                    <?php } ?>
                                    <?php if (!empty($company_info['instagram'])){ ?>
                                    <a href="<?=$company_info['instagram']; ?>" class="clr-ins"><i class="fab fa-instagram"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer-widget__explore clearfix">
                                    <h3 class="footer-widget__title">Sayfalar</h3>
                                <ul class="footer-widget__explore-list list-unstyled">
                                    <li><a href="<?=take_link().'/' ?>hakkimizda">Hakkımızda</a></li>
                                    <li><a href="<?=take_link().'/' ?>iletisim">İletişim</a></li>
                                    <li><a href="<?=take_link().'/' ?>projelerimiz">Projelerimiz</a></li>
                                    <li><a href="<?=take_link().'/' ?>blog-listesi">Blog Yazılarımız</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__contact">
                                <h3 class="footer-widget__title">İletişim</h3>
                                <p class="footer-widget__contact-text">Samur Mahallesi Abdullah Kurnaz Cad. No:13 - Kumru / Ordu</p>
                                <div class="footer-widget__contact-info">
                                    <p>
                                        <!--<a href="tel:+90-452-423-56-26" class="footer-widget__contact-phone">+90 452 423 56 26</a>-->
                                        <a href="mailto:<?=$company_info['mail']; ?>"
                                            class="footer-widget__contact-mail"><?=$company_info['mail']; ?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__newsletter">
                                <h3 class="footer-widget__title">Kampanyalardan faydalanmak için mail ile abone olabilirsiniz</h3>
                                <form class="footer-widget__newsletter-form" action="<?=take_link().'/' ?>assets/subscribe/subscribe.php" method="POST">
                                    <div class="footer-widget__newsletter-input-box">
                                        <input type="email" placeholder="Mail Adresiniz" name="mail">
                                        <button type="submit" name="subscribe_mail" class="footer-widget__newsletter-btn"><i
                                                class="fas fa-paper-plane"></i></button>
                                    </div>
                                </form>
                                <div class="footer-widget__newsletter-bottom">
                                    <div class="footer-widget__newsletter-bottom-icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="footer-widget__newsletter-bottom-text">
                                        <p>Şartları kabul ediyorum</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer-bottom__inner">
                                <p class="site-footer-bottom__copy-right">© Copyright <?=date("Y"); ?> <a
                                        href="#">Berke İnşaat</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>