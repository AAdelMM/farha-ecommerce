<!DOCTYPE html>
<html 
@if (App::currentLocale() == 'en')
lang="en"
@elseif (App::currentLocale() == 'ar')
lang="ar"
@endif >
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content='github@AMrrprod||WEBPROJECT'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<link rel="canonical" href="https://farha.com" />
<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Title Tag  -->
    <title>farha</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{url('/')}}/uploads/favicon/{{$favicon[0]->image}}">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
	<!-- Messenger Chat plugin Code -->
  <div id="fb-root"></div>
  <a
  href="https://wa.me/201111143403"
  class="float-wa"
  target="_blank"
  ><i class="fab fa-whatsapp"></i></a>

  @livewireStyles
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{url('/')}}/css/magnific-popup.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{url('/')}}/css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{url('/')}}/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('/')}}/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{url('/')}}/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{url('/')}}/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{url('/')}}/css/slicknav.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/new/plugins/font-awesome.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{url('/')}}/css/new/plugins/bootstrap.min.css">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{url('/')}}/css/new/plugins/swiper.min.css">
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{url('/')}}/css/new/plugins/datepicker.css">
    <!-- mapbox css -->
    <link href="{{url('/')}}/css/new/plugins/mapbox-style.css" rel='stylesheet'>
    <!-- fancybox css -->
    <link rel="stylesheet" href="{{url('/')}}/css/new/plugins/fancybox.min.css">
	<!-- StyleSheet -->
	<link rel="stylesheet" href="{{url('/')}}/css/reset.css">
  {{-- @if (App::currentLocale() == 'en')
	<link rel="stylesheet" href="{{url('/')}}/style.css?r17682ef">
@elseif (App::currentLocale() == 'ar')
<link href="{{url('/')}}/style-ar.css?re768f" rel="stylesheet">
@endif  --}}

  <link rel="stylesheet" href="{{url('/')}}/css/responsive.css?refresh17">
  <link rel="stylesheet" href="{{url('/')}}/css/new/style.css?refresh17">

</head>
<body class="js">
	

 <!-- app wrapper -->
 <div class="sb-app">
  <!-- preloader -->
  <div class="sb-preloader">
    <div class="sb-preloader-bg"></div>
    <div class="sb-preloader-body">
      <div class="sb-loading">
        <div class="sb-percent"><span class="sb-preloader-number" data-count="101">00</span><span>%</span></div>
      </div>
      <div class="sb-loading-bar">
        <div class="sb-bar"></div>
      </div>
    </div>
  </div>
  <!-- preloader end -->
  <!-- click effect -->
  <div class="sb-click-effect"></div>
  <!-- loader -->
  <div class="sb-load"></div>
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

  <!-- jquery js -->
  <script src="{{url('/')}}/js/new/plugins/jquery.min.js"></script>


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
<script src="{{url('/')}}/js/nicesellect.js"></script>
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




  <!-- smooth scroll js -->
  <script src="{{url('/')}}/js/new/plugins/smooth-scroll.js"></script>
  <!-- swup js -->
  <script src="{{url('/')}}/js/new/plugins/swup.min.js"></script>
  <!-- swiper js -->
  <script src="{{url('/')}}/js/new/plugins/swiper.min.js"></script>
  <!-- datepicker js -->
  <script src="{{url('/')}}/js/new/plugins/datepicker.js"></script>
  <!-- isotope js -->
  <script src="{{url('/')}}/js/new/plugins/isotope.js"></script>
  <!-- sticky -->
  <script src="{{url('/')}}/js/new/plugins/sticky.js"></script>
  <!-- mapbox js -->
  <script src="{{url('/')}}/js/new/plugins/mapbox.min.js"></script>
  <!-- fancybox js -->
  <script src="{{url('/')}}/js/new/plugins/fancybox.min.js"></script>
  <!-- starbelly js -->
  <script src="{{url('/')}}/js/new/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
<script src="{{url('/')}}/js/main.js"></script>
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




</script>
@livewireScripts
</body>
</html>
