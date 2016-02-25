$(function() {
    var stickyNav = $("#sticky-nav"),
        desktopNav = $("#desktop-menu"),
        contactForm = $("#contact-form");

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 30) {
            stickyNav.addClass("shrink");
            desktopNav.addClass("hide");
            contactForm.addClass("hide");
        } else {
            stickyNav.removeClass("shrink");
            desktopNav.removeClass("hide");
            contactForm.removeClass("hide");
        }
    });
});