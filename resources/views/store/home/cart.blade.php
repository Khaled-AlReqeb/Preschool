@extends('store.layout.index')


@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>cart</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/store/index') }}">Home</a></li>
                            <li class="breadcrumb-item active">cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route('cart.order.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
{{--                        <table class="table cart-table table-responsive-xs">--}}
{{--                            <thead>--}}
{{--                            <tr class="table-head">--}}
{{--                                <th scope="col">image</th>--}}
{{--                                <th scope="col">product name</th>--}}
{{--                                <th scope="col">price</th>--}}
{{--                                <th scope="col">quantity</th>--}}
{{--                                <th scope="col">action</th>--}}
{{--                                <th scope="col">total</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}

{{--                            <?php $total = 0 ?>--}}

{{--                            @if(session('cart'))--}}
{{--                                @foreach(session('cart') as $id => $details)--}}

{{--                                    <?php $total += $details['price'] * $details['quantity'] ?>--}}

{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <a href="#"><img src="{{ $details['cover'] }}" alt="" style="width: 150px;height: 100px;"></a>--}}
{{--                                        </td>--}}
{{--                                        <td><a>{{ $details['en_name'] }}--}}
{{--                                                <input type="text" name="product_id[]" value=" {{ $details['product_id'] }}" class="form-control" />--}}
{{--                                            </a>--}}
{{--                                            <div class="mobile-cart-content row">--}}
{{--                                                <div class="col-xs-3">--}}
{{--                                                    <div class="qty-box">--}}
{{--                                                        <div class="input-group">--}}
{{--                                                            <input type="text" name="quantity[]" class="form-control input-number"--}}
{{--                                                                   value="{{ $details['quantity'] }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-xs-3">--}}
{{--                                                    <h2 class="td-color">{{ $details['price'] }}</h2>--}}
{{--                                                    <input type="number" name="price[]" value="{{ $details['price'] * $details['quantity'] }}" class="form-control" />--}}
{{--                                                </div>--}}
{{--                                                <div class="col-xs-3">--}}
{{--                                                    <h2 class="td-color">--}}
{{--                                                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">--}}
{{--                                                            <i class="fa fa-refresh"></i>--}}
{{--                                                        </button>--}}
{{--                                                    </h2>--}}
{{--                                                    <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>--}}
{{--                                                    </h2>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <h2>${{ $details['price'] }}</h2>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="qty-box">--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <input type="number" name="quantity[]" value="{{ $details['quantity'] }}" class="form-control input-number quantity" />--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>--}}
{{--                                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>--}}

{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <h2 class="td-color">${{ $details['price'] * $details['quantity'] }}</h2>--}}
{{--                                            <input type="number" name="price[]" value="{{ $details['price'] * $details['quantity'] }}" class="form-control" />--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                            </tbody>--}}
{{--        </table>--}}

                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th style="font-weight: bold" class="text-center">Image</th>
                                <th style="font-weight: bold" class="text-center">Product name</th>
                                <th style="font-weight: bold" class="text-center">Price</th>
                                <th style="font-weight: bold" class="text-center">Quantity</th>
                                <th style="font-weight: bold" class="text-center">Total</th>
                                <th style="font-weight: bold" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $total = 0 ?>

                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)

                                    <?php $total += $details['price'] * $details['quantity'] ?>

                                    <tr>
                                        <td>
                                            <a href="#"><img src="{{ $details['cover'] }}" alt="" style="width: 150px;height: 100px;"></a>

                                        </td>
                                        <td data-th="Product">
                                            <h4 class="nomargin" style="font-size: 20px;color: black;font-weight: bold">
                                                {{ $details['en_name'] }}
                                            </h4>
                                            <input type="text" name="product_id[]" value=" {{ $details['product_id'] }}" class="form-control" hidden />

                                        </td>
                                        <td data-th="Price">${{ $details['price'] }}</td>
                                        <td data-th="Quantity">
                                            <input type="number" name="quantity[]" value="{{ $details['quantity'] }}" class="form-control quantity" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center" style="font-size: 20px;color: black;font-weight: bold">
                                            ${{ $details['price'] * $details['quantity'] }}
                                            <input type="number" name="price[]" value="{{ $details['price'] * $details['quantity'] }}" class="form-control" hidden />

                                        </td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    <table class="table cart-table table-responsive-md">
                        <tfoot>
                        <tr>
                            <td>total price :</td>
                            <td>
                                <h2>${{ $total }}</h2>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                        <div class="row cart-buttons">
                            <div class="col-6"><a href="{{ url('/store/index') }}" class="btn btn-solid">continue shopping</a></div>
                            <div class="col-6"><button type="submit" class="btn btn-solid">check out</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->


@endsection
@section('js')

    <script type="text/javascript">

    $(".update-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);
        var table = $("#cart");

        $.ajax({
            url: '{{ url('store/update-cart') }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
            success: function (response) {
                window.location.reload();
                // table.api().ajax.reload();
            }

            // success: function(response) {
            //     if (response.status == "success") {
            //         console.log(response);
            //         toastr['success'](data.message, '');
            //         table.api().ajax.reload();
            //     } else {
            //         console.log(response);
            //     }
            // }


            // success: function () {
            //     $.notify({
            //         icon: 'fa fa-check',
            //         title: 'Success!',
            //         message: 'Item Successfully updated in your cart'
            //     }, {
            //         element: 'body',
            //         position: null,
            //         type: "success",
            //         allow_dismiss: true,
            //         newest_on_top: false,
            //         showProgressbar: true,
            //         placement: {
            //             from: "top",
            //             align: "right"
            //         },
            //         offset: 20,
            //         spacing: 10,
            //         z_index: 1031,
            //         delay: 5000,
            //         animate: {
            //             enter: 'animated fadeInDown',
            //             exit: 'animated fadeOutUp'
            //         },
            //         icon_type: 'class',
            //         template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            //             '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            //             '<span data-notify="icon"></span> ' +
            //             '<span data-notify="title">{1}</span> ' +
            //             '<span data-notify="message">{2}</span>' +
            //             '<div class="progress" data-notify="progressbar">' +
            //             '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            //             '</div>' +
            //             '<a href="{3}" target="{4}" data-notify="url"></a>' +
            //             '</div>'
            //     });
            // }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{ url('store/remove-from-cart') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();
                }
                // success: function () {
                //     $.notify({
                //         icon: 'fa fa-check',
                //         title: 'Success!',
                //         message: 'Item Successfully deleted from your cart'
                //     }, {
                //         element: 'body',
                //         position: null,
                //         type: "warning",
                //         allow_dismiss: true,
                //         newest_on_top: false,
                //         showProgressbar: true,
                //         placement: {
                //             from: "top",
                //             align: "right"
                //         },
                //         offset: 20,
                //         spacing: 10,
                //         z_index: 1031,
                //         delay: 5000,
                //         animate: {
                //             enter: 'animated fadeInDown',
                //             exit: 'animated fadeOutUp'
                //         },
                //         icon_type: 'class',
                //         template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                //             '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                //             '<span data-notify="icon"></span> ' +
                //             '<span data-notify="title">{1}</span> ' +
                //             '<span data-notify="message">{2}</span>' +
                //             '<div class="progress" data-notify="progressbar">' +
                //             '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                //             '</div>' +
                //             '<a href="{3}" target="{4}" data-notify="url"></a>' +
                //             '</div>'
                //     });
                // }
            });
        }
    });

</script>

@endsection


{{--    <!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}

{{--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />--}}

{{--    <title>@yield('title')</title>--}}

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">--}}

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}

{{--    <style>--}}
{{--        .main-section{--}}
{{--            background-color: #F8F8F8;--}}
{{--        }--}}
{{--        .dropdown{--}}
{{--            float:right;--}}
{{--            padding-right: 30px;--}}
{{--        }--}}
{{--        .btn{--}}
{{--            border:0px;--}}
{{--            margin:10px 0px;--}}
{{--            box-shadow:none !important;--}}
{{--        }--}}
{{--        .dropdown .dropdown-menu{--}}
{{--            padding:20px;--}}
{{--            top:30px !important;--}}
{{--            width:350px !important;--}}
{{--            left:-110px !important;--}}
{{--            box-shadow:0px 5px 30px black;--}}
{{--        }--}}
{{--        .total-header-section{--}}
{{--            border-bottom:1px solid #d2d2d2;--}}
{{--        }--}}
{{--        .total-section p{--}}
{{--            margin-bottom:20px;--}}
{{--        }--}}
{{--        .cart-detail{--}}
{{--            padding:15px 0px;--}}
{{--        }--}}
{{--        .cart-detail-img img{--}}
{{--            width:100%;--}}
{{--            height:100%;--}}
{{--            padding-left:15px;--}}
{{--        }--}}
{{--        .cart-detail-product p{--}}
{{--            margin:0px;--}}
{{--            color:#000;--}}
{{--            font-weight:500;--}}
{{--        }--}}
{{--        .cart-detail .price{--}}
{{--            font-size:12px;--}}
{{--            margin-right:10px;--}}
{{--            font-weight:500;--}}
{{--        }--}}
{{--        .cart-detail .count{--}}
{{--            color:#C2C2DC;--}}
{{--        }--}}
{{--        .checkout{--}}
{{--            border-top:1px solid #d2d2d2;--}}
{{--            padding-top: 15px;--}}
{{--        }--}}
{{--        .checkout .btn-primary{--}}
{{--            border-radius:50px;--}}
{{--            height:50px;--}}
{{--        }--}}
{{--        .dropdown-menu:before{--}}
{{--            content: " ";--}}
{{--            position:absolute;--}}
{{--            top:-20px;--}}
{{--            right:50px;--}}
{{--            border:10px solid transparent;--}}
{{--            border-bottom-color:#fff;--}}
{{--        }--}}
{{--        .thumbnail {--}}
{{--            position: relative;--}}
{{--            padding: 0px;--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}
{{--        .thumbnail img {--}}
{{--            width: 100%;--}}
{{--        }--}}
{{--        .thumbnail .caption{--}}
{{--            margin: 7px;--}}
{{--        }--}}
{{--        .page {--}}
{{--            margin-top: 50px;--}}
{{--        }--}}
{{--        .btn-holder{--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        .table>tbody>tr>td, .table>tfoot>tr>td{--}}
{{--            vertical-align: middle;--}}
{{--        }--}}
{{--        @media screen and (max-width: 600px) {--}}
{{--            table#cart tbody td .form-control{--}}
{{--                width:20%;--}}
{{--                display: inline !important;--}}
{{--            }--}}
{{--            .actions .btn{--}}
{{--                width:36%;--}}
{{--                margin:1.5em 0;--}}
{{--            }--}}
{{--            .actions .btn-info{--}}
{{--                float:left;--}}
{{--            }--}}
{{--            .actions .btn-danger{--}}
{{--                float:right;--}}
{{--            }--}}
{{--            table#cart thead { display: none; }--}}
{{--            table#cart tbody td { display: block; padding: .6rem; min-width:320px;}--}}
{{--            table#cart tbody tr td:first-child { background: #333; color: #fff; }--}}
{{--            table#cart tbody td:before {--}}
{{--                content: attr(data-th); font-weight: bold;--}}
{{--                display: inline-block; width: 8rem;--}}
{{--            }--}}
{{--            table#cart tfoot td{display:block; }--}}
{{--            table#cart tfoot td .btn{display:block;}--}}
{{--        }--}}

{{--    </style>--}}

{{--</head>--}}
{{--<body>--}}

{{--<div class="container">--}}

{{--    <div class="row">--}}
{{--        <div class="col-lg-12 col-sm-12 col-12 main-section">--}}
{{--            <div class="dropdown">--}}
{{--                <button type="button" class="btn btn-info" data-toggle="dropdown">--}}
{{--                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu">--}}
{{--                    <div class="row total-header-section">--}}
{{--                        <div class="col-lg-6 col-sm-6 col-6">--}}
{{--                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>--}}
{{--                        </div>--}}

{{--                        <?php $total = 0 ?>--}}
{{--                        @foreach((array) session('cart') as $id => $details)--}}
{{--                            <?php $total += $details['price'] * $details['quantity'] ?>--}}
{{--                        @endforeach--}}

{{--                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">--}}
{{--                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    @if(session('cart'))--}}
{{--                        @foreach(session('cart') as $id => $details)--}}
{{--                            <div class="row cart-detail">--}}
{{--                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                    <img src="{{ $details['cover'] }}" />--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                    <p>{{ $details['en_name'] }}</p>--}}
{{--                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">--}}
{{--                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="container page">--}}
{{--    <form action="{{ route('cart.order.store') }}" method="post" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--    <table id="cart" class="table table-hover table-condensed">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th style="width:50%">Product</th>--}}
{{--            <th style="width:10%">Price</th>--}}
{{--            <th style="width:8%">Quantity</th>--}}
{{--            <th style="width:22%" class="text-center">Subtotal</th>--}}
{{--            <th style="width:10%"></th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}

{{--        <?php $total = 0 ?>--}}

{{--        @if(session('cart'))--}}
{{--            @foreach(session('cart') as $id => $details)--}}

{{--                <?php $total += $details['price'] * $details['quantity'] ?>--}}

{{--                <tr>--}}
{{--                    <td data-th="Product">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['cover'] }}" width="100" height="100" class="img-responsive"/></div>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <h4 class="nomargin">--}}
{{--                                    {{ $details['en_name'] }}--}}
{{--                                </h4>--}}
{{--                                <input type="text" name="product_id[]" value=" {{ $details['product_id'] }}" class="form-control" />--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </td>--}}
{{--                    <td data-th="Price">${{ $details['price'] }}</td>--}}
{{--                    <td data-th="Quantity">--}}
{{--                        <input type="number" name="quantity[]" value="{{ $details['quantity'] }}" class="form-control quantity" />--}}
{{--                    </td>--}}
{{--                    <td data-th="Subtotal" class="text-center">--}}
{{--                        ${{ $details['price'] * $details['quantity'] }}--}}
{{--                        <input type="number" name="price[]" value="{{ $details['price'] * $details['quantity'] }}" class="form-control" hidden />--}}

{{--                    </td>--}}
{{--                    <td class="actions" data-th="">--}}
{{--                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>--}}
{{--                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        @endif--}}

{{--        </tbody>--}}
{{--        <tfoot>--}}
{{--        <tr class="visible-xs">--}}
{{--            <td class="text-center"><strong>Total {{ $total }}</strong></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>--}}
{{--            <td colspan="2" class="hidden-xs"></td>--}}
{{--            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>--}}
{{--            <td><button type="submit" class="btn btn-primary"> check out <i class="fa fa-angle-right"></i></button></td>--}}
{{--        </tr>--}}
{{--        </tfoot>--}}
{{--    </table>--}}

{{--        <table id="cart" class="table table-hover table-condensed">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th style="width:50%">Product</th>--}}
{{--                <th style="width:10%">Price</th>--}}
{{--                <th style="width:8%">Quantity</th>--}}
{{--                <th style="width:22%" class="text-center">Subtotal</th>--}}
{{--                <th style="width:10%"></th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}

{{--            <?php $total = 0 ?>--}}

{{--            @if(session('cart'))--}}
{{--                @foreach(session('cart') as $id => $details)--}}

{{--                    <?php $total += $details['price'] * $details['quantity'] ?>--}}

{{--                    <tr>--}}
{{--                        <td data-th="Product">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['cover'] }}" width="100" height="100" class="img-responsive"/></div>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <h4 class="nomargin">--}}
{{--                                        {{ $details['en_name'] }}--}}
{{--                                        <input type="text" name="product_id[]" value=" {{ $details['product_id'] }}" class="form-control" />--}}

{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td data-th="Price">${{ $details['price'] }}</td>--}}
{{--                        <td data-th="Quantity">--}}
{{--                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />--}}
{{--                           <input type="number" name="quantity[]" value="{{ $details['quantity'] }}" class="form-control quantity" />--}}

{{--                        </td>--}}
{{--                        <td data-th="Subtotal" class="text-center">--}}
{{--                            ${{ $details['price'] * $details['quantity'] }}--}}
{{--                           <input type="number" name="price[]" value="{{ $details['price'] * $details['quantity'] }}" class="form-control quantity" />--}}

{{--                        </td>--}}
{{--                        <td class="actions" data-th="">--}}
{{--                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>--}}
{{--                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--            @endif--}}

{{--            </tbody>--}}
{{--            <tfoot>--}}
{{--            <tr class="visible-xs">--}}
{{--                <td class="text-center"><strong>Total {{ $total }}</strong></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>--}}
{{--                <td colspan="2" class="hidden-xs"></td>--}}
{{--                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>--}}
{{--                <td><button type="submit" class="btn btn-primary"> check out <i class="fa fa-angle-right"></i></button></td>--}}
{{--            </tr>--}}
{{--            </tfoot>--}}
{{--        </table>--}}


{{--    </form>--}}
{{--</div>--}}

{{--<script type="text/javascript">--}}

{{--    $(".update-cart").click(function (e) {--}}
{{--        e.preventDefault();--}}

{{--        var ele = $(this);--}}

{{--        $.ajax({--}}
{{--            url: '{{ url('store/update-cart') }}',--}}
{{--            method: "patch",--}}
{{--            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},--}}
{{--            success: function (response) {--}}
{{--                window.location.reload();--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}

{{--    $(".remove-from-cart").click(function (e) {--}}
{{--        e.preventDefault();--}}

{{--        var ele = $(this);--}}

{{--        if(confirm("Are you sure")) {--}}
{{--            $.ajax({--}}
{{--                url: '{{ url('store/remove-from-cart') }}',--}}
{{--                method: "DELETE",--}}
{{--                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},--}}
{{--                success: function (response) {--}}
{{--                    window.location.reload();--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    });--}}

{{--</script>--}}

{{--</body>--}}
{{--</html>--}}
