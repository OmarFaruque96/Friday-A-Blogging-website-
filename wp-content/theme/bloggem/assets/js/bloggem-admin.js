jQuery(document).ready(function(jQuery) {

	"use strict";

	jQuery(document).on( 'click', '.bloggem-intro-notice .bd-notice-dismiss', function(e) {
		e.preventDefault();
		jQuery.ajax({
			url: ajaxurl,
			data: {
				action: 'bloggem-intro-dismissed'
			},
			success: function() {
				location.reload();
			}
		});
	});

});
