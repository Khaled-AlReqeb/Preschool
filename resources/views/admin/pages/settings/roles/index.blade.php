@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Roles')}}
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
                                 href="{{route('admin.settings.roles.index')}}">{{admin('Roles')}}</a>
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
												<i class="fa fa-tags"></i>
											</span>
                            <h3 class="card-label">{{admin('Roles')}}</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{route('admin.settings.roles.create')}}"
                               class="btn btn-primary font-weight-bolder">
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
											</span>{{admin('New Record')}}</a>
                            <!--end::Button-->
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
                            @foreach($data as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a  href="{{route('admin.settings.roles.edit',$role->id)}}" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-success btn-elevate btn-pill btn-elevate-air la la-edit fa-lg" id="edit_btn" title="{{admin('Edit')}}"></a>
                                        <a type="submit"href="{{route('admin.settings.roles.show',$role->id)}}" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-info btn-elevate btn-pill btn-elevate-air la la-eye fa-lg" id="details_btn" title="{{admin('View')}}"></a>
                                        <button type="submit" style="margin:1px;" class="btn btn-sm btn-icon btn-icon-md btn-danger btn-elevate btn-pill btn-elevate-air la la-window-close fa-lg delete_btn" data-roleId="{{$role->id}}"  title="{{admin('Delete')}}"></button>
                                    </td>
                                </tr>
                            @endforeach
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


        $('.delete_btn').on('click', function (event) {
            _this = this;
            var id = $(this).attr('data-roleId');
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
                    removeTableRow(id, _this,swal);
                }
            })
        });
        function removeTableRow(id, el,swal) {
            $.ajax({
                url: "/admintz/settings/roles/delete",
                type: "post",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                success: function () {
                    swal.fire("{{admin('Success Operation.')}}", "{{admin('Delete is happened.')}}", "success");
                    console.log(el);
                    $(el).parent().parent().remove();
                },
                error: function (err) {
                    swal.fire("{{admin('Wrong Operation !')}}", "{{admin('Delete is not happened !')}}", "error");
                }
            });
        }



    </script>

@endsection
