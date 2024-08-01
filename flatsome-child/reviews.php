<?php
function add_page_slug_to_the_body($classes)
{

    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '_' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_page_slug_to_the_body');
function template_chooser($template)
{
    global $wp_query;
    $post_type = get_query_var('post_type');
    if ($wp_query->is_search && $post_type == 'faqs') {
        return locate_template('archive-search.php'); // chuyển hướng đến archive-search.php
    }
    return $template;
}
add_filter('template_include', 'template_chooser');
// Get reviews
function esimwise_reviews($atts)
{
    extract(
        shortcode_atts(
            array(
                'tax' => '',
                'terms' => ''
            ),
            $atts,
        ),
    );
    $args = array(
        'post_type' => 'esreviews',
        'posts_per_page' => 6,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => $tax,
                'field' => 'slug',
                'terms' => $terms,
                'include_children' => true,
                'operator' => 'IN'
            ),
        ),
        'meta_key' => 'outstanding',
        'orderby' => 'meta_value_num',
        'meta_type' => 'DATE',
        'order' => 'DESC'

    );
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()):
        ob_start();
        ?>
        <?php

        $counter = 0;

        while ($the_query->have_posts()):
            $the_query->the_post();
            $outstanding = get_field('outstanding');
            ?>
            <article class="review-card gb-block-testimonial <?php
            if ($counter % 2 == 0):
                echo 'gb-block-left';
            else:
                echo 'gb-block-right';
            endif;
            if ($outstanding):
                echo ' large-12';
            else:
                echo ' large-6';
            endif;
            ?> ">
                <div class="wp-block-genesis-blocks-gb-testimonial ">
                    <div class="gb-testimonial-text">
                        <?php echo wpautop(get_the_content()); ?>
                    </div>
                    <div class="gb-testimonial-detail">
                        <div class="gb-testimonial-avatar-wrap">
                            <div class="gb-testimonial-image-wrap">
                                <?php echo get_the_post_thumbnail(get_the_ID(), "full") ?>
                            </div>
                        </div>
                        <div class="gb-testimonial-info">
                            <h2 class="gb-testimonial-name">
                                <?php echo get_the_title(); ?>
                            </h2><small class="gb-testimonial-title">
                                <p>
                                    <?php
                                    $taxonomy_names = wp_get_object_terms(get_the_ID(), "platform", array("fields" => "names"));
                                    echo $taxonomy_names[0]; ?>
                                </p>
                            </small>
                        </div>
                    </div>
                </div>
            </article>
            <?php
            $counter++;
        endwhile;
    ?>
    <?php
    endif;
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
}
add_shortcode("esimwise-reviews", "esimwise_reviews");

/**
 * FAQs
 */

function esimwise_faqs()
{
    global $paged;
    $args = array(
        'post_type' => 'faqs',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged

    );
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()):
        ob_start();
        ?>
        <form class="faqs__accordion__search" role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
            <div class="faqs__accordion__search__fields">
                <div class="faqs__accordion__search__fields_inner">
                    <input type="text" name="s" placeholder="How can we help you" />
                    <input type="hidden" name="post_type" type="faqs" value="faqs" />
                </div>
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                        <path d="M9.625 16.625C13.491 16.625 16.625 13.491 16.625 9.625C16.625 5.75901 13.491 2.625 9.625 2.625C5.75901 2.625 2.625 5.75901 2.625 9.625C2.625 13.491 5.75901 16.625 9.625 16.625Z" stroke="#7F3DFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.375 18.3751L14.5687 14.5688" stroke="#7F3DFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </form>
        <div class="faqs__grid">

            <div class="faqs__left">
                <div class="sidebar-faqs">
                    <?php
                    $terms = get_terms('faq_category');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) { ?>
                            <li>
                                <a class="faq_category_title" href="<?php echo esc_url(get_term_link($term)); ?>">
                                    <?php echo $term->name; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="faqs__right">



                <?php
                while ($the_query->have_posts()):
                    $the_query->the_post();
                    ?>
                    <article class="lc-text faq-item">
                        <h3 class="icon">
                            <?php echo get_the_title(); ?>
                        </h3>
                        <div class="faqs__accordion_excerpt hidden">
                            <?php echo wpautop(wp_trim_words(get_the_content(), 30, '...')); ?>
                            <button class="btn-primary btn-readmore">
                                <a href="<?php echo get_permalink(); ?>">
                                    Read more </a>
                            </button>
                        </div>

                    </article>

                    <?php
                endwhile;
                ?>
                <div class="paginacion-posts">
                    <?php
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(
                        array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $the_query->max_num_pages,
                            'prev_text' => __('<i class="fa fa-angle-left"></i>', 'textdomain'),
                            'next_text' => __('<i class="fa fa-angle-right"></i>', 'textdomain'),
                        ));
                    ?>
                </div>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                    $('.faq-item .icon').on('click', function () {
                        $(this).parent().find('.faqs__accordion_excerpt').toggleClass('hidden');
                        $(this).toggleClass('showed');
                        console.log('1');
                    });
                });
            </script>
        </div>
        <?php
    endif;
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
}
add_shortcode("esimwise-faqs", "esimwise_faqs");