<?php
/**
 * Template Name: Eventbrite Events
 */

get_header(); ?>

<a name="content-start"></a>
<main>
    <section id="global__content">
        <div class="row">
            <div id="global__body_content" class="small-12 medium-8 columns body_content">
                <h1><?php the_title(); ?></h1>
			<?php
				// Set up and call our Eventbrite query.
				$events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
					// 'display_private' => false, // boolean
					// 'status' => 'live',         // string (only available for display_private true)
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

				//print_r($events);

				if ( $events->have_posts() ) :
					while ( $events->have_posts() ) : $events->the_post(); ?>
                        <?php $title = get_the_title();
                        if (strpos($title, 'Peer') !== false)  {?>
                            <article id="event-<?php the_ID(); ?>" <?php post_class(); ?>
                            <header class="entry-header">
                                <?php //the_post_thumbnail(); ?>

                                <?php //the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

                                <div class="entry-meta">
                                    <?php //eventbrite_event_meta(); ?>
                                </div><!-- .entry-meta -->
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php //eventbrite_ticket_form_widget(); ?>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                                <?php //eventbrite_edit_post_link( __( 'Edit', 'eventbrite_api' ), '<span class="edit-link">', '</span>' ); ?>
                            </footer><!-- .entry-footer -->
                            </article><!-- #post-## -->
                        <?php } elseif(strpos($title, 'Camp') !== false)  {?>
                <article id="event-<?php the_ID(); ?>" <?php post_class(); ?>
                <header class="entry-header">
                    <?php //the_post_thumbnail(); ?>

                    <?php //the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

                    <div class="entry-meta">
                        <?php //eventbrite_event_meta(); ?>
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
                      <?  }

                        ?>



					<?php endwhile;

					// Previous/next post navigation.
					eventbrite_paging_nav( $events );

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

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
