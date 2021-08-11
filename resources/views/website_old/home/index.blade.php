@extends('website.layout.index')


@section('content')
    <section class="sec1">
        <p class="serv"> Our Services </p>
        <p class="serv1">We Provide wide range <br> of services</p>
        <br>
        <div class="container rounded">
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-4 my-lg-0 my-3">
                    <div class="box bg-white">
                        <div class="d-flex align-items-center">
                            <img src="{{ $service->image }} " alt="" class="img1">
                            <div class="d-flex flex-column book">
                                <h6> {{ $service->en_name }} </h6>
                                <br>
                                <p class="app">
                                    {{ $service->en_description }}
                                </p>
                                <a href="#">
                                    <p  class="more"> See more &nbsp;  <i class="fa fa-arrow-right" aria-hidden="true"></i> </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <p class="services">
            <a href="" class="buy buy1">See more </a>
        </p>
    </section>
    <section class="sec2">
        <p class="about">About Us </p>
        <p class="com">A short overview of <br> the company</p>
        <br>
    </section>
    <section id="block_content">
        <div class="col-md-6 container">
            <blockquote class="blockstyle">
                <span class="triangle"></span>
                <p class="block"> Walpcart is a platform that collects local and international brands in one place. We provide online store to the local market to improve customer service. We are making sure that every customer is satisfied </p> </blockquote>
        </div>
    </section>
    <section class="sec3">
        <p class="best"> Best Services </p>
        <p class="bestrserv">  Best services available <br> at walpcart</p>
        <br>
        <div class="container cont2">
            <div class="row">
                <div class="col-lg-4 col-md-4 my-lg-0 my-3">
                    <div class="d-flex align-items-center buyy">
                        <img src="img/Buy.png" alt="">
                        <div class="d-flex flex-column online">
                            <h6> Online store </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 my-lg-0 my-3">
                    <div class="d-flex align-items-center buyy">
                        <img src="img/Iconly-Bulk-Activity.png" alt="">
                        <div class="d-flex flex-column online">
                            <h6> Progressive web app </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 my-lg-0 my-3">
                    <div class="d-flex align-items-center bluk">
                        <img src="img/Iconly-Bulk-Time Circle.png" alt="">
                        <div class="d-flex flex-column online">
                            <h6> 24/7 Support </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
