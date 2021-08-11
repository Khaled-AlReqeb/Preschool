@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Edit')}}
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
                                href="{{route('admin.countries.index')}}">{{admin('Countries ')}}</a>
                        </span>
                    </div>
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark" href="{{route('admin.countries.edit',$data->id)}}">{{$data->name}}</a>
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
                                <h3 class="card-title"> {{$data->name}}</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="edit_form">
                                <div class="card-body">
                                    <!--begin: Code-->
                                    <input type="hidden" name="id"
                                           value="{{$data->id}}">
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
                                        <div class="col-lg-6">
                                            <label>{{admin('Native Name')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="native_name" value="{{$data->native_name}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">{{admin('Continent')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <select
                                                    class="form-control form-control-lg form-control-solid select2"
                                                    id="continent_id"
                                                    name="continent_id">
                                                    <option value="{{$data->continent_id}}"
                                                            selected="selected"> {{$data->continent->name}}</option>
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
                                                    <input type="checkbox" name="status" <?= $data->status == 'active' ? 'checked' : ''?>>
                                                    <span></span>
                                                </label>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{admin('Flag')}}</label>
                                            <div class="input-group">
                                                <div class="image-input image-input-empty image-input-outline"
                                                     id="kt_user_edit_avatar"
                                                     style="background-image: url('{{$data->flag_image}}')">
                                                    <div class="image-input-wrapper"></div>
                                                    <label
                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                        data-action="change" data-toggle="tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="flag_image"
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
                                        <div class="col-lg-6">
                                            <label>{{admin('Country Code')}}</label>
                                            <span style="color: red;"> * </span>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="code" value="{{$data->code}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <div id="kt_repeater_3">
                                                <div class="form-group">
                                                    <label class="col-form-label">{{admin('Phone Code')}}</label>
                                                    <span style="color: red;"> * </span>
                                                    <label data-repeater-create="" class="btn font-weight-bold btn-primary">
                                                        <i class="la la-plus"></i> {{admin('New Record')}}
                                                    </label>
                                                    <div class="col-lg-9" id="oldPhoneCodes">
                                                    </div>
                                                    <div data-repeater-list="codes" class="col-lg-9">
                                                        <div data-repeater-item class="form-group row">
                                                            <div class="col-lg-5">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
																				<span class="input-group-text">
																					<i class="la la-phone"></i>
																				</span>
                                                                    </div>
                                                                    <input type="text" name="code"
                                                                           class="form-control"
                                                                           placeholder="966">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <a href="javascript:;" data-repeater-delete=""
                                                                   class="btn btn-danger">
                                                                    <i class="la la-remove"></i> {{admin('Delete')}}
                                                                </a>
                                                            </div>

                                                        </div>
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
        $('#continent_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $(document).ready(function () {

            feedContinents();
            $("#continent_id").on("change", function (e) {
                e.preventDefault();
            });

            function feedContinents(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#continent_id').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url:  '{{route('admin.loadContinents')}}',
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

            var oldPhoneCodes = <?php echo json_encode($data->phoneCodes); ?>;
            $('#oldPhoneCodes').empty();
            var i = 0, appends = '';
            for (i = 0; i < oldPhoneCodes.length; i++) {
                appends = appends + ' <div class="form-group row" ><div class="col-lg-5">\n' +
                    '<div class="input-group">\n' +
                    '<div class="input-group-prepend">\n' +
                    '<span class="input-group-text">\n' +
                    '<i class="la la-phone"></i>\n' +
                    '</span>\n' +
                    '</div>\n' +
                    '<input type="text" name="oldCode[' + i + '][code]" class="form-control" value="' + oldPhoneCodes[i].code + '">\n' +
                    '<input type="hidden" name="oldCode[' + i + '][id]"  value="' + oldPhoneCodes[i].id + '">\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '<div class="col-lg-2">\n' +
                    '<a  href="javascript:;" onclick="return removePhoneCode('+oldPhoneCodes[i].id+')"class="btn btn-danger ">\n' +
                    '<i class="la la-remove"></i>{{admin('Delete')}}\n' +
                    '</a>\n' +
                    '</div>'+
                    '</div>';
            }
            $('#oldPhoneCodes').append(appends);
        });
        var KTFormControls = function () {

            // repeater
            var repeater = function() {
                $('#kt_repeater_3').repeater({
                    initEmpty: false,

                    // defaultValues: {
                    //     'text-input': 'foo'
                    // },

                    show: function() {
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        swal.fire({
                            title: "{{admin('Are you sure !!')}}",
                            text: "{{admin('Are you want to delete this item ??')}}",
                            icon: "error",
                            showCancelButton: true,
                            confirmButtonText: "{{admin('Sure')}}",
                            cancelButtonText: "{{admin('Cancel')}}",

                        }).then(function (result) {
                            if (result.value === true) {
                                swal.close();
                                $(this).slideUp(deleteElement);
                                swal.fire("{{admin('Success Operation.')}}", "{{admin('Delete is happened.')}}", "success");

                            }
                        })
                    },

                });
            }

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

                            native_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Native Name is required')}}"
                                    },
                                }
                            },

                            continent_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Continent is required')}}"
                                    },
                                }
                            },

                            code: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Country Code is required')}}"
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
                                url: "{{ route('admin.countries.update') }}",
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
                                            $(location).attr('href', '{{route('admin.countries.index')}}');
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
                    repeater();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormControls.init();
        });
        function removePhoneCode(id) {
            swal.fire({
                title: "{{admin('Are you sure !!')}}",
                text: "{{admin('Are you want to delete this item ??')}}",
                icon: "error",
                showCancelButton: true,
                confirmButtonText: "{{admin('Sure')}}",
                cancelButtonText: "{{admin('Cancel')}}",

            }).then(function (result) {
                if (result.value === true) {
                    swal.close();
                    $.ajax({
                        url: "/admintz/countries/phoneCode/delete",
                        type: "post",
                        data: {
                            id: id,
                            _token: '{{csrf_token()}}'
                        },
                        success: function (e) {
                            var oldPhoneCodes = e.data;
                            $('#oldPhoneCodes').empty();
                            var i = 0, appends = '';
                            for (i = 0; i < oldPhoneCodes.length; i++) {
                                appends = appends + ' <div class="row kt-margin-b-10" ><div class="col-lg-5">\n' +
                                    '<div class="input-group">\n' +
                                    '<div class="input-group-prepend">\n' +
                                    '<span class="input-group-text">\n' +
                                    '<i class="la la-phone"></i>\n' +
                                    '</span>\n' +
                                    '</div>\n' +
                                    '<input type="text" name="oldCode[' + i + '][code]" class="form-control form-control-danger" value="' + oldPhoneCodes[i].code + '">\n' +
                                    '<input type="hidden" name="oldCode[' + i + '][id]"  value="' + oldPhoneCodes[i].id + '">\n' +
                                    '</div>\n' +
                                    '</div>\n' +
                                    '<div class="col-lg-2">\n' +
                                    '<a  href="javascript:;" onclick="return removePhoneCode('+oldPhoneCodes[i].id+')"class="btn btn-danger ">\n' +
                                    '<i class="la la-remove"></i>{{admin('Delete')}}\n' +
                                    '</a>\n' +
                                    '</div></div>';
                            }
                            $('#oldPhoneCodes').append(appends);
                            swal.fire("{{admin('Success Operation.')}}", "{{admin('Delete is happened.')}}", "success");

                        },
                        error: function (err) {

                        }
                    });
                }
            })
        }
    </script>
@endsection
