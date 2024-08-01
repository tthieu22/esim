<?php

/**
 * The  FAQs template file.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

if (flatsome_option('pages_template') != 'default') {

    // Get default template from theme options.
    get_template_part('page', flatsome_option('pages_template'));
    return;
} else {

    get_header();
    do_action('flatsome_before_page'); ?>
    <div id="content" class="content-area page-wrapper" role="main">
        <div class="row row-main">
            <div class="large-12 col">
                <div class="col-inner">
                    <section class="post-type-archive-faqs">

                        <div class="faqs__grid">
                            <div class="faqs__left">
                                <div class="sidebar-faqs">
                                    <?php
                                    $terms = get_terms('faq_category');
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                    ?>
                                            <li>
                                                <a class="faq_category_title" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo $term->name; ?></a>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="faqs__right">
                                <div class="contentarea">
                                    <div id="content" class="content_right">
                                        <?php
                                        if (function_exists('yoast_breadcrumb')) {
                                            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                                        }
                                        ?>
                                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                                <article class="lc-text faq-item">
                                                    <div class="faqs__header">
                                                        <h1> <?php echo get_the_title(); ?></h1>
                                                    </div>
                                                    <div class="faqs__entry">
                                                        <?php echo wpautop(get_the_content()); ?>
                                                    </div>
                                                    <div class="faqs__footer">
                                                        <div class="faqs__author">
                                                            <strong>Esimwise Help</strong>
                                                        </div>
                                                        <div class="faqs__meta is-avatar">
                                                            <div>
                                                                <strong>Published: </strong>
                                                                <?php echo get_the_date('F j, Y'); ?>
                                                            </div>
                                                            <div>
                                                                <strong>Updated on: </strong>
                                                                <?php echo get_the_modified_date('F j, Y'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            <?php endwhile; ?>
                                        <?php endif; ?>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

        <?php
        do_action('flatsome_after_page');
        get_footer();
    }
