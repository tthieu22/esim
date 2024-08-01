jQuery(document).ready(function ($) {
  // Create debounce function
  var debounce = function (func, delay) {
    var debounceTimer;
    return function () {
      var context = this;
      var args = arguments;
      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(() => func.apply(context, args), delay);
    };
  };

  // Encapsulate AJAX request in a function to use in debounce
  var performAjax = function (e) {
    e.preventDefault();
    const searchValue = $(this).val();

    // Make an AJAX request to the PHP script
    $.ajax({
      url: frontend_ajax_object.ajaxurl,
      type: "POST",
      data: {
        action: "search_post_country",
        key: searchValue,
      },
      beforeSend: function () {
        $(".find-sim").html("");
      },
      success: function (results) {
        $(".find-sim").html(results);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("The following error occured: " + textStatus, errorThrown);
      },
    });
  };

  var performAjax1 = function (e) {
    e.preventDefault();
    const searchValue = $(this).val();

    // Make an AJAX request to the PHP script
    $.ajax({
      url: frontend_ajax_object.ajaxurl,
      type: "POST",
      data: {
        action: "search_post_country",
        key: searchValue,
      },
      beforeSend: function () {
        $(".find-sim").html("");
        $(".find-sim").removeClass("block");
      },
      success: function (results) {
        $(".find-sim").html(results);
        $(".find-sim").addClass("block");
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("The following error occured: " + textStatus, errorThrown);
      },
    });
  };

  // Debounce the performAjax function with 250ms delay
  var debouncedPerformAjax = debounce(performAjax, 500);

  // Bind the debounced function to the keyup event
  $("#search-coutry-header").on("keyup", debouncedPerformAjax);

  // Debounce the performAjax function with 250ms delay
  var debouncedPerformAjax1 = debounce(performAjax1, 300);

  // Bind the debounced function to the keyup event
  $(".section-hero__searcher-input").on("keyup", debouncedPerformAjax1);


  $(document).mouseup(function (e) {
    if ($(e.target).closest(".section-hero__searcher").length === 0) {
      $(".find-sim").removeClass("block");
    }
  });
});

jQuery(document).ready(function ($) {
  // Function to add the "active" class to the appropriate link
  function setActiveLink() {
      // Get the current URL
      var currentUrl = window.location.href;

      // Iterate through each destination range link
      $('.destination-range-button').each(function () {
          var link = $(this);

          // Check if the link's href is part of the current URL
          if (currentUrl.includes(link.attr('href'))) {
              link.addClass('active');
          } else {
              link.removeClass('active');
          }
      });
  }

  // Call the setActiveLink function when the page loads and when the hash fragment changes
  $(window).on('load hashchange', setActiveLink);
});

jQuery(document).ready(function ($) {
  const esimSelection = $('#esim-selection');
  
  // Function to update the URL when an option is selected
  esimSelection.on('change', function () {
    const selectedValue = esimSelection.val();
    const currentUrl = window.location.href;
      
      // Parse the URL
      var url = new URL(currentUrl);
      
      // Set the simtype parameter
      url.searchParams.set('simtype', selectedValue);
      
      // Construct the new URL with the simtype parameter
      const newUrl = url.toString();
      
      // Perform a redirect to the new URL
      window.location.href = newUrl;

  });

  // Function to set the selected option based on the URL parameter
  function setSelectedOption() {
    const currentUrl = window.location.href;
    const url = new URL(currentUrl);
    const simtype = url.searchParams.get('simtype');

      // Set the selected option based on the simtype parameter
      if (simtype) {
          esimSelection.val(simtype);
      }
  }

  // Call the setSelectedOption function when the page loads
  setSelectedOption();
});


jQuery(document).ready(function ($) {

  function removeElementsByClass(className) {
    var elements = document.querySelectorAll("." + className);

    for (var i = 0; i < elements.length; i++) {
      elements[i].remove();
    }
  }
  
  function checkAndRemoveElements() {
    const screenWidth = window.innerWidth;

    if (screenWidth <= 767) {
      removeElementsByClass("remove-mobile-js");
    } else if (screenWidth >= 768) {
      removeElementsByClass("remove-tablet-pc-js");
    }
  }

  // Initial check and removal when the page loads
  checkAndRemoveElements();

  // Listen for window resize events and re-check when the screen size changes
  window.addEventListener("resize", checkAndRemoveElements);
});