<?php
/**
 * The sidebar containing supporting documents or active consultations
 *
 */
?>

<div id="global__sidebar" class="small-12 medium-4 columns">
    <aside>
        <div class="sidebar_content">
            <?php if(get_field('add_custom_links')) :
                echo get_field('add_custom_links');
            endif; ?>

            <?php
            get_field('document_description');
            if(get_field('upload_document')) :
                $document = get_field('upload_document');

                if($document) : ?>
                    <a href="<?php echo $document['url']; ?>"><?php echo get_field('document_description'); ?></a>
                <?php endif;
            endif; ?>

            <?php /*
            // creates the supporting documents list from the ACF repeater field in the viewed cms page
            if (have_rows('documents')): ?>
                <h3>Supporting documents</h3>
                <ul>
                    <?php
                    // loop through the rows of data
                    while (have_rows('documents')) : the_row();
                        // display a sub field value
                        ?>
                        <?php
                        if(get_sub_field('document_type') == 'Upload') {
                            $doc_link = get_sub_field('document_upload');
                        } else if(get_sub_field('document_type') == 'Internal link') {
                            $doc_link = get_sub_field('document_link');
                        } else {
                            $target_blank = ' target="_blank"';
                            $doc_link = get_sub_field('document_link_external');
                        } ?>
                        <li>
                            <a href="<?php echo $doc_link;?>"<?php echo $target_blank;?>><?php the_sub_field('document_name'); ?></a>
                        </li>
                        <?php
                    endwhile;
                    ?>
                </ul>
            <?php else : ?>
                <?php
                // uses get_children_with_meta() function in /library/theme-functions.php to display active consultations
                $children = get_children_with_meta( '291', 'status' );
                if(isset($children) && $children != '') {
                    /*if(is_page(26)) {
                    print_r($children[0]);
                    }?>
                    <h3>Active consultations</h3>
                    <ul>
                        <?php foreach ($children as $value) {
                            if ($value['status'] == 'Active') { ?>
                                <li><a href="<?php echo $value['url']; ?>"><?php echo $value['page_title']; ?></a></li>
                            <?php }
                        } ?>
                    </ul>
                <?php }
                //print_r($children);
                ?>
            <? endif;
           */ ?>
        </div>
    </aside>
</div>
