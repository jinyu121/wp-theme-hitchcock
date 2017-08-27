<div class="post-header post-format-image">
    <?php
    $background_image = theme_catch_first_image();
    if(!empty($background_image)){ ?>
        <img class="post-header-image" src="<?php echo $background_image; ?>">
    <?php }?>
</div>

<div class="post-inner post-format-image">

    <div class="clear"></div>

    <?php
        $args = array(
            'before'           => '<div class="page-links"><span class="title">' . __( 'Pages:','hitchcock' ) . '</span>',
            'after'            => '<div class="clear"></div></div>',
            'link_before'      => '<span>',
            'link_after'       => '</span>',
            'separator'        => '',
            'pagelink'         => '%',
            'echo'             => 1
        );

        wp_link_pages($args);
    ?>

    <h1 class="post-title"><?php the_title(); ?></h1>

    <div class="post-meta">
        <table class="post-meta-table">
            <tr>
                <td><?php _e('Name','hitchcock') ?></td>
                <td><?php the_title(); ?></td>
            </tr>
            <tr>
                <td><?php _e('Time','hitchcock') ?></td>
                <td><?php the_time(get_option('date_format')); ?></td>
            </tr>
            <?php if (has_tag()) : ?>
                <tr>
                    <td><?php _e('Tag','hitchcock') ?></td>
                    <td><?php the_tags('', ' '); ?></td>
                </tr>
            <?php endif; ?>
            <?php $stars = get_post_meta(get_the_ID(),"star",$single =true); ?>
            <?php if(!empty($stars)){ ?>
                <tr>
                    <td><?php _e('Star','hitchcock') ?></td>
                    <td><?php echo int_to_stars($stars);?></td>
                </tr>
            <?php }?>
        </table>
    </div> <!-- /post-meta -->

    <div class="post-content">

        <?php the_content(); ?>

    </div> <!-- /post-content -->

    <?php edit_post_link(__('Edit Post','hitchcock'), '<p class="post-edit">', '</p>'); ?>

    <?php get_template_part( 'content-parts/post', 'navigation' ); ?>

</div> <!-- /post-inner -->
