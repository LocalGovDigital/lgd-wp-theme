<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<footer id="global__footer_content">
    <section id="footer__nav-links">
        <div class="row">
            <div class="small-12 medium-6 columns">
                <?php wp_nav_menu( array( 'theme_location' => 'footer_nav' ) ); ?>
            </div>
        </div>
        <div class="row">
            <div class="small-12 medium-6 columns">
                <p>&copy; Copyright LocalGov Digital </p>
            </div>
            <div class="small-12 medium-6 columns">
                <?php wp_nav_menu( array( 'theme_location' => 'footer_terms' ) ); ?>
            </div>
        </div>
    </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>
