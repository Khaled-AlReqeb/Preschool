@extends('admin.layout.master')
@section('pageTitle')
    {{admin('Role Details')}}
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
                                href="{{route('admin.settings.roles.index')}}">{{admin('Roles')}}</a>
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
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">{{admin('Roles')}}</h3>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="m-5">
                                    <input type="checkbox" id="checkAll">
                                    <label for="">{{admin('Check All')}}</label>
                                </div>
                                <form class="form" action="{{ route('admin.settings.roles.update_role', $id)}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                @foreach($role_details as $item)
                                                    <div class="col-md-3">
                                                        <input name="{{$item->id}}" type="checkbox" @if( in_array($item->id , $role_permissions) )checked @endif >
                                                        <label for="">{{$item->name}}</label>
                                                    </div>
                                                @endforeach
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-lg-9 col-xl-9">
                                                    <button type="submit" class="btn btn-success">{{ admin('update') }}</button>&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
            <!--end::Container-->
        <!--end::Entry-->
    </div>
@endsection
@section('scripts')
<script>
 $('#checkAll').click(function () {    
     $('input:checkbox').prop('checked', this.checked);    
 });
</script>
@endsection
