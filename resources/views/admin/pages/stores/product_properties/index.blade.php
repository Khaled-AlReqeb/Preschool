@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Store Product Properties')}}
@endsection
@section('styles')
    <link href="{{asset('/adminAssets/plugins/custom/datatables/datatables.bundle.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                            <a class="text-dark" href="{{route('admin.home')}}">{{admin('Home')}}</a>
                        </h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>

                        <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark"
                                 href="{{route('admin.stores.product_properties.index',$store_id)}}">{{admin('Store Product Properties ')}}</a>
                        </span>
                        </div>

                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <div class="input-icon input-icon-right">
                        <input type="text" class="form-control" placeholder="{{admin('Search')}}..."
                               id="generalSearch">
                        <span class="input-icon input-icon-right"><span>
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1"
                                                             class="kt-svg-icon">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path
                                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																<path
                                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                    fill="#000000" fill-rule="nonzero"/>
															</g>
														</svg>

                                <!--<i class="flaticon2-search-1"></i>-->
													</span></span>
                    </div>

                </div>
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
											<span class="card-icon">
												<i class="fa fa-city"></i>
											</span>
                            <h3 class="card-label">{{admin('Main Product Properties')}}</h3>
                        </div>

                    </div>

                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-striped table-bordered table-hover table-checkable " id="kt_datatable"
                               style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{admin('Name')}}</th>
                                <th>{{admin('Actions')}}</th>
                            </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
       
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid mt-5">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                                            <span class="card-icon">
                                                <i class="fa fa-city"></i>
                                            </span>
                            <h3 class="card-label">{{admin('Store Product Properties')}}</h3>
                        </div>

                    </div>

                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-striped table-bordered table-hover table-checkable " id="kt_datatable_selected"
                            style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{admin('Name')}}</th>
                                <th>{{admin('Actions')}}</th>
                            </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
                </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>


@endsection
@section('scripts')
    <script src="/adminAssets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script>
        var KTDatatablesExtensionButtons = function () {

            var initTable1 = function () {
                var table = $('#kt_datatable');

                // begin first table
                table.DataTable({

                    responsive: true,
                    searching: false,
                    processing: true,
                    serverSide: true,
                    "language": {
                        "url": "{{app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json':''}}"
                    },

                    "ajax": {
                        url: "{{route('admin.stores.unselected_main_properties_load',$store_id)}}",
                        data: function (d) {
                            d.search = $("#generalSearch").val();
                        },
                    },
                    columns: [
                        {data: 'id', "className": "text-center"},
                        {data: 'name', "className": "text-center", orderable: false,},
                        {data: 'actions', "className": "text-center", responsivePriority: -1, orderable: false,},
                    ],
                    columnDefs: [
                        {
                            targets: -1,

                            render: function (data, type, full, meta) {
                                var x =  '<button type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-success btn-elevate btn-pill btn-elevate-air flaticon-add fa-lg" id="add_btn" title="{{admin('Add')}}"></button>';
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
            var initTable2 = function () {
                var selected_table = $('#kt_datatable_selected');

                // begin first table
                selected_table.DataTable({

                    responsive: true,
                    searching: false,
                    processing: true,
                    serverSide: true,
                    "language": {
                        "url": "{{app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json':''}}"
                    },
 
                    "ajax": {
                        url: "{{route('admin.stores.selected_store_product_properties_load',$store_id)}}",
                        data: function (d) {
                            d.search = $("#generalSearch").val();
                        },
                    },
                    columns: [
                        {data: 'id', "className": "text-center"},
                        {data: 'name', "className": "text-center", orderable: false,},
                        {data: 'actions', "className": "text-center", responsivePriority: -1, orderable: false,},
                    ],
                    columnDefs: [
                        {
                            targets: -1,

                            render: function (data, type, full, meta) {
                                var x =  '<button type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-danger btn-elevate btn-pill  btn-elevate-air la la-window-close fa-lg" id="delete_btn" title="{{admin('Delete')}}"></button>';
                                return x;

                            },
                        
                        },
                        {
                            targets: -2,
                            render: function (data, type, full, meta) {
                                var status = {
                                    active: {'title': "{{admin('Active')}}", 'class': 'label-light-success'},
                                    inactive: {'title': "{{admin('InActive')}}", 'class': 'label-light-danger'},
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

            
            };
            
            return {

                //main function to initiate the module
                init: function () {
                    initTable1();
                    initTable2();
                },

            };

        }();

        jQuery(document).ready(function () {
            KTDatatablesExtensionButtons.init();
        });
    </script>
    
    <script>

        $('#kt_datatable').on('click', 'td button', function (event) {
            var table = $('#kt_datatable').DataTable();
            var data = table.row($(this).parents('tr')).data();
            if(event.target.id == "add_btn"){
                swal.fire({
                    title: "{{admin('Are you sure !!')}}",
                    text: "{{admin('Are you want to add this item ??')}}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{admin('Sure')}}",
                    cancelButtonText: "{{admin('Cancel')}}",

                }).then(function (result) {
                    if (result.value === true) {
                        swal.close();
                        addTableRaw(data['id'], swal);
                    }
                })
            }
        });
        function addTableRaw(id,swal){
            var table = $('#kt_datatable').DataTable();
            var selected_table = $('#kt_datatable_selected').DataTable();
            $.ajax({
                url: "/admintz/stores/product_properties/add/{{$store_id}}",
                type: "post",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function () {
                    swal.fire("{{admin('Success Operation.')}}", "{{admin('Disable is happened.')}}", "success");
                    table.ajax.reload();
                    selected_table.ajax.reload();

                },
                error: function (err) {
                    swal.fire("{{admin('Wrong Operation !')}}", "{{admin('Disable is not happened !')}}", "error");
                    table.ajax.reload();
                }
            });
        }


    </script>
    <script>

        $('#kt_datatable_selected').on('click', 'td button', function (event) {
            var table = $('#kt_datatable_selected').DataTable();
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
                        removePropertyTableRow(data['id'], swal);
                    }
                })

            } else if (event.target.id == "disable_btn") {
                swal.fire({
                    title: "{{admin('Are you sure !!')}}",
                    text: "{{admin('Are you want to disable this item ??')}}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{admin('Sure')}}",
                    cancelButtonText: "{{admin('Cancel')}}",

                }).then(function (result) {
                    if (result.value === true) {
                        swal.close();
                        disablePropertyTableRow(data['id'], swal);
                    }
                })
            } else if (event.target.id == "activate_btn") {
                swal.fire({
                    title: "{{admin('Are you sure !!')}}",
                    text: "{{admin('Are you want to activate this item ??')}}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{admin('Sure')}}",
                    cancelButtonText: "{{admin('Cancel')}}",

                }).then(function (result) {
                    if (result.value === true) {
                        swal.close();
                        activatePropertyTableRow(data['id'], swal);
                    }
                })

            }
        });

        function removePropertyTableRow(id, swal) {
            var selected_table = $('#kt_datatable_selected').DataTable();
            var table = $('#kt_datatable').DataTable();
            $.ajax({
                url: "/admintz/stores/product_properties/destroy",
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
                    selected_table.ajax.reload();
                }
            });
        }

        function disablePropertyTableRow(id, swal) {
            var table = $('#kt_datatable_selected').DataTable();
            console.log(id);
            $.ajax({
                url: "/admintz/stores/product_properties/disable",
                type: "post",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function () {
                    swal.fire("{{admin('Success Operation.')}}", "{{admin('Disable is happened.')}}", "success");
                    table.ajax.reload();

                },
                error: function (err) {
                    swal.fire("{{admin('Wrong Operation !')}}", "{{admin('Disable is not happened !')}}", "error");
                    table.ajax.reload();
                }
            });
        }

        function activatePropertyTableRow(id, swal) {
            var table = $('#kt_datatable_selected').DataTable();
            console.log(id);

            $.ajax({
                url: "/admintz/stores/product_properties/activate",
                type: "post",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function () {
                    swal.fire("{{admin('Success Operation.')}}", "{{admin('Activate is happened.')}}", "success");
                    table.ajax.reload();

                },
                error: function (err) {
                    swal.fire("{{admin('Wrong Operation !')}}", "{{admin('Activate is not happened !')}}", "error");
                    table.ajax.reload();
                }
            });
        }


    </script>

@endsection
