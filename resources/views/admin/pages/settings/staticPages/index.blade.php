@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Pages')}}
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
                                 href="{{route('admin.settings.static_pages.index')}}">{{admin('Pages ')}}</a>
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
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24"
                                        version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none"
                                    fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path
                                        d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                        fill="#000000"/>
                                    <path
                                        d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                        fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>											</span>
                            <h3 class="card-label">{{admin('Pages')}}</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-md">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<path
                                                                d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                fill="#000000" opacity="0.3"/>
															<path
                                                                d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                fill="#000000"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>{{admin('Export')}}</button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">{{admin('Choose an option')}}</li>
                                        <li class="navi-item">
                                            <a href="#" id="export_print" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-print"></i>
																</span>
                                                <span class="navi-text">{{admin('Print')}}</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" id="export_copy" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-copy"></i>
																</span>
                                                <span class="navi-text">{{admin('Copy')}}</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" id="export_excel" class="navi-link">
																<span class="navi-icon">
																	<i class="la la-file-excel-o"></i>
																</span>
                                                <span class="navi-text">{{admin('Excel')}}</span>
                                            </a>
                                        </li>
                                        {{--                                        <li class="navi-item">--}}
                                        {{--                                            <a href="#" id="export_csv" class="navi-link">--}}
                                        {{--																<span class="navi-icon">--}}
                                        {{--																	<i class="la la-file-text-o"></i>--}}
                                        {{--																</span>--}}
                                        {{--                                                <span class="navi-text">{{admin('CSV')}}</span>--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}
                                        {{--                                        <li class="navi-item">--}}
                                        {{--                                            <a href="#" id="export_pdf" class="navi-link">--}}
                                        {{--																<span class="navi-icon">--}}
                                        {{--																	<i class="la la-file-pdf-o"></i>--}}
                                        {{--																</span>--}}
                                        {{--                                                <span class="navi-text">{{admin('PDF')}}</span>--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                            <!--end::Dropdown-->
                      
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
                                <th>{{admin('Status')}}</th>
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
                    buttons: [
                        $.extend(true, {}, {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        }),
                        $.extend(true, {}, {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        })
                    ],

                    "ajax": {
                        url: "{{route('admin.settings.static_pages.load')}}",
                        data: function (d) {
                            d.search = $("#generalSearch").val();
                        },
                    },
                    columns: [
                        {data: 'id', "className": "text-center"},
                        {data: 'name', "className": "text-center", orderable: false,},
                        {data: 'status', "className": "text-center"},
                        {data: 'actions', "className": "text-center", responsivePriority: -1, orderable: false,},
                    ],
                    columnDefs: [
                        {
                            targets: -1,

                            render: function (data, type, full, meta) {
                                var x = '<a  href="/admintz/settings/static_pages/edit/' + full.id + '" type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-success btn-elevate btn-pill btn-elevate-air la la-edit fa-lg" id="edit_btn" title="{{admin('Edit')}}"></a>';
                                {{--x = x + '<a type="submit" href="/admintz/settings/static_pages/details/' + full.id + '"style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-info btn-elevate btn-pill btn-elevate-air la la-eye fa-lg" id="details_btn" title="{{admin('View')}}"></a>';--}}
                             
                                // x =  x + ` <span class="dropdown">
                                //      <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                //        <i class="la la-ellipsis-h"></i>
                                //      </a>
                                //      <div class="dropdown-menu dropdown-menu-right">
                                //          <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                //          <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                //          <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                //      </div>
                                //  </span>
                                // `;
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

        jQuery(document).ready(function () {
            KTDatatablesExtensionButtons.init();
        });
    </script>

    <script>

        $('#kt_datatable').on('click', 'td button', function (event) {
            console.log('hi');
            var table = $('#kt_datatable').DataTable();
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
                        disableTableRow(data['id'], swal);
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
                        activateTableRow(data['id'], swal);
                    }
                })

            }
        });

        function removeTableRow(id, swal) {
            var table = $('#kt_datatable').DataTable();
            $.ajax({
                url: "/admintz/settings/static_pages/delete",
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

        function disableTableRow(id, swal) {
            var table = $('#kt_datatable').DataTable();
            $.ajax({
                url: "/admintz/settings/static_pages/disable",
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

        function activateTableRow(id, swal) {
            var table = $('#kt_datatable').DataTable();
            $.ajax({
                url: "/admintz/settings/static_pages/activate",
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
