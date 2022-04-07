<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'black' ); ?>

<div class="promo-code-bar theme-bg">
    <div class="container text-center text-white">
        <div class="promo-code-text">
        	<?php 
        		echo get_field('product_coupon_code');
        	 ?>
        </div>
    </div>
</div>

<section class="single-product-wrapper padding-160 pt-5">
    <div class="container">
        <div class="single-product-contents">
            <div class="row">
                <div class="col-lg-6 col-xl-6 mb-5 mb-lg-0">
                    <div class="product-img-gallery">
                        <div class="single-product-img bg-cover" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>

                        <?php 

                        	global $product;
                        	$product = new WC_product(get_the_ID());

                    	    $attachment_ids = $product->get_gallery_image_ids();

                    	    foreach( $attachment_ids as $attachment_id ) {
                    	        $image_link = wp_get_attachment_url( $attachment_id );
                    	        printf('<div class="single-product-img bg-cover" style="background-image: url(%s)"></div>', $image_link);
                    	    }
                         ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 offset-xl-1">
                    <div class="product-backlink-wrapper mb-4">
                        <?php woocommerce_breadcrumb(); ?>

                    </div>
                    <div class="product-details-card">
                        <div class="product-rating mb-3">
                            <span>4.7</span>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                        </div>

                        <div class="product-title">
                            <h2><?php echo get_the_title(); ?></h2>
                        </div>
                        <div class="product-price-id-wrapper d-flex justify-content-between align-items-center">
                            <div class="product-price">
                                <span>$<?php echo $product->get_price(); ?>.00</span>
                            </div>
                            <div class="product-id">
                                <span>Item No. <?php echo $product->get_sku(); ?></span>
                            </div>
                        </div>
                        <div class="product-add-to-cart-btn text-center mt-40">
                        <?php 
                        	global $post;

                        		if ( is_singular( 'product' ) && ! empty( $post ) && ( $product = wc_get_product( $post ) ) && $product->is_type( 'external' ) ) {
                        			printf('<a href="%s" class="theme-btn d-block" target="_blank">Buy Now</a>', $product->get_product_url());
                        		}
                         ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-12">
                    <div class="product-content mb-100">
                    	<?php 
                    		$what = get_field('whats_it_do', get_the_ID());

                    		if(!empty($what['title'])){
                    			printf('<h2>%s</h2>', $what['title']);
                    		}

                    		if(!empty($what['content'])){
                    			printf('<p>%s</p>', $what['content']);
                    		}

                    		$featur = get_field('features_and_benefits', get_the_ID());

                    		if(!empty($featur['title'])){
                    			printf('<h2><span>%s</span></h2>', $featur['title']);
                    		}

                    	 ?>
                        
                        <ul>
                        	<?php 
                        		if(!empty($featur['items'])){
                        			foreach ($featur['items'] as $item) {
                        				printf('<li>%s</li>', $item['item']);
                        			}
                        		}
                        	 ?>
                        </ul>
                    </div>
                    <hr>
                    <div class="product-ask-wrapper mt-4 d-md-flex justify-content-between align-items-center">
                        <div class="review-text">
                            <h6 class="mb-0">WHAT DO YOU WANT TO KNOW ABOUT THIS PRODUCT?</h6>
                        </div>
                        <div class="faq-link mt-3 mt-md-0 ">
                            <a href="<?php echo site_url(); ?>/faq" class="theme-btn">Ask a Questions</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="related-products-wrapper padding-160 pb-0">
            <h1 class="text-center mb-0" style="font-weight: 500;">We Think You'll Also Like</h1>
            <div class="product-grid-card">
                <div class="row lr-12">
                	<?php 
                		global $post;
                		$related = get_posts( 
                		  array( 
                		  'category__in' => wp_get_post_categories( $post->ID ), 
                		  'numberposts'  => 4, 
                		  'post__not_in' => array( $post->ID ),
                		  'post_type'    => 'product'
                		  ) 
                		);
                		  if( $related ): 
                		    foreach( $related as $post ):
                		        setup_postdata($post); 
                		        $thumbnail = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full' );
                		        $product = wc_get_product( get_the_ID() );
                		          $permalink = get_the_permalink(get_the_ID());
                		          $title = get_the_title();
                		          $price = $product->get_price();

                	 ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="single-product-card">
                            <div class="product-thumb bg-cover" style="background-image: url('<?php echo $thumbnail; ?>');"></div>
                            <div class="product-content">
                            	<?php 
                            		printf('<a href="%s">%s</a>', $permalink, $title);
                            	 ?>
                                <div class="d-flex">
                                    <div class="product-price mr-30">$<?php echo $price; ?>.00</div>
                                    <?php 
                                    	$color = $color = get_field('how_many_color_you_have_for_this_product', get_the_ID());

                                    	if(!empty($color)){
                                    		printf('<div class="product-attribute">%s colors</div>', $color);
                                    	}
                                     ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    	endforeach;
                    	wp_reset_postdata();
                    	endif;
                     ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
