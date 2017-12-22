<?php
/**
 * Created by PhpStorm.
 * User: Liam.Maclachlan
 * Date: 23/05/2017
 * Time: 10:24
 */

if ( ! defined( 'WPINC' ) ) die;


class SlicedSideBarMenuMetaBoxes {
    function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post', array( $this, 'save_custom_meta_box' ), 10, 2 );

    }


    /********************/
    /* Meta Box Methods */
    /********************/

    /**
     * Create the meta box in all pages on the back end
     */
    public function add_meta_box() {            // get the valid post types
        // Get the custom post types that this needs to display on
        //$config = new ThemeConfig();
        //$required_page_types = get_all_post_type_slugs();
	    //$required_page_types[] ='page';

        // Test for the config

        //if ( is_array( $required_page_types ) ) :
        add_meta_box( 'sibling-child-menu-widget', 'Hide from child/sibling widget menu', array($this, 'sibling_child_menu_settings_form_callback'), $required_page_types, 'side', 'core', null );

        //endif;
    }

    public function sibling_child_menu_settings_form_callback( $page ) {

        $old_value =  ( get_post_meta( $page->ID, 'sibling_child_menu_widget_display', true ) );

        if ( isset( $old_value ) && $old_value === 'on' ) {
            $checked = ' checked ="checked"';
        } else {
            $checked = '';
        }


        wp_nonce_field(basename(__FILE__), "meta-box-nonce");


        $html = '<p class="post-attributes-label-wrapper"><label for="sibling_child_menu_widget_display" class="post-attributes-label">Hide from widget menu</label></p>
				<input id="sibling_child_menu_widget_display" name="sibling_child_menu_widget_display" type="checkbox"' . $checked .'/>';

        echo $html;

    }

    public function save_custom_meta_box( $post_id, $post )
    {

        if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__) ) )
            return $post_id;

        if(!current_user_can("edit_post", $post_id))
            return $post_id;

        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
            return $post_id;

        //$config = new ThemeConfig();
        //$required_page_types = $config->get_all_post_type_slugs();
	    //$required_page_types[] ='page';

        //if( !in_array( $post->post_type, $required_page_types ) )
            //return $post_id;

        if(isset($_POST["sibling_child_menu_widget_display"])) {
            $meta_box_checkbox_value = $_POST["sibling_child_menu_widget_display"];
        } else {
            $meta_box_checkbox_value = 'off';
        }
        update_post_meta($post_id, "sibling_child_menu_widget_display", $meta_box_checkbox_value);
    }

}

new SlicedSideBarMenuMetaBoxes();