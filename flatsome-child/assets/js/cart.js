jQuery(document).ready(function($){
	function clickShow() {
		$('.cart-link').click(function() {
			let offcanvasElement = document.getElementById("offcanvasRight2");
			let bsOffcanvas = new bootstrap.Offcanvas(offcanvasElement);
			bsOffcanvas.show();
		})

	}
	clickShow();
});