<?php 
    get_header('black');
    $term = get_queried_object();
    $banner = get_field('banner', $term);
 ?>
    <div id="cat_name" data-id="<?php echo $term->slug; ?>"></div>
    <div class="shop-page-banner bg-cover" style="background-image: url('<?php echo $banner['bg']; ?>')">
        <div class="container">
            <div class="page-heading text-white">
                <?php 
                    if(!empty($banner['title'])){
                        printf('<h1>%s</h1>', $banner['title']);
                    }
                 ?>
            </div>
        </div>
    </div>

    <div class="product-category-shop-wrapper padding-160">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 order-2 order-lg-1">
                    <div class="shope-sidebar-wrapper mt-5">
                        <form id="postFormFilter" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="row search-wrapper" method="get">
                            <div class="reset_filter">
                                <h3>Filter</h3>  
                                <button class="reset" type="reset">Clear all</button>
                            </div>
                            <div class="accordion" id="accordionExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Shoe Type
                                  </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                  <div class="accordion-body">
                                    <?php 
                                        $shoe_type = get_terms([
                                            'taxonomy' => 'shoe_type',
                                            'hide_empty' => true,
                                        ]);
                                        foreach ($shoe_type as $key => $term):
                                    ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="<?php echo $term->term_id; ?>" name="<?php echo $term->taxonomy; ?>[]" id="<?php echo $term->slug; ?>">
                                      <label class="form-check-label" for="<?php echo $term->slug; ?>">
                                        <?php echo $term->name; ?>
                                      </label>
                                    </div>
                                    <?php endforeach; ?>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Brand Collections
                                  </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                  <div class="accordion-body">
                                    <?php 
                                        $brand = get_terms([
                                            'taxonomy' => 'brand',
                                            'hide_empty' => true,
                                        ]);
                                        foreach ($brand as $key => $term):
                                     ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="<?php echo $term->term_id; ?>" name="<?php echo $term->taxonomy; ?>[]" id="<?php echo $term->slug; ?>">
                                      <label class="form-check-label" for="<?php echo $term->slug; ?>">
                                        <?php echo $term->name; ?>
                                      </label>
                                    </div>
                                    <?php endforeach; ?>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 order-1 order-lg-2">

                    <div class="product-grid-card">
                        <div class="row lr-12" id="loadAjaxPosts">
                        </div>
                    </div>
                    <div class="product_load_more">
                        <a href="#" class="theme-btn ajax-loadmore">Load More <i class="icon-arrow-right-top"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
<?php 
    get_footer();
 ?>