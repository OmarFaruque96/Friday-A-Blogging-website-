jQuery(document).ready(function(jQuery) {

    "use strict";

    jQuery('#primary-menu').slicknav({
        appendTo        : '.site-branding',
        label           : '',
        allowParentLinks: true
    });

    // Open Comments Form on button click
    jQuery(".comment-respond#respond").slideUp('fast');
    jQuery(".be-open-comment-form").on('click', function(e){
        e.preventDefault();
        jQuery(".comment-respond#respond").slideToggle();
    });

    jQuery(".comment-reply-link").on('click', function(e){
        e.preventDefault();
        jQuery(".comment-respond#respond").slideDown();
    });

    // For Fixed header & Scroll to top
	jQuery(window).on("scroll resize", function() {
		if (jQuery(window).scrollTop() >= 500) {
            jQuery(".be-goto-top").css("bottom", "10px");
		}
		if (jQuery(window).scrollTop() < 500) {
            jQuery(".be-goto-top").css("bottom", "-50px");
		}
	});

});
