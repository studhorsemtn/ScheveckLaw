$(function () {
    //  Cache the window object
    var $window = $(window);

    //Parallax background effect
    $('section[data-type="background"]').each(function () {
        var $bgobj = $(this); //   Assigning the object
        $(window).scroll(function () {

            //  scroll the background at the var speed
            //  The yPos is a negative value because we're scrolling it UP!!

            var yPos = -($window.scrollTop()) / $bgobj.data('speed');

            // Put together our final background position
            var coords = '50%  ' + yPos + 'px';

            //  Move the background
            $bgobj.css({
                backgroundPosition: coords
            });
        });
    });
});

// // toggle dropdown on mouse hover, click and tap events
// $('.dropdown').on('mouseenter mouseleave click tap', function(event) {
//     if (!$('.navbar-toggle').is(':visible')) {
//         $('.dropdown-toggle').dropdown('toggle');
//     }
// });