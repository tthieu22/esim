<?php
/**
 * Template name: Blog
 *
 * @package  Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header(); ?>

<?php do_action('flatsome_before_page'); ?>

<div id="content" role="main">
    <div class="container blog--box-search">
        <div class="row">
            <div class="blog--esim-text">
                <h2>The ESIMWISE Blog</h2>
                <p>Discover the latest on travel, eSIMs and mobile internet worldwide</p>
            </div>
            <div class="blog--box-search">
                <?php get_template_part("template-parts/blog/blog-form-search"); ?>
            </div>
        </div>
    </div>
    <section class="blog--slide-all-h container">
        <div class="row">
            <div class="blog--text">
                <h3>Popular post</h3>
                <div class="blog--show-all">
                
                    <a href="<?php
                        $post_page_id = get_option('page_for_posts');
                        if ($post_page_id) {
                            $post_page_url = get_permalink($post_page_id);
                            echo $post_page_url;
                        }
                        ?>">
                        <span>Show all</span> 
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="41" height="15" viewBox="0 0 41 15" fill="none">
                        <path d="M40.7071 8.20711C41.0976 7.81658 41.0976 7.18342 40.7071 6.79289L34.3431 0.428932C33.9526 0.0384078 33.3195 0.0384078 32.9289 0.428932C32.5384 0.819457 32.5384 1.45262 32.9289 1.84315L38.5858 7.5L32.9289 13.1569C32.5384 13.5474 32.5384 14.1805 32.9289 14.5711C33.3195 14.9616 33.9526 14.9616 34.3431 14.5711L40.7071 8.20711ZM0 8.5H40V6.5H0L0 8.5Z" fill="#7F3DFF"/>
                        </svg></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog--slide-wapper-h">
            <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' =>12,
                );
                $custom_query = new WP_Query($args);
            ?>
            <?php if ($custom_query->have_posts()): ?>
                <?php while ($custom_query->have_posts()): $custom_query->the_post(); ?>
                    <?php get_template_part("template-parts/blog/article-blog"); ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <section class="blog--category-box">
        <div class="container">
            <div class="row blog--all-categorry">
                <?php $categories = get_categories(array(
                    'number' => 3
                ));
                
                ?><a href="#blog-all" class="active">All</a><?php
                
                $counter = 1;
                foreach ($categories as $category) {
                    ?>
                    <?php 
                        $string = $category->name; 
                        $words = explode(' ', $string);
                        $counter++;
                    ?>
                    <a href="#blog-<?php 
                        foreach ($words as $word) {
                            echo $counter . $word[0];
                        }
                    ?>"><?php echo $category->name; ?></a>
                    <?php
                }?>
            </div>
            <div class="row blog-content-tabs">
            <?php
                ?><div class="blog--category-content" id="blog-all"><?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                );
                $custom_query = new WP_Query($args);
                ?>
                <?php if ($custom_query->have_posts()): ?>
                        <?php while ($custom_query->have_posts()):
                            $custom_query->the_post(); ?>
                            <?php get_template_part("template-parts/blog/article-blog"); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php wp_reset_postdata(); ?>
                <?php
                ?></div><?php

                $categories = get_categories();
                $counter = 1;
                foreach ($categories as $category) {
                    $counter++;
                    $args = array(
                        'category_name' => $category->slug,
                        'paged' => get_query_var('paged') ?: 1,
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                    );
                    $query = new WP_Query($args);
                    $string = $category->name; 
                    $words = explode(' ', $string);
                    ?><div class="blog--category-content" id="blog-<?php 
                        $string = $category->name; 
                        $words = explode(' ', $string);
                        foreach ($words as $word) {
                            echo $counter . $word[0];
                        }
                        ?>">
                    <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                ?>
                                <?php get_template_part("template-parts/blog/article-blog"); ?>
                                <?php
                            }
                        }
                    ?></div><?php
                    wp_reset_postdata();
                }
            ?>
            </div>
        </div>
    </section>
</div>

<?php do_action('flatsome_after_page'); ?>
<?php get_footer(); ?>

