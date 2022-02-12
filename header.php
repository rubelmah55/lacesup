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

<body class="body-wrapper">

    <div class="promo-top-bar-wrapper">
        <div class="container text-center text-white">
            <div class="promo-heading">
                <span>FREE SHIPPING ON ORDERS OVER $50 SEE DETAILS</span>
            </div>
        </div>
    </div>

    <header class="header-wrapper">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-2 col-sm-5 col-md-4 col-6 pr-lg-5">
                    <div class="logo">
                        <a href="index.html">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png"  alt="Lacesup">       
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 text-end d-none d-lg-flex justify-content-between align-items-center">
                    <div class="menu-wrap">
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="man.html">man</a></li>
                                <li><a href="women.html">women</a></li>
                                <li><a href="kids.html">kids</a></li>
                                <li><a href="brends.html">brends</a></li>
                                <li><a href="top-sale-page.html">sale</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="header-right-element d-flex align-items-center">
                        <div class="search-box">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <i class="icon-search"></i>
                            </form>
                        </div>
                        <div class="product-cart">
                            <a href="#"><i class="icon-cart "></i></a>
                        </div>
                        <div class="user-login">
                            <a href="#"><i class="icon-user"></i></a>
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
                                <ul class="metismenu" id="mobile-menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="man.html">man</a></li>
                                    <li><a href="women.html">women</a></li>
                                    <li><a href="kids.html">kids</a></li>
                                    <li><a href="brends.html">brends</a></li>
                                    <li><a href="top-sale-page.html">sale</a></li>
                                </ul>
                            </nav>

                            <div class="action-bar text-white">
                                <div class="search-box ms-0">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        <i class="icon-search"></i>
                                    </form>
                                </div>
                                <div class="product-cart mt-3">
                                    <a href="#"><i class="icon-cart "></i></a>
                                </div>
                                <div class="user-login ms-0 mt-3">
                                    <a href="#"><i class="icon-user"></i></a>
                                </div>
                                <a href="shop.html" class="theme-btn mt-4">shop now <i class="icon-arrow-right-top"></i></a>
                            </div>
                        </div> 
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
            <hr class="d-none d-lg-block">
        </div>
    </header>