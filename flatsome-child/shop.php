<?php
/**
 * Template name: Shop
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header(); ?>

<?php do_action('flatsome_before_page'); ?>

<div id="content" role="main">
    <?php while (have_posts()):
        the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; // end of the loop. ?>

    <div class="container shop-archive-product-h">
        <?php include 'search-form.php' ?>
        <div class="archive-product-page">
            <?php
            $args = array(
                'post_type' => 'product',
                'order' => 'ASC',
                'orderby' => 'title',
                'post_status' => 'publish',
            );
            $custom_query = new WP_Query($args);
            ?>
                <?php if ($custom_query->have_posts()): ?>
                    <div class="row products-cs">
                        <?php while ($custom_query->have_posts()):
                            $custom_query->the_post(); ?>
                            <?php wc_get_template_part('content', 'product-custom'); ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<?php do_action('flatsome_after_page'); ?>

<?php get_footer(); ?>