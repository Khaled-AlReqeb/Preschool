@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Edit')}}
@endsection
@section('styles')
<style>
          .select2-selection__rendered{
              width: 412px !important;
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
                                    <h3 class="card-title"> {{admin('Stores')}}</h3>
                                </div>
                                <!--begin::Form-->
                                <form class="form" id="edit_form">
                                    <div class="card-body">
                                        <!--Hidden input edit id-->
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <!--begin: Code-->
                                        <ul class="nav nav-pills" id="myTab1" role="tablist" style="margin-bottom: 25px;">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="general-tab-1" data-toggle="tab" href="#general">
                                                                        <span class="nav-icon">
                                                                            <i class="flaticon-home"></i>
                                                                        </span>
                                                    <span class="nav-text">{{admin('Store Information')}}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#contact-1" aria-controls="contact">
                                                                        <span class="nav-icon">
                                                                            <i class="flaticon-user-add"></i>
                                                                        </span>
                                                    <span class="nav-text">{{admin('Store Owner')}}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="social-tab-1" data-toggle="tab" href="#social-1" aria-controls="social">
                                                                        <span class="nav-icon">
                                                                            <i class="flaticon-lock la la-facebook-messenger"></i>
                                                                        </span>
                                                    <span class="nav-text">{{admin('Login Data')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-5" id="myTabContent1">
                                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab-1">
                                                <div class="row">
                                                    <div class="col-xl-2"></div>
                                                    <div class="col-xl-7 my-2">
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">{{admin('Store Name')}}
                                                                <span style="color: red;"> * </span></label>
                                                            <div class="col-9">
                                                                <input type="text" class="form-control form-control-solid" name="store_name" value="{{$data->store_name}}">
                                                            </div>                                              
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">{{admin('Store Mobile')}}
                                                                <span style="color: red;"> * </span></label>
                                                            <div class="col-9">
                                                                <input type="text" class="form-control form-control-solid" name="store_mobile" value="{{$data->store_mobile}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">{{admin('Store Email')}}
                                                                <span style="color: red;"> * </span></label>
                                                            <div class="col-9">
                                                                <input type="text" class="form-control form-control-solid" name="store_email" value="{{$data->store_email}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label
                                                                    class="col-form-label col-3 text-lg-right text-left">{{admin('Description')}}
                                                                    <span style="color: red;"> * </span></label>
                                                                <div class="col-9"><textarea class="form-control" name="description" rows="8" cols="150">{{$data->description}}</textarea>
                                                            </div>
                                                        </div>
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">{{admin('logo')}}</label>
                                                            <div class="col-9">
                                                                <div class="image-input image-input-empty image-input-outline"
                                                                    id="kt_logo_edit_avatar"
                                                                    style="background-image: url('{{$data->logo}}')">
                                                                    <div class="image-input-wrapper"></div>
                                                                    <label
                                                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                        data-action="change" data-toggle="tooltip" title=""
                                                                        data-original-title="Change avatar">
                                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                                        <input type="file" name="logo"
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
                                                        <!--end::Group-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab-1">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <div class="col-xl-2"></div>
                                                    <div class="col-xl-7 my-2">
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <label class="col-3"></label>
                                                            <div class="col-9">
                                                                <h6 class="text-dark font-weight-bold mb-10"></h6>
                                                            </div>
                                                        </div>
                                                        <!--end::Row-->
                                                    <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-3 text-lg-right text-left">{{admin('Profile Image')}}</label>
                                                    <div class="col-9">
                                                        <div class="image-input image-input-empty image-input-outline"
                                                            id="kt_user_edit_avatar"
                                                            style="background-image: url('{{$data->user->profile_image}}')">
                                                            <div class="image-input-wrapper"></div>
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" name="profile_image"
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
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-3 text-lg-right text-left">{{admin('Name')}}
                                                        <span style="color: red;"> * </span></label>
                                                    <div class="col-9">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                            type="text" name="first_name" value="{{$data->user->full_name}}"/>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-3 text-lg-right text-left">{{admin('Email')}}
                                                    </label>
                                                    <div class="col-9">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="la la-at"></i>
                                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="email" 
                                                                placeholder="{{admin('Email')}}" value="{{$data->user->email}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-3 text-lg-right text-left">{{admin('Mobile')}}
                                                        <span style="color: red;"> * </span>
                                                    </label>
                                                    <div class="col-9">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="la la-phone"></i>
                                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="mobile" value="{{$data->user->mobile}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->

                                                <div class="form-group row">
                                                        <label
                                                        class="col-form-label col-3 text-lg-right text-left">{{admin('Language')}}
                                                        <span style="color: red;"> * </span></label>
                                                        <div class="col-9">
                                                            <select
                                                                class="form-control form-control-lg form-control-solid"
                                                                id="main_language"
                                                                name="main_language">
                                                                <option
                                                                    value="en" <?= ($data->user->main_language == 'en') ? 'selected': '' ?>>{{admin('English')}}</option>
                                                                <option
                                                                    value="ar" <?= ($data->user->main_language == 'en') ? 'selected': '' ?> >{{admin('Arabic')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-3 text-lg-right text-left">{{admin('Status')}}</label>
                                                    <div class="col-9">
                                                        <span class="switch">
                                                                                <label>
                                                                                    <input type="checkbox" checked="checked"
                                                                                        name="status">
                                                                                    <span></span>
                                                                                </label>
                                                                            </span>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                    
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">{{admin('Currency')}}
                                                                <span style="color: red;"> * </span></label>
                                                            <div class="col-9">
                                                                <select
                                                                    class="form-control form-control-lg form-control-solid select2"
                                                                    id="currency_id"
                                                                    name="currency_id">
                                                                    <option value="{{$data->user->currency_id}}">{{$data->user->currency->name}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">{{admin('Country')}}
                                                                <span style="color: red;"> * </span></label>
                                                            <div class="col-9">
                                                                <select
                                                                    class="form-control form-control-lg form-control-solid select2"
                                                                    id="country_id"
                                                                    name="country_id">
                                                                    <option value="{{$data->user->country_id}}">{{$data->user->country->name}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">{{admin('City')}}
                                                                <span style="color: red;"> * </span></label>
                                                            <div class="col-9">
                                                                <select
                                                                    class="form-control form-control-lg form-control-solid select2"
                                                                    id="city_id"
                                                                    name="city_id">
                                                                    <option value="{{$data->user->detail->city_id}}">{{$data->user->detail->city->name}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-form-label col-3 text-lg-right text-left">{{admin('Phone Code')}}
                                                                <span style="color: red;"> * </span></label>
                                                            <div class="col-9">
                                                                <select
                                                                    class="form-control form-control-lg form-control-solid select2"
                                                                    id="phone_code_id"
                                                                    name="phone_code_id">
                                                                    <option value="{{$data->user->phoneCode->id}}">{{$data->user->phoneCode->code}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <div class="tab-pane fade" id="social-1" role="tabpanel" aria-labelledby="social-tab-1">
                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Row-->
                                                    <div class="row">
                                                        <div class="col-xl-2"></div>
                                                        <div class="col-xl-7">
                                                            <!--begin::Row-->
                                                            <div class="row">
                                                                <label class="col-3"></label>
                                                                <div class="col-9">
                                                                    <h6 class="text-dark font-weight-bold mb-10"></h6>
                                                                </div>
                                                            </div>
                                                            <!--end::Row-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label col-3 text-lg-right text-left">{{admin('Password')}}
                                                                    <span style="color: red;"> * </span>
                                                                </label>
                                                                <div class="col-9">
                                                                    <input
                                                                        class="form-control form-control-lg form-control-solid mb-1"
                                                                        type="password" name="password" id="password"/>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-form-label col-3 text-lg-right text-left">{{admin('Confirm Password')}}
                                                                    <span style="color: red;"> * </span>
                                                                </label>
                                                                <div class="col-9">
                                                                    <input class="form-control form-control-lg form-control-solid"
                                                                        type="password" name="confirm_password"
                                                                        id="confirm_password"/>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                        </div>
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-12 ml-lg-auto" align="center">
                                                <button  type="button" id="save"
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
<script src="{{ asset("/adminAssets/js/pages/custom/images/edit-logo.js") }}" type="text/javascript"></script>
<script>
        $('#country_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $('#phone_code_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $('#city_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $('#currency_id').select2({
            placeholder: "{{admin('Choose')}}"
        });
      

    
     
        $(document).ready(function () {
        
            var e = document.getElementById("country_id");
            var countryId = e.value;

            feedCurrencies();
            feedCountries();
            $("#country_id").on("change", function (e) {
                e.preventDefault();
                feedPhoneCodes($(this).val());
                feedstores($(this).val());
            });

            function feedCurrencies(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#currency_id').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url: '{{route('admin.loadCurrencies')}}',
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
                                        text: item.iso,
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

            function feedCountries(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#country_id').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url: '{{route('admin.loadCountries')}}',
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
            function feedstores(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#city_id').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url: '{{route('admin.loadCities')}}',
                        dataType: 'json',
                        delay: 250,
                        cache: false,
                        data: function (params) {
                            return {
                                myData: myData,
                                country_id: myData,
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
            function feedPhoneCodes(myData) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#phone_code_id').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url: '{{route('admin.loadPhoneCodes')}}',
                        dataType: 'json',
                        delay: 250,
                        cache: false,
                        data: function (params) {
                            return {
                                myData: myData,
                                country_id: myData,
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
                                        text: item.code,
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
    </script>
    <script>
        var KTFormControls = function () {
            // Private functions
            var edit = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('edit_form'),
                    {
                        fields: {

                            email: {
                                validators: {
                                    emailAddress: {
                                        message: "{{admin('Email is not correct')}}"
                                    }
                                }
                            },

                            first_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Name is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('Name at least must be 2 digits')}}"
                                    }
                                }
                            },

                            main_language: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Language is required')}}"
                                    },
                                }
                            },

                            currency_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Currency is required')}}"
                                    },
                                }
                            },

                            country_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Country is required')}}"
                                    },
                                }
                            },

                            phone_code_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Phone Code is required')}}"
                                    },
                                }
                            },

                            city_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('City is required')}}"
                                    },
                                }
                            },

                            region_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Region is required')}}"
                                    },
                                }
                            },

                            mobile: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Mobile is required')}}"
                                    },
                                    stringLength: {
                                        min: 6,
                                        max: 11,
                                        message: "{{admin('Mobile must be between 6 & 11 digits')}}"
                                    },
                                }
                            },

                            password: {
                                validators: {
                                   
                                    stringLength: {
                                        min: 6,
                                        message: "{{admin('Password at least must be 6 digits')}}"
                                    },
                                }
                            },

                            confirm_password: {
                                validators: {
                                  
                                    stringLength: {
                                        min: 6,
                                        message: "{{admin('Confirm password at least must be 6 digits')}}"
                                    },
                                    identical: {
                                        compare: function() {
                                            return document.getElementById('add_form').querySelector('[name="password"]').value;
                                        },
                                        message: "{{admin('Confirm Password must be equal to password')}}"
                                    }
                                }
                            },
                            store_name: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Store Name is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('Store Name at least must be 2 digits')}}"
                                    }
                                }
                            },

                            store_email: {
                                validators: {
                                    emailAddress: {
                                        message: "{{admin('Email is not correct')}}"
                                    }
                             
                                }
                            },

                            store_mobile: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Store mobile is required')}}"
                                    },
                                    stringLength: {
                                        min: 2,
                                        message: "{{admin('Store mobile at least must be 2 digits')}}"
                                    }
                                }
                            },
                            desription: {
                                validators: {
                                    notEmpty: {
                                        message : "{{admin('Description is required')}}"
                                    },
                                    stringLength: {
                                        min:2,
                                        message: "{{admin('Description at least must be 2 digits')}}"
                                    }
                                }
                            }
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
                    console.log(this);
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
                                url: "{{ route('admin.stores.update') }}",
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
                                            $(location).attr('href', '{{route('admin.stores.index')}}');
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
