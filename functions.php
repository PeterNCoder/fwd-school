<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function fwd_school_setup() {

	load_theme_textdomain( 'fwd-school', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );

	add_image_size( '200-300', 200, 300, true);
	add_image_size( '300-200', 300, 200, true);
	add_image_size( '1000-400', 1000, 400, true);

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'fwd-school' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'fwd_school_setup' );


function fwd_school_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fwd-school' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fwd-school' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fwd_school_widgets_init' );

function fwd_school_scripts() {
	wp_enqueue_style( 
		'fwd-googlefonts', 
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;700&display=swap',		
		array(),
		null
	);

	wp_enqueue_style( 'fwd-school-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fwd-school-style', 'rtl', 'replace' );

	wp_enqueue_script( 'fwd-school-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fwd_school_scripts' );

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/cpt-taxonomy.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

function fwd_excerpt_length( $length ) {
	if ( is_post_type_archive('fwd-students') ) {
        return 25;
	} else {
		return $length;
	}
}
add_filter( 'excerpt_length', 'fwd_excerpt_length', 999 );

function fwd_excerpt_more( $more ) {
	if( is_post_type_archive('fwd-students') ) {
	$more = '<a class="read-more" href="'. esc_url( get_permalink() ) .'">Read more about '. esc_html(get_the_title()) .'...</a>';
	}
	return $more;
}
add_filter( 'excerpt_more', 'fwd_excerpt_more' );