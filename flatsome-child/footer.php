<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>
<div class="back-top-single">
	<a href="<?php echo get_permalink();?>/contact" class="chat-button">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
		<path d="M22 2L11 13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M22 2L15 22L11 13L2 9L22 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</a>
	<a href="#header" class="back-top">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
		<path d="M14 22.1667V5.83333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M5.83398 14L14.0007 5.83333L22.1673 14" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</a>
</div>
</main>
<!-- The Modal -->
<div class="modal modalsim" id="modalSim">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<!-- Modal body -->
			<div class="modal-body relative">
				<button type="button" class="btn-close align-self-end sim-detail-close" data-bs-dismiss="modal"><i
						class="fa-regular fa-circle-xmark"></i></button>
				<div class="package-detail">
					<!-- Your modal body content goes here -->
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Button trigger modal -->
<!-- The Modal choice -->
<div class="modal" id="modalchoice">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<!-- Modal body -->
			<div class="modal-body relative">
				<button type="button" class="btn-close align-self-end sim-detail-close" data-bs-dismiss="modal"><i
						class="fa-regular fa-circle-xmark"></i></button>
				<div class="w-100 if-content">
					<iframe
						src="https://form.typeform.com/to/VyFknYZC?typeform-embed-id=9103316820058676&typeform-embed=popup-blank&typeform-source=esim.holafly.com&typeform-medium=snippet&typeform-medium-version=next&embed-opacity=100&typeform-embed-no-heading=true"
						style="border: 0px; transform: translateZ(0px);">
					</iframe>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade selector-modal" id="modalLang" tabindex="-1" aria-labelledby="modalLangLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<!-- Modal body -->
			<div class="modal-body relative">
				<button type="button" class="btn-close align-self-end sim-detail-close" data-bs-dismiss="modal"><i
						class="fa-solid fa-x"></i></button>
				<div class="route-switcher-tabs">
					<ul class="tab">
						<li><a href='#' class="tablinks" onclick="ChangeTab(event, 'language')" id="defaultOpen">
								Language </a></li>
						<li><a href='#' class="tablinks" onclick="ChangeTab(event, 'currency')"> Currency </a>
						</li>
					</ul>
				</div>
				<div class="airgsm-container">
					<div id="language" class="tabcontent">
						<p id="lang-modal-title" class="modal-title" style="display: block;">Suggested languages</p>
						<div class="selector-modal-content-langs">

							<?php
							// Danh sách các ngôn ngữ
							$languages = [
								'en' => ['title' => 'English', 'label' => 'English'],
								'de' => ['title' => 'Deutsch', 'label' => 'German'],
								'es' => ['title' => 'Español', 'label' => 'Spanish'],
								'fr' => ['title' => 'Français', 'label' => 'French'],
								'pt' => ['title' => 'Português', 'label' => 'Portuguese'],
								'it' => ['title' => 'Italiano', 'label' => 'Italian'],
								'ko' => ['title' => '한국어', 'label' => 'Korean'],
								'nl' => ['title' => 'Holland', 'label' => 'Dutch'],
								'sv' => ['title' => 'Rikssvenska', 'label' => 'Swedish'],
								'da' => ['title' => 'Dansk', 'label' => 'Danish'],
								'ja' => ['title' => '日本語', 'label' => 'Japanese'],
								'zh-CN' => ['title' => '中文(台灣)', 'label' => 'Chinese'],
								'ru' => ['title' => 'Русский', 'label' => 'Russian'],
								'ar' => ['title' => 'العربية‎', 'label' => 'Arabic'],
								'vi' => ['title' => 'Việt Nam', 'label' => 'Vietnames']
							];

							// Bắt đầu lặp qua danh sách ngôn ngữ
							foreach ($languages as $code => $language) {
								// Sử dụng ngôn ngữ hiện tại để tạo shortcode
								$shortcode = "[gt-link lang='{$code}' label='{$language['label']}  widget_look='{$language['label']}' ]";

								// Thực thi shortcode và lưu kết quả vào biến
								$language_link = do_shortcode($shortcode);

								// Kiểm tra nếu ngôn ngữ hiện tại là tiếng Anh, đặt lớp CSS "active"
								$active_class = ($code === 'en') ? 'active' : '';

								// In đoạn HTML cho ngôn ngữ hiện tại
								echo "<div class='selector-item lang'>
										<div class='title'>{$language['title']}</div>
										<div class='content'>{$language_link}</div>
									</div>";
							}
							?>
						</div>

					</div>

					<div id="currency" class="tabcontent">
						<p id="lang-modal-title" class="modal-title" style="display: block;">Choose a currency
						</p>
						<div class="selector-modal-content-currencies">
							<?php if (class_exists('WOOMULTI_CURRENCY_Data')) {
								global $wp;
								$multiCurrencySettings = WOOMULTI_CURRENCY_Data::get_ins();
								$currentCurrency = $multiCurrencySettings->get_current_currency();
							} ?>

							<div class="currency selector-item <?php if ($currentCurrency && $currentCurrency == 'USD') {
								echo 'active';
							} ?>" data-currency="USD">
								<a href="<?php echo home_url($wp->request); ?>/?wmc-currency=USD">
									<div class="title">United States (US) dollar</div>
									<div class="content">USD - $</div>
								</a>
							</div>
							<div class="currency selector-item <?php if ($currentCurrency && $currentCurrency == 'VND') {
								echo 'active';
							} ?>" data-currency="VND">
								<a href="<?php echo home_url($wp->request); ?>/?wmc-currency=VND">
									<div class="title">Vietnamese Dong</div>
									<div class="content">VND -đ</div>
								</a>
							</div>
							<?php if ($currentCurrency) { ?>
								<div style="display:none" id="current-currency"
									data-currency="<?php echo $currentCurrency; ?>">
									<?php echo $currentCurrency; ?>
								</div>
							<?php } ?>
						</div>

					</div>
				</div>

			</div>

		</div>
	</div>
</div>

<!-- modal get sale off -->
<div id="mygetsaleoff" class="modal-off-sale hide">
	<div class="modal-content-off-sale">
		<?php echo do_shortcode('[block id="get-10-off"]'); ?>
	</div>
</div>

<?php include 'mini-cart-offcanvas.php'; ?>

<footer id="footer" class="footer-wrapper">

	<?php do_action('flatsome_footer'); ?>

</footer>


<?php wp_footer(); ?>
<script src="<?php echo THEME_URL_CHILD;?>/assets/owl/owl.carousel.min.js"></script>
<script src="<?php echo THEME_URL_CHILD;?>/assets/lightgallery/lightgallery.min.js"></script>
<script src="<?php echo THEME_URL_CHILD; ?>/assets/slick/slick.min.js"></script>
<script src="<?php echo THEME_URL_CHILD; ?>/assets/js/tkw.js"></script>
<script src="<?php echo THEME_URL_CHILD; ?>/assets/js/product.js"></script>
<script src="<?php echo THEME_URL_CHILD; ?>/assets/js/search.js"></script>
<script src="<?php echo THEME_URL_CHILD; ?>/assets/js/cart.js"></script>
<script src="<?php echo THEME_URL_CHILD; ?>/assets/js/product-slider.js"></script>
<script src="<?php echo THEME_URL_CHILD; ?>/assets/libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo THEME_URL_CHILD; ?>/assets/js/blog.js"></script>
</body>

</html>