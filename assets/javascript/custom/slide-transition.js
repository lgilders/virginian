;(function ($) {
    /*
     jquery.slide-transition plug-in

     Requirements:
     -------------
     You'll need to define these two styles to make this work:

     .height-transition {
     -webkit-transition: max-height 0.5s ease-in-out;
     -moz-transition: max-height 0.5s ease-in-out;
     -o-transition: max-height 0.5s ease-in-out;
     transition: max-height 0.5s ease-in-out;
     overflow-y: hidden;
     }
     .height-transition-hidden {
     max-height: 0;
     }

     You need to wrap your actual content that you
     plan to slide up and down into a container. This
     container has to have a class of height-transition
     and optionally height-transition-hidden to initially
     hide the container (collapsed).

     <div id="SlideContainer"
     class="height-transition height-transition-hidden">
     <div id="Actual">
     Your actual content to slide up or down goes here
     </div>
     </div>

     To call it:
     -----------
     var $sw = $("#SlideWrapper");

     if (!$sw.hasClass("height-transition-hidden"))
     $sw.slideUpTransition();
     else
     $sw.slideDownTransition();
     */
    $.fn.slideUpTransition = function() {
        return this.each(function() {
            var $el = $(this);
            $el.css("max-height", "0");
            $el.addClass("height-transition-hidden");

            var $closeButton = $('.close-form');
            $closeButton.removeClass('is-active');
        });
    };

    $.fn.slideDownTransition = function() {
        return this.each(function() {
            var $closeButton = $('.close-form');

            var $el = $(this);
            $el.removeClass("height-transition-hidden");

            // temporarily make visible to get the size
            $el.css("max-height", "none");
            var height = $el.outerHeight();
            //var height = 400;

            // reset to 0 then animate with small delay
            $el.css("max-height", "0");

            setTimeout(function() {
                $el.css({
                    "max-height": height + 75
                });

                $closeButton.addClass('is-active');
            }, 1);

        });
    };

    var contactLink = $('#menu-header-secondary li:last-child');
    var contactForm = $('#contact-form');
    var closeButton = $('.close-form');
    var submitButton = jQuery('#contact-form .gform_wrapper .button');

    submitButton.on('click', function (e) {
        setTimeout(function () {
            contactForm.slideUpTransition();
        }, 6000);
    });

    contactLink.click(function () {
        event.preventDefault();
        //console.log('Contact link clicked');
        if (contactForm.hasClass('height-transition-hidden')) {
            contactForm.slideDownTransition();
        }
        else {
            contactForm.slideUpTransition();
        }
    });

    closeButton.click(function () {
        event.preventDefault();
        //console.log('Close Form Button Clicked');
        if (contactForm.hasClass('height-transition-hidden')) {
            contactForm.slideDownTransition();
        }
         else {
            contactForm.slideUpTransition();
        }
    });
})(jQuery);