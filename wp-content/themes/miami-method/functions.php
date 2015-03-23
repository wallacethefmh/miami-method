<?php
require_once 'lib/rye.php';

/**
 * Set domains for auto tag detection.
 */
define("PRODUCTION_SERVER", "my-production-site.com");
define("STAGING_SERVER", "my-staging-site.com");

/**
 * Set the enviornment property. This will determine which version of the
 * assets will be used.
 */
if (stripos($_SERVER['SERVER_NAME'], PRODUCTION_SERVER) !== false) {
	Rye::$enviornment = Rye::PRODUCTION;
} else if (stripos($_SERVER['SERVER_NAME'], STAGING_SERVER) !== false) {
	Rye::$enviornment = Rye::STAGING;
} else {
	Rye::$enviornment = Rye::DEVELOPMENT;
}

/**
 * Site configurations.
 */
Rye::init(array(

	/**
	 *  Path to JavaScript files. Notice that vendor libraries are left separate
	 *  from the custom compiled script. This allows for better compatibility with
	 *  other plugins.
	 *  http://codex.wordpress.org/Function_Reference/wp_register_script
	 */
	'javascripts' => array(
		// 'jquery' => '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
		'main' => get_bloginfo('template_directory').'/assets/dist/'.Rye::projectName().'.all'.
			((Rye::$enviornment < Rye::STAGING) ? '.min' : '').'.js'
	),

	/**
	 *  Path to JavaScript files.
	 *  http://codex.wordpress.org/Function_Reference/add_image_size
	 *
	 *  '<image-size-name>' => array(<width>, <height>, <crop>)
	 */
	'image_sizes' => array(
		/*
		'featured_post'  => array(500, 500, false),
		'featured_article' => array(200, 200, true)
		*/
	),

	/**
	 *  Declare custom menu regions.
	 *  http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	'menus' => array(
		/*
		'main-nav' => 'Main Navigation',
		'sub-nav'  => 'Sub Navigation',
		*/
	),

	/**
	 *  Declare theme features.
	 *  http://codex.wordpress.org/Function_Reference/add_theme_support
	 *
	 *  '<feature>' => array('<arg>', '<arg>')
	 */
	'theme_support' => array(
		/*
		'tag_string5'           => array('search-form', 'comment-form', 'comment-list'),
		'post-thumbnails' => array('post', 'articles'),
		'post-formats'    => array('aside', 'gallery')
		*/
	),

	/**
	 *  Declare "widgetized" regions.
	 *  http://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	'widgetized_regions' => array(
		/*
		array(
			'name'          => '<Region Name>',
			'description'   => '<Region Description>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		),
		array(
			'name'          => '<Region Name>',
			'description'   => '<Region Description>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
		*/
	),

	/**
	 *  Declare custom post types.
	 *  http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	'post_types' => array(
		/*
		'some_type' => array(
			'labels'      => array('name' => 'Some Type'),
			'public'      => true,
			'rewrite'     => true,
			'has_archive' => true,
			'supports'    => array('title', 'thumbnail', 'editor')
		)
		*/
	),

	/**
	 *  Declare custom taxonomies.
	 *  http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	'taxonomies' => array(
		/*
		array(
			'tax_name', 'postype_name', array(
				'hierarchical' => false,
				'labels'       => array('name' => '<Tax Name>'),
				'show_ui'      => true,
				'query_var'    => true,
				'rewrite'      => array('slug' => 'tax-name'),
			)
		)
		*/
	)
));

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
function load_more_posts() {
	$response = array();
	$query = new WP_Query('paged='.$_POST['paged']);
	if ($query->have_posts()) { while ($query->have_posts()) { $query->the_post();
		
		// setup categories string
		$categories = get_the_category();
		$separator = ' ';
		$output = '';
		if ($categories){
			foreach ($categories as $category) {
				$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		}
		$categories_string = trim($output, $separator);

		// setup tags strings
		$tags = get_tags();
		$tags_string = '';
		foreach ($tags as $tag) {
			$tag_link = get_tag_link( $tag->term_id );          
			$tags_string .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
			$tags_string .= "{$tag->name}</a>";
		}

		$article =  get_post(get_the_ID());
		$article->date = get_the_date('m.d.y');
		$article->author = get_the_author();
		$article->categories = $categories_string;
		$article->tags = $tags_string;

		$response['articles'][] = $article;

		error_log(get_the_ID());
	}}
	echo json_encode($response);
	die();
}