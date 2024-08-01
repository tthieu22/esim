jQuery(document).ready(function ($) {
  $(window).scroll(function () {
    var scrollThreshold = $(window).width() <= 767 ? 3000 : 1400;

    if ($(this).scrollTop() > scrollThreshold) {
      $(".sticky-add-to-cart-container.product__info").css("display", "flex");
    } else {
      $(".sticky-add-to-cart-container.product__info").css("display", "none");
    }
  });

  function updateProductDetails(input) {
    let variationLabel = input.find(".variable-item-span").html();
    let productTitle = $(".product-tile").text();

    $(".sticky-add-to-cart-product-title").html(productTitle);
    $("p.sticky-add-to-cart-product-variation").html(variationLabel + ' - ');
  }

  function updateProductDetails1(input) {
    let variationLabel = input.find(".variable-item-span").html();
    $("p.sticky-add-to-cart-data").html(variationLabel);
  }

  function updateQuantity(qty_input, delta) {
    let current_qty = parseInt(qty_input.val());
    let new_qty = Math.max(current_qty + delta, 1);
    qty_input.val(new_qty);
    $(".single_variation_wrap input.input-text.qty.text").val(new_qty);
  }

  $(".button.single_add_to_cart_button.button.alt.flicky-btn").click(
    function () {
      // Disable the button on click to prevent further clicks
      $(this).prop("disabled", true);

      // Add a loading class to the button to show loading animation or disable it
      $(this).addClass("loading");

      // Set a timeout to simulate loading for 2 seconds (adjust the time as needed)
      setTimeout(function () {
        // Remove the loading class after the timeout
        $(
          ".button.single_add_to_cart_button.button.alt.flicky-btn"
        ).removeClass("loading");

        // Re-enable the button after the loading timeout
        $(".button.single_add_to_cart_button.button.alt.flicky-btn").prop(
          "disabled",
          false
        );

        // Trigger the click on the original button after the timeout
        $(
          ".single_variation_wrap button.single_add_to_cart_button.button.alt"
        ).click();
      }, 500);
    }
  );

  $(".addtocart-cs table.variations tr:first li.variable-item").click(
    function () {
      setTimeout(() => {
        const variationPrice = $(
          ".addtocart-cs .single_variation_wrap .woocommerce-variation .woocommerce-variation-price"
        ).html();
        $(".flicky-price").html(variationPrice);
      }, 500);
      updateProductDetails($(this));
    }
  );

  $("table.variations tr:eq(1) li.variable-item").click(function () {
    setTimeout(() => {
      const variationPrice = $(
        ".addtocart-cs .single_variation_wrap .woocommerce-variation .woocommerce-variation-price"
      ).html();
      $(".flicky-price").html(variationPrice);
    }, 500);
    updateProductDetails1($(this));
  });

  $(".flicky-increase").click(function (e) {
    e.preventDefault();
    updateQuantity($(this).parent().find("input.qty"), 1);
  });

  $(".flicky-decrease").click(function (e) {
    e.preventDefault();
    updateQuantity($(this).parent().find("input.qty"), -1);
  });
});

jQuery(document).ready(function ($) {
  // Thêm nút tăng
  let increase_button = $('<button type="button">+</button>').attr(
    "class",
    "qty-button increase"
  );
  // Thêm nút giảm
  let decrease_button = $('<button type="button">-</button>').attr(
    "class",
    "qty-button decrease"
  );

  // Thêm các nút vào trước và sau input số lượng
  $(".woocommerce-variation-add-to-cart .quantity .qty").before(
    decrease_button
  );
  $(".woocommerce-variation-add-to-cart .quantity .qty").after(increase_button);

  let inputQtv = $(
    ".woocommerce-variation-add-to-cart-sticky-add-to-cart-form input.input-text.qty.text"
  );
  // Bắt sự kiện click cho nút tăng
  $(".qty-button.increase").click(function (e) {
    e.preventDefault();
    let qty_input = $(this).parent().find("input.qty");

    let current_qty = parseInt(qty_input.val());
    qty_input.val(current_qty + 1);
    inputQtv.val(current_qty + 1);
  });

  // Bắt sự kiện click cho nút giảm
  $(".qty-button.decrease").click(function (e) {
    e.preventDefault();
    let qty_input = $(this).parent().find("input.qty");
    let current_qty = parseInt(qty_input.val());
    if (current_qty > 1) {
      qty_input.val(current_qty - 1);
      inputQtv.val(current_qty - 1);
    }
  });
});

jQuery(document).ready(function ($) {
  $(".btn.currency-button").click(function () {
    $(".dropdown-currency").toggleClass("deactivate");
  });

  let currency = $("#current-currency").attr("data-currency");
  if (currency) {
    let displayCurrency =
      currency === "USD" ? `${currency} ($)` : `${currency} (đ)`;
    $(".btn.currency-button").prepend(displayCurrency);

    // Tìm phần tử với data-currency tương ứng và thêm lớp 'selected'
    $('.dropdown-item-currency[data-currency="' + currency + '"]').addClass(
      "selected"
    );
  }

  $(".currency-button").click(function () {
    let imgElement = $(this).find("img"); // Tìm thẻ img bên trong button
    let currentSrc = imgElement.attr("src");

    // Tạo đường dẫn mới dựa trên đường dẫn hiện tại
    let newSrc = currentSrc.includes("vectorup.svg")
      ? currentSrc.replace("vectorup.svg", "vector.svg")
      : currentSrc.replace("vector.svg", "vectorup.svg");

    // Thay đổi thuộc tính src của thẻ img
    imgElement.attr("src", newSrc);
  });

  $(".slick-review-single").slick({
    infinite: true,
    autoplay: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    dots: false,
    arrows: true,
    prevArrow:
      '<div class="slick-prev-single-product"><span aria-label="Previous">&#x2039;</span></div>',
    nextArrow:
      '<div class="slick-next-single-product"><span aria-label="Previous">&#x203a;</span></div>',
    responsive: [
      {
        breakpoint: 991,
        settings: {
          dot: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          dot: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          dot: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".single-product-advantages").slick({
    infinite: true,
    autoplay: false,
    autoplaySpeed: 3000,
    dots: false,
    arrows: false,
    responsive: [
      {
        breakpoint: 4000,
        settings: "unslick",
      },
      {
        breakpoint: 991,
        settings: {
          dot: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          dot: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          dot: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

jQuery(document).ready(function ($) {
  $(".offcanvasRight").click(function () {
    let offcanvasElement = document.getElementById("offcanvasRight");
    let bsOffcanvas = new bootstrap.Offcanvas(offcanvasElement);
    bsOffcanvas.show();
  });

  $(".product_list_widget .woocommerce-Price-amount.amount").each(function () {
    // Get the text content of the price span
    var priceText = $(this).text();
    // Remove the hyphen and any surrounding white spaces from the price text
    priceText = priceText.replace(/\s*–\s*/g, "");
    // Update the content of the price span with the modified price text
    $(this).text(priceText);
  });
});

// Create a div element for the SVG
const svgDiv = document.createElement("div");
svgDiv.classList.add("svg-tool-tip");

// Set the innerHTML of the div to your SVG code
svgDiv.innerHTML = `
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M9.08984 9.00008C9.32495 8.33175 9.789 7.76819 10.3998 7.40921C11.0106 7.05024 11.7287 6.91902 12.427 7.03879C13.1253 7.15857 13.7587 7.52161 14.2149 8.06361C14.6712 8.60561 14.9209 9.2916 14.9198 10.0001C14.9198 12.0001 11.9198 13.0001 11.9198 13.0001" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M12 17H12.01" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`;

// Create the tooltip HTML structure
const tooltipHTML = `
<div
  class="tooltip-custom fade show bs-tooltip-top"
>
  <div class="tooltip-arrow"></div>
  <div class="tooltip-inner">
    <div class="flex flex-column tooltip-custom-content">
      <div>
        <p class="title"> Daypass Type: </p>
        <span class="content">
          After activation, high-speed dates is updated every 24 hours, when the
          high-speed dates is used up, the speed will be reduced
        </span>
      </div>
      <div class="content-2">
      <p class="title"> Fixed Type: </p>
      <span class="content ">
      After activation, high-speed dates can be used within the validity period of the package until all the dates are used up.
      </span>
    </div>
    </div>
  </div>
</div>
`;

// Convert the tooltip HTML structure to a DOM element
const tooltipDiv = new DOMParser().parseFromString(tooltipHTML, "text/html")
  .body.firstChild;

// Find the label element based on the "for" attribute
const labels = document.querySelectorAll("label[for='pa_choose-data-type']");

// Check if any matching label elements were found
if (labels.length > 0) {
  const label = labels[0];

  // Insert the SVG div as a sibling after the label element
  label.insertAdjacentElement("afterend", svgDiv);

  // Add an event listener to show the tooltip on hover
  svgDiv.addEventListener("mouseover", () => {
    // Calculate the position of the tooltip (adjust as needed)
    const svgRect = svgDiv.getBoundingClientRect();
    const tooltipLeft = svgRect.left + svgRect.width + 10;
    const tooltipTop = svgRect.top - 10;

    // Position the tooltip and make it visible
    tooltipDiv.style.position = "absolute";
    tooltipDiv.style.left = "8%";
    tooltipDiv.style.top = "-100%";
    tooltipDiv.style.display = "block";
  });

  // Add an event listener to hide the tooltip when the mouse leaves
  svgDiv.addEventListener("mouseout", () => {
    tooltipDiv.style.display = "none";
  });

  // Append the tooltip div as a sibling after the svgDiv
  svgDiv.insertAdjacentElement("afterend", tooltipDiv);
}

// Wait for the document to be ready
jQuery(document).ready(function ($) {
  $(".total-reviews").each(function () {
    // Inside this function, 'this' refers to the current total-reviews element

    // Find the cr-total-rating-count element within the current total-reviews
    var totalRatingCount = $(this).find(".cr-total-rating-count").text();

    // Extract the number of reviews from the text using regular expressions
    var totalReviews = totalRatingCount.match(/\d+/);

    if (totalReviews) {
      // Create a new element (e.g., span) with the modified text
      var modifiedText = totalReviews + " reviews";
      var newElement = $("<span>" + modifiedText + "</span>");

      // Append the new element to the appropriate location within the current total-reviews
      $(this).find(".cr-average-rating-stars").append(newElement);
    }
  });
});
