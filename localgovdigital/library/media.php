<?php
//*** Featured image support
add_theme_support( 'post-thumbnails' );

//*** Responsive image support
function content_image_sizes_attr( $sizes, $size ) {
  $width = $size[0];
  840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
  if ( 'page' === get_post_type() ) {
    840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
  } else {
    840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
    600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
  }
  return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'content_image_sizes_attr', 10 , 2 );

function post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
  if ( 'post-thumbnail' === $size ) {
    is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
    ! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
  }
  return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'post_thumbnail_sizes_attr', 10 , 3 );


//*** Responsive images in ACF
/**
* Responsive Image Helper Function
*
* @param string $image_id the id of the image (from ACF or similar)
* @param string $image_size the size of the thumbnail image or custom image size
* @param string $max_width the max width this image will be shown to build the sizes attribute
* using to call function: <img class="my_class" <?php ar_responsive_image(get_field( 'image_1' ),'thumb-640','640px'); ?>  alt="text" />
 */

function ar_responsive_image($image_id,$image_size,$max_width){

// check the image ID is not blank
if($image_id != '') {

    // set the default src image size
    $image_src = wp_get_attachment_image_url( $image_id, $image_size );

    // set the srcset with various image sizes
    $image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

    // generate the markup for the responsive image
    echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px, '.$max_width.'"';

    }
}
