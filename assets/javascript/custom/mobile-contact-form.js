;(function ($) {
    var contactForm = jQuery('#contact-form-mobile');
    var submitButton = jQuery('#contact-form-mobile .gform_wrapper .button');

    submitButton.on('click', function (e) {
        setTimeout(function () {
            contactForm.addClass('hide');
        }, 6000);
    });
})(jQuery);