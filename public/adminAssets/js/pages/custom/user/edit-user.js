"use strict";

// Class definition
var KTUserEdit = function () {
	// Base elements
	var avatar;

	var initUserForm = function() {
		avatar = new KTImageInput('kt_user_edit_avatar');
		avatar = new KTImageInput('kt_logo_edit_avatar');
		avatar = new KTImageInput('kt_header_edit_image');
		avatar = new KTImageInput('kt_about_edit_image');
	}
	

	return {
		// public functions
		init: function() {
			initUserForm();
		}
	};
}();

jQuery(document).ready(function() {
	KTUserEdit.init();
});
