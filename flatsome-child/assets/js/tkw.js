jQuery(document).ready(function ($) {
  $(".glink ").click(function (e) {
    setTimeout(() => {
      var current_lang = document
        .getElementsByTagName("html")[0]
        .getAttribute("lang");
      console.log("current_lang", current_lang);
    }, 500);
  });

  const currentLang = $(
    ".html-cs-3 .gtranslate_wrapper a.gt-current-lang"
  ).attr("data-gt-lang"); // Get the language
  $(".lang-header").html(currentLang); // Append it to the span

  $(".selector-item.lang").each(function () {
    if ($(this).find(".gt-current-lang").length) {
      $(this).addClass("active");
    }
  });

  let currency = $("#current-currency").attr("data-currency");
  if (currency) {
    currency = currency === "USD" ? `${currency} ($)` : `${currency} (đ)`;
    $(".current-price").html(currency);
  }

  $(".selector-item.lang").click(function (e) {
    $(this).find("a")[0].click();
    // Xóa lớp 'active' khỏi tất cả các thẻ div
    $(".selector-item.lang").removeClass("active");

    // Kiểm tra xem thẻ div được nhấp có chứa lớp 'gt-current-lang' không

    if ($(this).find(".gt-current-lang").length) {
      // Nếu có, thêm lớp 'active' vào thẻ div đó
      const langName = $(this).find(".gt-current-lang").attr("data-gt-lang");
      $(".lang-header").html(langName);
      $(this).addClass("active");
    }
  });

  //search
  $(".html_nav_position_text").click(function (e) {
    $(".html_top_right_text").toggleClass("block");
  });

  $("#btn-cerrar-buscador").click(function (e) {
    $(".html_top_right_text").removeClass("block");
  });

  //slick

  $(".proposal-slider").slick({
    infinite: true,
    autoplay: false,
    slidesToShow: 1,
    autoplaySpeed: 3000,
    dots: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 4000,
        settings: "unslick",
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2.5,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2.5,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          centerMode: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });


  $(".home-benefits-slider").slick({
    infinite: true,
    autoplay: false,
    slidesToShow: 1,
    autoplaySpeed: 3000,
    dots: true,
    arrows: true,
    responsive: [
      {
        breakpoint: 4000,
        settings: "unslick",
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".home-reviews__container__carousel").slick({
    infinite: true,
    autoplay: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    dots: false,
    arrows: true,
    prevArrow:
      '<div class="slick-prev-cs"><i class="fas fa-angle-left"></i></div>',
    nextArrow:
      '<div class="slick-next-cs"><i class="fas fa-angle-right" aria-hidden="true"></i></div>',
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

  $(".hear-review-slick").slick({
    infinite: false,
    autoplay: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    dots: false,
    arrows: true,
    prevArrow:
      '<div class="slick-prev-cs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 12H19" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 5L19 12L12 19" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
    nextArrow:
      '<div class="slick-next-cs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 12H19" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 5L19 12L12 19" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
    responsive: [
      {
        breakpoint: 991,
        settings: {
          dot: true,
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          dot: true,
          slidesToShow: 2,
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

  //custom innit
  $(
    ".tp-stars--5 .sgv-review-based svg g:nth-child(-n+5) path:nth-of-type(-n+2)"
  ).attr("fill", "#00b67a");
  $(
    ".tp-stars--4 .sgv-review-based svg g:nth-child(-n+4) path:nth-of-type(-n+2)"
  ).attr("fill", "#73cf11");
  $(
    ".tp-stars--3 .sgv-review-based svg g:nth-child(-n+3) path:nth-of-type(-n+2)"
  ).attr("fill", "#ff8622");
  $(
    ".tp-stars--2 .sgv-review-based svg g:nth-child(-n+2) path:nth-of-type(-n+2)"
  ).attr("fill", "#ff8622");
  $(
    ".tp-stars--1 .sgv-review-based svg g:nth-child(1) path:nth-of-type(1)"
  ).attr("fill", "red");

  $(".modalchoice-open").on("click", function () {
    $("#modalchoice").modal("show");
  });

  $("form.checkout.woocommerce-checkout").bind(
    "DOMSubtreeModified",
    function () {
      if ($("ul.woocommerce-error").length) {
        $("ul.woocommerce-error").insertAfter(
          ".row-checkout .large-8 .woocommerce-billing-fields"
        ); //where you want to place
      }
    }
  );
});

function ChangeTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent-product");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks-product");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

const defaultOpenproduct = document.getElementById("defaultOpen-product");
if (defaultOpenproduct) {
  defaultOpenproduct.click();
}
