"use strict";

// Class definition
var KTLogoEdit = function () {
	// Base elements
	var avatar;

	var initLogoForm = function() {
		avatar = new KTImageInput('kt_logo_edit_avatar');
	}
	

	return {
		// public functions
		init: function() {
			initLogoForm();
		}
	};
}();

jQuery(document).ready(function() {
	KTLogoEdit.init();
});
