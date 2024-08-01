<?php
function wpse_298888_posts_where( $where, $query ) {
    global $wpdb;
    $starts_with = esc_sql( $query->get( 'starts_with' ) );
    $ends_with = esc_sql( $query->get( 'ends_with' ) );
    if ( $starts_with && $ends_with ) {
        $where .= " AND $wpdb->posts.post_title REGEXP '^([" . $starts_with . '-' . $ends_with . "])(.*)'";
    }
    return $where;
}
add_filter( 'posts_where', 'wpse_298888_posts_where', 10, 2 );
// Rest of the code remains the same
get_header();
$type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
$key = get_search_query(); // Get the search query
$number_post = -1; // Number of posts to display (-1 means all)
$first_letter = isset($_GET['first_letter']) ? strtoupper(sanitize_text_field($_GET['first_letter'])) : '';
$last_letter = isset($_GET['last_letter']) ? strtoupper(sanitize_text_field($_GET['last_letter'])) : '';
$simtype = isset($_GET['simtype']) ? strtoupper(sanitize_text_field($_GET['simtype'])) : '';
$args = array(
    'post_type' => 'product',
    'order' => 'DESC',
    'orderby' => 'ID',
    'starts_with' => $first_letter,
    'ends_with' => $last_letter,
    'post_status' => 'publish',
);
if ($simtype !== 'ALL' && $simtype === 'POPULAR') {
    $args['meta_query'] = array(
        'relation' => 'AND',
        array(
            'key' => 'sim_type', // Replace 'simtype' with your actual custom field key
            'value' => $simtype, // Replace 'your_simtype_value' with the value you want to match
            'compare' => 'LIKE', // You can adjust the comparison operator as needed (e.g., '=', '!=', 'IN', etc.)
        ),
    );
}
// Conditionally query popular posts based on 'post_views_count' if 'simtype' is 'POPULAR'
if ($simtype === 'POPULAR') {
    $args['meta_key'] = 'post_views_count'; // Replace 'post_views_count' with your actual custom field key for post views
    $args['orderby'] = 'meta_value_num'; // Order by the numeric value of the custom field
    $args['order'] = 'DESC'; // Order in descending order for popular posts
}
if (!empty($key)) {
    $args['s'] = $key;
}
$query = new WP_Query($args);
?>
<div id="content">
    <div id="content-container" class="container">
        <main id="main">
            <div class="archive-product-page">
                <?php if ($type === 'product') {
                    ?>
                        <div class="page-heading-search">
                        <h2>
                            <?php echo 'Search results for:'; ?>
                            <?php printf('<span class="search-keywords">' . get_search_query() . '</span>'); ?>
                        </h2>
                        </div>
                    <?php
                    include 'search-form.php' ;
                    if ($query->have_posts()) : ?>
                        <div class="row products-cs ">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <?php $product = wc_get_product(get_the_ID()); ?>
                                <?php wc_get_template_part('content', 'product-custom', array('product' => $product)); ?>
                            <?php endwhile; ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <div class=""> <h2>  No result found </h2> </div>
                    <?php endif;
                }
                else if ($type === 'post') {
                    $search_query = get_search_query(); 
                    ?>
                    <div class="container blog--box-search">
                        <div class="row">
                            <div class="blog--esim-text">
                                <h2><?php echo 'Search results for:'; ?>
                                <?php printf('<span class="search-keywords">' . $search_query . '</span>'); ?>
                            </h2>
                            <p>Discover the latest on travel, eSIMs and mobile internet worldwide</p>
                            </div>
                            
                            <?php include 'template-parts/blog/blog-form-search.php';?>
                        </div>
                    </div>
                    <section class="blog--category-box">
                    <div class="container">
                    <div class="row blog-content-tabs ">
                    <div class="blog--category-content">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            's' => $search_query,
                            'post_status' => 'publish'
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                get_template_part("template-parts/blog/article-blog");
                            }
                            wp_reset_postdata();
                        } else {
                            echo 'Không tìm thấy bài viết phù hợp.';
                            wp_reset_postdata();
                        }
                        ?>
                    </div></div></div></section>
                <?php
                }else {
                    if (have_posts()) : ?>
                        <div class="row products-cs ">
                            <?php while (have_posts()) : the_post(); ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php endwhile; ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <div class=""> Not Found</div>
                    <?php endif;
                } ?>
                
            </div>

        </main>
    </div>
</div>

<?php get_footer(); ?>
