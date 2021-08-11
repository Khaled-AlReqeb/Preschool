@extends('website.layout.index')

@section('content')

    <!-- header area start -->



    <section class="header-area pb-3 ">
        <div class="container-fluid header-nav">
            <div class="container">
                <div class="d-flex row header " >
                    <div class="col-12  col-md-5 col-sm-4 d-flex flex-row py-2">
                        <a href="#"  class="p-0 ml-2"><img src="{{url('/')}}/website/assets/img/logo.png" class=" mx-auto d-block " style="width:34px;"></a>
                        <!--<a href="#" class="p-0">PRESCHOOL</a>-->
                    <!--<a href="#" class="p-0"><img src="{{url('/')}}/website/assets/img/logo-he.png" width="89px" alt=""></a>-->

                        <a href="#" class="d-flex flex-column text-right size-14  mr-3 text-white "> مؤسسة PreSchool لخدمات رياض الأطفال
                            <span class="size-15 d-none d-sm-block ">وزارة التربية والتعليم العالي</span>
                        </a>
                    </div>

                    <div class="col-12 col-md-7 col-sm-12  p-0 d-flex flex-column-reverse flex-sm-column ">
                        <nav class="navbar  navbar-expand-lg header p-0  ">

                            <button class="navbar-toggler text-dark mx-auto " type="button" data-toggle="collapse" data-target="#menu_nav" aria-controls="menu_nav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars text-sm-center text-white "></i>
                            </button>

                            <div class="collapse navbar-collapse nav_list side-nav " id="menu_nav">
                                <ul class="navbar-nav collapsible-accordion nav_page mr-auto ">
                                    <li class="nav-item active  pt-0">
                                        <a class="nav-link text-color1 pt-4 pb-1 px-3" href="#home"> الرئيسية <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item pt-0">
                                        <a class="nav-link text-color1 pt-4 pb-1 px-3" href="#aboutUs"> عن المؤسسة</a>
                                    </li>
                                    <li class="nav-item pt-0">
                                        <a class="nav-link text-color1 pt-4 pb-1 px-3" href="#services">خدماتنا</a>
                                    </li>
                                    <li class="nav-item pt-0">
                                        <a class="nav-link text-color1 pt-4 pb-1 px-3" href="#activities">أنشطة وفعاليات</a>
                                    </li>
                                    <!--<li class="nav-item pt-0 dropdown">-->
                                    <!--<a class="nav-link text-color1 pt-4 pb-1 px-3 nav-link dropdown-toggle" data-toggle="dropdown"  style="cursor: pointer" >أنشطة وفعاليات</a>-->
                                    <!--<div class="dropdown-menu mt-0">-->
                                    <!--<a class="dropdown-item" href="#">وزارة التربية والتعليم</a>-->
                                    <!--<a class="dropdown-item" href="#">مديرية شمال غزة</a>-->
                                    <!--<a class="dropdown-item" href="#">مديرية غرب غزة</a>-->
                                    <!--<a class="dropdown-item" href="#">مديرية شرق غزة</a>-->
                                    <!--<a class="dropdown-item" href="#">مديرية الوسطى</a>-->
                                    <!--<a class="dropdown-item" href="#">مديرية خانيونس</a>-->
                                    <!--<a class="dropdown-item" href="#">مديرية شرق خانيونس</a>-->
                                    <!--<a class="dropdown-item" href="#">مديرية رفح</a>-->
                                    <!--</div>-->

                                    <!--</li>-->
                                    <li class="nav-item pt-0">
                                        <a class="nav-link text-color1 pt-4 pb-1 px-3" href="#partners">شركاء النجاح </a>
                                    </li>
                                    <li class="nav-item pt-0">
                                        <a class="nav-link text-color1 pt-4 pb-1 px-3" href="#contactUs">اتصل بنا</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function loginUser(url, formId) {
            var dataString = $(formId).serialize();
            console.log(dataString);

            var xhr = $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: dataString,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(formId).find('button[type="submit"]').attr('disabled', 'disabled');
                },
                success: function (data) {
                    console.log(data);
                    $('.alert').each(function () {
                        $(this).remove();
                    });
                    var msg = makAlertMsg('id', data.msg, data.state);
                    console.log(msg);
                    switch (data.state)
                    {
                        case "trr":
                            $(formId).find('.input-group:first-of-type').before(msg);
                            location.reload(true);
                            window.location.href = window.location.href;
                            return false;
                            break;
                        case "err":
                            $(formId).find('input[type="password"]').val('').focus();
                            $(formId).find('.input-group:first-of-type').before(msg);
                            break;
                        default :
                            $(formId).find('.input-group:first-of-type').before(msg);
                            break;
                    }

                    $('#id').alert();
                },
                error: function (data) {
                    console.log(data.responseText);
                    var msg = makAlertMsg('id', data.responseText, 'err');
                    $(formId).find('.input-group:first-of-type').before(msg);
                }
            });
            $(formId).find('button[type="submit"]').removeAttr('disabled');
            return false;
        }
        function regUser(url, formId) {
            var dataString = $(formId).serialize();
            console.log(dataString);

            var xhr = $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: dataString,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(formId).find('button[type="submit"]').attr('disabled', 'disabled');
                },
                success: function (data) {
                    console.log(data);
                    $('.alert').each(function () {
                        $(this).remove();
                    });
                    var msg = makAlertMsg('id', data.msg, data.state);
                    switch (data.state)
                    {
                        case "trr":
                            $(formId).find('.input-group:first-of-type').before(msg);
                            location.reload(true);
                            window.location.href = window.location.href;
                            break;
                        case "err":
                            $(formId).find('.input-group:first-of-type').before(msg);
                            break;
                        default :
                            $(formId).find('.input-group:first-of-type').before(msg);
                    }

                    $('#id').alert();
                },
                error: function (data) {
                    console.log(data.responseText);
                    var msg = makAlertMsg('id', data.responseText, 'err');
                    $(formId).find('.input-group:first-of-type').before(msg);
                }

            });
            $(formId).find('button[type="submit"]').removeAttr('disabled');
            return false;
        }
        function regUserStep(toDiv, url, formId) {
            var dataString = $(formId).serialize();
            console.log(dataString);
            var xhr = $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: dataString,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(formId).find('button[type="submit"]').attr('disabled', 'disabled');
                },
                success: function (data) {
                    console.log(data);
                    $('.alert').each(function () {
                        $(this).remove();
                    });
                    var msg = makAlertMsg('id', data.msg, data.state);
                    switch (data.state)
                    {
                        case "trr":
                            if (data.form !== undefined) {
                                $(toDiv).html(data.form);
                            } else {
                                location.reload(true);
                                window.location.href = window.location.href;
                            }


                            break;
                        case "err":
                            $(formId).find('.input-group:first-of-type').before(msg);
                            break;
                        default :
                            $(formId).find('.input-group:first-of-type').before(msg);
                    }

                    $('#id').alert();
                },
                error: function (data) {
                    console.log(data.responseText);
                    var msg = makAlertMsg('id', data.responseText, 'err');
                    $(formId).find('.input-group:first-of-type').before(msg);
                }

            });
            $(formId).find('button[type="submit"]').removeAttr('disabled');
            return false;
        }

        function compleatUser(url, formId) {
            var dataString = $(formId).serialize();
            console.log(dataString);
            var xhr = $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: dataString,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(formId).find('button[type="submit"]').attr('disabled', 'disabled');
                },
                success: function (data) {
                    console.log(data);
                    $('.alert').each(function () {
                        $(this).remove();
                    });
                    var msg = makAlertMsg('id', data.msg, data.state);
                    switch (data.state)
                    {
                        case "trr":
                            $(formId).find('.input-group:first-of-type').before(msg);
                            location.reload(true);
                            window.location.href = window.location.href;
                            break;
                        case "err":
                            $(formId).find('.input-group:first-of-type').before(msg);
                            break;
                        default :
                            $(formId).find('.input-group:first-of-type').before(msg);
                    }

                    $('#id').alert();
                },
                error: function (data) {
                    console.log(data.responseText);
                    var msg = makAlertMsg('id', data.responseText, 'err');
                    $(formId).find('.input-group:first-of-type').before(msg);
                }

            });
            $(formId).find('button[type="submit"]').removeAttr('disabled');
            return false;
        }


        function getModal(toDiv, force, dataString) {
            if (!force && $.trim($html.find('#' + toDiv).html()).length) {
                $("#" + toDiv).modal('show');
            } else {
                $html.find("#" + toDiv).remove();
                $html.find(".modal-backdrop").remove();
                $html.find(".modal").each(function () {
                    $(this).remove();
                });
                return Modal(toDiv, dataString);
            }
        }
        function getHelper(toDiv, name, method, dataString) {
            return Helper(toDiv, name, method, dataString);
        }
        function makAlertMsg(id, msg, type, exit = true) {
            switch (type) {
                case 'trr' :
                    type = 'alert alert-success';
                    break;
                case 'err' :
                    type = 'alert alert-danger';
                    break;
                default:
                    type = 'alert alert-info';
                    break;
            }
            msg = (msg) ? msg : 'خطأ ما حدث';
            //type = (!msg) ? type : 'alert alert-danger';
            return '<div id="' + id + '" class="' + type + ' alert-dismissible fade show mb-2 col" style=" border-radius:0;padding: 10px;"  role="alert"><span>' + msg + '</span> '
                + ((exit) ? '<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' : '')
                + '</div>';

        }
        function makProgressBar1(id, type) {
            return '<div id="' + id + '" class="alert alert-dismissible fade show mb-2 col" style=" border-radius:0;padding: 10px;"  role="alert"><div class="progress">'
                + '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>'
                + '</div>'
                + '</div>';

        }
        function makProgressBar(id, type) {
            return '<div class="progress-bar progress-bar-striped  progress" role="progressbar" style="width: 0% ;height: 20px; border-radius: 0;" aria-valuemin="0" aria-valuemax="100"></div>';

        }
        function Modal(toDiv, dataString) {
            // console.log(dataString);
            if (typeof (dataString) == "undefined" || dataString === null) {
                dataString = {ajax: "1"};
            }
            var xhr = $.ajax({
                type: 'POST',
                url: site_url + 'api/modal/' + toDiv,
                dataType: 'json',
                data: dataString,
                cache: false,
                //processData: false,
                beforeSend: function () {

                    $html.find(".modal").each(function () {
                        alert($(this).html());
                        $(this).remove();
                    });
                    ////setPopup(loadingtxt, null, 'lod', null, "Fixd");
                },
                success: function (data) {
                    console.log(data);
                    switch (data.state)
                    {
                        case "trr":
                            $html.find(".modal").each(function () {
                                $(this).modal('hide');
                                $(this).remove();
                            });
                            if ($("#" + toDiv).length == 0) {
                                $body.append(data.data);
                            }
                            $("#" + toDiv).modal('show');//.html(data.data);

                            break;
                        case "err":
                            ////setPopup(data.msg, 2, data.state, null, null);
                            return false;
                            break;
                        default :
                            ////setPopup(data, 2, 'err', null, null);
                            return false;
                            break;
                    }
                },
                error: function (data) {
                    console.log(data.responseText);
                    ////setPopup('Error Url', 3, 'err', null, null);
                }

            });

        }

        function Helper(toDiv, name, method, dataString) {
            // console.log(dataString);
            if (typeof (dataString) == "undefined" || dataString === null) {
                dataString = {ajax: "1"};
            }
            var xhr = $.ajax({
                type: 'POST',
                url: site_url + 'api/helper/' + name + '/' + method,
                dataType: 'json',
                data: dataString,
                cache: false,
                //processData: false,
                beforeSend: function () {
                    ////setPopup(loadingtxt, null, 'lod', null, "Fixd");
                },
                success: function (data) {
                    console.log(data);
                    switch (data.state)
                    {
                        case "trr":
                            //$body.append(data.data);
                            $(toDiv).html(data.data);//.html(data.data);
                            var tm = $(toDiv).find('.emenur').attr('data-time');
                            if (tm != 0) {
                                tm = tm * 60;
                                CounterDwon(tm, "#MySecond", "#MyMinte", "#MyHour", 1000, 0, false);
                            }
                            break;
                        case "err":
                            ////setPopup(data.msg, 2, data.state, null, null);
                            return false;
                            break;
                        default :
                            ////setPopup(data, 2, 'err', null, null);
                            return false;
                            break;
                    }
                },
                error: function (data) {
                    console.log(data.responseText);
                    ////setPopup('Error Url', 3, 'err', null, null);
                }

            });

        }

        function new_captcha(element) {
            var c_currentTime = new Date();
            var c_miliseconds = c_currentTime.getTime();
            $(element).attr('src', site_url + 'home/captcha?' + c_miliseconds);
        }
    </script>
    <script>
        $(function () {
            $('#myModal').modal('show');
        });

    </script>
    <style>
        .btn-send a{
            color: #fff;
        }
        .btn-send:hover a{
            color: #07642d;
        }
        .btn-moreb a {
            color: #fff;
        }
        .btn-more a{
            color: #62ca0a;
        }
        .btn-moreb:hover a {
            color: #62ca0a;
        }
        .btn-more:hover a{
            color: #fff;
        }
        .main-type .img-icon{
            margin-top: 0px ;
            background-color: #fff;
        }
        .last-initiative .initiative-box .img-box-inv{
            right: 0;
            left: 0;
        }
        @media (min-width: 992px){ /* lg*/
            .main-type .img-icon{
                margin-top: -122px;
            }
        }
        @media (min-width: 576px){ /* sm*/
            .main-type .img-icon{
                margin-top: 0px;
            }


        }
        @media (min-width: 768px){  /* md */
            .main-type .img-icon{
                margin-top: -122px;
            }

        }
    </style>


    <section class=" main" id="home">
        <div class="container-fluid mm pr-0">
            <div class="col-12 col-md-12 bk-im d-none d-sm-block">
            </div>
            <div class="row" style=" height: 286px;">
                <div class="container pt-5">
                    <div class="row pt-3 ">
                        <div class="col-12 col-md-4 justify-content-start my-auto"  style="margin-top: -30px !important;">
                             <h2 class="text-white text-center size-20">{{app('settings')->header_title ?? ''}}</h2>
                            <h3 class="text-white text-center size-16 pt-2">{{app('settings')->header_subTitle ?? ''}}</h3>
                            <div class="btn-home text-center mr-auto">
                                <!--<a class="expand-video my-2 mx-md-5 mx-4 " href="#"><i class="fa fa-play"></i>مشاهدة الفيديو التعريفي</a>-->
                                <a class="expand-video my-1 mx-md-5 mx-4 " href="#" data-toggle="modal" data-target="#loginform"><i class="fa fa-user-o"></i>تسجيل دخول</a>
                                <a class="expand-video my-1 mx-md-5 mx-4 " href="#" data-toggle="modal" data-target="#regform"><i class="fa fa-user-o"></i>اشتراك جديد</a>
                                <a class="expand-video my-1 mx-md-5 mx-4 " href="#" data-toggle="modal" data-target="#video"><i class="fa fa-play"></i>الفيديو التعريفي</a>
                                <a class="expand-video my-1 mx-md-5 mx-4 " href="#" data-toggle="modal" data-target="#video"><i class="fa fa-play"></i>تحميل تطبيق</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div class="row " >
                <div class="wav3"></div>
                <!--<img src="img/111-01.svg"  style="width: 100%;position: relative; bottom: -5px;"alt="" >-->
                <!--<img src="http://eduplus.ps/newtemplate/img/111-01.svg "  style="width: 100%;position: relative; bottom: -5px;"alt="" >-->
            </div>
        </div>
    </section>
    <div class="main-type">
        <section class="main-type" id="aboutUs">
            <div class="container main-box">
                <div class="row   " >
                    <div class="col-10 col-md-12 mx-auto mb-5" >
                        <div class="img-icon mx-auto d-flex align-items-center "><img src="{{url('/')}}/website/assets/img/icon.png" class="mx-auto" style="    width: 86px;" alt=""></div>
                        <h3 class="text-center tilte-type my-3">{{app('settings')->about_title ?? ''}}</h3>
                        <p class="text-center size-20 px-3">
                            {{app('settings')->about_content ?? ''}}
                        </p>
                        {{--<div class="d-flex justify-content-center"> <button type="button" class="btn  btn-send border-all-r-30  p-1 mx-auto"> <a href="#" class="  px-4 py-2    w-100 h-100"   >تفاصيل</a></button></div>--}}
                    </div>
                </div>
            </div>
        </section>

        <section class="last-initiative " id="activities">
            <div class="container py-5 ">
                <div class="row">
                    <div class="col-12 col-md-12  ">
                        <hr style=" border-color: #6c757d78;">
                        <h6 class="text-center my-2 mx-auto" style="width: 250px;background-color: #ffffff;color: #f95454;position: relative;top: -44px;border-radius: 30px;padding: 5px 0 10px 0px;border-bottom: 3px solid #f95454;margin-top: 0 !important;font-size: 27px;"> {{app('settings')->activities_title ?? ''}}</h6>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-12 col-md-3 my-5">
                        <div class="initiative-box">
                        <!--<span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/0da77856c02d228adb744c138c051023.jpg" class=" rounded-circle card-img-top" alt="..."></span>-->
                            <span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/25eeb65221c63caacf641e4667d42917.jpg" class=" rounded-circle card-img-top" alt="..."></span>
                            <div class="details-in py-4 px-3">
                                <h1 class="title-in text-center mt-5 pt-4">حاضنة الإبداع التعليمي (+edu)</h1>
                                <h4 class="person-in text-center  pb-2">اكرم فروانة </h4>
                                <p class="title-p text-center " style="overflow: hidden; max-height: 100px;">تتلخص المبادرة في حاضنة للإبداع التعليمي، وفقاً لما يلي:

                                    1-
                                    إنشاء موقع إلكتروني باسم (EDU+)،
                                    ضمن منظومة روافد التعليمية، ويتم من خلاله:

                                    - &nbsp;استقبال الأفكار الإبداعية من
                                    الراغبين في طرح أفكارهم وتجهيزها للتحكيم من قبل لجنة مختصة في وزارة التربية
                                    والتعليم العالي.

                                    - &nbsp;عرض خدماتنا والأفكار
                                    الإبداعية وتصنيفها حسب نتائج لجنة التحكيم، بحيث تكون لكل مبادرة صفحة مستقلة.

                                    - &nbsp;إنشاء ملف إنجاز وسيرة ذاتية
                                    للعاملين في وزارة التربية والتعليم العالي بطريقة احترافية يعرض فيه إنجازاته
                                    وخبراته وملفاته.

                                    2- تقوم لجنة التحكيم بإعطاء تقييم لكل فكرة
                                    إبداعية.

                                    3- الأفكار
                                    / خدماتنا التي حصلت على تقييم مميز يتم نشرها على الموقع بصفحة...</p>
                                <div class="d-flex justify-content-center">
                                    <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد</a></button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-3 my-5">
                        <div class="initiative-box">
                        <!--<span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/71d51405cdbed754e8e152c94f4959381.jpg" class=" rounded-circle card-img-top" alt="..."></span>-->
                            <span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/d155486fcbf85ae353db19a646d5bea2.jpg" class=" rounded-circle card-img-top" alt="..."></span>
                            <div class="details-in py-4 px-3">
                                <h1 class="title-in text-center mt-5 pt-4">استخدام الدمى في التعليم</h1>
                                <h4 class="person-in text-center  pb-2">هاني الشريف </h4>
                                <p class="title-p text-center " style="overflow: hidden; max-height: 100px;">مبادرتي استخدام الدمى كوسيلة تعليمية جاءت من خلال هوايتي كصانع
                                    للدمى وهذه الهواية كان سبب اكتشافها هو الحاجم أم الاختراع ، ولعدم توفرها في
                                    الأسواق وإن وجت فأسعارها مرتفعة هذه كانت قصتي مع فكرة صناعة الدمى عندما كنت
                                    متطوعاً مع إحدى الفرق الفنية المهتمة بالأطفال لرسم البسمة على وجوههم وإخراجهم
                                    من صدمات الحروب على غزة وإعادة بريق الأمل في عيونهم ، ثم بعد ذلك عملت معلم للغة
                                    العربية وفكرت ملياً في كيف سأربط بين هواتي ووظيفتي كمعلم وتوصلت أخيراً إلى فكرة
                                    المبادرة وهي تجسيد شخصيات الدروس على شكل أزياء دمى فيكون التعليم إكمال مسيرتي
                                    التطوعية التي بداتها كمنشط وداعم نفسي...</p>
                                <div class="d-flex justify-content-center">
                                    <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد</a></button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-3 my-5">
                        <div class="initiative-box">
                        <!--<span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/770b8da4679301eb66f057cd969466cc1.PNG" class=" rounded-circle card-img-top" alt="..."></span>-->
                            <span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/8b3f43bc56caccd3786b97f4227dc2dd.jpg" class=" rounded-circle card-img-top" alt="..."></span>
                            <div class="details-in py-4 px-3">
                                <h1 class="title-in text-center mt-5 pt-4">مبادرة العفة الالكترونية</h1>
                                <h4 class="person-in text-center  pb-2">أزهار الحداد </h4>
                                <p class="title-p text-center " style="overflow: hidden; max-height: 100px;">فكرة المبادرة:

                                    &nbsp; تقوم هذه المبادرة على تبني مجموعة من الأنشطة الالكترونية والتربوية
                                    والمدرسية&nbsp; التي تنمي روح المسئولية خلال
                                    تصفح وسائل التواصل الاجتماعي عبر الانترنت&nbsp;
                                    واستخدام البرامج الالكترونية الحديثة لدي طالبات المدرسة ضمن قالب ديني
                                    أخلاقي مدعم بخبرات تقنية&nbsp;&nbsp; بحيث يتم تنمية
                                    وتعزيز المعايير الدينية والأخلاقية لدى الطالبات&nbsp;
                                    للحكم على أي&nbsp; تصرف&nbsp; يخص عملية التصفح الالكتروني والمشاركة فيها ،
                                    كما ويتم رفع قدرة الطالبات التقنية ( التكنولوجية )&nbsp; في التحكم بدرجة الخصوصية&nbsp; والأمن المعلوماتي أثناء تصفح مواقع التواصل
                                    الاجتماعي ، ورفع قدرة الطالبات على حفظ الخصوصية أثناء استخدام الأجهزة الذكية
                                    وذلك من&nbsp; أجل تنشئة جيل قوي قادر على تحديد
                                    نقاط...</p>
                                <div class="d-flex justify-content-center">
                                    <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد</a></button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-3 my-5">
                        <div class="initiative-box">
                        <!--<span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/f69d4a81b3ef65f4957aa3fc1168e48a1.jpg" class=" rounded-circle card-img-top" alt="..."></span>-->
                            <span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/a89c9980aeba8d45e87684bfff2f7197.png" class=" rounded-circle card-img-top" alt="..."></span>
                            <div class="details-in py-4 px-3">
                                <h1 class="title-in text-center mt-5 pt-4">موجات النجاح والتميز</h1>
                                <h4 class="person-in text-center  pb-2">فداء الشوبكي </h4>
                                <p class="title-p text-center " style="overflow: hidden; max-height: 100px;">
                                    تقوم فكرة المبادرة بشكل أساسي بجذب الطالبات
                                    لمادة الفيزياء والتفاعل معها وجعلها أكثر تشويقاً ومتعة من خلال استخدام أساليب
                                    التقويم المتنوعة سواء كانت داخل الحصة أم خارجها، حيث يتم استخدام استراتيجيات
                                    تقويمية وألعاب تقويمية داخل الحصة، بينما خارج الحصة تم توظيف التقويم إلكتروني
                                    حيث تم استخدام موقع إلكتروني لنشر الاختبارات عليه، بالإضافة إلى مجموعة هاتفية
                                    عبر برنامج الواتس أب تتعلق بجميع أسئلة الطالبات وعرض المسابقات الإلكترونية (
                                    كل يوم سؤال)، وملفات الإنجاز والتي تتضمن بعض نماذج الأساليب التقويمية التي
                                    تقوم بها الطالبات، بالإضافة إلى التطبيقات العملية في الفيزياء، وما تقوم به من
                                    أنشطة متنوعة تتعلق بالفيزياء سواء كانت هذه الأنشطة...</p>
                                <div class="d-flex justify-content-center">
                                    <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد</a></button>
                                </div>
                            </div>
                        </div>

                    </div>




                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="d-flex justify-content-center">
                            <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد من خدماتنا</a></button>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="last-initiative " id="partners">
            <div class="container py-5 ">
                <div class="row">
                    <div class="col-12 col-md-12  ">
                        <hr style=" border-color: #6c757d78;">
                        <h6 class="text-center my-2 mx-auto" style="width: 250px;background-color: #ffffff;color: #f95454;position: relative;top: -44px;border-radius: 30px;padding: 5px 0 10px 0px;border-bottom: 3px solid #f95454;margin-top: 0 !important;font-size: 27px;">{{app('settings')->partner_title ?? ''}}</h6>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="col-12 col-md-3 my-5">
                        <div class="initiative-box">
                        <!--<span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/0da77856c02d228adb744c138c051023.jpg" class=" rounded-circle card-img-top" alt="..."></span>-->
                            <span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/25eeb65221c63caacf641e4667d42917.jpg" class=" rounded-circle card-img-top" alt="..."></span>
                            <div class="details-in py-4 px-3">
                                <h1 class="title-in text-center mt-5 pt-4">حاضنة الإبداع التعليمي (+edu)</h1>
                                <h4 class="person-in text-center  pb-2">اكرم فروانة </h4>
                                <p class="title-p text-center " style="overflow: hidden; max-height: 100px;">تتلخص المبادرة في حاضنة للإبداع التعليمي، وفقاً لما يلي:

                                    1-
                                    إنشاء موقع إلكتروني باسم (EDU+)،
                                    ضمن منظومة روافد التعليمية، ويتم من خلاله:

                                    - &nbsp;استقبال الأفكار الإبداعية من
                                    الراغبين في طرح أفكارهم وتجهيزها للتحكيم من قبل لجنة مختصة في وزارة التربية
                                    والتعليم العالي.

                                    - &nbsp;عرض خدماتنا والأفكار
                                    الإبداعية وتصنيفها حسب نتائج لجنة التحكيم، بحيث تكون لكل مبادرة صفحة مستقلة.

                                    - &nbsp;إنشاء ملف إنجاز وسيرة ذاتية
                                    للعاملين في وزارة التربية والتعليم العالي بطريقة احترافية يعرض فيه إنجازاته
                                    وخبراته وملفاته.

                                    2- تقوم لجنة التحكيم بإعطاء تقييم لكل فكرة
                                    إبداعية.

                                    3- الأفكار
                                    / خدماتنا التي حصلت على تقييم مميز يتم نشرها على الموقع بصفحة...</p>
                                <div class="d-flex justify-content-center">
                                    <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد</a></button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-3 my-5">
                        <div class="initiative-box">
                        <!--<span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/71d51405cdbed754e8e152c94f4959381.jpg" class=" rounded-circle card-img-top" alt="..."></span>-->
                            <span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/d155486fcbf85ae353db19a646d5bea2.jpg" class=" rounded-circle card-img-top" alt="..."></span>
                            <div class="details-in py-4 px-3">
                                <h1 class="title-in text-center mt-5 pt-4">استخدام الدمى في التعليم</h1>
                                <h4 class="person-in text-center  pb-2">هاني الشريف </h4>
                                <p class="title-p text-center " style="overflow: hidden; max-height: 100px;">مبادرتي استخدام الدمى كوسيلة تعليمية جاءت من خلال هوايتي كصانع
                                    للدمى وهذه الهواية كان سبب اكتشافها هو الحاجم أم الاختراع ، ولعدم توفرها في
                                    الأسواق وإن وجت فأسعارها مرتفعة هذه كانت قصتي مع فكرة صناعة الدمى عندما كنت
                                    متطوعاً مع إحدى الفرق الفنية المهتمة بالأطفال لرسم البسمة على وجوههم وإخراجهم
                                    من صدمات الحروب على غزة وإعادة بريق الأمل في عيونهم ، ثم بعد ذلك عملت معلم للغة
                                    العربية وفكرت ملياً في كيف سأربط بين هواتي ووظيفتي كمعلم وتوصلت أخيراً إلى فكرة
                                    المبادرة وهي تجسيد شخصيات الدروس على شكل أزياء دمى فيكون التعليم إكمال مسيرتي
                                    التطوعية التي بداتها كمنشط وداعم نفسي...</p>
                                <div class="d-flex justify-content-center">
                                    <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد</a></button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-3 my-5">
                        <div class="initiative-box">
                        <!--<span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/770b8da4679301eb66f057cd969466cc1.PNG" class=" rounded-circle card-img-top" alt="..."></span>-->
                            <span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/8b3f43bc56caccd3786b97f4227dc2dd.jpg" class=" rounded-circle card-img-top" alt="..."></span>
                            <div class="details-in py-4 px-3">
                                <h1 class="title-in text-center mt-5 pt-4">مبادرة العفة الالكترونية</h1>
                                <h4 class="person-in text-center  pb-2">أزهار الحداد </h4>
                                <p class="title-p text-center " style="overflow: hidden; max-height: 100px;">فكرة المبادرة:

                                    &nbsp; تقوم هذه المبادرة على تبني مجموعة من الأنشطة الالكترونية والتربوية
                                    والمدرسية&nbsp; التي تنمي روح المسئولية خلال
                                    تصفح وسائل التواصل الاجتماعي عبر الانترنت&nbsp;
                                    واستخدام البرامج الالكترونية الحديثة لدي طالبات المدرسة ضمن قالب ديني
                                    أخلاقي مدعم بخبرات تقنية&nbsp;&nbsp; بحيث يتم تنمية
                                    وتعزيز المعايير الدينية والأخلاقية لدى الطالبات&nbsp;
                                    للحكم على أي&nbsp; تصرف&nbsp; يخص عملية التصفح الالكتروني والمشاركة فيها ،
                                    كما ويتم رفع قدرة الطالبات التقنية ( التكنولوجية )&nbsp; في التحكم بدرجة الخصوصية&nbsp; والأمن المعلوماتي أثناء تصفح مواقع التواصل
                                    الاجتماعي ، ورفع قدرة الطالبات على حفظ الخصوصية أثناء استخدام الأجهزة الذكية
                                    وذلك من&nbsp; أجل تنشئة جيل قوي قادر على تحديد
                                    نقاط...</p>
                                <div class="d-flex justify-content-center">
                                    <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد</a></button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-3 my-5">
                        <div class="initiative-box">
                        <!--<span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/f69d4a81b3ef65f4957aa3fc1168e48a1.jpg" class=" rounded-circle card-img-top" alt="..."></span>-->
                            <span class="mx-auto img-box-inv"><img src="{{url('/')}}/website/assets/img/a89c9980aeba8d45e87684bfff2f7197.png" class=" rounded-circle card-img-top" alt="..."></span>
                            <div class="details-in py-4 px-3">
                                <h1 class="title-in text-center mt-5 pt-4">موجات النجاح والتميز</h1>
                                <h4 class="person-in text-center  pb-2">فداء الشوبكي </h4>
                                <p class="title-p text-center " style="overflow: hidden; max-height: 100px;">
                                    تقوم فكرة المبادرة بشكل أساسي بجذب الطالبات
                                    لمادة الفيزياء والتفاعل معها وجعلها أكثر تشويقاً ومتعة من خلال استخدام أساليب
                                    التقويم المتنوعة سواء كانت داخل الحصة أم خارجها، حيث يتم استخدام استراتيجيات
                                    تقويمية وألعاب تقويمية داخل الحصة، بينما خارج الحصة تم توظيف التقويم إلكتروني
                                    حيث تم استخدام موقع إلكتروني لنشر الاختبارات عليه، بالإضافة إلى مجموعة هاتفية
                                    عبر برنامج الواتس أب تتعلق بجميع أسئلة الطالبات وعرض المسابقات الإلكترونية (
                                    كل يوم سؤال)، وملفات الإنجاز والتي تتضمن بعض نماذج الأساليب التقويمية التي
                                    تقوم بها الطالبات، بالإضافة إلى التطبيقات العملية في الفيزياء، وما تقوم به من
                                    أنشطة متنوعة تتعلق بالفيزياء سواء كانت هذه الأنشطة...</p>
                                <div class="d-flex justify-content-center">
                                    <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد</a></button>
                                </div>
                            </div>
                        </div>

                    </div>




                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="d-flex justify-content-center">
                            <button  type="button" class="btn btn-more border-all-r-30 px-5 py-1  mx-auto" ><a href="#">المزيد من خدماتنا</a></button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- achivement area start -->
        <div class="achivement-area   py-4" id="services">
            <div class="container">

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="ach-single py-5  d-flex  justify-content-center">
                            <div class="icon"><img src="{{url('/')}}/website/assets/img/stat1.png" alt=""></div>
                            <div class="pr-2">
                                <p class="num mb-0 text-center"><span class="counter" style="font-weight: 100;font-size: 40px;">+610</span></p>
                                <h5 class="title-num text-center">فكرة</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="ach-single py-5  d-flex  justify-content-center">
                            <div class="icon"><img  src="{{url('/')}}/website/assets/img/icon1.png" alt=""></div>
                            <div class="pr-2">
                                <p class="num mb-0 text-center"><span class="counter" style="font-weight: 100;font-size: 40px;">+500</span></p>
                                <h5 class="title-num text-center">مبادرة</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="ach-single py-5  d-flex  justify-content-center" >
                            <div class="icon"><img src="{{url('/')}}/website/assets/img/school.png" alt="" class="pt-3 "style="width:72px;"></div>
                            <div class="pr-3">
                                <p class="num mb-0 text-center"><span class="counter"><img style="width: 64px;" src="{{url('/')}}/website/assets/img/infinity.png" /></span></span></p>
                                <h5 class="title-num text-center">نشاط مدرسي</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="ach-single py-5  d-flex  justify-content-center">
                            <div class="icon"><img src="{{url('/')}}/website/assets/img/school-2.png" alt="" style="width: 53px; padding-top: 12px;"></div>
                            <div class="pr-3">
                                <p class="num mb-0 text-center"><span class="counter"><img style="width: 64px;" src="{{url('/')}}/website/assets/img/infinity.png" /></span></span></p>
                                <h5 class="title-num text-center">نشاط مديرية</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- achivement area end -->
        <section class="contat" id="contactUs">
            <div class="container ">
                <div class="row">
                    <div class="col-12 col-md-12 mt-5  ">
                        <hr style=" border-color: #6c757d78;">
                        <h6 class="text-center my-2 mx-auto" style="width: 320px;background-color: #ffffff;color: #f95454;position: relative;top: -44px;border-radius: 30px;padding: 5px 0 10px 0px;border-bottom: 3px solid #f95454;margin-top: 0 !important;font-size: 27px;">{{app('settings')->contact_content ?? ''}}</h6>
                    </div>
                    <!--<div class="col-12 col-md-12 my-5 "><h1 class="text-center title_section">التواصل والاقتراحات</h1></div>-->
                </div>

                <div class="row">
                    <div class="col-12 col-md-4 box-img" style="background: url('{{url('/')}}/website/assets/img/cont.png');background-repeat: no-repeat;"></div>
                    <div class="col-12 col-md-8 mr-auto   d-flex">
                        <form class="contat-box my-5"  method="post" id="contactus" novalidate="novalidate" action="#">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control validate[required]" id="name" name='username' placeholder="الاسم*" required="required" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control validate[required,custom[email]]" name='email' id="email" placeholder="البريد الإلكتروني *" required="required" />
                                </div>

                                <div class="form-group col-md-6">

                                    <input type="tel" class="form-control  validate[required,custom[onlyLetterNumber]]" name='mobile' id="tel" placeholder="رقم الهاتف *" />
                                </div>
                                <div class="form-group col-md-6">

                                    <input name="subject" type="text" class="form-control" id="inputTitle" placeholder="عنوان الرسالة*">
                                </div>
                            </div>
                            <div class="mb-3">

                                <textarea name="message" id="message" class="form-control  validate[required]" name='message' rows="9" cols="25" required="required" placeholder="الرسالة"></textarea>

                            </div>

                            <button type="submit" class="btn btn-send px-5 py-0 size-18">  إرسال</button>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#contactus').validationEngine({promptPosition: "topLeft", validateNonVisibleFields: true,
                        updatePromptsPosition: true});
                });
            </script>
            <script>
                $(function () {
                    $(function () {
                        $(document.body).on('click', '.editfild', function () {
                            var error = '';
                            var url = $(this).attr("data-url");
                            if (url == '') {
                                error += ' No Url '
                            }
                            ;
                            url = site_url + url;
                            var method = 'post';
                            if (error != '') {
                                alert(error);
                                return false;
                            }
                            ;
                            var currentpage = window.location.href;
                            var my = $(this);
                            if (url.match('form=showvideo')) {
                                var dataString = {"ajax": 1};
                                $.ajax({
                                    type: method,
                                    url: url,
                                    dataType: 'json',
                                    data: dataString,
                                    cache: false,
                                    processData: true,
                                    beforeSend: function () {
                                        my.prop("disabled", true);
                                        //showmsg('<span class="loading">.</span>','الرجاء الانتظار','#form',1);
                                    },
                                    success: function (data) {
                                        console.log(data);
                                        switch (data.state)
                                        {
                                            case "trr":
                                                my.prop("disabled", false);

                                                showmsg(data.msg, 'تمت العملية', '#form', 1);
                                                break;
                                            case "err":
                                                my.prop("disabled", false);
                                                showmsg(data.msg, 'تنبيه', '#msg');
                                                return false;
                                                break;
                                            default :
                                                my.prop("disabled", false);
                                                showmsg(data.msg, 'تنبيه', '#msg');
                                                return false;
                                        }
                                    }, error: function (data) {
                                        my.prop("disabled", false);
                                        console.log(data.responseText);
                                    }
                                });
                                my.prop("disabled", false);
                                return false;
                            }
                        });


                    });
                });
                $(function () {
                    $(document.body).on('submit', 'form', function () {
                        var error = '';
                        var url = $(this).attr("action");
                        if (url == '') {
                            error += ' No Url Form '
                        }
                        ;
                        var method = $(this).attr("method");
                        if (method == null) {
                            error += ' No method Form '
                        }
                        ;
                        if (error != '') {
                            alert(error);
                            return false;
                        }
                        ;
                        var dataString = $(this).serialize();
                        var currentpage = window.location.href;
                        var myform = $(this);
                        var action = myform.parent().parent().parent().parent().parent().attr('data-action');
                        var ctrl = myform.parent().parent().parent().parent().parent().attr('data-ctrl');
                        var btnsubmit = $(this).find($('input[type="submit"]'));
                        if (url.match('action=contactus')) {
                            var formData = new FormData(myform[0]);
                            //formData.append('active', '0');
                            $.ajax({
                                type: method,
                                url: url,
                                dataType: 'json',
                                data: dataString,
                                cache: false,
                                processData: true,
                                beforeSend: function () {

                                    myform.prop("disabled", true);
                                    showmsg('<span class="loading">.</span>', 'الرجاء الانتظار', '#msg');
                                },
                                success: function (data) {
                                    console.log(data);
                                    switch (data.state)
                                    {
                                        case "trr":
                                            myform.prop("disabled", false);
                                            showmsg(data.msg, 'تمت العملية', '#msg', false, '#form', 1000);
                                            location.reload(true);
                                            window.location.href = currentpage;
                                            break;
                                        case "err":
                                            myform.prop("disabled", false);
                                            showmsg(data.msg, 'تنبيه', '#msg');
                                            break;
                                        default :
                                            myform.prop("disabled", false);
                                            showmsg(data.msg, 'تنبيه', '#msg');
                                            return false;
                                    }
                                }, error: function (data) {
                                    myform.prop("disabled", false);
                                    console.log(data.responseText);
                                }

                            });
                            btnsubmit.removeClass('loading');
                            myform.find('input').prop("disabled", false);
                            return false;
                        }
                    });
                });

            </script>


            <section class=" footer px-0 mt-3" style="">
                <div class="container-fluid footer-d px-0">

                    <div class="sky"></div>
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-12 col-md-4 col-sm-12 logo_side ">
                                <div class="  d-flex justify-content-center">
                                    <div class="logo mr-3">
                                        <img src="{{url('/')}}/website/assets/img/logo.png" class=" mx-auto d-block " style="width:71px;">
                                        <h4 class="text-center size-24"> {{app('settings')->footer_content ?? ''}}</h4>

                                    </div>

                                </div>
                                <h6 class="text-center text-white size-12 my-3"> جميع الحقوق محفوظة لدى مؤسسة PreSchool © <span class="size-12">2019</span></span></h6>

                                <div class="raw d-flex mx-auto text-center ">
                                    <a href="#" > <img src="{{url('/')}}/website/assets/img/logo-w.png"  alt=""></a> <span class="text-white pt-2 pr-2 size-12" style="font-family: 'Roboto'; ">:Powered by</span>
                                </div>
                                <h6 class="text-uppercase font-weight-light font-12  text-center my-3 mx-auto  border-light row text-white size-12    text-center" style="    direction: ltr;">
                                    يخضع محتوى موقع حاضنة الإبداع التعليمي لقوانين الملكية الفكرية وترخيص المشاع الإبداعي التالي:
                                    <a rel="license" class="col-12 text-center font-24 mt-2" target="_blank" href="#">
                                        <span id="cc-logo" class="icon" data-toggle="tooltip" data-placement="top" data-original-title=" حقوق المشاع الإبداعي"><img class="img-fluid" width="25px" alt="cc logo" src="https://creativecommons.org/images/deed/cc_icon_white_x2.png"></span>
                                        <span id="cc-icon-nd" class="icon" data-toggle="tooltip" data-placement="top" data-original-title="يجب عليك نسب العمل لحاضنة الإبداع التعليمي بطريقة مناسبة"><img class="img-fluid" width="25px" src="https://creativecommons.org/images/deed/attribution_icon_white_x2.png"></span>
                                        <span id="cc-attribution" class="icon" data-toggle="tooltip" data-placement="top" data-original-title="لا يمكنك استخدام محتويات حاضنة الإبداع التعليمي لأغراض تجارية"><img class="img-fluid" width="25px" src="https://creativecommons.org/images/deed/nc_white_x2.png"></span>
                                        <span id="cc-icon-nc" class="icon" data-toggle="tooltip" data-placement="top" data-original-title="إذا قمت بتعديل أو تحويل أو بناء على أحد محتويات حاضنة الإبداع التعليمي فلا يمكنك توزيع المواد المعدلة"><img class="img-fluid" width="25px" src="https://creativecommons.org/images/deed/nd_white_x2.png"></span>
                                    </a>
                                </h6>
                            </div>
                            <div class="col-12 col-md-5 col-sm-12">
                                <div class="row">
                                    <div class="col-6  link_side ">
                                        <ul class="list-unstyled pt-2 text-md-right text-sm-center text-center  px-0">
                                            <li class="">
                                                <a href="#" class="link-page">الصفحة الرئيسية</a>
                                            </li>
                                            <li class="">
                                                <a href="#" class="link-page">أنشطة المدارس</a>
                                            </li>
                                            <li class="">
                                                <a href="#" class="link-page"> شركاء النجاح</a>
                                            </li>
                                            <li class="">
                                                <a href=#" class="link-page"> خدماتنا </a>
                                            </li>
                                            <li class="">
                                                <a href="#" class="link-page"> عن المؤسسة</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-6 link_side">
                                        <ul class="list-unstyled  pt-2 text-md-right text-sm-center text-center  px-0">
                                            <!--                                <li class="">-->
                                            <!--                                    <a href="--><!--" class="link-page">شروط الاستخدام</a>-->
                                            <!--                                </li>-->
                                            <li class="">
                                                <a href="#" class="link-page">بيان الخصوصية</a>
                                            </li>
                                            <li class="">
                                                <a href="#" class="link-page">حقوق الملكية الفكرية</a>
                                            </li>
                                            <li class="">
                                                <a href="#" class="link-page"> اتصل بنا</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-sm-12 link_side">
                                <ul class="list-unstyled  pt-2 text-md-right text-sm-center text-center px-0">
                                    <li class="">
                                        <h4 class="text-con pb-3 size-20">للتواصل معنا:</h4>
                                    </li>
                                    <li class="">
                                        <h4><i class="fa fa-map-marker text-center fa-lg border-left pl-4 "></i>فلسطين</h4>
                                    </li>
                                    <li class="">
                                        <h4 style="font-family: 'Roboto'"><i class="fa fa-envelope-o fa-lg  border-left pl-4"></i> INFO@RAWAFED.EDU.PS</h4>
                                    </li>
                                    <li class="">
                                        <h4 style="font-family: 'Roboto'"><i class="fa fa-volume-control-phone fa-lg  border-left pl-4"></i>00972-082889053</h4>
                                    </li>
                                </ul>
                                <ul class=" d-flex  social-foot my-4 px-0">

                                    <li class="size-16 text-right text-p mb-2 ml-2 mr-auto"><a href="https://www.facebook.com/"><img src="{{url('/')}}/website/assets/img/fac-1.png"></a></li>
                                    <li class="size-16 text-right text-p mb-2 ml-2 ml-auto"><a href="https://www.youtube.com/"><img src="{{url('/')}}/website/assets/img/google+-1.png"></a></li>
                                    <!--<li class="size-16 text-right text-p mb-2 ml-2"><a href="#"><img src="http://eduplus.ps/newtemplate/img/tw-1.png"></a></li>
                                    <li class="size-16 text-right text-p mb-2 ml-2"><a href="#"><img src="http://eduplus.ps/newtemplate/img/email.png"></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </section>










@endsection

@push('js')
@endpush

