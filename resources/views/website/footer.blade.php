
<!-- Footer Section Begin -->
<footer class="footer">
  <div class="container">
      <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-7">
              <div class="footer__about">
                  <div class="footer__logo">
                      <a href="{{url('/')}}"><img src="{{url('/')}}/img/logo.svg" alt=""></a>
                  </div>
                  <p>
                    @lang('messages.about_1')
                </p>
                  {{-- <div class="footer__payment">
                      <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                      <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                      <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                      <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                      <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                  </div> --}}
              </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-5">
              <div class="footer__widget">
                  <h6>Quick links</h6>
                  <ul>
                      <li><a href="{{url('/')}}/about">@lang('messages.about')</a></li>
                      <li><a href="{{url('/')}}/all/products">@lang('messages.products')</a></li>
                      <li><a href="{{url('/')}}/all/categories">@lang('messages.categories')</a></li>
                      <li><a href="{{url('/')}}/blog">@lang('messages.wall')</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-4">
              <div class="footer__widget">
                  <h6>Account</h6>
                  <ul>
                      <li><a href="{{url('/')}}/cart">@lang('messages.shoppingCart')</a></li>
                      <li><a href="{{url('/')}}/my-fav">@lang('messages.fav')</a></li>
                      <li><a href="{{url('/')}}/contact-us">@lang('messages.contact')</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-4 col-md-8 col-sm-8">
              <div class="footer__newslatter">
                  <h6>NEWSLETTER</h6>
                  <form action="#">
                      <input type="text" placeholder="Email">
                      <button type="submit" class="site-btn">Subscribe</button>
                  </form>
                  <div class="footer__social">
                    @if($social->facebook != '#') <a class="social" href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook-f"></i></a> @endif 
                    @if($social->twitter != '#') <a class="social" href="{{$social->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a> @endif 
                    @if($social->instagram != '#') <a class="social" href="{{$social->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a> @endif 
                    @if($social->snapchat != '#') <a class="social" href="{{$social->snapchat}}" target="_blank"><i class="fa fa-snapchat-square"></i></a> @endif 
                    @if($social->linkedin != '#') <a class="social" href="{{$social->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a> @endif 
                    @if($social->youtube != '#') <a class="social" href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a> @endif 
                    @if($social->tiktok != '#') <a class="social" href="{{$social->tiktok}}" target="_blank"><i class="fa fa-tiktok"></i></a> @endif 
                    @if($social->telegram != '#') <a class="social" href="{{$social->telegram}}" target="_blank"><i class="fa fa-telegram"></i></a> @endif 
                    @if($social->whatsapp != '#') <a class="social" href="{{$social->whatsapp}}" target="_blank"><i class="fa fa-whatsapp"></i></a> @endif 
                    @if($social->messenger != '#') <a class="social" href="{{$social->messenger}}" target="_blank"><i class="fa fa-facebook-messenger"></i></a> @endif
                
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              <div class="footer__copyright__text">
                  <p>&copy; <script>document.write(new Date().getFullYear());</script>, All rights reserved. </p>
              </div>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
      </div>
  </div>
</footer>
<!-- Footer Section End -->
      
  </div>
  <!-- app wrapper end -->