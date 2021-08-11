
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand  flex-column-auto" id="kt_brand" style="background: rgba(0, 0, 0, 0) linear-gradient(to right, {{app('pannel_main_color')}}, {{app('pannel_secondary_color')}} ) repeat scroll 0% 0%;">
        <!--begin::Logo-->
        <div class="brand-logo">
            <a href="{{route('admin.home')}}">
                <center>
                <img alt="Logo" src="{{asset('adminAssets/media/logos/logo-white.png')}}" style="width: 30%;height: 80%">
                </center>
            </a>
        </div
{{--        <a href="{{route('admin.home')}}" class="brand-logo"  >--}}
{{--            <img alt="Logo" src="{{asset('adminAssets/media/logos/logo-blue.png')}}" width="92" height="12"/>--}}
{{--        </a>--}}
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
										<path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
									</g>
								</svg>
                                <!--end::Svg Icon-->
							</span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
             data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item  {{ Request::is('admintz') || Request::is('admintz/home')? 'menu-item-active' : '' }} " aria-haspopup="true">
                    <a href="{{route('admin.home')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
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
                        <span class="menu-text">{{admin('Home')}}</span>
                    </a>
                </li>
                <li class="menu-section">
                    <h4 class="menu-text">{{admin('Menu')}}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                @if(Auth::user()->can('country-view'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'countries' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover">
                    <a href="{{route('admin.countries.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fa fa-flag"> </i>
                        </span>
                        <span class="menu-text">{{admin('Countries ')}}</span>
                        {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('city-view'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'cities' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover">
                    <a href="{{route('admin.cities.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fa fa-city"> </i>
                        </span>
                        <span class="menu-text">{{admin('Cities ')}}</span>
                        {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('currency-view'))
                <li class="menu-item {{ Request::segment(3) == 'currencies' ?  'menu-item-active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{route('admin.settings.currencies.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Spam.svg-->
                            <i class="fa fa-money-bill-wave-alt"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{admin('Currencies')}}</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('page-view'))
                <li class="menu-item {{ Request::segment(3) == 'static_pages' ?  'menu-item-active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{route('admin.settings.static_pages.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Spam.svg-->
                           <!--begin::Svg Icon | path:assets/media/svg/icons/Code/CMD.svg-->
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
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{admin('Pages')}}</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('user-view') ||  Auth::user()->can('store-owner-view') || Auth::user()->can('root-user'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'users' ?  'menu-item-active  menu-item-open' : '' }}"
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path
                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path
                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                                                            </span>
                        <span class="menu-text">{{admin('Users')}}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            @if(Auth::user()->can('user-view'))
                            <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                <a href="{{route('admin.users.index')}}" class="menu-link menu-toggle">
                                    <i class="menu-bullet menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">{{admin('Clients')}}</span>
                                </a>
                            </li>
                            @endif
                            @if(app('is_multi_store') && (Auth::user()->can('store-owner-view') || Auth::user()->can('root-user')))
                            <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                    data-menu-toggle="hover">
                                <a href="{{route('admin.store_owners.index')}}" class="menu-link menu-toggle">
                                    <i class="menu-bullet menu-bullet-line">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">{{admin('Store Owners')}}</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if(Auth::user()->can('store-view') &&  app('is_multi_store'))
                <li class="menu-item {{ Request::segment(2) == 'stores' ?  'menu-item-active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{route('admin.stores.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="fa fa-store"></i>
                        </span>
                        <span class="menu-text">{{admin('Stores')}}</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('category-view'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'categories' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover">
                    <a href="{{route('admin.categories.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fab fa-buffer"> </i>
                        </span>
                        <span class="menu-text">{{admin('Categories ')}}</span>
                        {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('service-view'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'services' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover">
                    <a href="{{route('admin.services.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fab fa-buffer"> </i>
                        </span>
                        <span class="menu-text">{{admin('Services ')}}</span>
                        {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('brand-view'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'brands' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover">
                    <a href="{{route('admin.brands.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fa fa-tags"> </i>
                        </span>
                        <span class="menu-text">{{admin('Brands ')}}</span>
                        {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('product-view'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'products' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover">
                    <a href="{{route('admin.products.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fa fa-box-open"> </i>
                        </span>
                        <span class="menu-text">{{admin('Products')}}</span>
                        {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                    </a>
                </li>

                @endif
                @if( Auth::user()->can('attribute') )

                    <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'attributes' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover">
                        <a href="{{route('admin.attributes.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fa fa-box-open"> </i>
                        </span>
                            <span class="menu-text">{{admin('attribute')}}</span>
                            {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                        </a>
                    </li>

                @endif
                @if(Auth::user()->can('page-view'))
                    <li class="menu-item {{ Request::segment(3) == 'static_pages' ?  'menu-item-active' : '' }}"
                        aria-haspopup="true">
                        <a href="{{route('admin.settings.static_pages.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Spam.svg-->
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/CMD.svg-->
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
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                            <span class="menu-text">{{admin('Pages')}}</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->can('banner-view'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'banners' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover">
                    <a href="{{route('admin.banners.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fa fa-laptop"> </i>
                        </span>
                        <span class="menu-text">{{admin('Banners ')}}</span>
                        {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('walkthrough-view'))
                <li class="menu-item {{ Request::segment(3) == 'walkthroughs' ?  'menu-item-active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{route('admin.settings.walkthroughs.index')}}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Spam.svg-->
                                                <i class="fas fa-walking"></i>
                                                <!--end::Svg Icon-->
                                            </span>
                        <span class="menu-text">{{admin('Walkthroughs')}}</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->can('faq-view'))
                <li class="menu-item {{ Request::segment(3) == 'faqs' ?  'menu-item-active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{route('admin.settings.faqs.index')}}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Spam.svg-->
                                                <i class="fa fa-question-circle"></i>
                                                <!--end::Svg Icon-->
                                            </span>
                        <span class="menu-text">{{admin('FAQ')}}</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can('contact-view'))
                <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'adminContacts' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover">
                    <a href="{{route('admin.adminContacts.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fa fa-phone"> </i>
                        </span>
                        <span class="menu-text">{{admin('Admin Contacts ')}}</span>
                        {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                    </a>
                </li>
                @endif


                @if(Auth::user()->can('order-view'))
                    <li class="menu-item menu-item-submenu {{ Request::segment(2) == 'orders' ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover">
                        <a href="{{route('admin.orders.index')}}" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fab fa-buffer"> </i>
                        </span>
                            <span class="menu-text">{{admin('Orders ')}}</span>
                            {{--                        <i class="kt-menu__ver-arrow la la-angle-right"></i>--}}
                        </a>
                    </li>
                @endif

                {{--                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">--}}
{{--                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--										<span class="svg-icon menu-icon">--}}
{{--											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->--}}
{{--											<svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                 viewBox="0 0 24 24" version="1.1">--}}
{{--												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--													<rect x="0" y="0" width="24" height="24"/>--}}
{{--													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>--}}
{{--													<path--}}
{{--                                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"--}}
{{--                                                        fill="#000000" opacity="0.3"/>--}}
{{--												</g>--}}
{{--											</svg>--}}
{{--                                            <!--end::Svg Icon-->--}}
{{--										</span>--}}
{{--                        <span class="menu-text">Applications</span>--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                    </a>--}}
{{--                    <div class="menu-submenu">--}}
{{--                        <i class="menu-arrow"></i>--}}
{{--                        <ul class="menu-subnav">--}}
{{--                            <li class="menu-item menu-item-parent" aria-haspopup="true">--}}
{{--												<span class="menu-link">--}}
{{--													<span class="menu-text">Applications</span>--}}
{{--												</span>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item menu-item-submenu" aria-haspopup="true"--}}
{{--                                data-menu-toggle="hover">--}}
{{--                                <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                        <span></span>--}}
{{--                                    </i>--}}
{{--                                    <span class="menu-text">Users</span>--}}
{{--                                    <span class="menu-label">--}}
{{--														<span class="label label-rounded label-primary">6</span>--}}
{{--													</span>--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                </a>--}}
{{--                                <div class="menu-submenu">--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                    <ul class="menu-subnav">--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/user/list-default.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Default</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/user/list-datatable.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Datatable</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/user/list-columns-1.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Columns 1</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/user/list-columns-2.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Columns 2</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/user/add-user.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Add User</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/user/edit-user.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Edit User</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item menu-item-submenu" aria-haspopup="true"--}}
{{--                                data-menu-toggle="hover">--}}
{{--                                <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                        <span></span>--}}
{{--                                    </i>--}}
{{--                                    <span class="menu-text">Profile</span>--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                </a>--}}
{{--                                <div class="menu-submenu">--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                    <ul class="menu-subnav">--}}
{{--                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"--}}
{{--                                            data-menu-toggle="hover">--}}
{{--                                            <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Profile 1</span>--}}
{{--                                                <i class="menu-arrow"></i>--}}
{{--                                            </a>--}}
{{--                                            <div class="menu-submenu">--}}
{{--                                                <i class="menu-arrow"></i>--}}
{{--                                                <ul class="menu-subnav">--}}
{{--                                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                                        <a href="custom/apps/profile/profile-1/overview.html"--}}
{{--                                                           class="menu-link">--}}
{{--                                                            <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                <span></span>--}}
{{--                                                            </i>--}}
{{--                                                            <span class="menu-text">Overview</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                                        <a href="custom/apps/profile/profile-1/personal-information.html"--}}
{{--                                                           class="menu-link">--}}
{{--                                                            <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                <span></span>--}}
{{--                                                            </i>--}}
{{--                                                            <span class="menu-text">Personal Information</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                                        <a href="custom/apps/profile/profile-1/account-information.html"--}}
{{--                                                           class="menu-link">--}}
{{--                                                            <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                <span></span>--}}
{{--                                                            </i>--}}
{{--                                                            <span class="menu-text">Account Information</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                                        <a href="custom/apps/profile/profile-1/change-password.html"--}}
{{--                                                           class="menu-link">--}}
{{--                                                            <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                <span></span>--}}
{{--                                                            </i>--}}
{{--                                                            <span class="menu-text">Change Password</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                                        <a href="custom/apps/profile/profile-1/email-settings.html"--}}
{{--                                                           class="menu-link">--}}
{{--                                                            <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                <span></span>--}}
{{--                                                            </i>--}}
{{--                                                            <span class="menu-text">Email Settings</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/profile/profile-2.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Profile 2</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/profile/profile-3.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Profile 3</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/profile/profile-4.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Profile 4</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item menu-item-submenu" aria-haspopup="true"--}}
{{--                                data-menu-toggle="hover">--}}
{{--                                <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                        <span></span>--}}
{{--                                    </i>--}}
{{--                                    <span class="menu-text">Contacts</span>--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                </a>--}}
{{--                                <div class="menu-submenu">--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                    <ul class="menu-subnav">--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/contacts/list-columns.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Columns</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/contacts/list-datatable.html"--}}
{{--                                               class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Datatable</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/contacts/view-contact.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">View Contact</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/contacts/add-contact.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Add Contact</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/contacts/edit-contact.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Edit Contact</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item menu-item-submenu" aria-haspopup="true"--}}
{{--                                data-menu-toggle="hover">--}}
{{--                                <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                        <span></span>--}}
{{--                                    </i>--}}
{{--                                    <span class="menu-text">Projects</span>--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                </a>--}}
{{--                                <div class="menu-submenu">--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                    <ul class="menu-subnav">--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/projects/list-columns-1.html"--}}
{{--                                               class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Columns 1</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/projects/list-columns-2.html"--}}
{{--                                               class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Columns 2</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/projects/list-columns-3.html"--}}
{{--                                               class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Columns 3</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/projects/list-columns-4.html"--}}
{{--                                               class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Columns 4</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/projects/list-datatable.html"--}}
{{--                                               class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">List - Datatable</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/projects/view-project.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">View Project</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/projects/add-project.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Add Project</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/projects/edit-project.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Edit Project</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item menu-item-submenu" aria-haspopup="true"--}}
{{--                                data-menu-toggle="hover">--}}
{{--                                <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                        <span></span>--}}
{{--                                    </i>--}}
{{--                                    <span class="menu-text">Support Center</span>--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                </a>--}}
{{--                                <div class="menu-submenu">--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                    <ul class="menu-subnav">--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/support-center/home-1.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Home 1</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/support-center/home-2.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Home 2</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/support-center/faq-1.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">FAQ 1</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/support-center/faq-2.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">FAQ 2</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/support-center/faq-3.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">FAQ 3</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/support-center/feedback.html"--}}
{{--                                               class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Feedback</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/support-center/license.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">License</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item menu-item-submenu" aria-haspopup="true"--}}
{{--                                data-menu-toggle="hover">--}}
{{--                                <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                        <span></span>--}}
{{--                                    </i>--}}
{{--                                    <span class="menu-text">Chat</span>--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                </a>--}}
{{--                                <div class="menu-submenu">--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                    <ul class="menu-subnav">--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/chat/private.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Private</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/chat/group.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Group</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/chat/popup.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Popup</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item menu-item-submenu" aria-haspopup="true"--}}
{{--                                data-menu-toggle="hover">--}}
{{--                                <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                        <span></span>--}}
{{--                                    </i>--}}
{{--                                    <span class="menu-text">Todo</span>--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                </a>--}}
{{--                                <div class="menu-submenu">--}}
{{--                                    <i class="menu-arrow"></i>--}}
{{--                                    <ul class="menu-subnav">--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/todo/tasks.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Tasks</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/todo/docs.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Docs</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                            <a href="custom/apps/todo/files.html" class="menu-link">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Files</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                <a href="custom/apps/inbox.html" class="menu-link">--}}
{{--                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                        <span></span>--}}
{{--                                    </i>--}}
{{--                                    <span class="menu-text">Inbox</span>--}}
{{--                                    <span class="menu-label">--}}
{{--														<span class="label label-danger label-inline">new</span>--}}
{{--													</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
