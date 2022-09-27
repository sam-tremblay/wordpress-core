<?php

if (!defined('ABSPATH')) exit;

if (!defined('GT_VERSION')) define('GT_VERSION', '1.1.1');

class gc{

	function __construct(){

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		/*
		* Remove Admin Bar
		*/
		add_filter('show_admin_bar', '__return_false');


		/*
		* Remove / Enqueue Styles and Scripts
		*/
		add_action('wp_enqueue_scripts', function(){

			/*
			* Remove Basics Styles
			*/
			wp_dequeue_style('wp-block-library');
			wp_dequeue_style('global-styles');
			

			/*
			* Add Styles in head
			*
			* All In One File
			*/
			wp_register_style('gate-all-in-one', get_bloginfo('stylesheet_directory').'/assets/css/all-in-one.min.css', null, null, null);

			/*
			* Font Awesome
			*/
			wp_register_style('gate-font-awesome', get_template_directory_uri().'/assets/css/fontawesome.min.css', null, null, null);

			/*
			* Main Styles
			*/
			wp_enqueue_style('gate-main', get_bloginfo('stylesheet_directory').'/assets/css/main.min.css', null, null, null);


			/*
			* Add Scripts in Footer
			*
			* All In One File
			*/
			wp_register_script('gate-all-in-one', get_bloginfo('stylesheet_directory').'/assets/js/all-in-one.min.js', null, null, true);

			/*
			* jQuery
			*/
			wp_register_script('gate-jquery', get_template_directory_uri().'/assets/js/jquery/jquery.min.js', null, null, true);
			wp_register_script('gate-jquery-mask', get_template_directory_uri().'/assets/js/jquery/jquery.mask.min.js', null, null, true);

			/*
			* GSAP Files
			*/
			wp_register_script('gate-gsap-core', get_template_directory_uri().'/assets/js/gsap/gsap.min.js', null, null, true);
			wp_register_script('gate-gsap-css-rule', get_template_directory_uri().'/assets/js/gsap/CSSRulePlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-custom-bounce', get_template_directory_uri().'/assets/js/gsap/CustomBounce.min.js', null, null, true);
			wp_register_script('gate-gsap-custom-ease', get_template_directory_uri().'/assets/js/gsap/CustomEase.min.js', null, null, true);
			wp_register_script('gate-gsap-custom-wiggle', get_template_directory_uri().'/assets/js/gsap/CustomWiggle.min.js', null, null, true);
			wp_register_script('gate-gsap-draggable', get_template_directory_uri().'/assets/js/gsap/Draggable.min.js', null, null, true);
			wp_register_script('gate-gsap-draw-svg', get_template_directory_uri().'/assets/js/gsap/DrawSVGPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-easel', get_template_directory_uri().'/assets/js/gsap/EaselPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-ease-pack', get_template_directory_uri().'/assets/js/gsap/EasePack.min.js', null, null, true);
			wp_register_script('gate-gsap-flip', get_template_directory_uri().'/assets/js/gsap/Flip.min.js', null, null, true);
			wp_register_script('gate-gsap-gs-dev-tools', get_template_directory_uri().'/assets/js/gsap/GSDevTools.min.js', null, null, true);
			wp_register_script('gate-gsap-inertia', get_template_directory_uri().'/assets/js/gsap/InertiaPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-morph-svg', get_template_directory_uri().'/assets/js/gsap/MorphSVGPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-motion-path', get_template_directory_uri().'/assets/js/gsap/MotionPathPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-motion-path-helper', get_template_directory_uri().'/assets/js/gsap/MotionPathHelper.min.js', null, null, true);
			wp_register_script('gate-gsap-observer', get_template_directory_uri().'/assets/js/gsap/Observer.min.js', null, null, true);
			wp_register_script('gate-gsap-physics-2d', get_template_directory_uri().'/assets/js/gsap/Physics2DPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-physics-props', get_template_directory_uri().'/assets/js/gsap/PhysicsPropsPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-pixi', get_template_directory_uri().'/assets/js/gsap/PixiPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-scramble-text', get_template_directory_uri().'/assets/js/gsap/ScrambleTextPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-scroll-smoother', get_template_directory_uri().'/assets/js/gsap/ScrollSmoother.min.js', null, null, true);
			wp_register_script('gate-gsap-scroll-to', get_template_directory_uri().'/assets/js/gsap/ScrollToPlugin.min.js', null, null, true);
			wp_register_script('gate-gsap-scroll-trigger', get_template_directory_uri().'/assets/js/gsap/ScrollTrigger.min.js', null, null, true);
			wp_register_script('gate-gsap-text-split', get_template_directory_uri().'/assets/js/gsap/SplitText.min.js', null, null, true);
			wp_register_script('gate-gsap-text', get_template_directory_uri().'/assets/js/gsap/TextPlugin.min.js', null, null, true);

			/*
			* Gate Files
			*/
			wp_register_script('gate-extender', get_template_directory_uri() .'/assets/js/gate.min.js', null, null, true);
			wp_enqueue_script('gate-main', get_bloginfo('stylesheet_directory') .'/assets/js/main.min.js', null, null, true);

		}, 10);


		
		add_action('init', function(){

			/*
			* Clean wp_head
			*/
			global $sitepress;
			remove_action('wp_head', 'rsd_link');
			remove_action('wp_head', 'wlwmanifest_link');
			remove_action('wp_head', 'wp_generator');
			remove_action('wp_head', 'start_post_rel_link');
			remove_action('wp_head', 'index_rel_link');
			remove_action('wp_head', 'feed_links_extra', 3);
			remove_action('wp_head', 'feed_links', 2);
			remove_action('wp_head', 'adjacent_posts_rel_link');
			remove_action('wp_head', 'rest_output_link_wp_head');
			remove_action('wp_head', 'wp_oembed_add_discovery_links');
			remove_action('wp_head', 'wp_resource_hints', 2);
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('wp_print_styles', 'print_emoji_styles');
			remove_action('wp_head', 'rel_canonical');
			remove_action('wp_head', 'wp_shortlink_wp_head', 10);
			remove_action('template_redirect', 'wp_shortlink_header', 11);
			remove_action('wp_head', array($sitepress, 'meta_generator_tag'));
		});


		/*
		* Remove Upload Resize
		*/
		add_filter('intermediate_image_sizes_advanced', function($size, $metadata){
			return [];
		}, 10, 2);


		if(!class_exists('isGateSEO')){
			add_action('wp_head', function(){

				$title = get_the_title() . ' - ' . get_bloginfo('name');

				if(is_tax() || is_tag() || is_category()){

					$term = get_queried_object();

					$title = $term->name . ' - ' . get_bloginfo('name');

				} elseif(is_author()){
					$author = get_queried_object();
					$author = get_userdata($author->ID);

					$author_name = $author->first_name . ' ' . $author->last_name;

					$title = $author_name . ' - ' . get_bloginfo('name');
				}


				$html = '<title>'. $title .'</title>';

				$html .= '<meta charset="'. get_bloginfo('charset') .'">';
				$html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
				$html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">';
				$html .= '<meta name="theme-color" content="#000">';


				echo $html;

			}, 1);
		}

	}


	static function current_view_class(){
		global $post;
		if(is_single())
			return $post->post_name . ' single single-'. get_post_type();

		elseif(is_tax() || is_tag() || is_category()){
			$term = get_queried_object();
			
			if(is_tax())
				return 'is-tax ' . $term->slug;
			elseif(is_tag())
				return 'is-tag ' . $term->slug;
			elseif(is_category())
				return 'is-cat ' . $term->slug;
		}

		elseif(is_author())
			return 'is-author';

		elseif(is_page() && !is_front_page())
			return 'is-page' . (get_page_template_slug() ? ' ' . str_replace('.php', '', get_page_template_slug()) : null);


		return 'is-front';

	}


	static function sn($format = 'icon'){

		if(in_array($format, ['icon', 'text', 'i-t']) && self::field('is_gate_social_network')){
			
			$result = '<ul>';
				foreach (self::field('is_gate_social_network') as $sn) {

					$result .= '<li>';
						if($format === 'icon')
							$result .= '<a href="'. $sn['url'] .'" title="'.$sn['name'] .'" class="fab fa-'. $sn['fa_class'] .' redirect" target="_blank"></a>';

						elseif($format === 'text')
							$result .= '<a href="'. $sn['url'] .'" title="'.$sn['name'] .'" class="redirect" target="_blank">'.$sn['name'] .'</a>';

						elseif($format === 'i-t')
							$result .= '<a href="'. $sn['url'] .'" title="'.$sn['name'] .'" class="redirect" target="_blank"><i class="fab fa-'. $sn['fa_class'] .'"></i>'.$sn['name'] .'</a>';

					$result .= '</li>';
				}
			$result .= '</ul>';

		}


		return isset($result) ? $result : null;
	}


	static function field($field_slug = null, $id = null){

		if(!class_exists('ACF'))  return;

		if($field_slug && $id)
			return get_field($field_slug, $id);

		elseif($field_slug)
			return !empty(get_field($field_slug, 'options')) ? get_field($field_slug, 'options') : get_field($field_slug);


		return;

	}


	static function menu($theme_location = null, $args = []){

		$parameters = array( 
			'menu' => '',
			'container' => false,
			'container_class' => '', 
			'container_id' => '', 
			'menu_class' => '',
			'menu_id' => '',
			'echo' => false, 
			'fallback_cb' => 'wp_page_menu', 
			'before' => '', 
			'after' => '', 
			'link_before' => '',
			'link_after' => '', 
			'items_wrap' => '<ul>%3$s</ul>', 
			'item_spacing' => 'preserve',
			'depth' => 0,
			'walker' => ''
		);

		if(!empty($args)){
			foreach($args as $arg_key => $arg){
				$parameters[$arg_key] = $arg;
			}
		}

		if(isset($parameters['add_mobile_bars']) && (int)$parameters['add_mobile_bars'] > 0){

			$html = '<div class="ham-menu">';
			for ($i=0; $i < (int)$parameters['add_mobile_bars']; $i++) { 
				$html .= '<span></span>';
			}
			$html .= '</div>';

			$parameters['items_wrap'] = $parameters['items_wrap'] . $html;
		}


		$parameters['theme_location'] = $theme_location;


		$result = wp_nav_menu($parameters);


		return $result;
	}


	static function cpt($post_type = 'post', $args = []){

		$parameters = array(
			'posts_per_page' => -1,
			'paged' => 1
		);

		if(!empty($args)){
			foreach($args as $arg_key => $arg){
				$parameters[$arg_key] = $arg;
			}
		}

		$parameters['post_type'] = $post_type;

		$result = new WP_Query($parameters);


		return $result;

	}

	static function button($text = 'Aucun texte.', $args = ['href' => null, 'class' => null, 'attr' => null, 'before' => null, 'after' => null]){

		$href = !empty($args['href']) ? ' data-href="'. $args['href'] .'"' : null;
		$class = !empty($args['class']) ? ' class="'. $args['class'] .'"' : null;
		$attr = !empty($args['attr']) ? ' '. $args['attr'] : null;
		$before = !empty($args['before']) ? ' '. $args['before'] : null;
		$after = !empty($args['after']) ? ' '. $args['after'] : null;

		$result = '<button'. $class . $href . $attr .'>';
			$result .= $before;

				if($text)
					$result .= '<span>'. $text .'</span>';
				
			$result .= $after;
		$result .= '</button>';

		return $result;
	}


	static function id($code_base = 'abcdefghijABCDEFGHIJ', $substr = [0, 4]){
		
		$shuffle_code = str_shuffle($code_base);
		$code = substr($shuffle_code, $substr[0], $substr[1]);


		return 'g_id-' . $code;
	}


	static function inc($file_path = null, $url = false){
		return self::template_directory('inc/' . $file_path, $url);
	}

	static function tp($file_path = null, $url = false){
		return self::template_directory('inc/template-parts/' . $file_path, $url);
	}

	static function assets($file_path = null, $url = false){
		return self::template_directory('assets/' . $file_path, $url);
	}


	static function template_directory($file_path = null, $url = false){
		$directory_path = new gc();
		
		$directory_path = (get_template_directory() === get_stylesheet_directory() ? get_template_directory() : get_stylesheet_directory()) . '/' . $file_path;

		if($url === true)
			$directory_path = (get_template_directory() === get_stylesheet_directory() ? get_template_directory_uri() : get_stylesheet_directory_uri()) . '/' . $file_path;

		return $directory_path;
	}

}

new gc();

?>