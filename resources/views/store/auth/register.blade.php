@extends('store.layout.index')


@section('content')

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/store/index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>create account</h3>
                    <div class="theme-card">
                        <form action="{{url('store/post-register')}}" class="theme-form" method="POST">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="email">Name</label>
                                    <br>
                                    @if ($errors->has('name'))
                                        <span  class="error" style="color: red">{{ $errors->first('name') }}</span>
                                    @endif
                                    <br>
                                    <input type="text" class="form-control" name="name" id="fname" placeholder="First Name"
                                           required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">email</label>
                                    <br>
                                    @if ($errors->has('email'))
                                        <span  class="error" style="color: red">{{ $errors->first('email') }}</span>
                                    @endif
                                    <br>
                                    <input type="text" class="form-control" name="email"  id="email" placeholder="Email" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="email">Mobile number</label>
                                    <br>
                                    @if ($errors->has('mobile'))
                                        <span  class="error" style="color: red">{{ $errors->first('mobile') }}</span>
                                    @endif
                                    <br>
                                    <input type="tel" class="form-control" name="mobile" id="fname" placeholder="Your mobile number"
                                           required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Password</label>
                                    <br>
                                    @if ($errors->has('password'))
                                        <span  class="error" style="color: red">{{ $errors->first('password') }}</span>
                                    @endif
                                    <br>
                                    <input type="password" name="password" class="form-control" id="review"
                                           placeholder="Enter your password" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <button type="submit" class="btn btn-solid">create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
