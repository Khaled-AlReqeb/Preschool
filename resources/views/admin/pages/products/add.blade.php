@extends('admin.layout.master')
@section('pageTitle')
    {{admin('New Record')}}
@endsection
@section('styles')
    <link href="{{asset('/adminAssets/css/pages/wizard/wizard-4.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
          <style>
            .dropzone.dropzone-default .dz-remove {
                font-size: 12px !important;
            }
          </style>
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
                               href="{{route('admin.products.index')}}">{{admin('Products')}}</a>
                        </span>
                    </div>
                    <!--end::Search Form-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                            <a class="text-dark"
                               href="{{route('admin.products.create')}}">{{admin('New Record')}}</a>
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
                            <form class="form" id="edit_form">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label
                                            class="col-form-label col-3 text-lg-right text-left">{{admin('Product Cover')}}</label>
                                        <div class="col-9">
                                            <div class="image-input image-input-empty image-input-outline"
                                                    id="kt_user_edit_avatar"
                                                    style="background-image: url('{{defaultImage()}}')">
                                                <div class="image-input-wrapper"></div>
                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="cover"
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
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Arabic Name')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="ar_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">{{admin('English Name')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="en_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Arabic Description')}}</label>
                                            <div class="input-group">
                                                <textarea class="form-control" name="ar_description" rows="8" cols="150"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">{{admin('English Description')}}</label>
                                            <div class="input-group">
                                                <textarea class="form-control" name="en_description" rows="8" cols="150"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="">{{admin('Category Name')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <select
                                                    class="form-control form-control-lg form-control-solid select2"
                                                    id="category_id"
                                                    name="category_id">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">{{admin('Brand Name')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <select
                                                    class="form-control form-control-lg form-control-solid select2"
                                                    id="brand_id"
                                                    name="brand_id">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Price')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="number" step="0.00" class="form-control" name="price">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{admin('Quantity')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="number" step="0.00" class="form-control" name="quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Discound')}}</label>
                                            <div class="input-group">
                                                <input type="number" step="0.00" class="form-control" name="discount">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">{{admin('End Discount')}}</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="end_discount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Minimum Level')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="number" step="0.00" class="form-control" name="minimum_level">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{admin('Per Order')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="number" step="0.00" class="form-control" name="per_order">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Original Price')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="number" step="0.00" class="form-control" name="original_price">
                                            </div>
                                        </div>
                                        @if(app('is_multi_store'))
                                        <div class="col-lg-6">
                                            <label class="">{{admin('Store Name')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <select
                                                    class="form-control form-control-lg form-control-solid select2"
                                                    id="store_id"
                                                    value=""
                                                    name="store_id">
                                                    <option value="" selected></option>
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                    </div >
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{admin('Featured')}}</label>
                                            <div class="input-group">
                                                <span class="switch">
                                                    <label>
                                                        <input type="checkbox" checked="checked"
                                                                name="status">
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12 ">{{admin('Product Images')}}</label>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                                <div class="dropzone-msg dz-message needsclick">
                                                    <h3 class="dropzone-msg-title">{{admin('Drop files here or click to upload.')}}</h3>
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
<script src="{{ asset('/adminAssets/js/pages/custom/user/edit-user.js') }}" type="text/javascript"></script>
<script src="/adminAssets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script>
        $('#category_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $('#brand_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $('#store_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $(document).ready(function () {
            feedSubCategories();
            function feedSubCategories(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#category_id').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url:  '{{route('admin.loadCategories')}}',
                        {{--url:  '{{route('admin.loadSubCategories')}}',--}}
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
                                        text: item.name ,
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
            feedBrands();
            function feedBrands(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#brand_id').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url:  '{{route('admin.loadBrands')}}',
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
                                        text: item.name ,
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
            feedStores();
            function feedStores(myData){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#store_id').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url:  '{{route('admin.loadStores')}}',
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
                                        text: item.store_name ,
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
        });
        var request_url = "{{route('admin.uploadProductImages',':id')}}";
        var myDropzone;
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
                                        min: 2,
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
                                        min: 2,
                                        message: "{{admin('English Name at least must be 2 digits')}}"
                                    }
                                }
                            },

                            ar_description: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Arabic Description is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('Arabic Description at least must be 2 digits')}}"
                                    }
                                }
                            },

                            en_description: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('English Description is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('English Description at least must be 2 digits')}}"
                                    }
                                }
                            },
                            category_id: {
                               validators: {
                                   notEmpty: {
                                       message: "{{admin('Category is required')}}"
                                   },
                               }
                            },
                            price: {
                               validators: {
                                   notEmpty: {
                                       message: "{{admin('Price is required')}}"
                                   },
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
                                url: "{{ route('admin.products.store') }}",
                                data: new FormData($("#edit_form")[0]),
                                dataType: 'json',
                                async: false,
                                type: 'POST',
                                processData: false,
                                contentType: false,
                                success: function (e) {
                                    if (e['result'] == 'ok') {
                                        request_url = request_url.replace(':id',e.id);
                                        myDropzone.options.url = request_url;
                                        myDropzone.processQueue();
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
                                            $(location).attr('href', '{{route('admin.products.index')}}');
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
        var KTDropzoneDemo = function () {
            // Private functions
            var demo1 = function () {
                // file type validation
               dropzone =  $('#kt_dropzone_3').dropzone({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: request_url, // Set the url for your upload script location
                    paramName: "image", // The name that will be used to transfer the file
                    type: 'POST',
                    autoProcessQueue: false,
                    maxFiles: 10,
                    maxFilesize: 10, // MB
                    parallelUploads : 10,
                    addRemoveLinks: true,
                    init: function() {
                        myDropzone = this;
                    },
                    acceptedFiles: "image,.png,.jpeg,.jpg",
                    success: function (e) {
                        e = JSON.parse(e.xhr.response);
                        console.log(e['result']);
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
                                $(location).attr('href', '{{route('admin.products.index')}}');
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
                        }


                    },
                    error: function (e) {
                        e = JSON.parse(e.xhr.response);
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
                            }
                        });

                        $("#save").removeClass("spinner  spinner-right spinner-sm spinner-ligh");
                        document.getElementById("save").disabled = false;


                    }
                });
            }
            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();
        jQuery(document).ready(function() {
            KTFormControls.init();
            KTDropzoneDemo.init();
        });
    </script>
@endsection
