<?php 
/*
Template Name: Promotions & Coupons Code
*/
get_header();
$banner = get_field('banner');
 ?>
    <div class="promo-page-banner-wrapper text-center">
        <div class="container">
            <div class="promo-page-heading">
                <?php 
                    if(!empty($banner['title'])){
                        printf('<h1>%s</h1>', $banner['title']);
                    } 
                    if(!empty($banner['button'])){
                        printf('<a href="%s" class="theme-btn mt-5" target="%s">%s</a>', $banner['button']['url'], $banner['button']['target'], $banner['button']['title']);
                    }
                 ?>
                
            </div>
            <div class="nice-arrow d-none d-md-block">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/promo-arrow.png" alt="">
            </div>
        </div>
    </div>

    <div class="promo-code-bar">
        <div class="container text-center text-white">
            <div class="promo-code-text">
                <?php 
                    if(!empty($banner['coupon'])){
                        printf('%s', $banner['coupon']);
                    }
                 ?>
            </div>
        </div>
    </div>

    <section class="promo-card-wrapper text-center padding-160">
        <div class="container">
            <div class="row lr-25">
                <?php 
                    $cats = get_field('products_cat');
                    if(!empty($cats)):
                        foreach ($cats as $cat):
                 ?>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="single-promo-card-item">
                        <div class="icon">
                            <?php 
                                if(!empty($cat['image'])){
                                    printf('<img src="%s" alt="%s">', $cat['image']['url'],$cat['image']['url'] );
                                }
                             ?>
                        </div>
                        <div class="content">
                            <?php 
                                if(!empty($cat['title'])){
                                    printf('<h3><a href="%s">%s</a></h3>', get_the_permalink(),$cat['title'] );
                                } 
                                if(!empty($cat['subtitle'])){
                                    printf('<p>%s</p>', $cat['subtitle'] );
                                } 
                                if(!empty($cat['button'])){
                                    printf('<a href="%s" class="theme-btn black" target="%s">%s</a>', $cat['button']['url'],$cat['button']['target'], $cat['button']['title'] );
                                }
                             ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>