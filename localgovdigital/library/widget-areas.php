<?php
/**
 * Register widget areas
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'sidebar_widgets' ) ) :
function sidebar_widgets() {
	register_sidebar(array(
	  'id' => 'sidebar-widgets',
	  'name' => __( 'Sidebar widgets', 'GESP' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'GESP' ),
	  'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
	  'after_widget' => '</div></article>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets',
	  'name' => __( 'Footer widgets', 'GESP' ),
	  'description' => __( 'Drag widgets to this footer container', 'GESP' ),
	  'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	));
}

add_action( 'widgets_init', 'sidebar_widgets' );
endif;
?>
