<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>" class="sr-only">
		<?php echo _x( 'Search for:', 'label', 'lgd' ); ?>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'lgd' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
	<button type="submit" class="btn btn-primary"><span class="fa fa-search" aria-hidden="true"></span> <span class="sr-only"><?php echo _x( 'Search', 'submit button', 'lgd' ); ?></span></button>
</form>
