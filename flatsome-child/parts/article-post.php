<article class="article category-post-article col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
	<div class="post-item">
		<div class="wp-block-latest-posts__featured-image aligncenter">
			<a href="<?php echo the_permalink(); ?>">
				<img width="768" height="512" src="<?php echo the_post_thumbnail_url(); ?>"
					class="attachment-medium_large size-medium_large wp-post-image" alt="Travel to Spain from the UK"
					sizes="(max-width: 768px) 100vw, 768px"> </a>
		</div>
		<a href="<?php echo the_permalink(); ?>" class="blog-post-a">
			<?php echo the_title(); ?> </a>
		<div class="wp-block-latest-posts__post-author">
			By
			<?php echo get_the_author_meta('display_name'); ?>
		</div>
		<div class="wp-block-latest-posts__post-excerpt">
			<?php echo the_excerpt(10); ?>
		</div>
		<button class="btn-primary">
			<a href="<?php echo the_permalink(); ?>">
				Read more </a>
		</button>
	</div>

</article>