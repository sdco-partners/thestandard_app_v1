<?php 
	
	# require
	require 'inc/bfi_thumb/bfi_thumb.php';
	
	# setup

	add_action( 'wp_enqueue_scripts', 'sj_enqueue_scripts' );

	function sj_enqueue_scripts(){

		# register
		wp_register_script('slick','//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.3.15/slick.min.js',array('jquery'),'1.3.15',true);
		wp_register_script( 'mustache', '//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.8.1/mustache.min.js', false, '0.8.1', true );
		wp_register_script('site',get_bloginfo('template_directory').'/prod/scripts.js',array('jquery','jquery-ui-core','jquery-ui-draggable','slick'),false,true);
		// wp_register_script('soap',get_bloginfo('template_directory').'/assets/js/soap_methods.js',array('jquery'),false,true);

		# enqueue
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('slick');
		wp_enqueue_script('mustache');
		wp_enqueue_script('site');
		wp_enqueue_script('soap');

		wp_localize_script( 'site', 'STANDARD', array('ajaxurl' => admin_url('admin-ajax.php')) );

	}

	# ajax
	add_action( 'wp_ajax_nopriv_floor-plans', 'sj_floor_plans' );
	add_action( 'wp_ajax_floor-plans', 'sj_floor_plans' );

	function sj_floor_plans(){

		$term_id = $_GET['term_id'];

		$tax_query = array(
			array('taxonomy' => 'type-floor-plan','terms' => $term_id)
		);
		
		$plans = new wp_query(array('post_type' => 'floor-plan','nopaging' => true,'tax_query' => $tax_query,'nofoundrows' => true));

		$return = array('plans' => array());
		$is_active = true;

		if ($plans->have_posts()) {
			while ($plans->have_posts()) { $plans->the_post();
			
				$return['plans'][] = helper_return_floor_plan_data($is_active);

				$is_active = false;

			}
		}

		echo json_encode($return);

		die();

	}

	add_action( 'wp_ajax_nopriv_floor-plan', 'sj_floor_plan' );
	add_action( 'wp_ajax_floor-plan', 'sj_floor_plan' );

	function sj_floor_plan()
	{
		
		$post_id = $_GET['post_id'];

		$plan = new wp_query(array('post_type' => 'floor-plan','p' => $post_id,'tax_query' => $tax_query,'nofoundrows' => true));

		$return = array('plans' => array());
		$is_active = true;

		if ($plan->have_posts()) {
			while ($plan->have_posts()) { $plan->the_post();
				
				$return = helper_return_floor_plan_data($is_active);

			}
		}

		echo json_encode($return);

		die();


	}

	function helper_return_floor_plan_data($is_active){
		
		$img = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
		$apartments = get_field('apartments');

		if (empty($apartments)) {
			$is_available = 'No';
		}else{
			$is_available = 'Yes';
		}

		if (empty($apartments)) {
			$apartments = false;
		}

		$is_available = 'coming soon';

		$data = array(
			'id' => get_the_id(),
			'active' => $is_active,
			'name' => get_the_title(),
			'link' => get_permalink(),
			'img' => $img[0],
			'pdf' => get_field('pdf'),
			'size' => get_field('size'),
			'floor_plan_price' => get_field('floor_plan_price'), //added by bcb
			'bedrooms' => get_field('bedrooms'),
			'bathrooms' => get_field('bathrooms'),
			'available' => $is_available,
			'apartments' => $apartments
		);

		return $data;
	}

	# connect

	function sj_process_form($data){

		$errors = array();

		if ($data['name'] == '') {
			$errors['name'] = 'Name is required.';
		}

		if ($data['email'] == '') {
			$errors['email'] = 'Email is required.';
		}

		if ($data['message'] == '') {
			$errors['message'] = 'Message is required.';
		}

		if (empty($errors)) {
			
			$to = array('thestandard@greystar.com','TheStandard.Gre@lead2lease.com');

			$subject = 'Connect!';

			$headers = "From: " . strip_tags($data['email']) . "\r\n";
			$headers .= "Reply-To: ". strip_tags($data['email']) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$message = '<p>Name: '.$data['name'].'</p>';
			$message = '<p>Email: '.$data['email'].'</p>';
			$message = '<p>Message: '.$data['message'].'</p>';

			if (wp_mail($to,$subject,$message,$headers)) {
				return array('status' => 'sucess','message' => 'Thank you!');
			}

			return array('status' => 'errors','errors' => array('wp_mail' => 'There was an error.'));
		}


		return array('status' => 'errors','errors' => $errors);

	}


	add_action( 'after_setup_theme', 'sj_setup' );

	function sj_setup() {

		
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		#register_nav_menus( );

		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

	}



	# helpers

	function sj_find_first_gallery(){

		$galleries = new wp_query(array('post_type' => 'gallery','posts_per_page' => 1, 'order' => 'DESC','fields' => 'ids'));
		return $galleries->posts[0];

	}
	  /**
	  *
	  * Adds option tab
	  *
	  */
	  if( function_exists('acf_add_options_page') ) {
	    
	    acf_add_options_page();
	    
	  }