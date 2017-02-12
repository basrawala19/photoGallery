// Agency Theme JavaScript
alert("gff" ) ;
(function($) {
    "use strict";
    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        alert("hatim") ;
        var $anchor = $(this);
        alert($($anchor.attr('href')).offset().top - 50);
        $('html,body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 12500, 'easeInOutExpo');
        //alert("hh") ;
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top'
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function(){
            $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

})(jQuery); // End of use strict
