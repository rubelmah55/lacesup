<?php 
	/*
	Template Name: Exclusions
	*/
    get_header('black');
    
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
                        $exclusions = get_field('exclusions');

                        if(!empty($exclusions['title'])){
                            printf('<h1>%s</h1>', $exclusions['title']);
                        }

                        if(!empty($exclusions['date'])){
                            printf('<h6>%s</h6>', $exclusions['date']);
                        }

                        if(!empty($exclusions['subtitle'])){
                            printf('<p class="mt-5">%s</p>', $exclusions['subtitle']);
                        }
                     ?>
                     <div class="terms-wrapper mt-5 pt-lg-3">
                        <?php 
                            if(!empty($exclusions['terms_title'])){
                                printf('<h2>%s</h2>', $exclusions['terms_title']);
                            }

                            if(!empty($exclusions['content'])){
                                printf('%s', $exclusions['content']);
                            }
                         ?>
                     </div>

                     <div class="promo-bottom-content mt-5 pt-lg-4">
                        <?php 
                            if(!empty($exclusions['select_styles'])){
                                printf('<h3>%s</h3>', $exclusions['select_styles']);
                            }

                            if(!empty($exclusions['s_content'])){
                                printf('%s', $exclusions['s_content']);
                            }
                         ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="nice-draw">
         <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nice-draw.png" alt="">
     </div>
 </section>

<?php 
    get_footer();
 ?>