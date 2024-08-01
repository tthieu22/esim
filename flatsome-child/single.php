<?php get_header(); ?>
<section class ="single-container-h">
    <div class="container single-page-all" id="back-top-single">
        <div class="row">
            <div class="date-category-single">
                <p ><?php the_date("d F Y") ?></p>
                <div class="category"><?php the_category(); ?></div>
            </div>
            <div class="title-single-h">
                <h2 ><?php the_title(); ?></h2>
            </div>
            <div class="thumbnail-single-h">
                <img src ="<?php echo the_post_thumbnail_url()?>" ?>
            </div>
        </div>
        <div class="row content-single-h">
            <div class="content">
                <?php the_content(); ?>
            </div>
            <div class="share-box-box-h">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank" class="icon-single share-fb-in-tw">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 0C5.3868 0 0 5.3868 0 12C0 18.6132 5.3868 24 12 24C18.6132 24 24 18.6132 24 12C24 5.3868 18.6132 0 12 0ZM12 2.4C17.3161 2.4 21.6 6.68385 21.6 12C21.6 16.8174 18.0784 20.7756 13.4625 21.4781V14.8617H16.2563L16.6945 12.0234H13.4625V10.4719C13.4625 9.29227 13.8468 8.24531 14.9508 8.24531H16.7227V5.76797C16.4107 5.72597 15.7522 5.63438 14.5078 5.63438C11.9086 5.63438 10.3852 7.00717 10.3852 10.1344V12.0234H7.71328V14.8617H10.3852V21.4547C5.84435 20.689 2.4 16.7643 2.4 12C2.4 6.68385 6.68385 2.4 12 2.4Z" fill="#333333"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/me/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="icon-single share-fb-in-tw">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 0C8.7435 0 8.334 0.015 7.0545 0.072C5.775 0.132 4.9035 0.333 4.14 0.63C3.33914 0.931229 2.61374 1.40374 2.0145 2.0145C1.40411 2.61404 0.931661 3.33936 0.63 4.14C0.333 4.902 0.1305 5.775 0.072 7.05C0.015 8.3325 0 8.7405 0 12.0015C0 15.2595 0.015 15.6675 0.072 16.947C0.132 18.225 0.333 19.0965 0.63 19.86C0.9375 20.649 1.347 21.318 2.0145 21.9855C2.6805 22.653 3.3495 23.064 4.1385 23.37C4.9035 23.667 5.7735 23.8695 7.0515 23.928C8.3325 23.985 8.7405 24 12 24C15.2595 24 15.666 23.985 16.947 23.928C18.2235 23.868 19.098 23.667 19.8615 23.37C20.6618 23.0686 21.3867 22.5961 21.9855 21.9855C22.653 21.318 23.0625 20.649 23.37 19.86C23.6655 19.0965 23.868 18.225 23.928 16.947C23.985 15.6675 24 15.2595 24 12C24 8.7405 23.985 8.3325 23.928 7.0515C23.868 5.775 23.6655 4.902 23.37 4.14C23.0684 3.33934 22.5959 2.61401 21.9855 2.0145C21.3864 1.40351 20.661 0.930968 19.86 0.63C19.095 0.333 18.222 0.1305 16.9455 0.072C15.6645 0.015 15.258 0 11.997 0H12.0015H12ZM10.9245 2.163H12.0015C15.2055 2.163 15.585 2.1735 16.8495 2.232C18.0195 2.2845 18.6555 2.481 19.0785 2.6445C19.638 2.862 20.0385 3.123 20.4585 3.543C20.8785 3.963 21.138 4.362 21.3555 4.923C21.5205 5.3445 21.7155 5.9805 21.768 7.1505C21.8265 8.415 21.8385 8.7945 21.8385 11.997C21.8385 15.1995 21.8265 15.5805 21.768 16.845C21.7155 18.015 21.519 18.6495 21.3555 19.0725C21.1631 19.5935 20.856 20.0647 20.457 20.451C20.037 20.871 19.638 21.1305 19.077 21.348C18.657 21.513 18.021 21.708 16.8495 21.762C15.585 21.819 15.2055 21.8325 12.0015 21.8325C8.7975 21.8325 8.4165 21.819 7.152 21.762C5.982 21.708 5.3475 21.513 4.9245 21.348C4.40325 21.1559 3.93169 20.8494 3.5445 20.451C3.14513 20.0641 2.83758 19.5925 2.6445 19.071C2.481 18.6495 2.2845 18.0135 2.232 16.8435C2.175 15.579 2.163 15.1995 2.163 11.994C2.163 8.79 2.175 8.412 2.232 7.1475C2.286 5.9775 2.481 5.3415 2.646 4.9185C2.8635 4.359 3.1245 3.9585 3.5445 3.5385C3.9645 3.1185 4.3635 2.859 4.9245 2.6415C5.3475 2.4765 5.982 2.2815 7.152 2.2275C8.259 2.1765 8.688 2.1615 10.9245 2.16V2.163ZM18.4065 4.155C18.2174 4.155 18.0301 4.19225 17.8554 4.26461C17.6807 4.33698 17.522 4.44305 17.3883 4.57677C17.2545 4.71048 17.1485 4.86923 17.0761 5.04394C17.0037 5.21864 16.9665 5.4059 16.9665 5.595C16.9665 5.7841 17.0037 5.97135 17.0761 6.14606C17.1485 6.32077 17.2545 6.47952 17.3883 6.61323C17.522 6.74695 17.6807 6.85302 17.8554 6.92539C18.0301 6.99775 18.2174 7.035 18.4065 7.035C18.7884 7.035 19.1547 6.88329 19.4247 6.61323C19.6948 6.34318 19.8465 5.97691 19.8465 5.595C19.8465 5.21309 19.6948 4.84682 19.4247 4.57677C19.1547 4.30671 18.7884 4.155 18.4065 4.155ZM12.0015 5.838C11.1841 5.82525 10.3723 5.97523 9.61347 6.27921C8.85459 6.58319 8.16377 7.03511 7.58123 7.60863C6.99868 8.18216 6.53605 8.86585 6.22026 9.61989C5.90448 10.3739 5.74185 11.1833 5.74185 12.0007C5.74185 12.8182 5.90448 13.6276 6.22026 14.3816C6.53605 15.1356 6.99868 15.8193 7.58123 16.3929C8.16377 16.9664 8.85459 17.4183 9.61347 17.7223C10.3723 18.0263 11.1841 18.1763 12.0015 18.1635C13.6193 18.1383 15.1623 17.4779 16.2975 16.3249C17.4326 15.1719 18.0689 13.6188 18.0689 12.0007C18.0689 10.3827 17.4326 8.82962 16.2975 7.67662C15.1623 6.52363 13.6193 5.86324 12.0015 5.838ZM12.0015 7.9995C13.0625 7.9995 14.08 8.42098 14.8303 9.17122C15.5805 9.92146 16.002 10.939 16.002 12C16.002 13.061 15.5805 14.0785 14.8303 14.8288C14.08 15.579 13.0625 16.0005 12.0015 16.0005C10.9405 16.0005 9.92296 15.579 9.17272 14.8288C8.42248 14.0785 8.001 13.061 8.001 12C8.001 10.939 8.42248 9.92146 9.17272 9.17122C9.92296 8.42098 10.9405 7.9995 12.0015 7.9995Z" fill="#333333"/>
                    </svg>
                </a>
                <a  href="https://twitter.com/share?text=&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="icon-single share-fb-in-tw">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 26 24" fill="none">
                    <path d="M25 2.01097C23.9553 2.74785 22.7987 3.31145 21.5745 3.68006C20.9175 2.92462 20.0444 2.38918 19.0731 2.14616C18.1019 1.90314 17.0795 1.96427 16.1441 2.32128C15.2087 2.67829 14.4056 3.31395 13.8433 4.1423C13.2809 4.97064 12.9866 5.9517 13 6.95279V8.0437C11.0829 8.09341 9.18321 7.66822 7.47019 6.806C5.75717 5.94378 4.28398 4.6713 3.18182 3.10188C3.18182 3.10188 -1.18182 12.9201 8.63636 17.2837C6.38967 18.8088 3.71326 19.5734 1 19.4655C10.8182 24.9201 22.8182 19.4655 22.8182 6.92006C22.8172 6.61619 22.788 6.31307 22.7309 6.01461C23.8443 4.9166 24.63 3.53029 25 2.01097Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="authour-single">
            <?php     
                echo 'By: '. get_the_author();
            ?>
            </div>
        </div>
    </div>
    <div class="container slide-single-container">
        <div class="row slide-single">
            <div class="text-prelatied">
                <h3>Related articles</h3>
                <div class="blog--show-all"> 
                    <a href="<?php echo get_permalink();?>/blog">
                        <span>Show all</span> 
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="41" height="15" viewBox="0 0 41 15" fill="none">
                        <path d="M40.7071 8.20711C41.0976 7.81658 41.0976 7.18342 40.7071 6.79289L34.3431 0.428932C33.9526 0.0384078 33.3195 0.0384078 32.9289 0.428932C32.5384 0.819457 32.5384 1.45262 32.9289 1.84315L38.5858 7.5L32.9289 13.1569C32.5384 13.5474 32.5384 14.1805 32.9289 14.5711C33.3195 14.9616 33.9526 14.9616 34.3431 14.5711L40.7071 8.20711ZM0 8.5H40V6.5H0L0 8.5Z" fill="#7F3DFF"/>
                        </svg></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="single--slide-wapper-h">
                    <?php
                        $tags = wp_get_post_tags($post->ID);
                        if ($tags) {
                            $tag_ids = array();
                            foreach ($tags as $individual_tag) {
                                $tag_ids[] = $individual_tag->term_id;
                            }
                            $querysingle = array(
                                'post_type' => 'post',
                                'tag__in' => $tag_ids,
                                'post__not_in' => array($post->ID),
                                'posts_per_page' => 9 , // Số lượng bài viết liên quan được hiển thị
                                'ignore_sticky_posts' => 1, // Bỏ qua bài viết được ghim
                                'post_status' => 'publish',
                            );
                            $related_posts = new WP_Query($querysingle);
                            if ($related_posts->have_posts()) {
                                while ($related_posts->have_posts()) {
                                    $related_posts->the_post();
                                    get_template_part("template-parts/blog/article-blog");
                                }
                                wp_reset_postdata();
                            }
                        }else{
                                $args_all_sing = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'post__not_in' => array($post->ID),
                                    'ignore_sticky_posts' => 1, // Bỏ qua bài viết được ghim
                                    'posts_per_page' => 12,
                                );
                                $custom_query = new WP_Query($args_all_sing);
                                ?>
                                <?php if ($custom_query->have_posts()): ?>
                                    <?php while ($custom_query->have_posts()): $custom_query->the_post(); ?>
                                        <?php get_template_part("template-parts/blog/article-blog"); ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_postdata(); 
                            
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>