<!-- latest jquery-->
<script src="{{url(webaAssets('store'))}}/js/jquery-3.3.1.min.js"></script>

<!-- fly cart ui jquery-->
<script src="{{url(webaAssets('store'))}}/js/jquery-ui.min.js"></script>

<!-- exitintent jquery-->
<script src="{{url(webaAssets('store'))}}/js/jquery.exitintent.js"></script>
<script src="{{url(webaAssets('store'))}}/js/exit.js"></script>

<!-- popper js-->
<script src="{{url(webaAssets('store'))}}/js/popper.min.js"></script>

<!-- slick js-->
<script src="{{url(webaAssets('store'))}}/js/slick.js"></script>

<!-- menu js-->
<script src="{{url(webaAssets('store'))}}/js/menu.js"></script>

<!-- lazyload js-->
<script src="{{url(webaAssets('store'))}}/js/lazysizes.min.js"></script>

<!-- Bootstrap js-->
<script src="{{url(webaAssets('store'))}}/js/bootstrap.js"></script>

<!-- Bootstrap Notification js-->
<script src="{{url(webaAssets('store'))}}/js/bootstrap-notify.min.js"></script>

<!-- Fly cart js-->
<script src="{{url(webaAssets('store'))}}/js/fly-cart.js"></script>

<!-- Theme js-->
<script src="{{url(webaAssets('store'))}}/js/script.js"></script>

<script>
    $(window).on('load', function () {
        setTimeout(function () {
            $('#exampleModal').modal('show');
        }, 2500);
    });
    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>


@include('sweet::alert')

@yield('js')
