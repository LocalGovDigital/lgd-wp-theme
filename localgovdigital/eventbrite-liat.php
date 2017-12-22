<?php
/**
 * Template Name: Eventbrite Events 2
 */

get_header(); ?>

<a name="content-start"></a>
<main>
    <section id="event__header-image">
        <div class="row">
            <div class="small-12 columns">
                <?php
                // creates featured image src for event image sizes to add to responsive img tag
                if ( has_post_thumbnail() ) {
                    $thumb_id = get_post_thumbnail_id();
                    $large_event_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'event-header', true);
                    $large_event_thumb_url = $large_event_thumb_url_array[0];
                    $small_event_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'small-event-header', true);
                    $small_event_thumb_url = $small_event_thumb_url_array[0];
                    //$large_event_image = the_post_thumbnail('event-header');
                    //$medium_event_image = the_post_thumbnail('event-header');?>
                    <img src="<?php echo $small_event_thumb_url;?>" srcset="<?php echo $small_event_thumb_url;?> 768w, <?php echo $large_event_thumb_url;?> 1024w" />
               <?php }
                ?>

            </div>
        </div>
    </section>
    <section id="global__content">
        <div class="row">
            <div id="global__body_content" class="small-12 medium-8 columns body_content">
                <h1><?php the_title(); ?></h1>


			<?php

				// Set up and call our Eventbrite query.
				$events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
                    'display_private' => true, // boolean
                    'status' => 'live',      // string (only available for display_private true)
					// 'nopaging' => false,        // boolean
					// 'limit' => null,            // integer
					// 'organizer_id' => null,     // integer
					// 'p' => null,                // integer
					// 'post__not_in' => null,     // array of integers
					// 'venue_id' => null,         // integer
					// 'category_id' => null,      // integer
					// 'subcategory_id' => null,   // integer
					// 'format_id' => null,        // integer
				) ) );

                /*$events_by_id = array();
                foreach( $events as $event ) {
                    $postid = the_ID().'>>';
                    $events_by_id[ $postid ][] = $event;

                }

                print_r($events_by_id);*/

				//print_r($events);
                //rsort($events);
                $ids = array();
				if ( $events->have_posts() ) :
					while ( $events->have_posts() ) : $events->the_post();
                        $title = get_the_title();
                        if (strpos($title, 'Peer') !== false)  {?>
                            <article id="event-<?php the_ID(); ?>" class="event-overview">
                                <div class="row">
                                    <?php if(has_post_thumbnail()) :?>
                                    <div class="event-image columns small-12 medium-5">
                                        <?php the_post_thumbnail(); ?>
                                    </div><!-- .entry-header -->
                                    <?php endif;?>

                                    <div class="event-content columns small-12 medium-7">
                                        <?php
                                        $event_booking_url = eventbrite_event_eb_url();
                                        $event_start = eventbrite_event_time();
                                        $event_venue = eventbrite_event_venue();
                                        ?>
                                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="'.$event_booking_url.'" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                        <?php
                                        echo $event_start;
                                        echo '<br>';
                                        echo '<strong>'.eventbrite_event_venue()->address->city.'</strong>';
                                        //print_r(eventbrite_event_venue());
                                        ?>
                                    </div><!-- .entry-content -->

                                </div>
                                <div class="event-booking-widget columns small-12">
                                    <?php eventbrite_ticket_form_widget(); ?>
                                </div>
                            </article><!-- #post-## -->
                        <?php } /*elseif(strpos($title, 'Camp') !== false)  {?>
                <article id="event-<?php the_ID(); ?>" <?php post_class(); ?>
                <header class="entry-header">
                    <?php The_post_thumbnail(); ?>

                    <?php //the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

                    <div class="entry-meta">
                        <?php eventbrite_event_meta(); ?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php //eventbrite_ticket_form_widget(); ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php //eventbrite_edit_post_link( __( 'Edit', 'eventbrite_api' ), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-footer -->
                </article><!-- #post-## -->
                       <? } else { ?>
                            Sorry no events
                      <?  } */

                        ?>



					<?php endwhile;

					// Previous/next post navigation

				else :
					// If no content, include the "No posts found" template.
					//get_template_part( 'content', 'none' );
                    echo '<h2>Sorry, there aren\'t any events planned at the moment</h2>';
                    echo '<p>Visit our <a href="/peer-groups/">peer groups pages</a> or <a href="https://localgovdigital.slack.com">join us on slack</a> to find out more.</p>';

				endif;

				// Return $post to its rightful owner.
				wp_reset_postdata();
			?>

            </div>
            <?php get_sidebar(); ?>
        </div><!-- Foundation .row end -->
    </section>
</main>
<!--end page specific content -->
<?php get_footer(); ?>
