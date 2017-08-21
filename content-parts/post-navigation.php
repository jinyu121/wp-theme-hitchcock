<?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();
?>

<div class="post-navigation">

    <?php
    if (!empty( $prev_post )): ?>

        <a class="post-nav-prev" title="<?php echo esc_attr( get_the_title($prev_post) ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">
            <p><?php _e('Next','hitchcock'); ?><span class="hide"> <?php _e('Post','hitchcock'); ?></span></p>
            <span class="fa fw fa-angle-right"></span>
        </a>

    <?php endif; ?>

    <?php
    if (!empty( $next_post )): ?>

        <a class="post-nav-next" title="<?php echo esc_attr( get_the_title($next_post) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">
            <span class="fa fw fa-angle-left"></span>
            <p><?php _e('Previous','hitchcock'); ?><span class="hide"> <?php _e('Post','hitchcock'); ?></span></p>
        </a>
    <?php endif; ?>

    <div class="clear"></div>

</div> <!-- /post-navigation -->
