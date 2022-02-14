<?php
/*
Template Name: About
*/
	get_header();

	$banner = get_field('banner');
 ?>

    <div class="page-banner-wrap text-center bg-cover" style="background-image: url('<?php echo $banner['image']; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-6 offset-xl-3 offset-lg-2">
                    <div class="page-heading text-white">
                    	<?php 
                    		if(!empty($banner['title'])){
                    			printf('<h1>%s</h1>', $banner['title']);
                    		} 
                    		if(!empty($banner['subtitle'])){
                    			printf('<p>%s</p>', $banner['subtitle']);
                    		}
                    	 ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-us-wrapper fix padding-160">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 pe-xl-5">
                    <div class="about-us-content">
                    	<?php 
                    		$who = get_field('who_we_are');

                    		if(!empty($who['title'])){
                    			printf('<h1>%s</h1>', $who['title']);
                    		}
                    		if(!empty($who['content'])){
                    			printf('<p>%s</p>', $who['content']);
                    		}
                    	 ?>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                	
                    <div class="about-us-content-img ps-xl-4">
                        <?php 
                        	if(!empty($who['image'])){
                        		printf('<img src="%s" alt="">', $who['image']);
                        	}
                        ?>
                    </div>
                </div>
            </div>

            <div class="social-responsively-wrapper padding-160 text-center">
            	<?php 
            		$social = get_field('social_responsibility');

            		if(!empty($social['title'])){
            			printf('<h1>%s</h1>', $social['title']);
            		}
            	 ?>
                <div class="row lr-25">
                	<?php 
                		foreach ($social['social_items'] as $item):
                	 ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="single-social-box">
                            <div class="icon">
                                <img src="<?php echo $item['icon']; ?>" alt="Community">
                            </div>
                            <div class="content">
                            	<?php 
                            		if(!empty($item['title'])){
                            			printf('<h3>%s</h3>', $item['title']);
                            		} 
                            		if(!empty($item['content'])){
                            			printf('<p>%s</p>', $item['content']);
                            		}
                            	 ?>
                            </div>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="social-join-card-wrapper text-center">
            <div class="container">
            	<?php 
            		$join = get_field('join_us');
            		if(!empty($join['title'])){
            			printf('<h1>%s</h1>', $join['title']);
            		}
            	 ?>
                
                <div class="row lr-20">
                	<?php 
                		foreach ($join['social_items'] as $s_i):
                	 ?>
                    <div class="col-sm-6 col-xl-4">
                        <div class="join-social-card bg-cover" style="background-image: url('<?php echo $s_i['image'] ?>')">
                            <div class="social-icons">
                            	<?php
                            	if(!empty($s_i['social_icons'])){ 
                            		foreach ($s_i['social_icons'] as $icon) {
                            			if(!empty($icon)){
                            				printf('<a href="%s" >%s</a>', $icon['url'], $icon['icon']);
                            			}
                            		}
                            	}
                            	 ?>

                            </div>
                        </div>
                    </div>
                    <?php 
                    	endforeach;
                     ?>
                </div>
            </div>
        </div>
    </section>

<?php 
	get_footer();
 ?>