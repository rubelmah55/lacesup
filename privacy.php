<?php 
/*
Template Name: Privacy
*/
get_header();
    
?>

	<div class="breadcrumb-wrapper">
	    <div class="container">
	        <?php lacesup_breadcrumb(); ?>
	    </div>
	</div>

    <section class="promo-offer-wrapper">
        <div class="container">
        
            <div class="row">
                <div class="col-12">
                    <div class="block-contents me-lg-5 pe-lg-5">
                    	<?php 
                    		$privacy = get_field('privacy_policy');

                    		if(!empty($privacy['title'])){
                    			printf('<h1>%s</h1>', $privacy['title']);
                    		}

                    		if(!empty($privacy['date'])){
                    			printf('<h6>%s</h6>', $privacy['date']);
                    		}

                    		if(!empty($privacy['content'])){
                    			printf('%s', $privacy['content']);
                    		}
                    	 ?>

                        <div class="terms-wrapper mt-5 pt-lg-3">
                        	<?php 

	                        	if(!empty($privacy['what_type_title'])){
	                    			printf('<h3>%s</h3>', $privacy['what_type_title']);
	                    		}

	                        	if(!empty($privacy['what_type_content'])){
	                    			printf('%s', $privacy['what_type_content']);
	                    		}
	                    	?>
                        </div>

                        <div class="promo-bottom-content mt-5 pt-lg-4">

	                    	<?php 

	                        	if(!empty($privacy['we_collect_title'])){
	                    			printf('<h3>%s</h3>', $privacy['we_collect_title']);
	                    		}

	                        	if(!empty($privacy['we_collect_content'])){
	                    			printf('%s', $privacy['we_collect_content']);
	                    		}
	                    	?>
                        </div>

                        <div class="promo-bottom-content mt-5 pt-lg-4">
                    		<?php 

                    	    	if(!empty($privacy['how_do_we_use_title'])){
                    				printf('<h3>%s</h3>', $privacy['how_do_we_use_title']);
                    			}

                    	    	if(!empty($privacy['how_do_we_use_content'])){
                    				printf('%s', $privacy['how_do_we_use_content']);
                    			}
                    		?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nice-draw">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nice-draw.png" alt="">
            </div>
        </div>
    </section>
<?php 
    get_footer();
 ?>