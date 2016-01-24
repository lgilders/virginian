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

    function updateClassName(current) {
        // For tablet and desktop
        $(sync2).find(".synced").removeClass("synced");
        $(sync2).find(".owl-item").eq(current).addClass("synced");
        // For mobile
        $(sync3).find(".synced").removeClass("synced");
        $(sync3).find(".owl-item").eq(current).addClass("synced");
    }

    sync1
        .owlCarousel({
            items: 1,
            nav: true,
            dots: false
        })
        .on('changed.owl.carousel', function (e) {
            if (!flag) {
                flag = true;
                sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
                flag = false;
            }
        });

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