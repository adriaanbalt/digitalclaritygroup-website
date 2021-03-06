<?php

/** Start the engine */

require_once( TEMPLATEPATH . '/lib/init.php' );



/** Child theme (do not remove) */

define( 'CHILD_THEME_NAME', 'Agency Theme' );

define( 'CHILD_THEME_URL', 'http://www.studiopress.com/themes/agency' );



$content_width = apply_filters( 'content_width', 590, 410, 910 );



/** Add Viewport meta tag for mobile browsers */

add_action( 'genesis_meta', 'agency_viewport_meta_tag' );

function agency_viewport_meta_tag() {

	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';

}

/** Create additional color style options */

add_theme_support( 'genesis-style-selector', array( 'agency-green' => 'Green', 'agency-orange' => 'Orange', 'agency-red' => 'Red' ) );



/** Add support for structural wraps */

add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );



/** Add new image sizes */

add_image_size( 'home-featured', 280, 100, TRUE );



/** Add support for custom header */

add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 115 ) );



/** Add support for custom background */

add_custom_background();



/** Add product post type support for Geneiss layouts */

add_theme_support( 'genesis-connect-woocommerce' );

add_post_type_support( 'product', 'genesis-layouts' );



/** Set Genesis Responsive Slider defaults */

add_filter( 'genesis_responsive_slider_settings_defaults', 'agency_responsive_slider_defaults' );

function agency_responsive_slider_defaults( $defaults ) {

	$defaults['slideshow_height'] = '300';

	$defaults['slideshow_width'] = '950';

	return $defaults;

}



/** Relocate breadcrumbs */

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' );



/** Customize the post info function */

add_filter( 'genesis_post_info', 'post_info_filter' );

function post_info_filter($post_info) {

if (!is_page()) {

    $post_info = '[post_date] by [post_author_posts_link] &middot; [post_comments] [post_edit]';

    return $post_info;

}}



/** Customize the post meta function */

add_filter( 'genesis_post_meta', 'post_meta_filter' );

function post_meta_filter($post_meta) {

if (!is_page()) {

    $post_meta = '[post_categories before="Filed Under: "] &middot; [post_tags before="Tagged: "]';

    return $post_meta;

}}



/** Modify the size of the Gravatar in the author box */

add_filter( 'genesis_author_box_gravatar_size', 'agency_author_box_gravatar_size' );

function agency_author_box_gravatar_size($size) {

    return '78';

}



/** Add support for 3-column footer widgets */

add_theme_support( 'genesis-footer-widgets', 3 );



/** Register widget areas */

genesis_register_sidebar( array(

	'id'			=> 'home-welcome',

	'name'			=> __( 'Home Welcome', 'agency' ),

	'description'	=> __( 'This is the welcome section of the homepage.', 'agency' ),

) );

genesis_register_sidebar( array(

	'id'			=> 'home-slider',

	'name'			=> __( 'Home Slider', 'agency' ),

	'description'	=> __( 'This is the slider section of the homepage.', 'agency' ),

) );

genesis_register_sidebar( array(

	'id'			=> 'home-left',

	'name'			=> __( 'Home Left', 'agency' ),

	'description'	=> __( 'This is the left section of the homepage.', 'agency' ),

) );

genesis_register_sidebar( array(

	'id'			=> 'home-middle',

	'name'			=> __( 'Home Middle', 'agency' ),

	'description'	=> __( 'This is the middle section of the homepage.', 'agency' ),

) );

genesis_register_sidebar( array(

	'id'			=> 'home-right',

	'name'			=> __( 'Home Right', 'agency' ),

	'description'	=> __( 'This is the right section of the homepage.', 'agency' ),

) );

genesis_register_sidebar( array(

	'id'			=> 'home-full-right',

	'name'			=> __( 'Home Full Right', 'agency' ),

	'description'	=> __( 'This is the full right column of the homepage.', 'agency' ),

) );

add_action( 'genesis_before', 'child_home_full_right_sidebar' );
/** Loads a new sidebar on the right column of the homepage */
function child_home_full_right_sidebar() {
 
    echo '<div class="home-full-right">';
        dynamic_sidebar( 'home-full-right' );
    echo '</div>';
 
}

/** Added on 06/20/12 to increase the post on the homepage to show full content */

add_action('genesis_before_loop', 'child_loop_args');
function child_loop_args() {
if( is_home() ) {
global $query_string;

query_posts( wp_parse_args( $query_string, array( 'posts_per_page' => 1 ) ) );

remove_action('genesis_post_content', 'genesis_do_content');
add_action('genesis_post_content', 'the_content');

/** Added on 10/10/12 to add image to the feed - BALT */

function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '' . $content;
}
return $content;
}
 
add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');

}
} 