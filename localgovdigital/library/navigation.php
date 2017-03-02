<?php 
//** Additional menu placeholders
register_nav_menus( array(
    'main_nav' => 'Main Navigation',
    'footer_nav' => 'Footer Navigation',
    'top_links' => 'Top links',
    'footer_terms' => 'Terms Navigation',
    'footer_social' => 'Footer Social Navigation'
));


//** Adds support for  displaying descriptions in the menu.
function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );
?>