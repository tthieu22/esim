<article class="blog--item ">
    <div class="content-blog">
        <div class="blog--item-thumbnail">
            <a href="<?php echo the_permalink(); ?>">
            <img max-width="490px" max-height="276px" src ="<?php echo the_post_thumbnail_url()?>" ?>
            </a>
        </div>
        <div class="content">
            <div class="blog--date-category">
                <p><?php the_date('F j, Y'); ?></p>
                <span><?php echo get_the_category()[0]->name; ?></span>
            </div>
            <div class="blog--title-slide">
                <a href="<?php echo the_permalink(); ?>">
                    <?php the_title();?>
                </a>
                <p><?php echo wp_trim_words( get_the_excerpt(),18);?></p>
            </div>
        </div>
    </div>
</article>