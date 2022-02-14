    <?php 
        $footer = get_field('footer', 'options');
        $logo = $footer['logo'];
     ?>
    <footer class="footer-wrapper">
        <div class="footer-widgets-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widgets site-about-wid">
                            <div class="logo">
                                <?php 
                                    if(!empty($logo)){
                                        printf('<a href="%s"><img src="%s" alt="logo"></a>', site_url(), $logo);
                                    }
                                 ?>
                                
                            </div>
                            <?php 
                                $contact = $footer['contact_info'];

                                if(!empty($contact['phone'])){
                                    printf('<span class="mobile-number"><a href="tel:%s">%s</a></span>', $contact['phone'], $contact['phone']);
                                }
                             ?>
                             <?php 
                                if(!empty($contact['email'])):
                              ?>
                            <div class="single-contact-info">
                                <div class="icon">
                                    <i class="icon-mail"></i>
                                </div>
                                <div class="content">
                                    <?php 
                                    printf('<a href="mailto:%s">%s</a>', $contact['email'], $contact['email']);
                                    ?>
                                </div>
                            </div>
                            <?php 
                                endif;
                                if(!empty($contact['address'])):
                             ?>
                            <div class="single-contact-info">
                                <div class="icon">
                                    <i class="icon-map-marker"></i>
                                </div>
                                <div class="content">
                                    <?php echo $contact['address']; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php 
                        $menus = $footer['footer_menus'];
                        foreach ($menus as $key => $menu):
                            if($key == 0){
                     ?>
                    <div class="col-lg-2 offset-lg-1 col-sm-6">
                        <div class="single-footer-widgets">
                            <div class="wid-title">
                                <?php 
                                    if(!empty($menu['menu_title'])){
                                        printf('<p>%s</p>', $menu['menu_title']);
                                    }
                                 ?>
                            </div>
                            <ul>
                                <?php 
                                    foreach ($menu['menus'] as $mi) {
                                        printf('<li><a href="%s">%s</a></li>',$mi['link'], $mi['name']);
                                    }
                                 ?>
                            </ul>
                        </div>
                    </div>
                    <?php }elseif($key == 1){ ?>
                    <div class="col-lg-2 ps-lg-0 offset-lg-1 col-sm-6">
                        <div class="single-footer-widgets">
                            <div class="wid-title">
                                <?php 
                                    if(!empty($menu['menu_title'])){
                                        printf('<p>%s</p>', $menu['menu_title']);
                                    }
                                 ?>
                            </div>
                            <ul>
                                <?php 
                                    foreach ($menu['menus'] as $mi) {
                                        printf('<li><a href="%s">%s</a></li>',$mi['link'], $mi['name']);
                                    }
                                 ?>
                            </ul>
                        </div>
                    </div>
                    <?php }endforeach; ?>
                    <div class="col-lg-3 text-lg-end col-sm-6">
                        <div class="single-footer-widgets text-start">
                            <div class="newsletter-form">
                                <p>Email Newsletter</p>
                                <form action="#">
                                    <input type="email" placeholder="Enter Email">
                                    <button type="submit"><i class="icon-right"></i></button>
                                </form>
                            </div>
                            
                            <div class="social-links">
                                <p>More Informations</p>

                                <div class="social-icon">
                                    <?php 
                                        $socials = $footer['social_share'];

                                        foreach ($socials as $social) {
                                             printf('<a href="%s" >%s</a>', $social['url'], $social['icon']);
                                         } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-wrapper">
            <div class="container">
                <hr>
                <div class="row text-center text-lg-start">
                    <div class="col-lg-6 col-12">
                        <div class="site-copyright">
                            <?php 
                                $copyright = $footer['copy_right'];

                                if(!empty($copyright)){
                                    printf('<p>%s</p>', $copyright);
                                }
                             ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mt-4 mt-lg-0 text-lg-end">
                        <div class="footer-menu">
                            <ul>
                                <?php 
                                    foreach($footer['bottom_bar_menu'] as $bottom_menu){
                                        printf('<li><a href="%s" target="%s">%s</a></li>', $bottom_menu['link']['url'], $bottom_menu['link']['target'], $bottom_menu['link']['title']);
                                    }
                                 ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>