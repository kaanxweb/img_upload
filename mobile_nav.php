<div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"></span>

            <div class="logo-box">
                <a href="anasayfa" aria-label="logo image"><img src="assets/images/resources/main_logo.png" width="155"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:<?=$company_info['mail']; ?>"><?=$company_info['mail']; ?></a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:<?=$company_info['phone']; ?>"><?=$company_info['phone']; ?></a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
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
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>