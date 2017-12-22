<?php
/** Custom functions */

//** Initiates breadcrumb trails */

function my_bcn_allowed_html($allowed_html)
{
    $allowed_html['li'] = array(
        'title' => true,
        'class' => true,
        'id' => true,
        'dir' => true,
        'align' => true,
        'lang' => true,
        'xml:lang' => true,
        'aria-hidden' => true,
        'data-icon' => true,
        'itemref' => true,
        'itemid' => true,
        'itemprop' => true,
        'itemscope' => true,
        'itemtype' => true
    );
    return $allowed_html;
}
add_filter('bcn_allowed_html', 'my_bcn_allowed_html');

//** find child pages of parent */
function page_children($parent_id, $limit = -1) {
    return get_posts(array(
        'post_type' => 'page',
        'post_parent' => $parent_id,
        'posts_per_page' => $limit
    ));
}


//** Identify active consultations from list of pages
function get_children_with_meta( $parent_id, $metakey ) {
    // query all pages with a specified parent ($parent_id) that have a value for custom field id name($metakey) and order by the page structure and ascending
    $q = new WP_Query( array( 'post_parent' => $parent_id, 'post_type' => 'page', 'meta_key' => $metakey, 'orderby'=>'menu_order', 'order'=>'asc'));
    if ( $q->have_posts() ) {
        $children = array();
        while ( $q->have_posts() ) {
            $q->the_post();
            //gets the specified values from the list of matching records and adds them to the $children array
            $meta_value = get_post_meta(get_the_ID(), $metakey, true );
            $posttitle = get_the_title();
            $permalink = get_permalink();
            $getstatus = get_post_meta(get_the_ID(), 'status', true );
            $getstage = get_post_meta(get_the_ID(), 'stage', true );
            $getstageoverview = get_post_meta(get_the_ID(), 'consultation_phase_overview', true );
            $children[get_the_ID()] = array('page_title'=>$posttitle, 'stage'=>$getstage, 'status'=>$getstatus, 'url'=>$permalink, 'overview'=>$getstageoverview );
            //gets grandchildren records too
            $grandchildren = get_children_with_meta(get_the_ID(), $metakey);
            $children = array_merge($children, $grandchildren);
        }
        wp_reset_postdata();
        return $children;
    }
    return array();
}

//** GRAVITY FORMS CUSTOMISATIONS
//** Switches off tab indexing in gravity forms
add_filter( 'gform_tabindex', '__return_false' );

/**
 * Filters the next, previous and submit buttons.
 * Replaces the forms <input> buttons with <button> while maintaining attributes from original <input>.
 *
 * @param string $button Contains the <input> tag to be filtered.
 * @param object $form Contains all the properties of the current form.
 *
 * @return string The filtered button.
 */
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadXML( $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $input->parentNode->replaceChild( $new_button, $input );

    return $dom->saveXML( $new_button );
}

// Add 'large' class to next button elements
add_filter( 'gform_next_button', 'my_next_button_markup', 10, 2 );
function my_next_button_markup( $next_button, $form ) {
    //print htmlentities($next_button);
    $find_this = 'class="gform_next_button button';
    $additional_styles = ' large';

    $next_button = str_replace($find_this, $find_this.$additional_styles, $next_button);

    return $next_button;
}

// Add 'large secondary back-button' classes to previous button elements
add_filter( 'gform_previous_button', 'my_previous_button_markup', 10, 2 );
function my_previous_button_markup( $previous_button, $form ) {
    //print htmlentities($previous_button);
    $find_this = 'class="gform_previous_button button';
    $additional_styles = ' large secondary back-button';

    $previous_button = str_replace($find_this, $find_this.$additional_styles, $previous_button);

    return $previous_button;
}
// Add 'large' class to submit button elements
add_filter( 'gform_submit_button', 'my_submit_markup', 10, 2 );
function my_submit_markup( $submit_button, $form ) {
    //print htmlentities($next_button);
    $find_this = 'class="gform_button button';
    $additional_styles = ' large';

    $submit_button = str_replace($find_this, $find_this.$additional_styles, $submit_button);

    return $submit_button;
}

// Change main validation message and formatting
add_filter( 'gform_validation_message', 'change_message', 10, 2 );
function change_message( $message, $form ) {
    return '<div class="top-error-panel" aria-labelledby="error-summary-heading" role="group"><h2 id="error-summary-heading">Sorry, there is an issue with what you have entered</h2><p class="error-summary-intro">Please review what has been entered in the fields marked as having an issue before continuing</p><!--<p>The following fields have been incorrectly completed</p><ul><li></li></ul>--></div>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */

/* MD - HAVE HIDDEN AS BREAKING OTHER LISTS LIKE NEWS - let me know if this is a problem?
function lgd_excerpt_more( $link ) {
	global $post;

	if ( is_admin() ) {
		return $link;
	}

    if ( 'voice_post' == $post->post_type ) {
        return '';
    }

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'lgd_excerpt_more' );
*/

function list_signed_up_lgdss( $atts ) {
    $list = '';
	$terms= get_terms( array(
        'taxonomy' => 'organisation',
        'meta_key' => 'signed_up_to_standard',
        'meta_value' => '1'
        ) );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $list .= '<ul>';
        foreach ( $terms as $term ) {
            $list .= '<li>' . $term->name . '</li>';
        }
        $list .= '</ul>';
    }
    return $list;
}
add_shortcode( 'lgdss_signed_up', 'list_signed_up_lgdss' );

// Hide peer group update category from home
function exclude_categories($query) {
    if ( is_home() ) {
        $query->set('cat', '-1,-22');
    }
    return $query;
}
add_filter('pre_get_posts', 'exclude_categories');

function lgd_list_users( $fieldName ) {
    $list = '';
    $userIds = get_post_custom_values( $fieldName );
    foreach ( $userIds as $key => $value ) {
        $user = get_user_by( 'id', $value );
        $list .= sprintf( '<li>%1$s %2$s</li>', $user->first_name, $user->last_name );
    }
    echo $list;
}

function override_page_title($title)
{
    if ( is_tax('peer_group') && is_archive() ) {
        $title = str_replace('Archives', 'peer group', $title);
    }
    return $title;
}
add_filter('wpseo_title', 'override_page_title');



// Change Contact Form 7 Submit to Button

remove_action( 'wpcf7_init', 'wpcf7_add_shortcode_submit', 20 );
add_action( 'wpcf7_init', 'wpcf7_add_shortcode_submit_button' );

function wpcf7_add_shortcode_submit_button() {
    wpcf7_add_shortcode( 'submit', 'wpcf7_submit_button_shortcode_handler' );
}

function wpcf7_submit_button_shortcode_handler( $tag ) {
    $tag = new WPCF7_Shortcode( $tag );

    $class = wpcf7_form_controls_class( $tag->type );

    $atts = array();

    $atts['class'] = $tag->get_class_option( $class );
    $atts['id'] = $tag->get_id_option();
    $atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

    $value = isset( $tag->values[0] ) ? $tag->values[0] : '';

    if ( empty( $value ) )
        $value = __( 'Send', 'contact-form-7' );

    $atts['type'] = 'submit';

    $atts = wpcf7_format_atts( $atts );

    $html = sprintf( '<button %1$s>%2$s</button>', $atts, $value );

    return $html;
}

include ("meta-boxes/show-in-menu-widget.sidebar.php");

