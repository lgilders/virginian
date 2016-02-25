$(function() {
    var stickyNav = $("#sticky-nav"),
        contactForm = $("#contact-form");

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 30) {
            stickyNav.addClass("shrink");
            contactForm.addClass("hide");
        } else {
            stickyNav.removeClass("shrink");
            contactForm.removeClass("hide");
        }
    });
});