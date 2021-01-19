 <!-- Footer -->
 <footer id="dk-footer" class="dk-footer">
 <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">
                        <a href="index.html" class="footer-logo">
                            <img src="<?php echo get_template_directory_uri() . '/images/ford-logo.png'; ?>" alt="footer_logo" class="img-fluid">
                        </a>
                        <p class="footer-info-text">
                            Naše najnovije i najatraktivnije Ford ponude čekaju vas ovdje.
                        </p>
                        <div class="footer-social-link">
                            <h3>Pratite nas</h3>
                            <?php dynamic_sidebar( 'footer-social' ); ?>

                        </div>
                        <!-- End Social link -->
                    </div>
                    <!-- End Footer info -->
                    <div class="footer-awarad">
                        <img src="images/icon/best.png" alt="">
                        <?php dynamic_sidebar( 'footer-slogan-2' ); ?>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fas fa-location-arrow" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>Hrvatska</h3>
                                    <?php dynamic_sidebar( 'footer-grad-postanski' ); ?>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <?php dynamic_sidebar( 'footer-broj' ); ?>
                                    <p>Slobodno nas nazovite</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Contact Row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget footer-left-widget">
                                <div class="section-heading">
                                    <h3>Korisne poveznice</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <?php 
                                        $args = array(
                                            'theme_location'  => 'footer-menu-middle-1',
                                            'menu_id'       =>  'footer-menu-middle',
                                              'depth'	          => 1,
                                              'container'       => 'ul',
                                              'container_class' => 'nicht',
                                              'container_id'    => 'nicht',
                                              'menu_class'      => 'li'
                                          );
                                          wp_nav_menu( $args );
                                ?>
                                <?php 
                                        $args = array(
                                            'theme_location'  => 'footer-menu-middle-2',
                                            'menu_id'       =>  'footer-menu-middle-2',
                                              'depth'	          => 1,
                                              'container'       => 'ul',
                                              'container_class' => 'nicht',
                                              'container_id'    => 'nicht',
                                              'menu_class'      => 'li'
                                          );
                                          wp_nav_menu( $args );
                                ?>
                            <!-- End Footer Widget -->
                            </div>
                        </div>
                        <!-- End col -->
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget">
                                <div class="section-heading">
                                    <h3>Pretplata</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <?php dynamic_sidebar( 'footer-slogan' ); ?>
                                <form action="#">
                                    <div class="form-row">
                                        <div class="col dk-footer-form">
                                            <input type="email" class="form-control" placeholder="Email adresa">
                                            <button type="submit">
                                                <i class="far fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End form -->
                            </div>
                            <!-- End footer widget -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Widget Row -->
        </div>
        <!-- End Contact Container -->


        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>Copyright © 2021, Sva prava pridržana Ford Hrvatska</span>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6">
                        <div class="copyright-menu">
                        <?php 
                                        $args = array(
                                            'theme_location'  => 'footer-menu-bottom',
                                            'menu_id'       =>  'footer-menu-bottom',
                                            'depth'	          => 1,
                                            'container'       => 'ul',
                                            'container_class' => 'nicht',
                                            'container_id'    => 'nicht',
                                            'menu_class'      => 'li'
                                          );
                                          wp_nav_menu( $args );
                                ?>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Copyright Container -->
        </div>
        <!-- End Copyright -->
        <!-- Back to top -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-dark" title="Back to Top" style="display: block;">
                <i class="fa fa-angle-up"></i>
            </button>
        </div>
        <!-- End Back to top -->
 </footer>

    <?php wp_footer(); ?>

  </body>

</html>