<?php 
    /*
    Template Name: Top Sale
    */
    get_header();
    $banner = get_field('banner');
 ?>

    <section class="hero-wrapper">
        <div class="single-slide-2">
            <span class="rotate-big-text">Laces Up</span>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-10 text-center text-lg-start offset-lg-0 offset-sm-1">
                        <div class="hero-content">
                            <?php 
                                if(!empty($banner['title'])){
                                    printf('<h1>%s</h1>', $banner['title']);
                                } 
                                if(!empty($banner['subtitle'])){
                                    printf('<p>%s</p>', $banner['subtitle']);
                                } 
                                if(!empty($banner['button'])){
                                    printf('<a href="%s" class="theme-btn mt-4" target="%s">%s<i class="icon-arrow-right-top"></i></a>', $banner['button']['url'], $banner['button']['target'], $banner['button']['title']);
                                }
                             ?>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 text-center offset-xl-1">
                        <div class="shoes-img">
                            <?php 
                                if(!empty($banner['image'])){
                                    printf('<img src="%s" alt="%s">', $banner['image']['url'],  $banner['image']['alt']);
                                }
                             ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="shoes-filter-wrapper">
        <div class="container">
            <form id="postFormFilter" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="row filter_items" method="get">
                <div class="col-lg-3">
                    <select class="form-select" aria-label="Default select example" name="sort">
                        <option selected>Sort by</option>
                        <option value="ASC">Sort By: Latest</option>
                        <option value="DSC">Sort By: Oldest</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <select class="form-select" aria-label="Default select example" name="gender">
                        <option selected>Gender</option>
                        <?php 
                            $gender = get_terms([
                                'taxonomy' => 'gender',
                                'hide_empty' => true,
                            ]);
                            foreach ($gender as $key => $term){
                                printf('<option value="%s">%s</option>', $term->slug, $term->name);
                            }
                         ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <select class="form-select" aria-label="Default select example" name="brand">
                        <option selected>Brand</option>
                        <?php 
                            $brand = get_terms([
                                'taxonomy' => 'brand',
                                'hide_empty' => true,
                            ]);
                            foreach ($brand as $key => $term){
                                printf('<option value="%s">%s</option>', $term->slug, $term->name);
                            }
                         ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <select class="form-select" aria-label="Default select example" name="shoe_type">
                        <option selected>Footwear Style</option>
                        <?php 
                            $shoe_type = get_terms([
                                'taxonomy' => 'shoe_type',
                                'hide_empty' => true,
                            ]);
                            foreach ($shoe_type as $key => $term){
                                printf('<option value="%s">%s</option>', $term->slug, $term->name);
                            }
                         ?>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="product-collection-grid-wrapper padding-160">
        <div class="container">
            <?php 
                $products = get_field('products');

                if(!empty($products['title'])){
                    printf('<h2 class="text-center">%s</h2>', $products['title']);
                }
             ?>
            <div class="product-grid-card">
                <div class="row">
                    <?php 
                        if(!empty($products['select_products'])):
                            foreach ($products['select_products'] as $product_id):

                            $_product = wc_get_product( $product_id );
                            $thumbnail = get_the_post_thumbnail_url($product_id);
                     ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="single-promo-product-card">
                            <div class="product-thumb bg-cover" style="background-image: url('<?php echo $thumbnail; ?>');"></div>
                            <div class="product-content">
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo get_permalink($product_id); ?>"><?php echo $_product->get_title();?></a>
                                    <div class="product-price ">$<?php echo $_product->get_price();?>.00</div>
                                </div>
                                <?php 
                                    $coupon = get_field('product_coupon_code', $product_id);
                                    if(!empty($coupon)){
                                        printf('<div class="promo-code"><span>%s</span></div>', $coupon);
                                    }
                                 ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            <div class="load-more-btn text-center">
                <?php 
                    if(!empty($products['button'])){
                        printf('<a href="%s" class="theme-btn" target="%s">%s <i class="icon-arrow-right-top"></i></a>', $products['button']['url'],$products['button']['target'], $products['button']['title'] );
                    }
                 ?>
            </div>
        </div>
    </div>

    <section class="core-features-wrapper padding-160 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12">
                   <?php 
                       $features = get_field('features');
                    ?>
                    <div class="single-core-features">
                       <?php 
                           if(!empty($features['processor']['title'])){
                               printf('<h2>%s</h2>', $features['processor']['title']);
                           } 
                           if(!empty($features['processor']['subtitle'])){
                               printf('<p class="pe-sm-5 me-sm-5">%s</p>', $features['processor']['subtitle']);
                           }
                       ?>
                    </div>
                    <div class="divider-img ms-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/core-arrow1.png" alt="">
                    </div>
                    <div class="single-core-features ms-5">
                       <?php 
                           if(!empty($features['technology']['title'])){
                               printf('<h2>%s</h2>', $features['technology']['title']);
                           } 
                           if(!empty($features['technology']['subtitle'])){
                               printf('<p class="pe-sm-5 me-sm-5">%s</p>', $features['technology']['subtitle']);
                           }
                       ?>
                    </div>
                </div>
                <div class="col-lg-2 col-12 text-center">
                    <div class="core-feature-shoes">
                       <?php 
                           if(!empty($features['image'])){
                               printf('<img src="%s" alt="%s">', $features['image']['url'], $features['image']['alt']);
                           }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="single-core-features ms-3">
                       <?php 
                           if(!empty($features['user_friendly']['title'])){
                               printf('<h2>%s</h2>', $features['user_friendly']['title']);
                           } 
                           if(!empty($features['user_friendly']['subtitle'])){
                               printf('<p class="pe-sm-3">%s</p>', $features['user_friendly']['subtitle']);
                           }
                       ?>
                    </div>
                    <div class="divider-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/core-arrow2.png" alt="">
                    </div>
                    <div class="single-core-features">
                       <?php 
                           if(!empty($features['quality']['title'])){
                               printf('<h2>%s</h2>', $features['quality']['title']);
                           } 
                           if(!empty($features['quality']['subtitle'])){
                               printf('<p class="pe-sm-5">%s</p>', $features['quality']['subtitle']);
                           }
                       ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="popluar-shoes-brand-wrapper padding-160 pt-0">
        <div class="container">
            <?php 
                $brands = get_field('brands', 'options');
                if(!empty($brands['title'])){
                    printf('<h2 class="text-center">%s</h2>', $brands['title']);
                }
             ?>
             <div class="brand-list-grid mt-5 d-lg-flex justify-content-between align-items-center">
                <?php 
                    if(!empty($brands['logos'])):
                    foreach ($brands['logos'] as $logo):
                 ?>
                 <div class="single-brand">
                    <?php 
                        printf('<img src="%s" alt="%s">', $logo['url'], $logo['alt']);
                     ?>
                     
                 </div>
                <?php endforeach; endif; ?>
             </div>
        </div>
    </div>
<?php get_footer(); ?>