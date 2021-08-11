@extends('store.layout.index')


@section('content')



    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>product</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/store/index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            @foreach($product->images as $image)
                                <div><img src="{{ $image->image }}" alt=""
                                          class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    @foreach($product->images as $image)
                                    <div><img src="{{ $image->image }}" alt=""
                                              class="img-fluid blur-up lazyload"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{ $product->en_name }}</h2>
{{--                            <h4><del>$459.00</del><span>55% off</span></h4>--}}
                            <h3>${{ $product->price }}</h3>


{{--                            <ul class="image-swatch">--}}
{{--                                @foreach($product->images as $image)--}}
{{--                                <li class="lazyload"><a href="#"><img src="{{ $image->image }}"--}}
{{--                                                                    alt="" class="img-fluid blur-up lazyload"></a></li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
                            <div class="product-buttons">
                                <a href="{{ url('store/add-to-cart/'.$product->id) }}"
                                   class="btn btn-solid">add to cart</a>
{{--                                <a href="#"--}}
{{--                                   data-toggle="modal" data-target="#addtocart"--}}
{{--                                   class="btn btn-solid">add to cart</a>--}}
                                <form action="{{ route('cart.order.store') }}" style="display:inline;" method="post" enctype="multipart/form-data">
                                    @csrf
                                <button type="submit" class="btn btn-solid">buy now</button>
                                </form>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>{{ $product->en_description}}</p>
                            </div>
{{--                            <div class="border-product">--}}
{{--                                <h6 class="product-title">share it</h6>--}}
{{--                                <div class="product-icon">--}}
{{--                                    <ul class="product-social">--}}
{{--                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                    <form class="d-inline-block">--}}
{{--                                        <button class="wishlist-btn"><i class="fa fa-heart"></i><span--}}
{{--                                                class="title-font">Add To WishList</span></button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="border-product">--}}
{{--                                <h6 class="product-title">Frequently bought together</h6>--}}
{{--                                <div class="bundle">--}}
{{--                                    <div class="bundle_img">--}}
{{--                                        <div class="img-box">--}}
{{--                                            <a href="#"><img src="{{url(webaAssets('store'))}}/images/fashion/pro/001.jpg" alt=""--}}
{{--                                                             class="img-fluid blur-up lazyload"></a>--}}
{{--                                        </div>--}}
{{--                                        <span class="plus">+</span>--}}
{{--                                        <div class="img-box">--}}
{{--                                            <a href="#"><img src="{{url(webaAssets('store'))}}/images/fashion/pro/skirt.jpg" alt=""--}}
{{--                                                             class="img-fluid blur-up lazyload"></a>--}}
{{--                                        </div>--}}
{{--                                        <span class="plus">+</span>--}}
{{--                                        <div class="img-box">--}}
{{--                                            <a href="#"><img src="{{url(webaAssets('store'))}}/images/fashion/pro/shoes.jpg" alt=""--}}
{{--                                                             class="img-fluid blur-up lazyload"></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="bundle_detail">--}}
{{--                                        <div class="theme_checkbox">--}}
{{--                                            <label>this product: WOMEN PINK SHIRT <span class="price_product">$55</span>--}}
{{--                                                <input type="checkbox" checked="checked">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                            <label>black long skirt <span class="price_product">$20</span>--}}
{{--                                                <input type="checkbox" checked="checked">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                            <label>women heeled boots <span class="price_product">$15</span>--}}
{{--                                                <input type="checkbox" checked="checked">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                            <a href="#" class="btn btn-solid btn-xs">buy this bundle</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- product-tab starts -->
{{--    <section class="tab-product m-0">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12 col-lg-12">--}}
{{--                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">--}}
{{--                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab"--}}
{{--                                                href="#top-home" role="tab" aria-selected="true">Description</a>--}}
{{--                            <div class="material-border"></div>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab"--}}
{{--                                                href="#top-profile" role="tab" aria-selected="false">Details</a>--}}
{{--                            <div class="material-border"></div>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab"--}}
{{--                                                href="#top-contact" role="tab" aria-selected="false">Video</a>--}}
{{--                            <div class="material-border"></div>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab"--}}
{{--                                                href="#top-review" role="tab" aria-selected="false">Write Review</a>--}}
{{--                            <div class="material-border"></div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <div class="tab-content nav-material" id="top-tabContent">--}}
{{--                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"--}}
{{--                             aria-labelledby="top-home-tab">--}}
{{--                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum--}}
{{--                                has been the industry's standard dummy text ever since the 1500s, when an unknown--}}
{{--                                printer took a galley of type and scrambled it to make a type specimen book. It has--}}
{{--                                survived not only five centuries, but also the leap into electronic typesetting,--}}
{{--                                remaining essentially unchanged. It was popularised in the 1960s with the release of--}}
{{--                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop--}}
{{--                                publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum--}}
{{--                                is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the--}}
{{--                                industry's standard dummy text ever since the 1500s, when an unknown printer took a--}}
{{--                                galley of type and scrambled it to make a type specimen book. It has survived not only--}}
{{--                                five centuries, but also the leap into electronic typesetting, remaining essentially--}}
{{--                                unchanged. It was popularised in the 1960s with the release of Letraset sheets--}}
{{--                                containing Lorem Ipsum passages, and more recently with desktop publishing software like--}}
{{--                                Aldus PageMaker including versions of Lorem Ipsum.</p>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">--}}
{{--                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum--}}
{{--                                has been the industry's standard dummy text ever since the 1500s, when an unknown--}}
{{--                                printer took a galley of type and scrambled it to make a type specimen book. It has--}}
{{--                                survived not only five centuries, but also the leap into electronic typesetting,--}}
{{--                                remaining essentially unchanged. It was popularised in the 1960s with the release of--}}
{{--                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop--}}
{{--                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>--}}
{{--                            <div class="single-product-tables">--}}
{{--                                <table>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Febric</td>--}}
{{--                                        <td>Chiffon</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Color</td>--}}
{{--                                        <td>Red</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Material</td>--}}
{{--                                        <td>Crepe printed</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <table>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Length</td>--}}
{{--                                        <td>50 Inches</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Size</td>--}}
{{--                                        <td>S, M, L .XXL</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">--}}
{{--                            <div class="mt-4 text-center">--}}
{{--                                <iframe width="560" height="315" src="https://www.youtube.com/embed/BUWzX78Ye_8"--}}
{{--                                        allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">--}}
{{--                            <form class="theme-form">--}}
{{--                                <div class="form-row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="media">--}}
{{--                                            <label>Rating</label>--}}
{{--                                            <div class="media-body ml-3">--}}
{{--                                                <div class="rating three-star"><i class="fa fa-star"></i> <i--}}
{{--                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i--}}
{{--                                                        class="fa fa-star"></i> <i class="fa fa-star"></i></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label for="name">Name</label>--}}
{{--                                        <input type="text" class="form-control" id="name" placeholder="Enter Your name"--}}
{{--                                               required>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label for="email">Email</label>--}}
{{--                                        <input type="text" class="form-control" id="email" placeholder="Email" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="review">Review Title</label>--}}
{{--                                        <input type="text" class="form-control" id="review"--}}
{{--                                               placeholder="Enter your Review Subjects" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="review">Review Title</label>--}}
{{--                                        <textarea class="form-control" placeholder="Wrire Your Testimonial Here"--}}
{{--                                                  id="exampleFormControlTextarea1" rows="6"></textarea>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <button class="btn btn-solid" type="submit">Submit YOur Review</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- product-tab ends -->


    <!-- product section start -->
    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>related products</h2>
                </div>
            </div>
            <div class="row search-product">
                @foreach($products as $product)
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="{{ url('/store/product/'.$product->id) }}"><img src="{{ $product->cover }}"
                                                 class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap" style="background-color: #000000">
                                {{--                                                <button data-toggle="modal" data-target="#addtocart"--}}
                                {{--                                                        title="Add to cart"><i class="ti-shopping-cart"></i>--}}
                                {{--                                                </button>--}}
                                <a href="{{ url('store/add-to-cart/'.$product->id) }}"
                                   title="Add to cart" aria-hidden="true"><i class="ti-shopping-cart"></i>
                                </a>
{{--                                <a href="javascript:void(0)" title="Add to Wishlist"><i--}}
{{--                                        class="ti-heart" aria-hidden="true"></i></a>--}}
{{--                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">--}}
{{--                                    <i class="ti-search" aria-hidden="true"></i></a>--}}
{{--                                <a  href="compare.html" title="Compare">--}}
{{--                                    <i class="ti-reload"  aria-hidden="true"></i></a>--}}
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                            <a href="{{ url('/store/product/'.$product->id) }}">
                                <h6>{{ $product->en_name }}</h6>
                            </a>
                            <h4>${{ $product->price }}</h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- product section end -->

@endsection

@section('js')
    <script src="{{url(webaAssets('store'))}}/js/jquery.elevatezoom.js"></script>
@endsection
