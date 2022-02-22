<?php 
	/*
	Template Name: FAQ
	*/
    get_header();
    
 ?>

 <section class="faq-wrapper">
     <div class="container">
         <div class="row">
             <div class="col-md-10 offset-md-1">
                 <div class="faq-content-wrapper">
                 	<?php 
                 		$faq = get_field('faq');

                 		if(!empty($faq['title'])){
                 			printf('<h1 class="text-capitalize">%s</h1>', $faq['title']);
                 		}
                 	 ?>
                     

                     <div class="faq-accordion">
                         <h3 class="text-center">Question & Answer</h3>
                         <div class="accordion" id="accordion">
                         	<?php
                         		if(!empty($faq['faqs'])): 
                         		foreach ($faq['faqs'] as $key => $item):
                         	 ?>
                            <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $key;?>" aria-expanded="false" aria-controls="faq<?php echo $key;?>">
                                     Q: <?php echo $item['question'];?>
                                 </button>
                               </h4>
                               <div id="faq<?php echo $key;?>" class="accordion-collapse collapse <?php if($key == 0){echo "show";} ?>" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                     A: <?php echo $item['ans'];?>
                                 </div>
                               </div>
                            </div>
                        <?php endforeach; endif;?>
                         </div>                      
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

<?php 
    get_footer();
 ?>