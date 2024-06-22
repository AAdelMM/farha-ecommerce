@extends('layouts.main')

@section('content')
 <!-- Categories Section Begin -->
 
 <section class="categories mt-6">
  <div class="container-fluid mt-5">
    <!--add banner-->
    	<div class="row">
          <div class="col-lg-12 ">
           <div class="row">
             <img src="https://farha-fashion.com/uploads/banner1.jpg" class="col-12 mb-5 height: auto;"  alt="Image description">

</div>
          </div>
    </div>
    <!--end banner-->
    
    <!--category row-->
     <div class="row">
       			<!--card1-->
                 <div class="col-lg-4 ">
                   <div class="row">
                     <div class="col-lg-12">
                       <div class="categories__text d-flex justify-content-center">
                                <h1 style="font-family: 'El Messiri', sans-serif;font-size: 40px;font-weight: 600;color:#491981;">
                                  @if (App::currentLocale() == 'en')
                                  {{$categories[0]->name}}
                                  @else
                                  {{$categories[0]->name_ar}}
                                  @endif
                              	</h1>

                                {{-- <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                                edolore magna aliquapendisse ultrices gravida.</p> --}}

                        </div>
                     </div>
                   </div>
                         <div class="row">
                               <div class="col-lg-12">
                                    <a href="{{url('/')}}/cat/{{$categories[0]->id}}" class="entire-image-link"><div class="categories__item set-bg  mt-4" style="height:400px; transition: transform 0.3s ease;background-size:cover; border-radius:25px;"
                                       data-setbg="{{url('/')}}/uploads/{{$categories[0]->avatar}}"
                                       onmouseover="this.style.transform='scale(1.1)'"
                                       onmouseout="this.style.transform='scale(1)'">
                                          </div>
                                    </a>         
                                </div>
                           </div>
                     </div>
       <!--card1 end-->
       
       <!--Card2-->
        <div class="col-lg-4 ">
            <div class="row">
              <div class="col-lg-12">
                           <div class="categories__text d-flex justify-content-center">
                                <h1 style="font-family: 'El Messiri', sans-serif;font-size: 40px;font-weight: 600;color:#491981;">
                                  @if (App::currentLocale() == 'en')
                                  {{$categories[1]->name}}
                                  @else
                                  {{$categories[1]->name_ar}}
                                  @endif
                                  </h1>

                            </div>
                </div>
            </div>
          
          <div class="row">
            <div class="col-lg-12">
              	  <a href="{{url('/')}}/cat/{{$categories[1]->id}}" class="entire-image-link">  <div class="categories__item set-bg mt-4" style="height:400px; transition: transform 0.3s ease;background-size:cover; border-radius:25px;"
             data-setbg="{{url('/')}}/uploads/{{$categories[1]->avatar}}"
             onmouseover="this.style.transform='scale(1.1)'"
             onmouseout="this.style.transform='scale(1)'">
        </div>
     			</a>
            </div>
          </div>
          
                 </div>
       <!--Card2 end-->
       
       <!--Card3-->
       		 <div class="col-lg-4 ">
               <div class="row">
                 <div class="col-lg-12">
                          <div class="categories__text d-flex justify-content-center">
                              <h1 style="font-family: 'El Messiri', sans-serif;font-size: 40px;font-weight: 600;color:#491981;">
                                @if (App::currentLocale() == 'en')
                                {{$categories[2]->name}}
                                @else
                                {{$categories[2]->name_ar}}
                                @endif
                            </h1>

                          </div>
                   </div>
               </div>
               <div class="row">
                 <div class="col-lg-12">
                   	        <a href="{{url('/')}}/cat/{{$categories[2]->id}}" class="entire-image-link"> <div class="categories__item set-bg  mt-4" style="height:400px; transition: transform 0.3s ease;background-size:cover; border-radius:25px;"
             data-setbg="{{url('/')}}/uploads/{{$categories[2]->avatar}}"
             onmouseover="this.style.transform='scale(1.1)'"
             onmouseout="this.style.transform='scale(1)'">
        </div>
      </a>
                  </div>
               </div>
                  </div>
       <!--Card3 end-->
                   </div>
                <!--category end-->
                
       
                
    </div>
    
      <div class="row">
        
       
        
        <!--card start-->
        
          <div class="col-lg-4 ">
            
                     
    	  </div>
           
        <!--Card end-->
        
      <div class="col-lg-4">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
             
         </div>
          </div>
      </div>
        
        <div class="col-lg-4"  style="item-align: center;">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
        
               
              </div>
      </div>
    </div>
  </div>
    
</div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
<div class="container">
  <div class="row">
      <div class="col-lg-4 col-md-4">
          <div class="section-title">
              <h4>@lang('messages.New product')</h4>
          </div>
      </div>
      {{-- 
        <div class="col-lg-8 col-md-8">
          <ul class="filter__controls">
              <li class="active" data-filter="*">All</li>
              <li data-filter=".women">Women’s</li>
              <li data-filter=".men">Men’s</li>
              <li data-filter=".kid">Kid’s</li>
              <li data-filter=".accessories">Accessories</li>
              <li data-filter=".cosmetic">Cosmetics</li>
          </ul>
      </div> 
      --}}
  </div>
  <div class="row property__gallery">
    @forelse ($products as $p)
      <div class="col-lg-3 col-md-4 col-sm-6 mix women">
          <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="{{url('/')}}/uploads/{{$p->avatar}}">
                  <div class="label new">New</div>
                  <ul class="product__hover">
                      <li><a href="{{url('/')}}/uploads/{{$p->avatar}}" 
                        class="image-popup"><span class="arrow_expand"></span></a></li>
                      <li><a class=" addToFav" itemid="{{$p->id}}"baseurl="{{url('/')}}">
                        <span class="icon_heart_alt @if(!empty($fav)) 
                        @foreach($fav as $f) 
                         @if($f->product_id == $p->id) text-red @endif
                         @endforeach
                        @endif"></span></a></li>
                      <li><a href="{{url('/')}}/products/{{$p->slug}}"><span class="icon_bag_alt"></span></a></li>
                  </ul>
              </div>
              <div class="product__item__text">
                  <h6><a href="{{url('/')}}/products/{{$p->slug}}">
                    @if (App::currentLocale() == 'en')
                        {{$p->name}}
                    @elseif (App::currentLocale() == 'ar')
                        {{$p->name_ar}}
                    @endif    
                </a></h6>
                  {{-- <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                  </div> --}}
                  <div class="product__price">@lang('messages.egp')
                    @if($p->percentage != null)
                        {{$p->price_after}} <del>{{$p->price}}</del>
                    @else
                        {{$p->price}} 
                    @endif
                </div>
              </div>
          </div>
      </div>
      @empty
                <div class="alert alert-danger">
                    @lang('messages.ThereAreNoProductsToShow')
                </div>
      @endforelse

  </div>
</div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<!--
<section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
<div class="container">
  <div class="row">
      <div class="col-xl-7 col-lg-8 m-auto">
          <div class="banner__slider owl-carousel">
              <div class="banner__item">
                <div class="banner__text">
                    <span>The Winter Collection</span>
                    <h1>Design Your Products</h1>
                    <a href="#">Shop now</a>
                </div>
              </div>
              <div class="banner__item">
                  <div class="banner__text">
                      <span>Kids Collection</span>
                      <h1>Design</h1>
                      <a href="#">Shop now</a>
                  </div>
              </div>
              <div class="banner__item">
                  <div class="banner__text">
                      <span>The Winter Collection</span>
                      <h1>Design Your Products</h1>
                      <a href="#">Shop now</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</section>
-->
<!-- Banner Section End -->

<!-- Trend Section Begin -->

{{-- <section class="trend spad">
<div class="container">
  <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="trend__content">
              <div class="section-title">
                  <h4>Featured Products</h4>
              </div>
             <div class="row">
                <div class="col-md-4">
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{url('/')}}/img/product-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Product name</h6>
                            
                            <div class="product__price">EGP 150</div>
                        </div>
                    </div>
                </div>
             </div>
          </div>
      </div>
     
  </div>
</div>
</section> --}}

<!-- Trend Section End -->
<br/>
<!-- Discount Section Begin -->
<!--
<section class="discount">
<div class="container">
  <div class="row">
      <div class="col-lg-6 p-0">
          <div class="discount__pic">
              <img src="{{url('/')}}/img/discount.jpg" alt="">
          </div>
      </div>
      <div class="col-lg-6 p-0">
          <div class="discount__text">
              <div class="discount__text__title">
                  <span>Discount</span>
                  <h2>Winter 2024</h2>
                  <h5><span>Sale</span> 50%</h5>
              </div>
              <div class="discount__countdown" id="countdown-time">
                  <div class="countdown__item">
                      <span>22</span>
                      <p>Days</p>
                  </div>
                  <div class="countdown__item">
                      <span>18</span>
                      <p>Hour</p>
                  </div>
                  <div class="countdown__item">
                      <span>46</span>
                      <p>Min</p>
                  </div>
                  <div class="countdown__item">
                      <span>05</span>
                      <p>Sec</p>
                  </div>
              </div>
              <a href="#">Shop now</a>
          </div>
      </div>
  </div>
</div>
</section>
-->
<!-- Discount Section End -->

<!-- Services Section Begin -->
<!--
<section class="services spad">
<div class="container">
  <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="services__item">
              <i class="fa fa-car"></i>
              <h6>Fast & secure Shipping</h6>
              <p>Fast secure shipping.</p>
          </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="services__item">
              <i class="fa fa-money"></i>
              <h6>Money Back Guarantee</h6>
              <p>If good have Problems</p>
          </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="services__item">
              <i class="fa fa-support"></i>
              <h6>Online Support 24/7</h6>
              <p>Dedicated support</p>
          </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="services__item">
              <i class="fa fa-headphones"></i>
              <h6>Payment Secure</h6>
              <p>100% secure payment</p>
          </div>
      </div>
  </div>
</div>
</section>
-->

<section class="services spad">
  
  
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="services__item">
          <i class="fa fa-car"></i>
          <h6>@lang('messages.fast_secure_shipping')</h6>  <p>@lang('messages.fast_secure_shipping_desc')</p>  </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="services__item">
          <i class="fa fa-money"></i>
          <h6>@lang('messages.money_back_guarantee')</h6>  <p>@lang('messages.money_back_guarantee_desc')</p>  </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="services__item">
          <i class="fa fa-support"></i>
          <h6>@lang('messages.online_support_247')</h6>  <p>@lang('messages.dedicated_support')</p>  </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="services__item">
          <i class="fa fa-headphones"></i>
          <h6>@lang('messages.payment_secure')</h6>  <p>@lang('messages.secure_payment')</p>  </div>
      </div>
    </div>
  </div>
</section>
<script>
  const section = document.querySelector('.services');
  const language = '<?= App::currentLocale() ?>'; // PHP variable passed to JS
  section.dir = (language === 'ar') ? 'rtl' : 'ltr';
</script>
<!--<div class="product__price">
  @lang('messages.price')  @if($p->percentage != null)
    {{$p->price_after}} <del>{{$p->price}}</del>
  @else
    {{$p->price}}
  @endif
</div> -->
<!-- Services Section End -->
{{-- 
<!-- Instagram Begin -->
<div class="instagram">
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
          <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
              <div class="instagram__text">
                  <i class="fa fa-instagram"></i>
                  <a href="#">@ ashion_shop</a>
              </div>
          </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
          <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
              <div class="instagram__text">
                  <i class="fa fa-instagram"></i>
                  <a href="#">@ ashion_shop</a>
              </div>
          </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
          <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
              <div class="instagram__text">
                  <i class="fa fa-instagram"></i>
                  <a href="#">@ ashion_shop</a>
              </div>
          </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
          <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
              <div class="instagram__text">
                  <i class="fa fa-instagram"></i>
                  <a href="#">@ ashion_shop</a>
              </div>
          </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
          <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
              <div class="instagram__text">
                  <i class="fa fa-instagram"></i>
                  <a href="#">@ ashion_shop</a>
              </div>
          </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 p-0">
          <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
              <div class="instagram__text">
                  <i class="fa fa-instagram"></i>
                  <a href="#">@ ashion_shop</a>
              </div>
          </div>
      </div>
  </div>
</div>
</div> --}}
<!-- Instagram End -->

@section('scripts')
<script>
    
    $('#MMoDal').modal('show')
</script>
@stop
@endsection

