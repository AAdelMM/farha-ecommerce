<div>
 <!-- dynamic content -->
 <div id="sb-dynamic-content" class="sb-transition-fade">

    <!-- banner -->
    <section class="sb-banner sb-banner-xs sb-banner-color">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- main title -->
            <div class="sb-main-title-frame">
              <div class="sb-main-title">
                <h1 class="sb-h2">
                    @if (App::currentLocale() == 'en')
                    {{$p[0]->name}}
                @elseif (App::currentLocale() == 'ar')
                    {{$p[0]->name_ar}}
                @endif  
                </h1>
                <ul class="sb-breadcrumbs">
                  <li><a href="{{url('/')}}">@lang('messages.home')</a></li>
                  <li><a href="{{url('/')}}/all-products">@lang('messages.products')</a></li>
                  <li><a href="#.">
                    @if (App::currentLocale() == 'en')
                    {{$p[0]->name}}
                @elseif (App::currentLocale() == 'ar')
                    {{$p[0]->name_ar}}
                @endif      
                </a></li>
                </ul>
              </div>
            </div>
            <!-- main title end -->
          </div>
        </div>
      </div>
    </section>
    <!-- banner end -->

    <!-- product -->
    <section class="sb-p-90-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="sb-gallery-item sb-gallery-square sb-mb-90">
                    <img src="{{url('/')}}/uploads/{{$p[0]->avatar}}" alt="photo">
                    {{-- <div class="sb-badge sb-vegan"><i class="fas fa-leaf"></i> Vegan</div> --}}
                    <!-- button -->
                    <a data-fancybox="menu" data-no-swup href="{{url('/')}}/uploads/{{$p[0]->avatar}}" class="sb-btn sb-btn-2 sb-btn-icon sb-btn-gray sb-zoom">
                      <span class="sb-icon">
                        <img src="{{url('/')}}/img/ui/icons/zoom.svg" alt="icon">
                      </span>
                    </a>
                    <!-- button end -->
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="sb-gallery-item sb-gallery-square sb-mb-90">
                    <img src="{{url('/')}}/uploads/{{$p[0]->avatar}}" alt="photo">
                    {{-- <div class="sb-badge sb-vegan"><i class="fas fa-leaf"></i> Vegan</div> --}}
                    <!-- button -->
                    <a data-fancybox="menu" data-no-swup href="{{url('/')}}/uploads/{{$p[0]->avatar}}" class="sb-btn sb-btn-2 sb-btn-icon sb-btn-gray sb-zoom">
                      <span class="sb-icon">
                        <img src="{{url('/')}}/img/ui/icons/zoom.svg" alt="icon">
                      </span>
                    </a>
                    <!-- button end -->
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="sb-gallery-item sb-gallery-square sb-mb-90">
                    <img src="{{url('/')}}/uploads/{{$p[0]->avatar}}" alt="photo">
                    {{-- <div class="sb-badge sb-vegan"><i class="fas fa-leaf"></i> Vegan</div> --}}
                    <!-- button -->
                    <a data-fancybox="menu" data-no-swup href="{{url('/')}}/uploads/{{$p[0]->avatar}}" class="sb-btn sb-btn-2 sb-btn-icon sb-btn-gray sb-zoom">
                      <span class="sb-icon">
                        <img src="{{url('/')}}/img/ui/icons/zoom.svg" alt="icon">
                      </span>
                    </a>
                    <!-- button end -->
                  </div>
                </div>
                @foreach ($sizes as $c)
                    <div class="carousel-item" id="rtg{{$c->color_id}}">
                      <div class="sb-gallery-item sb-gallery-square sb-mb-90">
                        <img src="{{url('/')}}/uploads/{{$c->image}}" alt="photo">
                        {{-- <div class="sb-badge sb-vegan"><i class="fas fa-leaf"></i> Vegan</div> --}}
                        <!-- button -->
                        <a data-fancybox="menu" data-no-swup href="{{url('/')}}/uploads/{{$c->image}}" 
                          class="sb-btn sb-btn-2 sb-btn-icon sb-btn-gray sb-zoom">
                          <span class="sb-icon">
                            <img src="{{url('/')}}/img/ui/icons/zoom.svg" alt="icon">
                          </span>
                        </a>
                        <!-- button end -->
                      </div>
                    </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
            
          </div>
          <div class="col-lg-6">
            <div class="sb-product-description sb-mb-90">
              <div class="sb-price-frame sb-mb-30">
                <h3>
                    @if (App::currentLocale() == 'en')
                        {{$p[0]->name}}
                    @elseif (App::currentLocale() == 'ar')
                        {{$p[0]->name_ar}}
                    @endif
                </h3>
                <div class="sb-price"><sub>@lang('messages.egp')</sub>  
                    @if(count($sale) > 0)
                    {{$sale[0]->price_after}} <del> {{$p[0]->price}} </del>
                @else
                    {{$p[0]->price}}
                @endif
            </div>
              </div>
              <p class="sb-text sb-mb-30"> 
                @if (App::currentLocale() == 'en')
                    {{$p[0]->description}}
                @elseif (App::currentLocale() == 'ar')
                    {{$p[0]->description_ar}}
                @endif  
                </p>
              <div class="row availColors">
                <div class="sb-price-frame sb-mb-10 text-center d-block w-100 p-2">
                  <h3 class="text-center ">
                      @lang('messages.AvailableColors')
                  </h3>
                </div>
                @foreach ($colors as $key => $c)
                <label for="color{{$c->id}}" data-target="#carouselExampleIndicators" 
                  class="myslide @if($key == 0) active @endif" data-slide-to="#rtg{{$c->id}}">
                  <span style="background-color:{{$c->color_code}}"></span>
                  @if (App::currentLocale() == 'en')
                    {{$c->color}}
                  @elseif (App::currentLocale() == 'ar')
                    {{$c->color_ar}}
                  @endif
                </label>
                  <input type="radio" name="color" id="color{{$c->id}}" value="{{$c->id}}"/>
                @endforeach
               </div>

               <div class="row availSize">
                <div class="sb-price-frame sb-mb-10 text-center d-block w-100 p-2">
                  <h3 class="text-center">
                      @lang('messages.sizes')
                  </h3>
                </div>
                @foreach($sizes as $c)
                <span class="singleSize">
                  <label for="size{{$c->id}}" class="SizeSlider">
                    {{$c->size}}
                </label>
                  <input type="radio" name="size" id="size{{$c->id}}" value="{{$c->id}}"/>
                </span>
                @endforeach
               </div>
              <div class="sb-buttons-frame">
                <div class="sb-input-number-frame">
                  <div class="sb-input-number-btn sb-sub">-</div>
                  <input type="number" value="1" min="1" max="10">
                  <div class="sb-input-number-btn sb-add">+</div>
                </div>
                <!-- button -->
                <a href="#." class="sb-btn sb-atc">
                  <span class="sb-icon">
                    <img src="{{url('/')}}/img/ui/icons/cart.svg" alt="icon">
                  </span>
                  <span class="sb-add-to-cart-text">Add to cart</span>
                  <span class="sb-added-text">Added</span>
                </a>
                <!-- button end -->
              </div>
            </div>
          </div>
        </div>
        <!-- filter -->
        <div class="sb-filter">
          <a href="#." data-filter=".sb-ingredients-tab" class="sb-filter-link sb-active">
            @lang('messages.additionalinfo')
          </a>
          <a href="#." data-filter=".sb-details-tab" class="sb-filter-link">
            @lang('messages.productDesc')
          </a>
        </div>
        <!-- filter end -->
        <div class="sb-masonry-grid sb-tabs">
          <div class="sb-grid-sizer"></div>
          <div class="sb-grid-item sb-ingredients-tab">
            <div class="sb-tab">
              <ul class="sb-list">
                
                @foreach($product_info as $info)
                <li class="list-group-item px-0" style="padding:5px;border:none;border-bottom:1px solid #EEE">
                    @if (App::currentLocale() == 'en')
                    <h3 class="text-primary">{{$info->title}}</h3>
                    {{$info->description}}
                @elseif (App::currentLocale() == 'ar')
                    <h3 class="text-primary">{{$info->title_ar}}</h3>
                    {{$info->description_ar}}
                @endif    
                </li>
            @endforeach
              </ul>
            </div>
          </div>
          <div class="sb-grid-item sb-details-tab" style="position: absolute">
            <div class="sb-tab">
              <p class="sb-text sb-mb-15">
                @if (App::currentLocale() == 'en')
                    {{$p[0]->description}}
                @elseif (App::currentLocale() == 'ar')
                    {{$p[0]->description_ar}}
                @endif
              </p>
            </div>
          </div>
        
        </div>
      </div>
    </section>
    <!-- product end -->

    <!-- short menu -->
    <section class="sb-short-menu sb-p-0-90">
      <div class="sb-bg-2">
        <div></div>
      </div>
      <div class="container">
        <div class="sb-group-title sb-mb-30">
          <div class="sb-left sb-mb-30">
            <h2 class="sb-cate-title sb-mb-30">@lang('messages.youMayAlsoLike')</h2>
            {{-- <p class="sb-text">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p> --}}
          </div>
          <div class="sb-right sb-mb-30">
            <!-- slider navigation -->
            <div class="sb-slider-nav">
              <div class="sb-prev-btn sb-short-menu-prev"><i class="fas fa-arrow-left"></i></div>
              <div class="sb-next-btn sb-short-menu-next"><i class="fas fa-arrow-right"></i></div>
            </div>
            <!-- slider navigation end -->
          </div>
        </div>
        <div class="swiper-container sb-short-menu-slider-4i">
          <div class="swiper-wrapper">
          @foreach($more as $m)
            <div class="swiper-slide">
              <div class="sb-menu-item">
                <a href="shop-list-1.html" class="sb-cover-frame">
                  <img src="{{url('/')}}/uploads/{{$m->avatar}}" alt="{{$m->name}}">
                </a>
                <div class="sb-card-tp">
                  <h4 class="sb-card-title"><a href="{{url('/')}}/product/{{$m->slug}}">{{$m->name}}</a></h4>
                  <div class="sb-price"><sub>@lang('messages.egp') </sub> 
                    @if($m->percentage != null)
                      {{$m->price_after}} <del>{{$m->price}}</del>
                    @else
                      {{$m->price}} 
                    @endif</div>
                </div>
                <div class="sb-description">
                  <p class="sb-text sb-mb-15"><span>tomatoes</span>, <span>nori</span>, <span>feta cheese</span>, <span>mushrooms</span>, <span>rice noodles</span>, <span>corn</span>, <span>shrimp</span>.</p>
                </div>
                <div class="sb-card-buttons-frame produ">
                   <!-- button -->
                   <a href="#" 
                   class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0 addToFav"
                   itemid="{{$m->id}}"baseurl="{{url('/')}}">
                   <span class="sb-icon nn n">
                     <i class="@if(!empty($fav)) 
                     @foreach($fav as $f) 
                      @if($f->product_id == $m->id) text-primary @endif
                      @endforeach
                     @endif fas fa-heart"></i>
                   </span>
                 </a>
                 <!-- button end -->
                 <!-- button -->
                 <a href="{{url('/')}}/products/{{$m->slug}}" 
                   class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0">
                   <span class="sb-icon nn">
                     <img src="{{url('/')}}/img/ui/icons/arrow.svg" alt="icon">
                   </span>
                 </a>
                 <!-- button end -->
                  <!-- button -->
                  <a href="#." class="sb-btn sb-atc addToCart" itemid="{{$m->id}}" size="{{$m->size}}" count="1" 
                    price=@if($m->percentage != null) "{{$m->price_after}}" @else "{{$m->price}}" @endif
                    baseurl="{{url('/')}}">
                    <span class="sb-icon">
                      <img src="{{url('/')}}/img/ui/icons/cart.svg" alt="icon">
                    </span>
                    <span class="sb-add-to-cart-text">Add to cart</span>
                    <span class="sb-added-text">Added</span>
                  </a>
                  <!-- button end -->
                </div>
              </div>
            </div>
@endforeach
          </div>
        </div>
      </div>
    </section>
    <!-- short menu end -->
</div>
