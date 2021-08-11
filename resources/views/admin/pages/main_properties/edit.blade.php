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
                                href="{{route('admin.main_properties.index')}}">{{admin('Main Product Properties ')}}</a>
                        </span>
                    </div>
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark" href="{{route('admin.main_properties.edit',$data->id)}}">{{$data->name}}</a>
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
                                <div class="card-body">
                                    <!--begin: Code-->
                                    <form class="form" id="edit_form">
                                        <input type="hidden" name="id"
                                            value="{{$data->id}}">
                                        <div class="form-group row">
                                            <div class="col-lg-5">
                                                <label>{{admin('Arabic Name')}}</label>
                                                <span style="color: red;"> * </span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="ar_name" value="{{$data->ar_name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="">{{admin('English Name')}}</label>
                                                <span style="color: red;"> * </span>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="en_name" value="{{$data->en_name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-1 mt-5"></div>
                                            <div class="col-lg-1 mt-5">
                                                <label class=""></label>
                                                <button  type="submit" id="save"
                                                        class="btn btn-success btn-elevate mt-3">{{admin('Save')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <a id="property_add_btn"
                                                class="btn btn-primary font-weight-bolder float-right">
                                                <span class="svg-icon svg-icon-md">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                                                            <path
                                                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                                fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>{{admin('New Record')}}
                                            </a>
                                        </div>
                                        <div class="card card-custom bg-secondary p-5 mb-2 col-lg-12" style="display:none" >
                                             <div id="sub_property_add">  
                                                <form id="sub_property_add_form">
                                                    <!--begin: Code-->
                                                    <input type="hidden" name="pro_id"
                                                        value="{{$data->id}}">
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <label>{{admin('Arabic Name')}}</label>
                                                            <span style="color: red;"> * </span>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="pro_ar_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>{{admin('English Name')}}</label>
                                                            <span style="color: red;"> * </span>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="pro_en_name">
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
                                    <table class="table table-striped table-bordered table-hover table-checkable" id="kt_sub_properties_datatable"
                                        style="margin-top: 13px !important">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{admin('Arabic Name')}}</th>
                                            <th>{{admin('English Price')}}</th>
                                            <th>{{admin('Actions')}}</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                           
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
    <script src="/adminAssets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
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
                                url: "{{ route('admin.main_properties.update',$data->id) }}",
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
                                            $(location).attr('href', '{{route('admin.main_properties.index')}}');
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
            // Private functions
            var add_sub_property = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('sub_property_add'),
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
                            console.log($("#sub_property_add_form"));
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: "{{ route('admin.main_sub_properties.store',$data->id) }}",
                                data: new FormData($("#sub_property_add_form")[0]),
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
                                        var table = $('#kt_sub_properties_datatable').DataTable();
                                        $('#sub_property_add').parent().toggle('slow');
                                        $('input[name="pro_ar_name"]').val('');
                                        $('input[name="pro_en_name"]').val('');
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
                    add_sub_property();
                }
            };
        }();
        
    
   
        var KTDatatablesExtensionButtons = function () {

            var initTable1 = function () {
               var table = $('#kt_sub_properties_datatable');

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
                    buttons: [
                        $.extend(true, {}, {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        })
                    ],

                    "ajax": {
                        url: "{{route('admin.main_sub_properties.load',$data->id)}}",
                        data: function (d) {
                            d.search = $("#generalSearch").val();
                        },
                    },
                    columns: [
                        {data: 'id', "className": "text-center"},
                        {data: 'ar_name', "className": "text-center", orderable: false,},
                        {data: 'en_name', "className": "text-center", orderable: false,},
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
                        {
                            targets: -2,
                            render: function (data, type, full, meta) {
                                var status = {
                                    active: {'title': "{{admin('Active')}}", 'class': 'label-light-success'},
                                    inactive: {'title': "{{admin('Inactive')}}", 'class': 'label-light-danger'},
                                };
                                if (typeof status[data] === 'undefined') {
                                    return data;
                                }
                                return '<span class="label label-lg font-weight-bold ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
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

                $('#export_print').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(0).trigger();

                });

                $('#export_copy').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(1).trigger();
                });

                $('#export_excel').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(2).trigger();
                });

                $('#export_csv').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(3).trigger();
                });

                $('#export_pdf').on('click', function (e) {
                    e.preventDefault();
                    table.DataTable().button(4).trigger();
                });
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
            KTDatatablesExtensionButtons.init();

        });
       
    </script>
    
    <script>

        $('#kt_sub_properties_datatable').on('click', 'td button', function (event) {
            console.log('hi');
            var table = $('#kt_sub_properties_datatable').DataTable();
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
            var table = $('#kt_sub_properties_datatable').DataTable();
            $.ajax({
                url: "/admintz/products_properties/main_sub_properties/delete",
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
      $('#property_add_btn').on('click',function(){
            $('#sub_property_add').parent().toggle('slow');
        });

    </script>

@endsection
