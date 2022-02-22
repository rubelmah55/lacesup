<?php 
	/*
	Template Name: FAQ
	*/
    get_header();
    $banner = get_field('banner');
 ?>

 <section class="faq-wrapper">
     <div class="container">
         <div class="row">
             <div class="col-md-10 offset-md-1">
                 <div class="faq-content-wrapper">
                     <h1 class="text-capitalize">frequently asked questions .</h1>

                     <div class="faq-accordion">
                         <h3 class="text-center">Question & Answer</h3>
                         <div class="accordion" id="accordion">
 
                             <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                     Q: WHAT FORMS OF PAYMENT DO YOU ACCEPT?
                                 </button>
                               </h4>
                               <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                     A: To see a complete list of payment options accepted on the Shoes.com website, click here
                                 </div>
                               </div>
                             </div>
                             
                             <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="true" aria-controls="faq2">
                                     Q: HOW CAN I CHECK THE STATUS OF MY ORDER?
                                 </button>
                               </h4>
                               <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                     A: To see a complete list of payment options accepted on the Shoes.com website, click here
                                 </div>
                               </div>
                             </div>
 
                             <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                     Q: HOW LONG DOES IT TAKE TO RECEIVE MY ORDER?
                                 </button>
                               </h4>
                               <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                     A: Allow 3 – 10 business days for receipt within the United States. This time frame includes both processing and shipping time.
                                 </div>
                               </div>
                             </div>
 
                             <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                     Q: WHAT ARE THE COSTS?
                                 </button>
                               </h4>
                               <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                     A: To see a complete list of shipping options and costs for purchases made on the Shoes.com website, click here.
                                 </div>
                               </div>
                             </div>

                             <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                     Q: WHAT IS YOUR RETURN POLICY?
                                 </button>
                               </h4>
                               <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                    A: To see our Return/Exchange Policy and instructions for making a return or an exchange, click here.
                                 </div>
                               </div>
                             </div>

                             <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                     Q: WHY CAN'T I PRINT MY RETURN LABEL?
                                 </button>
                               </h4>
                               <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                     A: If you are experiencing difficulty printing your return label, we are happy to assist you. Contact us here. 
                                 </div>
                               </div>
                             </div>

                             <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false" aria-controls="faq7">
                                     Q: WHY DOESN'T THE TRACKING NUMBER WORK?
                                 </button>
                               </h4>
                               <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                     A: It may take 24 hours before tracking information appears on the UPS website. For further assistance, contact us here.
                                 </div>
                               </div>
                             </div>

                             <div class="accordion-item">
                               <h4 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                                     Q: WHAT IS ID.ME AND HOW DO I ACCESS MY DISCOUNT?
                                 </button>
                               </h4>
                               <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                 <div class="accordion-body">
                                     A: With ID.me, you can verify your group status, and gain access to amazing group discounts from hundreds of the most popular brands. ID.me maintains all your credentials in one place, so your shopping can go smoothly. Through this verification technology you can take advantage of discounts and other online marketplace benefits. Over 500 brands have exclusive offers through ID.me. Learn More.
                                 </div>
                               </div>
                             </div>
 
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