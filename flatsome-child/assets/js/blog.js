jQuery(document).ready(function ($) {
    console.log("sdfasf");
    $('.blog--slide-wapper-h').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        dots: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: true,
                dots: true,
                }
            }
        ]
    });
    
    $('.single--slide-wapper-h').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        dots: true,
        autoplaySpeed: 50000,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    autoplay: true,
                    dots: true,
                }
            }
        ]
    });
    function share_fa_h(){
        $(document).ready(function() {
            $('.share-fb-in-tw').click(function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0,         directories=0, scrollbars=0');
            return false;
            });
        });
    }
    share_fa_h();
    
    $('.blog--category-content').hide();
    $('.blog--category-content:first-child').fadeIn();
    $('section.blog--category-box .container .row.blog--all-categorry a').click(function(){
        $('section.blog--category-box .container .row.blog--all-categorry a').removeClass('active');
        $(this).addClass('active');
        let id_tab =$(this).attr('href');
        $('.blog--category-content').hide();
        $(id_tab).fadeIn();
        return false;
    });
    function modalGetSaleOff(){
        console.log("adasdfsd");
        const modal = $("#mygetsaleoff");
        const closeBtn = modal.find("p.no-thank");
        const isModalShown = localStorage.getItem("isModalShown");
        const boxmodal = $("section.section.get-sale-off-h-box");
    
        if (!isModalShown) {
            modal.removeClass("hide").addClass("active");
            localStorage.setItem("isModalShown", true);
        } else {
            modal.removeClass("active").addClass("hide");
        }
    
        closeBtn.on("click", function() {
            modal.removeClass("active").addClass("hide");
        });
    
        $(document).on("click", function(event) {
        if (!boxmodal.is(event.target) && boxmodal.has(event.target).length === 0) {
            modal.removeClass("active").addClass("hide");
        }
        });
    }
    modalGetSaleOff();
    function stickyLeftCheked(){

        var childelementsticky = document.querySelector('.left-compatible-devices');
        if(childelementsticky){
            var parentElementsticky = childelementsticky.parentNode;
            parentElementsticky.classList.add("sticky-esim-compatible");
        }
    }
    stickyLeftCheked();
    function backToTop(){
        const backTop = $(".back-top-single");
        const footer = $("#footer");
        
        $(window).scroll(function() {
            const scrollPosition = $(this).scrollTop();
            const footerTop = footer.offset().top;
            const footerHeight = footer.outerHeight();
            const windowHeight = $(window).height();
        
            console.log('footerHeight', footerHeight);
        
            if (scrollPosition > footerTop + footerHeight - windowHeight - footerHeight) {
                backTop.css({
                    position: "absolute",
                });
            } else {
                backTop.css({
                    position: "fixed",
                });
            }
        });
    }
    backToTop();
});
