@extends('store.layout.index')


@section('content')


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">

                        @foreach($categoryData as $categoryName)
                            <h2>{{ $categoryName->en_name ?? 'collection' }}</h2>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/store/index') }}">Home</a></li>

                            @foreach($categoryData as $categoryName)
                            <li class="breadcrumb-item active" aria-current="page">{{ $categoryName->en_name ?? '' }}</li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
{{--                        <div class="collection-filter-block">--}}
{{--                            <!-- brand filter start -->--}}
{{--                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"--}}
{{--                                                                                             aria-hidden="true"></i> back</span></div>--}}
{{--                            <div class="collection-collapse-block open">--}}
{{--                                <h3 class="collapse-block-title">brand</h3>--}}
{{--                                <div class="collection-collapse-block-content">--}}
{{--                                    <div class="collection-brand-filter">--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="zara">--}}
{{--                                            <label class="custom-control-label" for="zara">zara</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="vera-moda">--}}
{{--                                            <label class="custom-control-label" for="vera-moda">vera-moda</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="forever-21">--}}
{{--                                            <label class="custom-control-label" for="forever-21">forever-21</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="roadster">--}}
{{--                                            <label class="custom-control-label" for="roadster">roadster</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="only">--}}
{{--                                            <label class="custom-control-label" for="only">only</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- color filter start here -->--}}
{{--                            <div class="collection-collapse-block open">--}}
{{--                                <h3 class="collapse-block-title">colors</h3>--}}
{{--                                <div class="collection-collapse-block-content">--}}
{{--                                    <div class="color-selector">--}}
{{--                                        <ul>--}}
{{--                                            <li class="color-1 active"></li>--}}
{{--                                            <li class="color-2"></li>--}}
{{--                                            <li class="color-3"></li>--}}
{{--                                            <li class="color-4"></li>--}}
{{--                                            <li class="color-5"></li>--}}
{{--                                            <li class="color-6"></li>--}}
{{--                                            <li class="color-7"></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- size filter start here -->--}}
{{--                            <div class="collection-collapse-block border-0 open">--}}
{{--                                <h3 class="collapse-block-title">size</h3>--}}
{{--                                <div class="collection-collapse-block-content">--}}
{{--                                    <div class="collection-brand-filter">--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="hundred">--}}
{{--                                            <label class="custom-control-label" for="hundred">s</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="twohundred">--}}
{{--                                            <label class="custom-control-label" for="twohundred">m</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="threehundred">--}}
{{--                                            <label class="custom-control-label" for="threehundred">l</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="custom-control custom-checkbox collection-filter-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="fourhundred">--}}
{{--                                            <label class="custom-control-label" for="fourhundred">xl</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- price filter start here -->--}}
{{--                            <div class="collection-collapse-block border-0 open">--}}
{{--                                <h3 class="collapse-block-title">price</h3>--}}
{{--                                <div class="collection-collapse-block-content">--}}
{{--                                    <div class="wrapper mt-3">--}}
{{--                                        <div class="range-slider">--}}
{{--                                            <input type="text" class="js-range-slider" value="" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card">
                            <h5 class="title-border">new product</h5>

                            <div class="offer-slider slide-1">
                                @foreach($main_products as $productData)
                                    @foreach($productData as $product)
                                <div>
                                    <div class="media">
                                        <a href="{{ url('/store/product/'.$product->id) }}">
                                            <img class="img-fluid blur-up lazyload" style="width: 200px ; height: 150px;" src="{{ $product->cover }}" alt=""></a>
                                        <div class="media-body align-self-center">
{{--                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>--}}
                                            <a href="{{ url('/store/product/'.$product->id) }}">
                                                <h6>{{ $product->en_name }}</h6>
                                            </a>
                                            <h4>${{ $product->price }}</h4>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    @endforeach
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                        <!-- side-bar banner start here -->
                        <div class="collection-sidebar-banner">
                            @foreach($categoryData as $categoryName)
                                @if($categoryName->image != '')
                            <a><img src="{{ $categoryName->image }}" class="img-fluid blur-up lazyload" alt=""></a>
                                @endif
                            @endforeach
                        </div>
                        <!-- side-bar banner end here -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                         @foreach($categoryData as $categoryName)
                                @if($categoryName->image != '')
                                        <a><img src="{{ $categoryName->image }}" style="width: 100%;height: 300px;" class="img-fluid blur-up lazyload" alt=""></a>
                                            @endif
                                                <div class="top-banner-content small-section">
                                            <h4>{{ $categoryName->en_name }}</h4>
                                            </div>

                            @endforeach
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                                                                           aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
{{--                                                            {{ dd($productsForCategory->items()) }}--}}

                                                            <h5>Showing Products 1- {!! $productsForCategory->total() !!} of {!! $productsForCategory->lastPage() !!}  Result</h5>
                                                        </div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="{{url(webaAssets('store'))}}/images/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                                <li><img src="{{url(webaAssets('store'))}}/images/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                                <li><img src="{{url(webaAssets('store'))}}/images/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                                <li><img src="{{url(webaAssets('store'))}}/images/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
{{--                                                        <div class="product-page-per-view">--}}
{{--                                                            <select>--}}
{{--                                                                <option value="High to low">24 Products Par Page--}}
{{--                                                                </option>--}}
{{--                                                                <option value="Low to High">50 Products Par Page--}}
{{--                                                                </option>--}}
{{--                                                                <option value="Low to High">100 Products Par Page--}}
{{--                                                                </option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="product-page-filter">--}}
{{--                                                            <select>--}}
{{--                                                                <option value="High to low">Sorting items</option>--}}
{{--                                                                <option value="Low to High">50 Products</option>--}}
{{--                                                                <option value="Low to High">100 Products</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">
                                                @foreach($productsForCategory as $productForCategory)
                                                <div class="col-xl-3 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="{{ url('/store/product/'.$productForCategory->id) }}">
                                                                    <img src="{{ $productForCategory->cover }}" class="img-fluid blur-up lazyload bg-img" alt="">
                                                                </a>
                                                            </div>
{{--                                                            <div class="back">--}}
{{--                                                                <a href="#"><img src="{{url(webaAssets('store'))}}/images/pro3/2.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>--}}
{{--                                                            </div>--}}
                                                            <div class="cart-info cart-wrap" style="background-color: #000000">
{{--                                                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i--}}
{{--                                                                        class="ti-shopping-cart"></i></button>--}}
                                                                <a href="{{ url('store/add-to-cart/'.$productForCategory->id) }}"
                                                                   title="Add to cart" aria-hidden="true"><i class="ti-shopping-cart"></i>
                                                                </a>

{{--                                                                <a href="javascript:void(0)" title="Add to Wishlist"><i--}}
{{--                                                                        class="ti-heart" aria-hidden="true"></i></a>--}}
{{--                                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i--}}
{{--                                                                        class="ti-search" aria-hidden="true"></i></a> --}}
{{--                                                                <a href="compare.html" title="Compare"><i--}}
{{--                                                                        class="ti-reload" aria-hidden="true"></i></a>--}}
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
{{--                                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                            </div>--}}
                                                            <a href="{{ url('/store/product/'.$productForCategory->id) }}">
                                                                <h6>{{ $productForCategory->en_name }}</h6>
                                                            </a>
                                                            <p>{{ $productForCategory->en_description }}
                                                            </p>
                                                            <h4>${{ $productForCategory->price }}</h4>
{{--                                                            <ul class="color-variant">--}}
{{--                                                                <li class="bg-light0"></li>--}}
{{--                                                                <li class="bg-light1"></li>--}}
{{--                                                                <li class="bg-light2"></li>--}}
{{--                                                            </ul>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
{{--                                                        <nav aria-label="Page navigation">--}}
{{--                                                            <ul class="pagination">--}}
{{--                                                                <li class="page-item active"><a class="page-link" href="#">{!! $productsForCategory->links() !!}</a></li>--}}
{{--                                                            </ul>--}}
{{--                                                        </nav>--}}
                                                        <ul class="pagination right-align m-t-15">
                                                            <li class="page-item" style="color: white">
                                                                {!! $productsForCategory->links() !!}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5>Showing Products 1- {!! $productsForCategory->total() !!} of {!! $productsForCategory->lastPage() !!}  Result</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->


    <!-- Quick-view modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img"><img src="../assets/images/pro3/1.jpg" alt="" class="img-fluid blur-up lazyload"></div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2>Women Pink Shirt</h2>
                                <h3>$32.96</h3>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="border-product">
                                    <h6 class="product-title">product details</h6>
                                    <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">
                                        <ul>
                                            <li class="active"><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                                                                           class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                        class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button"
                                                                                                                                                                      class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                        class="ti-angle-right"></i></button></span></div>
                                    </div>
                                </div>
                                <div class="product-buttons"><a href="#" class="btn btn-solid">add to cart</a> <a href="#" class="btn btn-solid">view detail</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick-view modal popup end-->


    <!-- theme setting -->
    <a href="javascript:void(0)" onclick="openSetting()">
        <div class="setting-sidebar" id="setting-icon">
            <div>
                <i class="fa fa-cog" aria-hidden="true"></i>
            </div>
        </div>
    </a>
    <div id="setting_box" class="setting-box">
        <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
        <div class="setting_box_body">
            <div onclick="closeSetting()">
                <div class="sidebar-back text-left"><i class="fa fa-angle-left pr-2" aria-hidden="true"></i> Back</div>
            </div>
            <div class="setting-body">
                <div class="setting-title">
                    <h4>layout</h4>
                </div>
                <div class="setting-contant">
                    <div class="row demo-section">
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo1"></div>
                                <div class="demo-text">
                                    <h4>Fashion</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('index.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo43">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>game</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('game.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo44">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>gym</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('gym-product.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo45">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>tools</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('tools.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo46">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>marijuana</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('marijuana.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo47">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>metro</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('metro.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo48">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>pets</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('pets.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo49">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>video slider</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('video-slider.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo50">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>left menu</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('left_sidebar-demo.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo51">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>jewellery</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('jewellery.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo2"></div>
                                <div class="demo-text">
                                    <h4>Fashion</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('fashion-2.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo3"></div>
                                <div class="demo-text">
                                    <h4>Fashion</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('fashion-3.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo4"></div>
                                <div class="demo-text">
                                    <h4>Shoes</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('shoes.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo5"></div>
                                <div class="demo-text">
                                    <h4>Bags</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('bags.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo6"></div>
                                <div class="demo-text">
                                    <h4>Watch</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('watch.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo7"></div>
                                <div class="demo-text">
                                    <h4>Kids</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('kids.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo8"></div>
                                <div class="demo-text">
                                    <h4>Flower</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('flower.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo9"></div>
                                <div class="demo-text">
                                    <h4>Nursery</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('nursery.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo10"></div>
                                <div class="demo-text">
                                    <h4>Vegetables</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('vegetables.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo11"></div>
                                <div class="demo-text">
                                    <h4>Beauty</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('beauty.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo12"></div>
                                <div class="demo-text">
                                    <h4>Instagram Shop</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('instagram-shop.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects effect-2">
                            <div class="set-position">
                                <div class="layout-container demo13"></div>
                                <div class="demo-text">
                                    <h4>Lookbook</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('lookbook-demo.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo14"></div>
                                <div class="demo-text">
                                    <h4>Light</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('light.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo15"></div>
                                <div class="demo-text">
                                    <h4>Full Page</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('full-page.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo16"></div>
                                <div class="demo-text">
                                    <h4>Electronic-1</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('electronic-1.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo17"></div>
                                <div class="demo-text">
                                    <h4>Electronic-2</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('electronic-2.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects effect-2">
                            <div class="set-position">
                                <div class="layout-container demo18"></div>
                                <div class="demo-text">
                                    <h4>Video</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('video.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo19"></div>
                                <div class="demo-text">
                                    <h4>Goggles</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('goggles.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo20"></div>
                                <div class="demo-text">
                                    <h4>Parallax</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('parallax.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo21"></div>
                                <div class="demo-text">
                                    <h4>Furniture</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('furniture.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-title">
                    <h4>shop</h4>
                </div>
                <div class="setting-contant">
                    <div class="row demo-section">
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo22"></div>
                                <div class="demo-text">
                                    <h4>left sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo24"></div>
                                <div class="demo-text">
                                    <h4>right sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(right).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo23"></div>
                                <div class="demo-text">
                                    <h4>no sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(no-sidebar).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo25"></div>
                                <div class="demo-text">
                                    <h4>popup</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(sidebar-popup).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo52">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>metro</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(metro).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo53">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>full width</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(full-width).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo26"></div>
                                <div class="demo-text">
                                    <h4>infinite scroll</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(infinite-scroll).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo54"></div>
                                <div class="demo-text">
                                    <h4>three grid</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(3-grid).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo55"></div>
                                <div class="demo-text">
                                    <h4>six grid</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(6-grid).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo56"></div>
                                <div class="demo-text">
                                    <h4>list view</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(list-view).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-title">
                    <h4>product</h4>
                </div>
                <div class="setting-contant">
                    <div class="row demo-section">
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo40">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>four image </h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(4-image).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo33"></div>
                                <div class="demo-text">
                                    <h4>left sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo36"></div>
                                <div class="demo-text">
                                    <h4>right sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(right-sidebar).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo34"></div>
                                <div class="demo-text">
                                    <h4>no sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(no-sidebar).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo41">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>bundle</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(bundle).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo42">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>image swatch</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(image-swatch).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo32"></div>
                                <div class="demo-text">
                                    <h4>left image</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(left-image).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo35"></div>
                                <div class="demo-text">
                                    <h4>right image</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(right-image).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo31">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>image outside</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(image-outside).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo27"></div>
                                <div class="demo-text">
                                    <h4>3-col left</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(3-col-left).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo28"></div>
                                <div class="demo-text">
                                    <h4>3-col right</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(3-col-right).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo29"></div>
                                <div class="demo-text">
                                    <h4>3-col bottom</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(3-column).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo37"></div>
                                <div class="demo-text">
                                    <h4>sticky</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(sticky).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo30"></div>
                                <div class="demo-text">
                                    <h4>accordian</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(accordian).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo38"></div>
                                <div class="demo-text">
                                    <h4>vertical tab</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(vertical-tab).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-title">
                    <h4>color picker</h4>
                </div>
                <div class="setting-contant">
                    <ul class="color-box">
                        <li>
                            <input id="ColorPicker1" type="color" value="#ff4c3b" name="Background">
                            <span>theme deafult color</span>
                        </li>
                    </ul>
                </div>
                <div class="setting-title">
                    <h4>RTL</h4>
                </div>
                <div class="setting-contant">
                    <ul class="setting_buttons">
                        <li class="active" id="ltr_btn"><a href="javascript:void(0)" class="btn setting_btn">LTR</a>
                        </li>
                        <li id="rtl_btn"><a href="javascript:void(0)" class="btn setting_btn">RTL</a></li>
                    </ul>
                </div>
                <div class="buy_btn">
                    <a href="https://themeforest.net/item/multikart-responsive-ecommerce-html-template/22809967?s_rank=1" target="_blank" class="btn btn-block purchase_btn"><i class="fa fa-shopping-cart"
                                                                                                                                                                                aria-hidden="true"></i> purchase Multikart now!</a>
                    <a href="https://themeforest.net/item/multikart-responsive-angular-ecommerce-template/22905358?s_rank=3" target="_blank" class="btn btn-block purchase_btn"><img src="../assets/images/icon/angular.png" alt="" class="img-fluid"> Multikart Angular</a>
                    <a href="https://themeforest.net/item/multikart-responsive-react-ecommerce-template/23067773?s_rank=2" target="_blank" class="btn btn-block purchase_btn"><img src="../assets/images/icon/react.png" alt="" class="img-fluid"> Multikart React</a>
                    <a href="https://themeforest.net/item/multikart-multipurpose-shopify-sections-theme/23093831?s_rank=1" target="_blank" class="btn btn-block purchase_btn"><img src="../assets/images/icon/shopify.png" alt="" class="img-fluid"> Multikart Shopify</a>
                </div>
            </div>
        </div>
    </div>
    <!-- theme setting -->




@endsection

@section('js')
    <script src="{{url(webaAssets('store'))}}/js/price-range.js"></script>
@endsection
