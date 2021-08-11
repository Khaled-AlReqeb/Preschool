@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Edit')}}
@endsection
@section('styles')
    <link href="{{asset('/adminAssets/css/pages/wizard/wizard-4.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('/adminAssets/plugins/custom/datatables/datatables.bundle.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
    <style>
        .dz-image img{
            max-width: 100%;
            height: auto;
        }
        .dropzone.dropzone-default .dz-remove {
            font-size: 12px !important;
        }
        .select2-container{
            width: 100% !important;
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
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark" href="{{route('admin.products.edit',$data->id)}}">{{$data->name}} </a>
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
                                <h3 class="card-title"> {{$data->name}} </h3>
                                @if($data->status == 'inactive')
                                    <span class="label label-lg font-weight-bold label-light-warning label-inline mt-5"> {{admin('This product inactivated from admin')}}</span>
                                @endif
                            </div>
                            <!--begin::Form-->
                            <ul class="nav nav-pills" style="margin:10px 40px 0 " id="myTab1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="main-data-tab" data-toggle="tab" href="#main-data">
                                        <span class="nav-icon">
                                            <i class="flaticon-menu-1"></i>
                                        </span>
                                        <span class="nav-text">{{admin('Main Data')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-1" data-toggle="tab" href="#properties" aria-controls="profile">
                                        <span class="nav-icon">
                                            <i class="flaticon2-layers-1"></i>
                                        </span>
                                        <span class="nav-text">{{admin('Product Properties')}}</span>
                                    </a>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content" id="myTabContent1">
                                <div class="tab-pane fade show active" id="main-data" role="tabpanel" aria-labelledby="main-data-tab">
                                    <form class="form" id="edit_form">
                                        <div class="card-body">
                                            <!--begin: Code-->
                                                <input type="hidden" name="id"
                                                value="{{$data->id}}">
                                                  <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label
                                                        class="col-form-label col-3 text-lg-right text-left">{{admin('Product Cover')}}</label>
                                                    <div class="col-9">
                                                        <div class="image-input image-input-empty image-input-outline"
                                                                id="kt_user_edit_avatar"
                                                                style="background-image: url('{{$data->cover}}')">
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
                                                <!--end::Group-->
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
                                                            <input type="text" class="form-control" name="en_name"  value="{{$data->en_name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>{{admin('Arabic Description')}}</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="ar_description" rows="8" cols="150">{{$data->ar_description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="">{{admin('English Description')}}</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="en_description" rows="8" cols="150">{{$data->ar_description}}</textarea>
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
                                                                <option value="{{$data->category_id}}">{{$data->category->name}}</option>
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
                                                                <option value="{{$data->brand_id}}">{{$data->brand->name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>{{admin('Price')}}</label>
                                                        <span style="color: red;"> * </span>
                                                        <div class="input-group">
                                                            <input type="number" step="0.00" class="form-control" name="price" value="{{$data->price}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>{{admin('Quantity')}}</label>
                                                        <span style="color: red;"> * </span>
                                                        <div class="input-group">
                                                            <input type="number" step="0.00" class="form-control" name="quantity" value="{{$data->quantity}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>{{admin('Per Order')}}</label>
                                                        <span style="color: red;"> * </span>
                                                        <div class="input-group">
                                                            <input type="number" step="0.00" class="form-control" name="per_order" value="{{$data->per_order}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>{{admin('Original Price')}}</label>
                                                        <div class="input-group">
                                                            <input type="number" step="0.00" class="form-control" name="original_price" value="{{$data->original_price}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>{{admin('Discound')}}</label>
                                                        <div class="input-group">
                                                            <input type="number" step="0.00" class="form-control" name="discount" value="{{$data->discount}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="">{{admin('End Discount')}}</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control datepicker" name="end_discount" value="{{$data->end_discount}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>{{admin('Minimum Level')}}</label>
                                                        <div class="input-group">
                                                            <input type="number" step="0.00" class="form-control" name="minimum_level" value="{{$data->minimum_level}}">
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
                                                                name="store_id">
                                                                <option value="{{$data->store_id}}" selected>{{$data->store->name}}</option>
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
                                                                    <input type="checkbox" checked="<?= ($data->is_featured == 'yes') ? 'checked' : '' ?>"
                                                                            name="is_featured">
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
                                <div class="tab-pane fade" id="properties" role="tabpanel" aria-labelledby="properties-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="card card-custom bg-secondary p-5 mb-2 col-lg-12" >
                                                <div id="add_property">
                                                    <form id="add_property_form">
                                                        <!--begin: Code-->
                                                        <div class="form-group row">
                                                            <div class="col-lg-4">
                                                                <label>{{admin('Properties')}}</label>
                                                                <span style="color: red;"> * </span>
                                                                <div class="input-group">
                                                                    <select name="main_product_property_id" class="form-control" id="property_id">
                                                                        <option value="">{{admin('Select')}}</option>
                                                                        @foreach($properties as $property)
                                                                        <option value="{{$property->main_product_property_id}}" data-has-properties="{{$property->main_product_property->has_sub_properties}}">{{$property->main_product_property->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 d-none" id="p_sub_properties">
                                                                <label>{{admin('Sub Property')}}</label>
                                                                <span style="color: red;"> * </span>
                                                                <div class="input-group">
                                                                    <select
                                                                        class="form-control form-control-lg form-control-solid select2"
                                                                        id="sub_properties"
                                                                        name="sub_main_property_id">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 d-none" id="color_picker">
                                                                <label>{{admin('Color')}}</label>
                                                                <span style="color: red;"> * </span>
                                                                <div class="input-group">
                                                                <input class="form-control" type="color" name="other_values" value="#563d7c" id="example-color-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label>{{admin('Additional Price')}}</label>
                                                                <span style="color: red;"> * </span>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="additional_price">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 ml-lg-auto" align="center">
                                                                <a  type="button" id="property_save"
                                                                        class="btn btn-success btn-elevate">{{admin('Save')}}</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    <!--begin: Datatable-->
                                    <table class="table table-striped table-bordered table-hover table-checkable" id="kt_properties_datatable"
                                                        style="margin-top: 13px !important">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{admin('Property')}}</th>
                                            <th>{{admin('Sub Property')}}</th>
                                            <th>{{admin('Value')}}</th>
                                            <th>{{admin('Additional Price')}}</th>
                                            <th>{{admin('Actions')}}</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <!--end: Datatable-->
                                    </div>
                                </div>

                            </div>
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
        $('#sub_properties').select2({
            placeholder: "{{admin('Choose')}}"
        });
        $(document).ready(function () {
            $('.datepicker').datepicker({
                orientation:'bottom right',
                format : 'dd-mm-yyyy',
            });
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
                                        text: item.id + " - " + item.name ,
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
                                url: "{{ route('admin.products.update',$data->id) }}",
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
            var add_property = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('add_property'),
                    {
                        fields: {

                            pro_ar_name: {
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

                            pro_en_name: {
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
                $('#property_save').on('click', function (e) {
                    e.preventDefault();

                    validation.validate().then(function(status) {
                        $("#property_save").click(function(){
                            $("#property_save").addClass("spinner  spinner-right spinner-sm spinner-ligh");
                            document.getElementById("property_save").disabled = true;
                        });
                        if (status == 'Valid') {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: "{{ route('admin.product_property.store',$data->id) }}",
                                data: new FormData($("#add_property_form")[0]),
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
                                        var table = $('#kt_properties_datatable').DataTable();
                                        $('input[name="additional_price"]').val('');
                                        $('input[name="main_product_property_id"]').val('');
                                        $('input[name="main_product_sub_property_id"]').val('');
                                        table.ajax.reload();

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
                    add_property();
                }
            };
        }();
        var images="{{$data->images}}";
        var KTDropzoneDemo = function () {
            // Private functions
            Dropzone.autoDiscover = false;
            var demo1 = function () {
                // file type validation
                $('#kt_dropzone_3').dropzone({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('admin.uploadProductImages',$data->id)}}", // Set the url for your upload script location
                    paramName: "image", // The name that will be used to transfer the file
                    type: 'POST',
                    maxFiles: 10,
                    maxFilesize: 10, // MB
                    parallelUploads : 10,
                    addRemoveLinks: true,
                    init: function() {
                        myDropzone = this;
                        $.each(JSON.parse(images.replace(/&quot;/g,'"')), function(key,value) {
                            var mockFile = { name: "{{$data->name}}_"+value.id,id:value.id, size: 10000000 };
                            myDropzone.emit("addedfile", mockFile);
                            myDropzone.emit("thumbnail", mockFile, value.image);
                            myDropzone.emit("complete", mockFile);
                        });
                        myDropzone.on("complete", function(file) {
                            console.log(file);
                                if(file.xhr){
                                    e = JSON.parse(file.xhr.response);
                                    file.id = e.data.id;
                                    file.name = "{{$data->name}}_"+e.data.id;
                                }
                        });
                    },

                    removedfile: function(file) {
                        id = file.id;
                        remove_url = "{{route('admin.removeImage',':id')}}"
                        remove_url = remove_url.replace(':id',id);
                        $.ajax({
                            type: 'POST',
                            url: remove_url,
                            sucess: function(data){
                                e = JSON.parse(e.xhr.response);
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
                            }
                        });
                        var _ref;
                            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    },
                    acceptedFiles: "image,.png,.jpeg,.jpg",
                    /* complete: function(file) {

                    }, */
                    success: function (e) {
                        e = JSON.parse(e.xhr.response);
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
        var KTDatatables = function () {
            var initTable1 = function () {
            var table = $('#kt_properties_datatable');

                // begin first table
                table.DataTable({
                    paging:   false,
                    ordering: false,
                    info:     false,
                    responsive: true,
                    searching: false,
                    processing: true,
                    serverSide: true,
                    "language": {
                        "url": "{{app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json':''}}"
                    },
                    "ajax": {
                        url: "{{route('admin.product_properties.load',$data->id)}}",
                        data: function (d) {
                            d.search = $("#generalSearch").val();
                        },
                    },
                    columns: [
                        {data: 'id', "className": "text-center"},
                        {data: 'property', "className": "text-center", orderable: false,},
                        {data: 'sub_property', "className": "text-center", orderable: false,},
                        {data: 'other_values', "className": "text-center", orderable: false,},
                        {data: 'additional_price', "className": "text-center", orderable: false,},
                        {data: 'actions', "className": "text-center", responsivePriority: -1, orderable: false,},
                    ],
                    columnDefs: [
                        {
                            targets: -1,

                            render: function (data, type, full, meta) {
                                var x =  '<button type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-danger btn-elevate btn-pill btn-elevate-air la la-window-close fa-lg" id="delete_btn" title="{{admin('Delete')}}"></button>';
                                return x;

                            },
                        },

                    ],
                });


                function throttle(f, delay) {
                    var timer = null;
                    return function () {
                        var context = this, args = arguments;
                        clearTimeout(timer);
                        timer = window.setTimeout(function () {
                                f.apply(context, args);
                            },
                            delay || 500);
                    };
                }

                $('#generalSearch').keyup(throttle(function () {
                    // do the search if criteria is met
                    table.DataTable().draw(true);
                }));

            };
            return {

                //main function to initiate the module
                init: function () {
                    initTable1();
                },

            };
        }();
        jQuery(document).ready(function() {
            KTFormControls.init();
            KTDropzoneDemo.init();
            KTDatatables.init();
        });

        $('#kt_properties_datatable').on('click', 'td button', function (event) {
            var table = $('#kt_properties_datatable').DataTable();
            var data = table.row($(this).parents('tr')).data();
            if (event.target.id == "delete_btn") {
                Swal.fire({
                    title: "{{admin('Are you sure !!')}}",
                    text: "{{admin('Are you want to delete this item ??')}}",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonText: "{{admin('Sure')}}",
                    cancelButtonText: "{{admin('Cancel')}}",

                }).then(function (result) {
                    if (result.value === true) {
                        swal.close();
                        removeTableRow(data['id'], swal);
                    }
                })

            }
        });

        function removeTableRow(id, swal) {
            var table = $('#kt_properties_datatable').DataTable();
            $.ajax({
                url: "/admintz/products_properties/product_property/delete",
                type: "post",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function () {
                    swal.fire("{{admin('Success Operation.')}}", "{{admin('Delete is happened.')}}", "success");
                    table.ajax.reload();
                },
                error: function (err) {
                    swal.fire("{{admin('Wrong Operation !')}}", "{{admin('Delete is not happened !')}}", "error");
                    table.ajax.reload();
                }
            });
        }

    </script>
    <script>

        $('#property_id').on('change',function(){
            var has_property = $('#property_id option:selected').attr('data-has-properties');
            var id = $('#property_id option:selected').val();
            if(id == 1){
                if($('#color_picker').hasClass('d-none')){
                    $('#color_picker').removeClass('d-none')
                }
                if(!$('#p_sub_properties').hasClass('d-none')){
                    $('#p_sub_properties').addClass('d-none')
                }
            }else{
                feedSubProperties(null,id)
                if(!$('#color_picker').hasClass('d-none')){
                    $('#color_picker').addClass('d-none')
                }
                if(has_property){
                    if($('#p_sub_properties').hasClass('d-none')){
                        $('#p_sub_properties').removeClass('d-none')
                    }
                }else{
                    if(!$('#p_sub_properties').hasClass('d-none')){
                        $('#p_sub_properties').addClass('d-none')
                    }
                }
            }

        });

        function feedSubProperties(myData,id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var url = "{{route('admin.loadSubProperties',':id')}}",
                url = url.replace(':id',id);
                $('#sub_properties').select2({
                    placeholder: '{{admin('Choose')}}',
                    allowClear: true,
                    ajax: {
                        url: url,
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
                                        text: item.name,
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
    </script>
@endsection
