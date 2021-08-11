@extends('admin.layout.master')
@section('pageTitle')
    {{admin('New Record')}}
@endsection
@section('styles')
    <link href="{{asset('/adminAssets/css/pages/wizard/wizard-4.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
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
                    <div class="d-flex align-items-center mt-2 mb-2 mr-5" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                            <a class="text-dark"
                               href="{{route('admin.banners.index')}}">{{admin('Banners')}}</a>
                        </span>
                    </div>
                    <!--end::Search Form-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                            <a class="text-dark"
                               href="{{route('admin.banners.create')}}">{{admin('New Record')}}</a>
                        </span>
                    </div>
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
                                <h3 class="card-title">{{admin('New Record')}}</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="add_form">
                                <div class="card-body">
                                    <!--begin: Code-->
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Arabic Title')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="ar_title">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">{{admin('English Title')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="en_title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{admin('type')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <select
                                                    class="form-control form-control-lg form-control-solid select2"
                                                    id="type"
                                                    name="type">
                                                    <option
                                                        value="external">{{admin('External')}}</option>
                                                    <option
                                                        value="internal">{{admin('Internal')}}</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 external_type" >
                                            <label>{{admin('url')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group" >
                                                <input type="text" class="form-control" name="url">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 internal_type d-none">
                                            <label>{{admin('Route type')}}</label>
                                            <span style="color: red;"> * </span>
                                                <select
                                                    class="form-control   "
                                                    id="route_type"
                                                    name="route_type">
                                                    <option
                                                        value="product">{{admin('Product')}}</option>
                                                    <option
                                                        value="category">{{admin('Category')}}</option>
                                                   
                                                </select>
                                        </div>  
                                        <div class="col-lg-4 internal_type d-none" >
                                            <label>{{admin('Item')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <select
                                                    class="form-control form-control-lg form-control-solid select2"
                                                    id="item_id"
                                                    name="item_id">
                                                </select>
                                            </div>
                                        </div>
                                     
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-6">
                                            <label>{{admin('Status')}}</label>
                                            <div class="input-group">
                                                <span class="switch ">
                                                <label>
                                                    <input type="checkbox" name="status" checked>
                                                    <span></span>
                                                </label>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{admin('Image')}}</label>
                                            <div class="input-group">
                                                <div class="image-input image-input-empty image-input-outline"
                                                     id="kt_user_edit_avatar"
                                                     style="background-image: url('{{defaultImage()}}')">
                                                    <div class="image-input-wrapper"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="image"
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
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 ml-lg-auto" align="center">
                                            <button type="submit" id="save"
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
        $('#type').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $(document).ready(function(){
            $('#item_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
        })
        $('#type').on('change', function(){
            var type = $(this).val();
            console.log(type);
            if(type == 'internal'){
                if(!$('.external_type').hasClass('d-none')){

                    $('.external_type').addClass('d-none');
                }
                $('.internal_type').removeClass('d-none');
            }else if(type == 'external'){
                if(!$('.internal_type').hasClass('d-none')){
                    $('.internal_type').addClass('d-none');
                }
                $('.external_type').removeClass('d-none'); 
            }
            $('#route_type').trigger('change');
        });
        $('#route_type').on('change', function(){
            var type = $(this).val();
            if(type == 'product'){
                feedItems(null,"{{route('admin.loadProducts')}}");
            }else if(type == 'category'){
                feedItems(null,"{{route('admin.loadCategories')}}");
            }
        })
        function feedItems(myData,url) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#item_id').select2({
                placeholder: '{{admin('Choose')}}',
                allowClear: true,
                ajax: {
                    url:  url,
                    dataType: 'json',
                    delay: 250,
                    cache: false,
                    data: function (params) {
                        return {
                            myData: myData,
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function (data) {
                        data.page = data.page || 1;
                        return {
                            results: data.items.map(function (item) {
                                return {
                                    id: item.id,
                                    text:  item.name,
                                }
                            }),
                            pagination: {
                                more: data.pagination
                            }
                        };
                    },

                },
            });
        }
        var KTFormControls = function () {
            // Private functions
            var add = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('add_form'),
                    {
                        fields: {

                            ar_title: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Arabic Title is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('Arabic Title at least must be 2 digits')}}"
                                    }
                                }
                            },

                            en_title: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('English Title is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('English Title at least must be 2 digits')}}"
                                    }
                                }
                            },

                            type: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Type is required')}}"
                                    },
                                }
                            },

                            url: {
                                validators: {
                                    uri: {
                                        message: 'URL is not correctly'
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

                    validation.validate().then(function (status) {
                        $("#save").click(function () {
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
                                url: "{{ route('admin.banners.store') }}",
                                data: new FormData($("#add_form")[0]),
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
                                            $(location).attr('href', '{{route('admin.banners.index')}}');
                                        }, 1500);

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
                            $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                            document.getElementById("save").disabled = false;
                        }
                    });
                });
            }

            return {
                // public functions
                init: function () {
                    add();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTFormControls.init();
        });

    </script>
@endsection
