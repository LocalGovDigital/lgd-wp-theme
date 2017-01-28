<?php

function lgd_scripts() {
	/** Enqueue global javascripts. */

	/* jQuery javascript */
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.1.1.slim.min.js', false, false);
    //wp_enqueue_script('jquery');

	/* Add global javascript */
	wp_enqueue_script('site_functions', get_template_directory_uri() . '/assets/js/functions.js', false, true );

	/* Add third party scripts */
	wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css', false, true );
	wp_enqueue_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, true );


	/** Enqueue global styles. */

    /* Add Bootstrap */
    //_e( '<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha256-rr9hHBQ43H7HSOmmNkxzQGazS/Khx+L8ZRHteEY1tQ4=" crossorigin="anonymous">');
    wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css' );

    /* Add Custom Font Awesome CSS */
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );

	/* Add LGD CSS */
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/style.css', array(), null );

}
add_action( 'wp_enqueue_scripts', 'lgd_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function lgd_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'lgd-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    //'https://cdn.jsdelivr.net'

    return $urls;
}
add_filter( 'wp_resource_hints', 'lgd_resource_hints', 10, 2 );

?>
