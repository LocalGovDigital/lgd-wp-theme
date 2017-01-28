<?php
/** Custom functions */

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