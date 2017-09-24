<?php
/**
 * The sidebar containing supporting documents or active consultations
 *
 */
?>

<div id="global__sidebar" class="small-12 medium-4 columns">
    <aside>

        <div class="sidebar_content">

            <?php //if ( is_active_sidebar( 'sidebar-widgets' ) ) : ?>
                <ul id="sidebar-widgets">
                    <?php dynamic_sidebar( 'sidebar-widgets' ); ?>
                </ul>
            <?php //endif; ?>
        

            <?php // adds custom links to sidebar if specified
            if(get_field('add_custom_links')) :
                echo get_field('add_custom_links');
            endif; ?>

            <?php // adds document download links if available
            if(get_field('upload_document')) :
                get_field('document_description');
                $document = get_field('upload_document');

                if($document) : ?>
                    <a href="<?php echo $document['url']; ?>"><?php echo get_field('document_description'); ?></a>
                <?php endif;

            endif; ?>


            <?php // adds links to points in the LGDSS if on the standards pages
                if(get_post_type() == 'standards') : ?>
                    <div class="sidebar-standards-list">
                        <ul>
                        <?php $standards_query = new WP_Query( array( 'post_type' => 'standards', 'posts_per_page' => '-1', 'meta_key' => 'number', 'orderby'	=> 'meta_value_num', 'order' => 'ASC') );?>
                        <?php if ( have_posts() ) : while ( $standards_query->have_posts() ) : $standards_query->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink();?>"><?php echo get_field('number');?>. <?php the_title();?></a>
                            </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                        </ul>
                    </div>
            <?php endif; ?>

            <?php // adds parent and children page links to sidebar
            if($post->post_parent)
                $children = wp_list_pages("title_li=&sort_column=menu_order&child_of=".$post->post_parent."&echo=0");
            else
                $children = wp_list_pages("title_li=&sort_column=menu_order&child_of=".$post->ID."&echo=0");
            if ($children) { ?>
                <ul id="subnav">
                    <?php echo $children; ?>
                </ul>
            <?php } ?>

            <?php
            if (is_tax('peer_group')) : ?>
<ul>
<?php $leads = pods( 'peer_group', get_queried_object()->term_id )->field('leads');

foreach ($leads as $lead) {
$leaduser = pods('user', $lead['ID']); ?>
<li><h4><a href="<?php echo get_author_posts_url( $lead['ID'], $leaduser->display('user_nicename') ); ?>"><?php echo $leaduser->display('display_name'); ?></a></h4>
<?php echo $leaduser->display('job_title'); ?><br>
<?php echo $leaduser->display('organisation'); ?>
</li>
<?php } 
?>
</ul>
            <?php endif; ?>

            <?php // PIPELINE

            // Shows project counts?? Ben to confirm

            if(get_the_ID() == '2755') :
                $project_count = wp_count_posts( 'project' )->publish; ?>
                <p><span class="" style="font-size: 5em; display: block;"><?php echo $project_count; ?></span> projects</p>
            <?php endif; ?>

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