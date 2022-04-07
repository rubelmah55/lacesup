<?php
/*
Template Name: Contact
*/
	get_header('black');

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
                <?php 
                    $contact = get_field('contact_us');
                    if(!empty($contact['top_content'])){
                        printf('<p class="mb-30">%s</p>',$contact['top_content']);
                    }
                    if(!empty($contact['title'])){
                        printf('<h3>%s</h3>',$contact['title']);
                    }
                    if(!empty($contact['phone_and_time'])){
                        printf('<p>%s</p>',$contact['phone_and_time']);
                    }
                 ?>
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
                    <?php 
                        if(!empty($contact['bottom_title'])){
                            printf('<h2 class="mb-30">%s</h2>', $contact['bottom_title']);
                        } 

                        if(!empty($contact['items'])){
                            foreach ($contact['items'] as $i => $item) {
                                printf('<h3 class="mb-20">%s</h3>', $item['title']);
                                $m = "";
                                if($i == 0){
                                    $m = "mb-40";
                                }
                                printf('<p class="%s">%s</p>', $m, $item['content']);
                            }
                        }
                     ?>
                </div>
            </div>

        </div>
    </section>
<?php 
	get_footer();
 ?>