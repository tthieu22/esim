<?php
/* Template Name: FAQs Search */
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
                        <div id="text-1009550971" class="text">

                            <h1>We’re here to help</h1>

                            <style>
                                #text-1009550971 {
                                    font-size: 1rem;
                                    text-align: center;
                                    color: rgb(0, 0, 0);
                                }

                                #text-1009550971>* {
                                    color: rgb(0, 0, 0);
                                }

                                @media (min-width:850px) {
                                    #text-1009550971 {
                                        font-size: 2.5rem;
                                    }
                                }
                            </style>
                        </div>

                        <div id="text-4290924125" class="text faq-subtitle">

                            <p>If you have any questions about your ESIMWISE eSIM, you’ll find your answer here. You can also reach us on our 24/7 online chat.</p>

                            <style>
                                #text-4290924125 {
                                    font-size: 1rem;
                                    line-height: 1.15;
                                    text-align: center;
                                }
                            </style>
                        </div>
                        <form class="faqs__accordion__search" role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                            <div class="faqs__accordion__search__fields">
                                <div class="faqs__accordion__search__fields_inner">
                                    <input type="text" name="s" placeholder="How can we help you" />
                                    <input type="hidden" name="post_type" type="faqs" value="faqs" />
                                </div>
                                <input type="submit" value="Search" class="btn-primary-l cta-primary destination__btn ">
                            </div>
                        </form>
                        <div class="faqs__grid">
                            <div class="faqs__left">
                                <div class="sidebar-faqs">
                                    <?php
                                    $terms = get_terms('faq_category');
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {?>
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

                                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        <script>
                                            jQuery(document).ready(function($) {
                                                $('.faq-item .icon').on('click', function() {
                                                    $(this).parent().find('.faqs__accordion_excerpt').toggleClass('hidden');
                                                    $(this).toggleClass('showed');
                                                });
                                            });
                                        </script>


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
