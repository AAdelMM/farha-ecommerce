
<style>
    @media(max-width:767px){
        .ss{
            display: block;
            flex: none !important;
            display: block !important;
        }
        .sss{
            width: 100%;
            flex: none !important
        }
        .ssss{
            width: 100%;
            display: block;
            flex: none !important;
            padding-top: 5px;
            text-align: center;
        }
    }
    @media(min-width:1100px){
        .sss{
            width: 65%
        }
    }
</style>


<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row ">
        <div class="col-lg-12">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($slider as $key => $s)
                    <li data-target="#header-carousel" data-slide-to="{{$key}}" class="@if($key == 0) active @endif"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($slider as $key => $s)
                    <div class="carousel-item position-relative @if($key == 0) active @endif" style="">
                        <img class="position-absolute w-100 h-100" src="{{url('/')}}/uploads/sliders/{{$s->image}}" style="object-fit: cover;" alt="slider-{{$key}}">
                       
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->



<!-- Categories Start -->
<div class="container-fluid pt-5" dir="rtl">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">@lang('messages.categories')</span></h2>
    <div class="row px-xl-5 pb-3">
        @foreach($categories as $c)
        <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
            <a class="text-decoration-none" href="{{url('/')}}/cat/{{$c->id}}">
                <div class="cat-item d-flex align-items-center mb-4 ss">
                    <div class="overflow-hidden sss" style="min-width: 200px; height: auto;">
                        <img class="img-fluid" src="{{url('/')}}/uploads/{{$c->avatar}}" alt="{{$c->name}}">
                    </div>
                    <div class="flex-fill pl-3 ssss">
                        <h6>
                            @if (App::currentLocale() == 'en')
                                {{$c->name}}
                            @elseif (App::currentLocale() == 'ar')
                                {{$c->name_ar}}
                            @endif   
                            </h6>
                        <small class="text-body">{{$c->products_count}} @lang('messages.prod-ucts')</small>
                    </div> 
                </div>
            </a>
        </div>
        @endforeach
        
    </div>
</div>
<!-- Categories End -->


<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3 bg-white">
    <div class="row px-xl-5">
        <div class="col-md-6 ">
            <div class="product-offer mb-30" style="height: 420px;">
                <img class="img-fluid" src="img/19.jpg" alt="sale">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">@lang('messages.savenow')</h6>
                    <h3 class="text-white mb-3">@lang('messages.specialoffers')</h3>
                    <a href="{{url('/')}}/sale" class="btn btn-primary">@lang('messages.shopnow')</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="product-offer mb-30" style="height: 420px;">
                <img class="img-fluid" src="img/18.jpg" alt="all products">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">@lang('messages.slogan')</h6>
                    <h3 class="text-white mb-3">@lang('messages.semascarf')</h3>
                    <a href="{{url('/')}}/all/products" class="btn btn-primary">@lang('messages.newproducts')</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3" dir="rtl">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">@lang('messages.recent')</span></h2>
    <div class="row px-xl-5">
        @if (count($products) > 0)
            @foreach ($products as $p)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 pb-1">
                <div class="product-item bg-light mb-4 m-1  ">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="@if(App::currentLocale() == 'en') {{$p->name}} @elseif(App::currentLocale() == 'ar') {{$p->name_ar}} @endif">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square addToCart" itemid="{{$p->id}}" size="{{$p->size}}" count="1" price=@if($p->percentage != null) "{{$p->price_after}}" @else "{{$p->price}}" @endif baseurl="{{url('/')}}" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square addToFav"itemid="{{$p->id}}"baseurl="{{url('/')}}">
                                <i class=" @if(!empty($fav)) @foreach($fav as $f) @if($f->product_id == $p->id) text-primary @endif @endforeach @endif fa fa-heart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square openImage" href="{{url('/')}}/uploads/{{$p->avatar}}" data-lightbox="{{$p->slug}}" data-title="{{$p->name}}"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                        <a class="h6 text-decoration-none text-truncate" href="{{url('/')}}/products/{{$p->slug}}">
                    <div class="text-center py-4">
                            @if (App::currentLocale() == 'en')
                                {{$p->name}}
                            @elseif (App::currentLocale() == 'ar')
                                {{$p->name_ar}}
                            @endif    
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            @if($p->percentage != null)
                            <h5>{{$p->price_after}} @lang('messages.egp')</h5><h6 class="text-muted ml-2"><del>{{$p->price}} @lang('messages.egp')</del></h6>
                            @else
                            <h5>{{$p->price}} @lang('messages.egp')</h5>
                            @endif
                        </div>
                        {{-- <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div> --}}
                    </div>
                        </a>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
<a href="{{url('/')}}/all/categories" class="btn btn-primary" style="margin:0 auto;display:block;width:150px">@lang('messages.allproducts')</a>
<!-- Products End -->

<section class="about py-4 mt-5 mb-5" id="ab" style="background-image: url('{{url('/')}}/pattern.jpg');">
    <div class="container" style="">
      <div class="row" style="">
          <p class="text-center d-block py-4 mt-50 text-24" style="" dir="rtl">   
            @if (App::currentLocale() == 'en')
                {{$about[0]->text}} 
            @elseif (App::currentLocale() == 'ar')
                {{$about[0]->text_ar}} 
            @endif   
          </p>
      </div>
    </div>
  </section>
<!-- Vendor Start -->
{{-- <div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Vendor End -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            @if (App::currentLocale() == 'en')
            <h5 class="modal-title">Don't forget to use our coupon</h5>
        @elseif (App::currentLocale() == 'ar')
        <h5 class="modal-title">لا تنسى استخدام كوبون الخصم</h5>
        @endif  
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            @if (App::currentLocale() == 'en')
            <p>Use promo code: <strong style="font-weight:bolder;font-family:sans-serif;">SEMA</strong> To get 20% OFF</p>
            @elseif (App::currentLocale() == 'ar')
        <p dir="rtl" class="text-right">احصل على خصم 20% باستخدام كوبون  <strong style="font-weight:bolder;font-family:sans-serif;">SEMA</strong> في صفحة سلة التسوق</p>
        @endif  
           </div>
      </div>
    </div>
  </div>
