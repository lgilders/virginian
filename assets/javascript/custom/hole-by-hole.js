$(document).ready(function ($) {

    var sync1 = $("#sync1"),
        sync2 = $("#sync2"),
        sync3 = $("#sync3"),
        flag = false,
        duration = 300;

    sync2.on('initialized.owl.carousel', function() {
        sync2.find(".owl-item").eq(0).addClass("synced");
    });

    sync3.on('initialized.owl.carousel', function() {
        sync3.find(".owl-item").eq(0).addClass("synced");
    });

    sync1.on('initialized.owl.carousel', function(){ reset_video_size(); });

    sync1.on('resized.owl.carousel', function(){ reset_video_size(); });


    // Video
    function reset_video_size(video_width){
        //better use jquery selectors: owl.items() and $(owl.items()) give problems, don't know why
        var items = $('.owl-item:not([data-video])');
        var videos = $('.owl-video-wrapper');
        var v_height = 0;

        //user-defined width ELSE, width from inline css (when owl.autoWidth == false),
        //ELSE, computed innerwidth of the first element.
        var v_width = (video_width) ? video_width : ((items.css('width') != 'auto') ? items.css('width') : items.innerWidth());

        items.each(function(){
            var h = $(this).innerHeight();
            var hInfo = $('.hole-information').innerHeight();

            if(h > v_height) v_height = h - hInfo;
        });

        //set both width and height
        videos.css({ 'height':v_height, 'width':v_width });
    }

    // Updates selected tab styles
    function updateClassName(current) {
        // For tablet and desktop
        $(sync2).find(".synced").removeClass("synced");
        $(sync2).find(".owl-item").eq(current).addClass("synced");
        // For mobile
        $(sync3).find(".synced").removeClass("synced");
        $(sync3).find(".owl-item").eq(current).addClass("synced");
    }

    // Initializes carousel for images/content
    sync1
        .owlCarousel({
            items: 1,
            nav: true,
            dots: false,
            video: true
        })
        .on('changed.owl.carousel', function (e) {
            if (!flag) {
                flag = true;
                sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
                flag = false;
            }
        });

    // Initializes carousel for hole numbers
    sync2
        .owlCarousel({
            items: 18,
            nav: false,
            center: false,
            dots: false
        })
        .on('click', '.owl-item', function () {
            var updateNumber = $(this).index();
            sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
            updateClassName(updateNumber);
        })
        .on('changed.owl.carousel', function (e) {
            if (!flag) {
                flag = true;
                sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
                updateClassName(e.item.index);
                flag = false;
            }
        });

    // Initializes carousel for front/back 9
    sync3
        .owlCarousel({
            items: 2,
            nav: false,
            dots: false
        })
        .on('click', '.owl-item', function () {
            var updateNumber = $(this).index();

            if(updateNumber === 0) {
                sync1.trigger('to.owl.carousel', [updateNumber, duration, true]);
            } else {
                sync1.trigger('to.owl.carousel', [(updateNumber + 8), duration, true]);
            }
            updateClassName(updateNumber);
        })
        .on('changed.owl.carousel', function (e) {
            if (!flag) {
                flag = true;
                sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
                flag = false;
            }
        });

});