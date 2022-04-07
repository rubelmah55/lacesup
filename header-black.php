<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="rrdevs">
    <!-- ======== Page title ============ -->
    <title><?php if(is_front_page()){ echo' Home '; echo' | '; echo bloginfo('name'); } else { wp_title(''); echo' | '; bloginfo('name');  } ?></title>
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
    <!-- ===========  All Stylesheet ================= -->
<?php wp_head(); ?>  
</head>
<body <?php body_class('body-wrapper'); ?>>

    <header class="header-wrapper style-2">
    	<?php 
    	    $header = get_field('header', 'options');
    	    $top_bar = $header['top_bar_message'];
    	    $logo = $header['logo_black'];

    	    if(!empty($top_bar)):
    	?>
        <div class="promo-top-bar-wrapper">
            <div class="container text-center text-white">
                <div class="promo-heading">
                    <span><?php echo $top_bar; ?></span>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="main-header-wrapper">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-2 col-sm-5 col-md-4 col-6 pr-lg-5">
                        <?php 
                            if(!empty($logo)){
                                printf('<a href="%s"><img src="%s"  alt="Lacesup"></a>', site_url(), $logo);
                            }
                         ?>
                    </div>
                    <div class="col-lg-10 text-end d-none d-lg-flex justify-content-between align-items-center">
                        <div class="menu-wrap">
                            <div class="main-menu">
                                <?php   
                                    wp_nav_menu( array(
                                        'menu'               => 'Primary Menu',
                                        'theme_location'     => 'menu-1',
                                        'depth'              => 2,
                                        'menu_id'            => '',
                                        'container'          => false,
                                        'menu_class'         => '',
                                        'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                        'walker'             => new wp_bootstrap_navwalker(),
                                    ));
                                ?>
                            </div>
                        </div>
    
                        <div class="header-right-element d-flex align-items-center">
                            <div class="search-box">
                                <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                            </div>
                        </div>
                    </div>
    
                    <div class="d-block d-lg-none col-sm-1 col-md-8 col-6">
                        <div class="mobile-nav-wrap">
                            <div id="hamburger"><i class="icon-menu"></i></div>
                            <!-- mobile menu - responsive menu  -->
                            <div class="mobile-nav">
                                <button type="button" class="close-nav">
                                    <i class="icon-cancel"></i>
                                </button>
                                <nav class="sidebar-nav">
                                    <?php   
                                        wp_nav_menu( array(
                                            'menu'               => 'Primary Menu',
                                            'theme_location'     => 'menu-1',
                                            'depth'              => 2,
                                            'menu_id'            => 'mobile-menu',
                                            'container'          => false,
                                            'menu_class'         => 'metismenu',
                                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                            'walker'             => new wp_bootstrap_navwalker(),
                                        ));
                                    ?>
                                </nav>
    
                                <div class="action-bar text-white">
                                    <div class="search-box ms-0">
                                        <form action="#">
                                            <input type="text" placeholder="Search">
                                            <i class="icon-search"></i>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>

                <hr class="d-none d-lg-block mb-3">
            </div>
        </div>
    </header>