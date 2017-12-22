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
	  'name' => __( 'Sidebar widgets', 'LGD' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'LGD' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h2>',
	  'after_title' => '</h2>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets',
	  'name' => __( 'Footer widgets', 'LGD' ),
	  'description' => __( 'Drag widgets to this footer container', 'LGD' ),
	  'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	));
	
	register_sidebar(array(
	  'id' => 'pipeline-project-widgets',
	  'name' => __( 'Pipeline project widgets', 'LGD' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'LGD' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	));
}

add_action( 'widgets_init', 'sidebar_widgets' );
include ('widgets/sibling-items-menu.widget.php');
include ('widgets/child-items-menu.widget.php');
endif;
?>
