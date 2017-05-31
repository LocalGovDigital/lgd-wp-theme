<?php
/**
 * Template part for displaying LGD Voice post content
 */

?>

<li>
    <a href="<?php echo get_post_custom_values( 'syndication_source_uri')[0]; ?>">
        <?php the_title( sprintf( '<h2>', esc_url( get_permalink() ) ), '</h2>' ); ?>
        <p><?php echo wp_trim_excerpt( ); ?></p>
        <strong><?php echo get_post_custom_values( 'syndication_source' )[0]; ?></strong><br>
        <span class="small-date"><?php the_date();?></span>
    </a>
</li>