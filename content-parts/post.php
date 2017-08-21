<div class="post-header">

    <p class="post-date"><?php the_time(get_option('date_format')); ?></p>

    <h1 class="post-title"><?php the_title(); ?></h1>

</div>

<div class="post-inner">

    <div class="post-content">

        <?php the_content(); ?>

    </div> <!-- /post-content -->

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

    <div class="post-meta">

        <?php if (has_category()) : ?>
            <p class="categories">
                <?php _e('In','hitchcock'); ?> <?php the_category(', '); ?>
            </p>
        <?php endif; ?>
        <?php if (has_tag()) : ?>
            <p class="tags">
                <?php the_tags('', ' '); ?>
            </p>
        <?php endif; ?>

        <?php edit_post_link('Edit Post', '<p class="post-edit">', '</p>'); ?>

    </div> <!-- /post-meta -->

    <?php get_template_part( 'content-parts/post', 'navigation' ); ?>

</div> <!-- /post-inner -->
