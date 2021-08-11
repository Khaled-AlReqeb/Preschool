@extends('admin.layout.master')
@section('pageTitle')
    {{admin('New Record')}}
@endsection
@section('styles')
    <link href="{{asset('/adminAssets/css/pages/wizard/wizard-4.'.direction('.').'css')}}"
          rel="stylesheet" type="text/css"/>
          <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
          <style>
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
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        <a class="text-dark" href="{{route('admin.home')}}">{{admin('Home')}}</a>
                    </h5>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>

                    <div class="d-flex align-items-center mt-2 mb-2 mr-5" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark"
                                 href="#">{{admin('Users')}}</a>
                        </span>
                    </div>

                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <div class="d-flex align-items-center mt-2 mb-2 mr-5" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                              <a class="text-dark"
                                 href="{{route('admin.users.index')}}">{{admin('Users')}}</a>
                        </span>
                    </div>
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                            <a class="text-dark"
                               href="{{route('admin.users.create')}}">{{admin('New Record')}}</a>
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
                <div class="card card-custom">
                    <!--begin::Card header-->
                    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path
                                                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                                            fill="#000000" fill-rule="nonzero"/>
																		<path
                                                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                                            fill="#000000" opacity="0.3"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                        <span class="nav-text font-size-lg">{{admin('Profile')}}</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1"
                                                                     class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path
                                                d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                                fill="#000000" opacity="0.3"/>
                                            <path
                                                d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                fill="#000000"/>
                                        </g>
                                    </svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                        <span class="nav-text font-size-lg">{{admin('Settings')}}</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                                            fill="#000000" opacity="0.3"/>
																		<path
                                                                            d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                                            fill="#000000" opacity="0.3"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                        <span class="nav-text font-size-lg">{{admin('Password')}}</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                        

                            </ul>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body px-0">
                        <form class="form" id="add_form">
                            <div class="tab-content">
                                <!--begin::Tab-->
                                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
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
                                                    class="col-form-label col-3 text-lg-right text-left">{{admin('Language')}}
                                                    <span style="color: red;"> * </span></label>
                                                <div class="col-9">
                                                    <select
                                                        class="form-control form-control-lg form-control-solid select2"
                                                        id="main_language"
                                                        name="main_language">
                                                        <option
                                                            value="en">{{admin('English')}}</option>
                                                        <option
                                                            value="ar" selected>{{admin('Arabic')}}</option>
                                                    </select>
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
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab-->
                                <!--begin::Tab-->
                                <div class="tab-pane show px-7" id="kt_user_edit_tab_2" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-7 my-2">
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label
                                                    class="col-form-label col-3 text-lg-right text-left">{{admin('Profile Image')}}</label>
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
                                                           type="text" name="first_name" value=""/>
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
                                                               name="email" value=""
                                                               placeholder="{{admin('Email')}}"/>
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
                                                               name="mobile" value=""/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                              <!--begin::Group-->
                                              <div class="form-group row">
                                                <label
                                                    class="col-form-label col-3 text-lg-right text-left">{{admin('Role')}}
                                                    <span style="color: red;"> * </span>
                                                </label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
																			<span class="input-group-text">
																				<i class="la la-star"></i>
																			</span>
                                                        </div>
                                                        <select type="text"
                                                               class="form-control form-control-lg form-control-solid"
                                                               name="role_id" value="">
                                                               <option value="">{{admin('Choose')}}</option>
                                                               @foreach(App\Model\Role::query()->get() as $role)
                                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                               @endforeach
                                                        </select>
                                                    </div>
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

                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab-->
                                <!--begin::Tab-->
                                <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
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
                                <!--end::Tab-->
                      
                            </div>
                            <div class="tab-pane" align="center">
                                <button type="submit" id="save"
                                        class="btn btn-success btn-elevate">{{admin('Save')}}</button>

                            </div>
                        </form>
                    </div>
                    <!--begin::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>


@endsection
@section('scripts')
    <script src="{{ asset("/adminAssets/js/pages/custom/user/edit-user.js") }}" type="text/javascript"></script>
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
      
        $('#main_language').select2({
            placeholder: "{{admin('Choose')}}"
        });
    
     
        $(document).ready(function () {
            $('input.timepicker').timepicker({
                timeFormat: 'hh:mm:ss a',
            });
            var e = document.getElementById("country_id");
            var countryId = e.value;

            feedCurrencies();
            feedCountries();
            $("#country_id").on("change", function (e) {
                e.preventDefault();
                feedPhoneCodes($(this).val());
                feedCities($(this).val());
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
            function feedCities(myData) {
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
            var add = function () {
                var validation = FormValidation.formValidation(
                    document.getElementById('add_form'),
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
                                    notEmpty: {
                                        message: "{{admin('Password is required')}}"
                                    },
                                    stringLength: {
                                        min: 6,
                                        message: "{{admin('Password at least must be 6 digits')}}"
                                    },
                                }
                            },

                            confirm_password: {
                                validators: {
                                    notEmpty: {
                                        message: "{{admin('Confirm password is required')}}"
                                    },
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
                                url: "{{ route('admin.users.store') }}",
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
                                            $(location).attr('href', '{{route('admin.users.index')}}');
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
