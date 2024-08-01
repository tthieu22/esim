<?php
/**
 * Footer.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

do_action('flatsome_before_footer'); ?>

<!-- FOOTER 1 -->
<?php if (is_active_sidebar('sidebar-footer-1') && get_theme_mod('footer_1', 1)): ?>
	<div class="footer-widgets footer footer-1">
		<div class="<?php echo flatsome_footer_row_style('footer-1'); ?> mb-0">
			<?php dynamic_sidebar('sidebar-footer-1'); ?>
		</div>
	</div>
<?php endif; ?>

<!-- FOOTER 2 -->
<?php if (is_active_sidebar('sidebar-footer-2') && get_theme_mod('footer_2', 1)): ?>
	<div class="footer-widgets footer footer-2 <?php if (flatsome_option('footer_2_color') == 'dark')
		echo 'dark'; ?>">
		<div class="<?php echo flatsome_footer_row_style('footer-2'); ?> mb-0">
			<?php dynamic_sidebar('sidebar-footer-2'); ?>
		</div>
	</div>
<?php endif; ?>
<div class="footer-mobile mobile">
	<div class="container">
		<div class="accordion  accordion-flush" id="accordionFooter">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingOne">
					<button class="accordion-button  text-center" type="button" data-bs-toggle="collapse"
						data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Top destinations
					</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
					data-bs-parent="#accordionFooter">
					<div class="accordion-body">
						<?php wp_nav_menu(
							array(
								'theme_location' => 'top-destinations',
								'container' => 'false',
								'menu_id' => 'top-destinationsu',
								'menu_class' => 'menu'
							)
						); ?>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingTwo">
					<button class="accordion-button  text-center collapsed" type="button" data-bs-toggle="collapse"
						data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						Interest
					</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
					data-bs-parent="#accordionFooter">
					<div class="accordion-body">
						<?php wp_nav_menu(
							array(
								'theme_location' => 'interest',
								'container' => 'false',
								'menu_id' => 'interest',
								'menu_class' => 'menu'
							)
						); ?>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingThree">
					<button class="accordion-button  text-center collapsed" type="button" data-bs-toggle="collapse"
						data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						Contact
					</button>
				</h2>
				<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
					data-bs-parent="#accordionFooter">
					<div class="accordion-body">
							<?php echo do_shortcode('[block id="footer-4-contact"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php do_action('flatsome_after_footer'); ?>

<?php get_template_part('template-parts/footer/footer-absolute'); ?>