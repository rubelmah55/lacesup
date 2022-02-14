<?php
/*
Template Name: Contact
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
                    		if(!empty($banner['content'])){
                    			printf('<p>%s</p>', $banner['content']);
                    		} 
                    	?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-us-wrapper fix padding-160">
        <div class="container">
            <div class="contact-us-content">
                <p class="mb-30">Our Customer Care team is committed to answering all of your questions as quickly as possible, and we look forward to helping resolve your issue. We updated shoes.com. With the update, you may have some questions about using your account and previous access purchases. Please check our Frequently Asked Questions section to find answers to some common questions.</p>

                <h3>CONTACT US :</h3>
                <p>Phone: 1 (888) 200-8414, Monday – Friday, 9am – 5pm EST</p>

                <div class="contact-form ms-md-5">                                                        
                    <form action="mail.php" class="row" id="contact-form">
                        <div class="col-md-6 col-12">
                            <div class="single-personal-info">
                                <label for="fname">Full Name</label>
                                <input type="text" id="fname" placeholder="Full Name" >                                         
                            </div>
                        </div>                            
                        <div class="col-md-6 col-12">
                            <div class="single-personal-info">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" placeholder="Email" >                                         
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="single-personal-info">
                                <label for="border">Order #</label>
                                <input type="text" id="border" placeholder="Order #">                                         
                            </div>
                        </div>                                      
                        <div class="col-md-6 col-12">
                            <div class="single-personal-info">
                                <label for="subject">Reason</label>
                                <select name="reason" id="subject">
                                    <option value="s1">Please Select</option>
                                    <option value="s2">value1</option>
                                    <option value="s3">value3</option>
                                    <option value="s4">value4</option>
                                </select>                                      
                            </div>
                        </div>                                      
                        <div class="col-md-12 col-12">
                            <div class="single-personal-info">
                                <label for="message">Message</label>
                                <textarea id="message"></textarea>                                        
                            </div>
                        </div>                                      
                        <div class="col-md-12 col-12">
                            <div class="single-personal-info">
                                <label for="fileupload">File upload (Optional)</label>
                                <input type="file" id="fileupload">                                       
                            </div>
                        </div>                                      
                        <div class="col-md-4 col-12">
                            <div class="single-personal-info">
                                <span>Verification</span>
                                <img src="../assets/img/newCaptchaAnchor.gif" alt="">                                     
                            </div>
                        </div>                                      
                        <div class="col-md-12 col-12">
                            <input class="submit-btn" type="submit" value="submit">
                        </div>                                      
                    </form>
                </div>

                <div class="contact-us-bottom-content ms-md-5">
                    <h2 class="mb-30">Lacesup.Com Benefits & Guarantees</h2>
                    <h3 class="mb-20">Free Shipping</h3>
                    <p class="mb-40">UPS economy shipping options are free on orders over $50 to Shoes.com customers anywhere in the United States. All orders over $50 qualify for free shipping. For orders under $50, UPS economy shipping will be a flat rate of $9.99. Allow 3-10 business days for receipt within the United States when you order with free UPS economy shipping on orders over $50.</p>
                    <h3 class="mb-20">100% Price Guarantee</h3>
                    <p>If you find a product for a lower price on another website, we will refund you 100% of the difference between the lower price and the Shoes.com price. We'll even refund the difference if we lower the price at Lacesup.com!</p>
                </div>
            </div>

        </div>
    </section>
<?php 
	get_footer();
 ?>