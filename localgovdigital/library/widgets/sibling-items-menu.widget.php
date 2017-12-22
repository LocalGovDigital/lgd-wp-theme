<?php

add_action( 'widgets_init', function(){
    register_widget( 'ASC_Sibling_Posts_Widget' );
});

class ASC_Sibling_Posts_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'asc_sibling_posts_widget',
            'description' => 'Displays the sibling pages of a post',
        );

        parent::__construct( 'ASC_Sibling_Posts_Widget', 'Sibling Posts Menu', $widget_ops );

    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {

        if ( is_single() || is_page()) {

            global $post;

            $parent_id = $post->post_parent;
            $post_type = $post->post_type;

            $sibling_args = array(
                'post__not_in' =>  array( $post->ID ),
                'post_type' => $post_type,
                'posts_per_page' => -1,
                'post_parent' => $parent_id,
                'orderby' => 'menu_order title',
                'order' => 'ASC',
                'meta_query' => array(
                	'relation' => 'OR',
	                array(
		                'key' => 'sibling_child_menu_widget_display',
		                'value' => 'off',
		                'compare' => '='
	                ),
	                array(
		                'key' => 'sibling_child_menu_widget_display',
		                'compare' => 'NOT EXISTS'
	                )
                )
            );

            $posts = get_posts( $sibling_args );

            if ( !empty( $posts ) ) {
                // If the post type is a single page
                // Get a list of the sibling post items and
                // LOGIC: Use the parent ID and get all posts that have the same parent ID in the post type
                echo $args['before_widget'];
                echo $args['before_title'] . 'Also in this section' . $args['after_title'];


                echo '<ul>';

                foreach ( $posts as $post ) {


                    //$show_item =  is_widget_menu_item_hidden( $post->ID );

                   // if ( $show_item ) {
                        $link = get_permalink( $post->ID );
                        echo '<li><a href="' . $link . '">' . $post->post_title .'</a></li>';
                 //   }

                }

                echo '</ul>';
                echo $args['after_widget'];

            }

            wp_reset_postdata();

        }

    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     *
     * @return mixed
     *
     */
    public function form( $instance ) {
        // Currently no options
        return $instance;
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        // No update required
        return $new_instance;
    }
}
