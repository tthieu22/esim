<div class="offcanvas offcanvas-end cart-custom-toggle fade" tabindex="-1" id="offcanvasRight2"
  aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <div class="shopping-cart-ajax-wrap-title">
      <span type="button" class="" data-bs-dismiss="offcanvas" aria-label="Close"><svg
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M15 18L9 12L15 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg></span>
      <h5 data-bs-dismiss="offcanvas" aria-label="Close" id="shopping-cart-ajax-title">SHOPPING CART</h5>
    </div>
  </div>
  <div class="offcanvas-body">
    <div class="shopping-cart-toggle">
      <div class="cart-body">
        <?php echo woocommerce_mini_cart(); ?>
      </div>
    </div>
  </div>
</div>