<?php 
	/*
	Template Name: Home
	*/
    get_header();
    $banner = get_field('banner');
 ?>

 <section class="hero-wrapper fix">
     <span class="rotate-big-text">Laces Up</span>
     <div class="single-slide text-white">
         <div class="container">
             <div class="row">
                 <div class="col-xl-6">
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
                         
                         <div class="arrow-icon">
                             <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-arrow-icon.png" alt="">
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-6">
                     <div class="hero-img-wrapper text-xl-end mt-4 mt-lg-0">
                        <?php 
                            if(!empty($banner['image'])){
                                printf('<img src="%s" alt="">', $banner['image']);
                            }
                         ?>
                     </div>
                     <div class="products-info-funfact d-lg-flex justify-content-lg-between">
                         <div class="product-rating mt-5 mt-lg-0">
                             <div class="review-star d-flex">
                                 <span>4.9</span>
                                 <div class="star-rating">
                                     <i class="icon-star"></i>
                                     <i class="icon-star"></i>
                                     <i class="icon-star"></i>
                                     <i class="icon-star"></i>
                                     <i class="icon-star"></i>
                                 </div>
                             </div>
                             <?php 
                                if(!empty($banner['total_review'])){
                                    printf('<p>%s</p>', $banner['total_review']);
                                }
                              ?>
                         </div>

                         <div class="product-sold mt-5 mt-lg-0">
                            <?php 
                               if(!empty($banner['total_sold'])){
                                   printf('<h2>%s</h2>', $banner['total_sold']);
                               }
                             ?>
                             <h6>Our Total Sold</h6>
                         </div>

                         <div class="product-collection mt-5 mt-lg-0">
                            <?php 
                               if(!empty($banner['new_collections'])){
                                   printf('<h2>%s</h2>', $banner['new_collections']);
                               }
                             ?>
                             <h6>New Collections</h6>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <section class="brand-collection-carousel padding-160 pb-0">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-8">
                <?php 
                    $explore_brand = get_field('explore_brand');
                    if(!empty($explore_brand['title'])){
                        printf('<h1>%s</h1>', $explore_brand['title']);
                    }
                 ?>
             </div>
             <div class="col-lg-4 text-lg-end">
                 <div class="collection-carosuel-nav">
                     <button><i class="collection-nav-prev icon-arrow-long-left"></i></button>
                     <button><i class="collection-nav-next icon-arrow-long-right"></i></button>
                 </div>
             </div>
         </div>
         <div class="brand-carousel-active">
            <?php 
                if(!empty($explore_brand['product_cats'])):
                    foreach ($explore_brand['product_cats'] as $brand):
             ?>
             <div class="single-brand-item">
                 <div class="brand-info">
                    <?php 
                        if(!empty($brand['title'])){
                            printf('<h2>%s</h2>', $brand['title']);
                        }
                     ?>
                     <div class="brand-name">
                        <?php 
                            if(!empty($brand['brand'])){
                                printf('<a href="%s">%s <span>All Product</span></a>', $brand['brand_url'], $brand['brand']);
                            }
                         ?>
                     </div>
                 </div>
                 <div class="brand-item-img">
                    <?php 
                        if(!empty($brand['image'])){
                            printf('<img src="%s" alt="%s">', $brand['image']['url'], $brand['image']['alt']);
                        }
                     ?>
                     
                 </div>
             </div>
            <?php endforeach; endif; ?>
         </div>
     </div>
 </section>

 <section class="product-block-wrapper padding-160 pb-0">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-6 col-xl-5 ps-xl-5">
                <?php 
                    $we_provide = get_field('we_provide');
                    if(!empty($we_provide['title'])){
                        printf('<h2>%s</h2>', $we_provide['title']);
                    }
                    if(!empty($we_provide['subtitle'])){
                        printf('<p class="pe-lg-5">%s</p>', $we_provide['subtitle']);
                    }
                    if(!empty($we_provide['button'])){
                        printf('<a href="%s" class="theme-btn">%s <i class="icon-arrow-right-top"></i></a>', $we_provide['button']['url'], $we_provide['button']['title']);
                    }
                 ?>
                 
             </div>
             <div class="col-lg-6 col-xl-7">
                 <div class="shoes-img">
                    <?php 
                        if(!empty($we_provide['image'])){
                            printf('<img src="%s" alt="">', $we_provide['image']);
                        }
                    ?>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <div class="product-collection-grid-wrapper padding-160">
     <div class="container">
        <?php 
            $life = get_field('lifestyle');

            if(!empty($life['title'])){
                printf('<h2 class="text-center">%s</h2>', $life['title']);
            }
         ?>
         <div class="product-grid-card">
             <div class="row lr-12">
                <?php
                    if(!empty($life['select_products'])):

                        foreach($life['select_products'] as $product_id):
                            $_product = wc_get_product( $product_id );

                 ?>
                 <div class="col-sm-6 col-md-4 col-lg-3">
                     <div class="single-product-card">
                        <?php 
                            $thumbnail = get_the_post_thumbnail_url($product_id);
                         ?>
                         <div class="product-thumb bg-cover" style="background-image: url('<?php echo $thumbnail; ?>');"></div>
                         <div class="product-content">
                             <a href="<?php echo get_permalink($product_id); ?>"><?php echo $_product->get_title();?></a>
                             <div class="d-flex">
                                 <div class="product-price mr-30">$<?php echo $_product->get_price();?>.00</div>
                                 <?php 
                                    $color = get_field('how_many_color_you_have_for_this_product', $product_id);

                                    if(!empty($color)){
                                        printf('<div class="product-attribute">%s colors</div>', $color);
                                    }
                                  ?>
                                 
                             </div>
                         </div>
                     </div>
                 </div>
                <?php endforeach; endif; ?>
             </div>
         </div>
         <div class="load-more-btn text-center">
            <?php 
                if(!empty($life['button'])){
                    printf('<a href="%s" class="theme-btn" target="%s">%s <i class="icon-arrow-right-top"></i></a>', $life['button']['url'], $life['button']['target'], $life['button']['title']);
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

 <div class="product-grid-gallery-cta">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-xl-6 text-center text-xl-start">
                 <div class="product-content-block text-white">
                    <?php 
                        $catch = get_field('catch_a_vibe');

                        if(!empty($catch['title'])){
                            printf('<h2>%s</h2>', $catch['title']);
                        }

                        if(!empty($catch['button'])){
                            printf('<a href="%s" class="theme-btn mt-4" target="%s">%s <i class="icon-arrow-right-top"></i></a>', $catch['button']['url'], $catch['button']['target'], $catch['button']['title']);
                        }
                     ?>
                 </div>
             </div>
         </div>
     </div>
     <div class="product-img-grid-bg bg-cover d-none d-lg-block" style="background-image: url('<?php echo $catch['image'];?>')"></div>
 </div>

<div class="popluar-shoes-brand-wrapper padding-160">
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

<?php 
    get_footer();
 ?>