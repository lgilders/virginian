;(function ($) {
    var photoTab = jQuery('#listing-tabs li:nth-child(3n)');

    photoTab.on('mouseup touchend', function () {
        console.log('photos clicked');
        jQuery(window).resize();
    });
})(jQuery);


