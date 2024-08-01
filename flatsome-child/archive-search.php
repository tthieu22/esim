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
            <div class="faqs__hero">
                <div class="faqs__wrapper hero__wrapper">
                    <div class="page-heading-search">
                        <h2>
                            <?php echo 'Search results for:'; ?>
                            <?php printf('<span class="search-keywords">' . get_search_query() . '</span>'); ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="large-12 col">
                <div class="col-inner">
                <form class="faqs__accordion__search" role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                    <div class="faqs__accordion__search__fields">
                        <div class="faqs__accordion__search__fields_inner">
                            <input type="text" name="s" placeholder="How can we help you"/>
                            <input type="hidden" name="post_type" type="faqs" value="faqs" /> 
                        </div>
                        <button class="icon-blog-searh" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.5 17.5L13.875 13.875" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </form>
                    <div class="faqs__grid">
                        <div class="faqs__left">
                            <div class="sidebar-faqs">
                                <?php
                                if (have_posts()) : while (have_posts()) : the_post();
                                        $terms = wp_get_post_terms(get_the_ID(), 'faq_category');
                                        if (!empty($terms) && !is_wp_error($terms)) {
                                            foreach ($terms as $term) { ?>
                                                <li>
                                                    <a class="faq_category_title" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo $term->name; ?></a>
                                                </li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
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
                </div>
            </div>

        <?php
        do_action('flatsome_after_page');
        get_footer();
    }
