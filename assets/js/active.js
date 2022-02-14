
(function($) {
    "use strict";

    $(document).ready( function() {

        new WOW().init();        
        
        if($('.brand-carousel-active').length > 0) {
            $('.brand-carousel-active').slick({
                infinite: false,
                slidesToShow: 2, 
                slidesToScroll: 2, 
                arrows: true,
                speed: 800,
                prevArrow: $('.collection-nav-prev'),
                nextArrow: $('.collection-nav-next'),
                responsive: [
                    {
                      breakpoint: 1600,
                      settings: {
                        slidesToShow: 2
                      }
                    },
                    {
                      breakpoint: 1191,
                      settings: {
                        slidesToShow: 2
                      }
                    },
                    {
                      breakpoint: 768,
                      settings: {
                        slidesToShow: 1,
                        center: true,
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1
                      }
                    }
                ],

            });
        }       

        /*==========================
           Scroll To Up Init
        ============================*/
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '1110', // Distance from top before showing element (px)
            topSpeed: 2000, // Speed back to top (ms)
            animation: 'slide', // Fade, slide, none
            animationInSpeed: 300, // Animation in speed (ms)
            animationOutSpeed: 300, // Animation out speed (ms)
            scrollText: '<i class="icon-right"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

        // Sticky Menu
        $(window).scroll(function() {
            var Width = $(document).width();

            if ($("body").scrollTop() > 100 || $("html").scrollTop() > 100) {
                if (Width > 767) {
                    $(".main-header-wrapper").addClass("sticky");
                }
            } else {
                $(".main-header-wrapper").removeClass("sticky");
            }
        });

        
        $('#hamburger').on('click', function() {            
            $('.mobile-nav').addClass('show');
            $('.overlay').addClass('active');
        });

        $('.close-nav').on('click', function() {            
            $('.mobile-nav').removeClass('show');            
            $('.overlay').removeClass('active');          
        });

        $(".overlay").on("click", function () {
            $(".mobile-nav").removeClass("show");
            $('.overlay').removeClass('active');
        });

        $("#mobile-menu").metisMenu();


    }); // end document ready function

})(jQuery); // End jQuery
