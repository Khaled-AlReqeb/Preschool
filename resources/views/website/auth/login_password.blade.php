<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="ar"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="ar"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ar" dir="rtl"> <!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- App favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('/')}}/assets/website/assets/images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('/')}}/assets/website/assets/images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/assets/website/assets/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/assets/website/assets/images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/assets/website/assets/images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('/')}}/assets/website/assets/images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('/')}}/assets/website/assets/images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('/')}}/assets/website/assets/images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/assets/website/assets/images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{url('/')}}/assets/website/assets/images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('/')}}/assets/website/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('/')}}/assets/website/assets/images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}/assets/website/assets/images/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{url('/')}}/assets/website/assets/images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- App Css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/website/assets/css/app.css">
    <!-- Arabic Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <!-- Englesh Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
</head>
<body>

<section id="auth_login">
    <div class="container align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-12 col-sm-10 col-md-6 col-lg-4 col-xl-4">
                <div class="logo text-center mb-5 mx-auto">
                    <a href="#" title="#">
                        <img src="{{url('/')}}/assets/website/assets/images/logo.png" alt="#" class="img-fluid">
                    </a>
                    <h1 class="mt-3 text-dark font-weight-bold h6">سجل الدخول للاستمرار في إدارة البطاقة الخاصة بك</h1>
                </div><!-- logo -->
                <div class="login_form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="alert alert-danger" role="alert" style="margin-bottom: 45px">
                            كلمة المرور غير صحيحة.
                        </div><!-- alert -->


                        <div class="form-group mt-3 position-relative">
                            <label for="email" >البريد الإلكتروني</label>
                            {{--                            <input type="text" id="username" class="auth_input" autocomplete="off">--}}
                            <input id="email" type="email" class="auth_input @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                            {{--                            <input id="email" type="email" class="auth_input @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="البريد الإلكتروني">--}}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div><!-- form-group -->
                        <div class="form-group mt-5 position-relative">
                            {{--                            <label for="password" >كلمة المرور</label>--}}
                            {{--                            <input type="password" id="password" class="auth_input" autocomplete="off">--}}
                            <input id="password" type="password" class="auth_input @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                            {{--                            <input id="password" type="password" class="auth_input @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="كلمة المرور">--}}

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div><!-- form-group -->
                        <div class="form-group form-check my-4">
                            {{--                            <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                            <input class="form-check-input" type="checkbox" name="remember" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleCheck1">تذكرني</label>
                        </div><!-- form-group -->
                        <button type="submit" class="btn d-block w-100 text-white font-weight-bold py-2">تسجيل دخول</button>
                    </form>
                    <div class="forgot_password mt-4 d-flex align-items-center justify-content-center h6 text-muted">
                        @if (Route::has('password.request'))
                            نسيت كلمة المرور ؟ <a href="{{ route('password.request') }}" title="#" class="mr-1 text-dark">اضغط لإعادة تعيين</a>
                        @endif

                    </div><!-- forgot_password -->
                </div><!-- login_form -->
                <div class="auth__footer mt-4 d-flex align-items-center justify-content-center">
                    <a href="{{ route('register') }}" title="#" class="h6 text-dark">ليس لديك حساب ؟</a>
                </div><!-- auth__footer -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- auth_login -->

<!--[if lt IE 8 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

<script type="text/javascript" src="{{url('/')}}/assets/website/assets/js/app.js"></script>

</body>
</html>
