<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta property="og:image" content="{{url('/')}}/website/assets/img/def.jpg" >
    <base href="{{ route('home') }}" >
    <title>PreSchool</title>

    @include('website.layout.css')

</head>
<body  dir="rtl" class="" >

<div id="msg" class="modal animated bounceIn text-right"  data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title"></h4>
                <button type="button" class="close" style="    margin: -1rem -1rem auto -1rem;" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body ">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="photo" class="modal animated bounceIn text-right" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title"></h4>
                <button type="button" class="close" style="    margin: -1rem -1rem auto -1rem;" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="form" class="modal animated bounceIn text-right" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title"></h4>
                <button type="button" class="close" style="    margin: -1rem -1rem auto -1rem;" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div   tabindex="-1"   class="modal fade text-right" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title"></h4>
                <button type="button" class="close" style="    margin: -1rem -1rem auto -1rem;" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div  tabindex="-1"   class="modal fade text-right" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title"></h4>
                <button type="button" class="close" style="margin: -1rem -1rem auto -1rem;" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal animated fade text-right" id="video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="direction: ltr; padding-right: 17px; ">
    <div class="modal-dialog cascading-modal modal-lg" role="document" style=" border-radius: 0 0 35px 35px; overflow: hidden;  border-bottom: 5px solid #00393c;">
        <div class="modal-content ">
            <button type="button" class="close m-3" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="" data-original-title="إغلاق" style="position: absolute;left: 0;z-index: 10;background-color: #ffffff45;padding: 0;padding-right: 5px;padding-left: 6px;text-align: center;border-radius: 16px;line-height: 21px;"><span aria-hidden="true"> × </span></button>
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card-group ">
                        <div class="card card-inverse card-primary p-3 border border-light border-right" style="box-shadow: 0px 0 #e4e4e4;border-radius: 0;">
                            <div class="col p-0">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/MB8uVCMaTho?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal animated fade text-right" id="loginform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="direction: ltr; padding-right: 17px; ">
    <div class="modal-dialog cascading-modal modal-lg" role="document" style=" border-radius: 0 0 35px 35px; overflow: hidden;  border-bottom: 5px solid #00393c;">
        <div class="modal-content ">
            <button type="button" class="close text-left ml-4 pt-2" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="container modal-body">
                <div class="row  ">
                    <div class="col-12 col-md-6 d-flex justify-content-center ">
                        <img src="{{url('/')}}/website/assets/img/login-1-01.png"  width="80%"alt="" class="mx-auto  ">

                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <img src="{{url('/')}}/website/assets/img/login-1-02.png"  width="85%"alt="" class="mx-auto  ">
                        <p class="text-center px-2 size-18 mt-4 text-g">نظام تسجيل الدخول الموحد هو نظام خاص بالموظفين الحكوميين</p>
                        <a  href="#" class=" text-center  btn-moreb  border-all-r-30 px-4 py-2 mx-4 my-2 " style="font-size: 18px;" >تسجيل دخول</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-right" id="regform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="direction: ltr; padding-right: 17px;">
    <div class="modal-dialog cascading-modal modal-lg" role="document" style=" border-radius: 0 0 35px 35px; overflow: hidden;  border-bottom: 5px solid #00393c;">
        <div class="modal-content">
            <button type="button" class="close text-left ml-4 pt-2" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="container modal-body">
                <div class="row  ">
                    <div class="col-12 col-md-6 d-flex  flex-column justify-content-center border-left ">
                        <img src="{{url('/')}}/website/assets/img/dd-01.png"  width="70%"alt="" class="mx-auto  ">
                        <img src="{{url('/')}}/website/assets/img/new-user.png"  width="85%"alt="" class="mx-auto mt-4 ">
                        <p class="text-center px-2 size-18 mt-4 text-g">يمكنك إنشاء حساب جديد من خلال نظام الدخول الموحد هو نظام خاص بالموظفين الحكوميين

                        </p>
                        <a  href="#" class=" text-center  btn-moreb  border-all-r-30 px-4 py-2 mx-4 my-2 " style="font-size: 18px;" >تسجيل حساب جديد</a>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <img src="{{url('/')}}/website/assets/img/dd-01.png"  width="70%"alt="" class="mx-auto  ">
                        <img src="{{url('/')}}/website/assets/img/user-school.png"  width="85%"alt="" class="mx-auto mt-4 ">
                        <p class="text-center px-2 size-18 mt-4 text-g">حتى تتمكن من طلب اشتراك مدرسة يجب ان يكون لديك حساب نظام تسجيل الدخول الموحد، وهو نظام خاص بالموظفين الحكوميين

                        </p>
                        <a  href="#" class=" text-center  btn-moreb  border-all-r-30 px-4 py-2 mx-4 my-2 " style="font-size: 18px;" >طلب اشتراك</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade text-right" id="schoolregform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="direction: ltr; padding-right: 17px;">
    <div class="modal-dialog cascading-modal modal-md" role="document" style=" border-radius: 0 0 35px 35px; overflow: hidden;  border-bottom: 5px solid #00393c;">
        <div class="modal-content ">
            <button type="button" class="close m-3" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="top" title="" data-original-title="إغلاق" style="position: absolute;left: 0;z-index: 10;background-color: #ffffff45;padding: 0;padding-right: 5px;padding-left: 6px;text-align: center;border-radius: 16px;line-height: 21px;"  aria-hidden="true">×</button>
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card-group ">
                        <div class="card p-3" style=" box-shadow: 0px 0 #e4e4e4;border-radius: 0;">
                            <div class="card-block">
                                <form class="was-validated" validate action="#" onsubmit="return regUser('http://eduplus.ps/home/regschool', this)" autocomplete="off" method="post">
                                    <img style="width:20%" class="fluid-img row mx-auto" src="{{url('/')}}/website/assets/img/regist-1.png">
                                    <h4 class="color-7 text-center">طلب اشتراك مدرسة</h4>
                                    <p class="color-9 text-center">قم بتعبئة نموذج حول بيانات المدرسة بشكل دقيق   <br>
                                        وسيتم التحقق منها لاستكمال طلب الاشتراك </p>
                                    <div class="input-group mb-2">
                                        <input name="schoolname" class="form-control text-center " required="" type="text" placeholder="">
                                        <div class="invalid-feedback">اسم المدرسة</div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input name="schoolid" class="form-control text-center " required="" type="text" placeholder="">
                                        <div class="invalid-feedback">الرقم الوطني للمدرسة</div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input name="schooltel" class="form-control text-center " required="" type="text" placeholder="">
                                        <div class="invalid-feedback">رقم هاتف المدرسة</div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input name="mobile" class="form-control text-center " required=  type="text" placeholder="">
                                        <div class="invalid-feedback">رقم جوال للتواصل</div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <select name="scholldirid"  class="form-control text-center " required="" type="text"  style="    direction: rtl;">
                                            <option disabled selected value=""></option>
                                            <option value="1">مديرية التربية والتعليم رفح</option><option value="2">مديرية التربية والتعليم شرق خانيونس</option><option value="3">مديرية التربية والتعليم خانيونس</option><option value="4">مديرية التربية والتعليم الوسطى</option><option value="5">مديرية التربية والتعليم شرق غزة</option><option value="6">مديرية التربية والتعليم غرب غزة</option><option value="7">مديرية التربية والتعليم شمال غزة</option><option value="8">وزارة التربية والتعليم</option><option value="9">مديرية التربية والتعليم جنين</option><option value="10">مديرية التربية والتعليم نابلس</option><option value="12">مديرية التربية والتعليم جنوب نابلس</option><option value="13">مديرية التربية والتعليم سلفيت</option><option value="14">مديرية التربية والتعليم طولكرم</option><option value="15">مديرية التربية والتعليم قلقيلية</option><option value="16">مديرية التربية والتعليم رام الله والبيرة</option><option value="17">مديرية التربية والتعليم ضواحي القدس</option><option value="18">مديرية التربية والتعليم القدس</option><option value="19">مديرية التربية والتعليم بيت لحم</option><option value="20">مديرية التربية والتعليم يطا</option><option value="21">مديرية التربية والتعليم أريحا</option><option value="22">مديرية التربية والتعليم شمال الخليل</option><option value="23">مديرية التربية والتعليم الخليل</option><option value="24">مديرية التربية والتعليم جنوب الخليل</option><option value="25">مديرية التربية والتعليم قباطية</option><option value="26">مديرية التربية والتعليم طوباس</option>                                            </select>
                                        <div class="invalid-feedback">حدد المديرية</div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <select name="schoollevel" style="    direction: rtl;" class="form-control text-center " required="" type="text" placeholder="">
                                            <option value="" style="height: 0;" selected disabled></option>
                                            <option value="أساسية">أساسية</option>
                                            <option value="ثانوية">ثانوية</option>
                                        </select>
                                        <div class="invalid-feedback">المرحلة</div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <select name="types" style="    direction: rtl;" class="form-control text-center " required="" type="text" placeholder="">
                                            <option value="" style="height: 0;" selected disabled></option>
                                            <option value="ذكور">ذكور</option>
                                            <option value="إناث">اناث</option>
                                            <option value="مختلطة">مختلطة</option>
                                        </select>
                                        <div class="invalid-feedback">النوع</div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <select name="whours" style="    direction: rtl;" class="form-control text-center " required="" type="text" placeholder="">
                                            <option value="" style="height: 0;" selected disabled></option>
                                            <option value="صباحي">صباحي</option>
                                            <option value="مسائي">مسائي</option>
                                        </select>
                                        <div class="invalid-feedback">الدوام</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6  mx-auto">
                                            <button name="regist" type="submit" class="btn btn-md btn-info ">
                                                <i class="icon-login"></i>
                                                إكمال الطلب
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@yield('content')



@include('website.layout.js')


</body>
</html>
