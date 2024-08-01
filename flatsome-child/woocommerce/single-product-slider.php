<?php
$product_id = get_the_ID();
$gallery_images = get_post_meta($product_id, '_product_image_gallery', true);

if (!empty($gallery_images)) {
    $gallery_images = explode(",", $gallery_images);

    // Loop through the gallery images
    ?>
    <div id="sync1" class="owl-carousel owl-theme">
        <?php foreach ($gallery_images as $image_id) {
            $image_url = wp_get_attachment_url($image_id);
            $image_thumb = wp_get_attachment_image_url($image_id, 'thumbnail');
            ?>
            <div class="item">
                <a href="<?php echo esc_url($image_url); ?>" data-thumb="<?php echo esc_url($image_thumb); ?>" data-src="<?php echo esc_url($image_url); ?>" class="images">
                    <img class="img-responsive" src="<?php echo esc_url($image_url); ?>" />
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="container">
        <div id="sync2" class="owl-carousel owl-theme">
            <?php foreach ($gallery_images as $image_id) {
                $image_url = wp_get_attachment_url($image_id);
                ?>
                <div class="item">
                    <a href="<?php echo esc_url($image_url); ?>" class="images">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } else { ?>
    <?php $a = 1; ?>
    <div id="sync1" class="owl-carousel owl-theme">
        <?php if (has_post_thumbnail()): ?>
            <?php $featured_img_url = get_the_post_thumbnail_url($product_id, 'full'); ?>
            <div class="item">
                <a href="<?php echo esc_url($featured_img_url); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="sync2" class="owl-carousel owl-theme">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="item">
                            <a href="<?php echo esc_url($featured_img_url); ?>" class="images">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
