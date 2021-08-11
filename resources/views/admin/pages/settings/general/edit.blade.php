@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Edit')}}
@endsection
@section('styles')

@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        <a class="text-dark" href="{{route('admin.home')}}">{{admin('Home')}}</a>
                    </h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark" href="{{route('admin.settings.general.edit')}}">{{admin('General Settings')}}</a>
                        </span>
                    </div>
                    <!--end::Search Form-->
                </div>
                <!--end::Details-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title"> {{admin('General Settings')}}</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="edit_form">
                                <div class="card-body">
                                    <!--begin: Code-->
                                    <input type="hidden" name="id"
                                           value="{{$data->id}}">

                                    <ul class="nav nav-pills" id="myTab1" role="tablist" style="margin-bottom: 25px;">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="general-tab-1" data-toggle="tab" href="#general">
																	<span class="nav-icon">
																		<i class="flaticon-home"></i>
																	</span>
                                                <span class="nav-text">{{admin('General')}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#contact-1" aria-controls="contact">
																	<span class="nav-icon">
																		<i class="flaticon2-rocket"></i>
																	</span>
                                                <span class="nav-text">{{admin('Contact')}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="social-tab-1" data-toggle="tab" href="#social-1" aria-controls="social">
																	<span class="nav-icon">
																		<i class="flaticon-twitter-logo la la-facebook-messenger"></i>
																	</span>
                                                <span class="nav-text">{{admin('Social')}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="others-tab-1" data-toggle="tab" href="#others-1" aria-controls="others">
																	<span class="nav-icon">
																		<i class="flaticon2-expand"></i>
																	</span>
                                                <span class="nav-text">{{admin('Others')}}</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content mt-5" id="myTabContent1">
                                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab-1">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Name')}}</label>
                                                    <span style="color: red;"> * </span>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_name" value="{{$data->ar_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Name')}}</label>
                                                    <span style="color: red;"> * </span>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_name" value="{{$data->en_name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label>{{admin('Logo Image')}}</label>
                                                     <div class="input-group">
                                                    <div class="image-input image-input-empty image-input-outline"
                                                         id="kt_logo_edit_avatar"
                                                         style="background-image: url('{{$data->logo_image}}')">
                                                        <div class="image-input-wrapper"></div>
                                                        <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="logo_image"
                                                                   accept=".png, .jpg, .jpeg"/>
                                                            <input type="hidden" name="profile_avatar_remove"/>
                                                        </label>
                                                        <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="cancel" data-toggle="tooltip"
                                                                title="Cancel avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                                        <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="remove" data-toggle="tooltip"
                                                                title="Remove avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>{{admin('Header Image')}}</label>
                                                     <div class="input-group">
                                                    <div class="image-input image-input-empty image-input-outline"
                                                         id="kt_header_edit_image"
                                                         style="background-image: url('{{$data->header_image}}')">
                                                        <div class="image-input-wrapper"></div>
                                                        <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="header_image"
                                                                   accept=".png, .jpg, .jpeg"/>
                                                            <input type="hidden" name="profile_avatar_remove"/>
                                                        </label>
                                                        <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="cancel" data-toggle="tooltip"
                                                                title="Cancel avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                                        <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="remove" data-toggle="tooltip"
                                                                title="Remove avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>{{admin('About Image')}}</label>
                                                    <div class="input-group">
                                                        <div class="image-input image-input-empty image-input-outline"
                                                             id="kt_about_edit_image"
                                                             style="background-image: url('{{$data->about_image}}')">
                                                            <div class="image-input-wrapper"></div>
                                                            <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip" title=""
                                                                    data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="about_image"
                                                                       accept=".png, .jpg, .jpeg"/>
                                                                <input type="hidden" name="profile_avatar_remove"/>
                                                            </label>
                                                            <span
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="cancel" data-toggle="tooltip"
                                                                    title="Cancel avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                                            <span
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="remove" data-toggle="tooltip"
                                                                    title="Remove avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group row">

                                                <div class="col-lg-12">
                                                    <label>{{admin('Youtube Url')}}</label>
                                                    <div class="input-group">
                                                        <input type="url" class="form-control" name="youtube_url" value="{{$data->youtube_url}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Header Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_header_title" value="{{$data->ar_header_title}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Header Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_header_title" value="{{$data->en_header_title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Header SubTitle')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_header_subTitle" value="{{$data->ar_header_subTitle}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Header SubTitle')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_header_subTitle" value="{{$data->en_header_subTitle}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic About Us Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_about_title" value="{{$data->ar_about_title}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English About Us Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_about_title" value="{{$data->en_about_title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic  About Us Description')}}</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="ar_about_content" rows="8" cols="150">{{$data->ar_about_content}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English About Us Description')}}</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="en_about_content" rows="8" cols="150">{{$data->en_about_content}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Activities Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_activities_title" value="{{$data->ar_activities_title}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Activities Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_activities_title" value="{{$data->en_activities_title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Partner Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_partner_title" value="{{$data->ar_partner_title}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Partner Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_partner_title" value="{{$data->en_partner_title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Contact Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_contact_content" value="{{$data->ar_contact_content}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Contact Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_contact_content" value="{{$data->en_contact_content}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Footer Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_footer_content" value="{{$data->ar_footer_content}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Footer Title')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_footer_content" value="{{$data->en_footer_content}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Terms')}}</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="ar_terms" rows="8" cols="150">{{$data->ar_terms}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Terms')}}</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="en_terms" rows="8" cols="150">{{$data->en_terms}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Policy')}}</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="ar_policy" rows="8" cols="150">{{$data->ar_policy}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Policy')}}</label>
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="en_policy" rows="8" cols="150">{{$data->en_policy}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab-1">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Email')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="email" value="{{$data->email}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Mobile')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="mobile" value="{{$data->mobile}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Fax')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="fax" value="{{$data->fax}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Telephone')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="telephone" value="{{$data->telephone}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Arabic Address')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ar_address" value="{{$data->ar_address}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('English Address')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="en_address" value="{{$data->en_address}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="social-1" role="tabpanel" aria-labelledby="social-tab-1">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('WhatsApp')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="whatsapp" value="{{$data->whatsapp}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>{{admin('Facebook')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="facebook" value="{{$data->facebook}}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('Instagram')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="instagram" value="{{$data->instagram}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Twitter')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="twitter" value="{{$data->twitter}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>{{admin('LinkedIn')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="linkedin" value="{{$data->linkedin}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('Google')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="google" value="{{$data->google}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="others-1" role="tabpanel" aria-labelledby="others-tab-1">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label class="">{{admin('App Url')}}</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="app_url" value="{{$data->app_url}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 ml-lg-auto" align="center">
                                            <button  type="submit" id="save"
                                                    class="btn btn-success btn-elevate">{{admin('Save')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>


@endsection
@section('scripts')
    <script src="{{ asset("/adminAssets/js/pages/custom/user/edit-user.js") }}" type="text/javascript"></script>

    <script>
        var KTFormControls = function () {
            // Private functions
            var edit = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('edit_form'),
                    {
                        fields: {

                            ar_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Arabic Name is required')}}"
                                    },
                                    stringLength: {
                                        min:2,
                                        message: "{{admin('Arabic Name at least must be 2 digits')}}"
                                    }
                                }
                            },

                            en_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('English Name is required')}}"
                                    },
                                    stringLength: {
                                        min:2,
                                        message: "{{admin('English Name at least must be 2 digits')}}"
                                    }
                                }
                            },

                        },

                        plugins: { //Learn more: https://formvalidation.io/guide/plugins
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap(),
                            // Validate fields when clicking the Submit button
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            // Submit the form when all fields are valid
                            // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        }
                    }
                );
                $('#save').on('click', function (e) {
                    e.preventDefault();

                    validation.validate().then(function(status) {
                        $("#save").click(function(){
                            $("#save").addClass("spinner  spinner-right spinner-sm spinner-ligh");
                            document.getElementById("save").disabled = true;
                        });
                        if (status == 'Valid') {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: "{{ route('admin.settings.general.update') }}",
                                data: new FormData($("#edit_form")[0]),
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
                                            $(location).attr('href', '{{route('admin.settings.general.edit')}}');
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
                                        $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                        document.getElementById("save").disabled = false;
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

                                    $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                                    document.getElementById("save").disabled = false;


                                }
                            });
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
                            toastr.error('{{admin('Please, Insert All Required Items Correctly')}}');
                            $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                            document.getElementById("save").disabled = false;
                        }
                    });
                });
            }

            return {
                // public functions
                init: function() {
                    edit();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormControls.init();
        });

    </script>
@endsection
