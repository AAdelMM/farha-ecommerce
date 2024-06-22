<!DOCTYPE html>
<html
@if (App::currentLocale() == 'en')
lang="en"
@elseif (App::currentLocale() == 'ar')
lang="ar"
@endif >
<head>

<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name='copyright' content='github@AMrrprod'>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="canonical" href="https://farha-fashion.com" />
<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Title Tag  -->
    <title>@lang('messages.brand')</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{url('/')}}/uploads/favicon/{{$favicon[0]->image}}">
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Messenger Chat plugin Code -->
  <div id="fb-root"></div>
  <a
  href="https://wa.me/201000000000"
  class="float-wa"
  target="_blank"
  ><i class="fa fa-whatsapp"></i></a>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('/')}}/css/new/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/css/new/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/css/new/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/css/new/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/css/new/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/css/new/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/css/new/slicknav.min.css" type="text/css">
    {{-- <link rel="stylesheet" href="{{url('/')}}/css/nice-select.css" type="text/css"> --}}
    <link rel="stylesheet" href="{{url('/')}}/css/new/style.css?ref" type="text/css">
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '7893713950650633');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=7893713950650633&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body class="js @if (App::currentLocale() == 'ar') ar @endif">
	 <!-- Page Preloder -->
   <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
{{-- <div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
            <div class="tip">2</div>
        </a></li>
        <li><a href="#"><span class="icon_bag_alt"></span>
            <div class="tip">2</div>
        </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="./index.html"><img src="img/logo.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="#">Login</a>
        <a href="#">Register</a>
    </div>
</div> --}}
<!-- Offcanvas Menu End -->



    @include('website.nav')

    @yield('content')

    @include('website.footer')

  <!-- Modal -->
  <div class="modal fade" id="itemAdded" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <p class="p-3 text-center">Product added to cart.</p>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue shopping</button>
          <a href="{{url('/')}}/cart" class="btn btn-primary">Go to cart</a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="peak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:90%;max-width:90%;margin:0 auto">
      <div class="modal-content">

      </div>
    </div>
  </div>

<!-- Search Begin -->
<div class="search-model">
  <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form class="search-model-form">
          <input type="text" id="search-input" placeholder="Search here.....">
      </form>
  </div>
</div>

<!-- Search End -->

<script src="{{url('/')}}/js/new/jquery-3.3.1.min.js"></script>

<script src="{{url('/')}}/js/jquery-migrate-3.0.0.js"></script>
<script src="{{url('/')}}/js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="{{url('/')}}/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{url('/')}}/js/bootstrap.min.js"></script>
<!-- Color JS -->
<script src="{{url('/')}}/js/colors.js"></script>
<!-- Slicknav JS -->
<script src="{{url('/')}}/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="{{url('/')}}/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="{{url('/')}}/js/magnific-popup.js"></script>
<!-- Waypoints JS -->
<script src="{{url('/')}}/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="{{url('/')}}/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
{{-- <script src="{{url('/')}}/js/nicesellect.js"></script> --}}
<!-- Flex Slider JS -->
<script src="{{url('/')}}/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="{{url('/')}}/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="{{url('/')}}/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="{{url('/')}}/js/easing.js"></script>
<!-- Active JS -->
<script src="{{url('/')}}/js/active.js"></script>




<!-- Js Plugins -->
<script src="{{url('/')}}/js/new/bootstrap.min.js"></script>
<script src="{{url('/')}}/js/new/jquery.magnific-popup.min.js"></script>
<script src="{{url('/')}}/js/new/jquery-ui.min.js"></script>
<script src="{{url('/')}}/js/new/mixitup.min.js"></script>
<script src="{{url('/')}}/js/new/jquery.countdown.min.js"></script>
<script src="{{url('/')}}/js/new/jquery.slicknav.js"></script>
<script src="{{url('/')}}/js/new/owl.carousel.min.js"></script>
<script src="{{url('/')}}/js/new/jquery.nicescroll.min.js"></script>
<script src="{{url('/')}}/js/new/main2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{url('/')}}/js/main.js?ref1"></script>
@yield('scripts')
<script>
  function setCookie(c_name,value,exdays){var exdate=new Date();exdate.setDate(exdate.getDate() + exdays);var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());document.cookie=c_name + "=" + c_value;}
function getCookie(c_name){var c_value = document.cookie;var c_start = c_value.indexOf(" " + c_name + "=");if (c_start == -1){c_start = c_value.indexOf(c_name + "=");}if (c_start == -1){c_value = null;}else{c_start = c_value.indexOf("=", c_start) + 1;var c_end = c_value.indexOf(";", c_start);if (c_end == -1){c_end = c_value.length;}c_value = unescape(c_value.substring(c_start,c_end));}return c_value;}
checkSession();
function checkSession(){
  var c = getCookie("visited");
  if (c === "yes") {

  } else {
   $('#staticBackdrop').modal('show')
  }
  setCookie("visited", "yes", 1); // expire in 1 year; or use null to never expire
}
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
// $(".AddToCartBtn").click(function(e){
//         $(this).children('i').toggleClass('text-primary ');
//         e.preventDefault()
//         let size = $('[name="size"]:checked').val()
//         let color = $('[name="color"]:checked').val()
//         let count = $('.toUpdate').val();
//         let price = $(this).attr('price');
//         let stock = $('[name="size"]:checked').attr('stock');
//         let id = $(this).attr('itemid')
//         let requestUrl = $(this).attr('baseurl') + '/cart'
//         if(stock >= count && count > 0){
//             $.ajax({
//                 type:"POST",
//                 data: {id:id, size:size, count:count, price:price, color:color},
//                 url: requestUrl,
//                 success: function(res) {
//                     console.log(res);
//                     if(res == 301){
//                         $.notify("Please Login first", "Danger");
//                         setTimeout(function(){window.location.href = '/login'}, 2000);
//                     }else{
//                         $('#itemAdded').modal('show').delay(100).slideUp(1000);
//                     }
//                 }
//             });
//         }else{
//             $.notify("Available stock is: " +  stock, "Danger");
//         }

//     })



</script>
</body>
</html>
