
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>{{admin('Forget Password')}}</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{csrf_token()}}">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{asset('adminAssets/css/pages/login/classic/login-2.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('adminAssets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('adminAssets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('adminAssets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{asset('adminAssets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('adminAssets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('adminAssets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('adminAssets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
        <link rel="shortcut icon"  href="{{ asset('/adminAssets/media/logos/logo-blue.png') }}"/>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-2 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url(asset('adminAassets/media/bg/bg-3.jpg'));">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::reset Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{asset('adminAssets/media/logos/logo-blue.png')}}" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::reset Header-->
						<!--begin::reset form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>{{admin('Change your password')}}</h3>
								<div class="text-muted font-weight-bold">{{admin('Enter your new password to reset the old one')}}</div>
							</div>
							<form class="form" id="kt_reset_form">
                                <input type="hidden" value="{{$email}}" name="email">
                                <input type="hidden" value="{{$forgetCode}}" name="forgetCode">
                                <div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="{{admin('password')}}" name="password" autocomplete="off" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="{{admin('confirm password')}}" name="confirm_password" />
								</div>
								<button type="button" id="kt_pass_change_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">{{admin('Reset')}}</button>
							</form>
							<div class="mt-10">
								<span class="opacity-70 mr-4">{{admin('Go to your account')}}</span>
								<a href="{{route('admin.login')}}" tar class="text-muted text-hover-primary font-weight-bold">{{admin('Login')}}</a>
							</div>
						</div>
						<!--end::reset form-->

					</div>
				</div>
			</div>
			<!--end::reset-->
		</div>
		<!--end::Main-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('adminAssets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('adminAssets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{asset('adminAssets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('adminAssets/js/pages/custom/login/login-general.js')}}"></script>

        <script src="{{ asset('/adminAssets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/adminAssets/plugins/custom/prismjs/prismjs.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/adminAssets/js/scripts.bundle.js') }}" type="text/javascript"></script>
        <script  type="text/javascript">
            var KTReset = function() {
                var _handleResetForm = function(e) {

                    var validation;
                    console.log( KTUtil.getById('kt_reset_form'))

                    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                    validation = FormValidation.formValidation(
                        KTUtil.getById('kt_reset_form'),
                        {
                            fields: {
                                password: {
                                    validators: {
                                        notEmpty: {
                                            message: "{{admin('New Password Is Required')}}"
                                        },
                                       
                                    }
                                },
                                confirm_password: {
                                    validators: {
                                        notEmpty: {
                                            message: "{{admin('Confirm Password Is Required')}}"
                                        },
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap: new FormValidation.plugins.Bootstrap()
                            }
                        }
                    );
                    $('#kt_pass_change_submit').on('click', function (e) {
                        e.preventDefault();

                        validation.validate().then(function(status) {
                            if (status == 'Valid') {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{ route('admin.reset') }}",
                                    data: new FormData($("#kt_reset_form")[0]),
                                    dataType: 'json',
                                    async: false,
                                    type: 'POST',
                                    processData: false,
                                    contentType: false,
                                    success: function (e) {
                                        if (e['result'] == 'ok') {
                                            toastr.options = {
                                                "closeButton": true,
                                                "debug": false,
                                                "newestOnTop": true,
                                                "progressBar": true,
                                                "positionClass": "toast-top-right",
                                                "preventDuplicates": false,
                                                "onclick": null,
                                                "showDuration": "300",
                                                "hideDuration": "1000",
                                                "timeOut": "5000",
                                                "extendedTimeOut": "1000",
                                                "showEasing": "swing",
                                                "hideEasing": "linear",
                                                "showMethod": "fadeIn",
                                                "hideMethod": "fadeOut"
                                            };
                                            toastr.success(e['message']);
                                            setTimeout(function () {
                                                $(location).attr('href', e['url']);
                                            }, 1500);

                                        }
                                        else {
                                            toastr.options = {
                                                "closeButton": true,
                                                "debug": false,
                                                "newestOnTop": true,
                                                "progressBar": true,
                                                "positionClass": "toast-top-right",
                                                "preventDuplicates": false,
                                                "onclick": null,
                                                "showDuration": "300",
                                                "hideDuration": "1000",
                                                "timeOut": "5000",
                                                "extendedTimeOut": "1000",
                                                "showEasing": "swing",
                                                "hideEasing": "linear",
                                                "showMethod": "fadeIn",
                                                "hideMethod": "fadeOut"
                                            };
                                            toastr.error(e['message']);
                                            $("#kt_login_signin_submit").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                            document.getElementById("kt_login_signin_submit").disabled = false;
                                        }


                                    },
                                    error: function (e) {
                                        toastr.options = {
                                            "closeButton": true,
                                            "debug": false,
                                            "newestOnTop": true,
                                            "progressBar": true,
                                            "positionClass": "toast-top-right",
                                            "preventDuplicates": false,
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "5000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                        };
                                        var error = e.responseJSON['errors'];
                                        $.each(error, function (i, member) {
                                            for (var i in member) {
                                                toastr.error(member[i]);
                                            }
                                        });

                                    }
                                });
                                KTUtil.scrollTop();
                            } else {
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                };
                                toastr.error('{{admin('Please, Insert All Required Items Correctly')}}');

                            }
                        });
                    });
                }
                // Public Functions
                return {
                    // public functions
                    init: function() {
                        _handleResetForm();
                    }
                };
            }();
            // Class Initialization
            jQuery(document).ready(function() {
                KTReset.init();
            });
        </script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>