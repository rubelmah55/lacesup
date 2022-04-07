<?php 
	get_header('black'); 
?>
	
	<div id="primary" class="content-area">
		
		<section class="default-page" style="padding: 100px 0px 100px;">
			<div class="container">
				<div class="product-grid-card">
				    <div class="row">
				    	<?php if (have_posts()): while(have_posts()): the_post(); ?>
				        <div class="col-sm-6 col-md-4 col-lg-3">
				            <div class="single-promo-product-card">
				                <div class="product-thumb bg-cover" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
				                <div class="product-content">
				                    <div class="d-flex justify-content-between">
				                        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
				                        <?php 
				                        	$product = wc_get_product( get_the_ID() );
				                        	printf('<div class="product-price ">$%s.00</div>', $product->get_price());
				                         ?>
				                        
				                    </div>
				                </div>
				            </div>
				        </div>
				        <?php endwhile; else: ?>
				        <div class="col-md-12">
				        	<div class="error-404 not-found text-center">
				        		<header class="page-header">
				        			<h1 class="hero"><?php _e('404', 'oshen'); ?></h1>
				        			<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'oshen' ); ?></h2>
				        		</header><!-- .page-header -->

				        		<div class="page-content">
				        			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'oshen' ); ?></p>
				        			
				        			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"><?php _e('Go Back To Home', 'oshen'); ?></a>
				        		</div><!-- .page-content -->
				        	</div><!-- .error-404 -->
				        </div>
				        <?php endif; wp_reset_query(); ?>
				    </div>
				</div>

			</div>
		</section><!-- /default-page -->

	</div><!-- /primary -->

<?php 
	get_footer();
?>