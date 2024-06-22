@extends('layouts.main')

@section('content')
<style>
    #carouselExampleIndicators{
        margin-top: 100px !important;
    }
</style>
    <!-- dynamic content -->
    <div id="sb-dynamic-content" class="sb-transition-fade">

      <!-- banner -->
      <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          @foreach($slider as $key => $s)
            <div class="carousel-item @if($key == 0) active @endif" style="">
                <img class=" w-100 " src="{{url('/')}}/uploads/sliders/{{$s->image}}" />
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- banner end -->

      <!-- features -->
      <section class="sb-p-60-0" id="ABoutUs">
        <div class="container">
          <div class="row flex-md-row-reverse justify-content-md-center">
            {{-- <div class="col-lg-6 align-self-center sb-mb-30">
              <h2 class="sb-mb-60">@lang('messages.aboutus')</h2>
              <p>
                @if (App::currentLocale() == 'en')
                    {{$about[0]->text}} 
                @elseif (App::currentLocale() == 'ar')
                    {{$about[0]->text_ar}} 
                @endif   
              </p>
            </div> --}}
            <div class="col-lg-6 align-self-center">
              <div class="sb-illustration-2 sb-mb-90">
                <div class="sb-interior-frame">
                  <img src="{{url('/')}}/ab.jpg" alt="aboutus" class="sb-interior">
                </div>
                <div class="sb-square"></div>
                <div class="sb-cirkle-1"></div>
                <div class="sb-cirkle-2"></div>
                <div class="sb-cirkle-3"></div>
                <div class="sb-cirkle-4"></div>
                <div class="sb-experience">
                  {{-- <div class="sb-exp-content">
                    <p class="sb-h1 sb-mb-10">1</p>
                    <p class="sb-h3">Years Experiense</p>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- features end -->
      
      <!-- categories -->
      <section class="sb-p-0-60">
        <div class="container">
          <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
              <h2 class="sb-mb-30">@lang('messages.categories')</h2>
            </div>
            <div class="sb-right sb-mb-30">
              <!-- button -->
              <a href="{{url('/')}}/all/products" class="sb-btn sb-m-0">
                <span class="sb-icon">
                  <img src="{{url('/')}}/img/ui/icons/arrow.svg" alt="icon">
                </span>
                <span>@lang('messages.products')</span>
              </a>
              <!-- button end -->
            </div>
          </div>
          <div class="row">
            @foreach($categories as $c)
              <div class="col-lg-4">
                <a href="{{url('/')}}/cat/{{$c->id}}" class="sb-categorie-card sb-categorie-card-2 sb-mb-30">
                  <div class="sb-card-body">
                    <div class="sb-category-icon">
                      <img src="{{url('/')}}/uploads/{{$c->avatar}}" alt="icon">
                    </div>
                    <div class="sb-card-descr">
                      <h3 class="sb-mb-10"> @if (App::currentLocale() == 'en')
                        {{$c->name}}
                    @elseif (App::currentLocale() == 'ar')
                        {{$c->name_ar}}
                    @endif   </h3>
                      <p class="sb-text">{{$c->products_count}} @lang('messages.prod-ucts')</p>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
          </div>
        </div>
      </section>
      <!-- categories end -->

      <!-- short menu -->
      <section class="sb-short-menu sb-p-0-90">
        <div class="sb-bg-2">
          <div></div>
        </div>
        <div class="container">
          <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
              <h2 class="sb-mb-30">@lang('messages.newproducts')</h2>
              {{-- <p class="sb-text">Explore Our latest Products</p> --}}
            </div>
            <div class="sb-right sb-mb-30">
              <!-- slider navigation -->
              <div class="sb-slider-nav">
                <div class="sb-prev-btn sb-short-menu-prev"><i class="fas fa-arrow-left"></i></div>
                <div class="sb-next-btn sb-short-menu-next"><i class="fas fa-arrow-right"></i></div>
              </div>
              <!-- slider navigation end -->
              <!-- button -->
              <a href="menu-1.html" class="sb-btn">
                <span class="sb-icon">
                  <img src="{{url('/')}}/img/ui/icons/menu.svg" alt="icon">
                </span>
                <span>@lang('messages.products')</span>
              </a>
              <!-- button end -->
            </div>
          </div>
          <div class="swiper-container sb-short-menu-slider-4i">
            <div class="swiper-wrapper">

              @forelse ($products as $p)
              <div class="swiper-slide">
                <a class="sb-menu-item">
                  <div class="sb-cover-frame">
                    <img src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                  </div>
                  <div class="sb-card-tp">
                    <h4 class="sb-card-title" href="{{url('/')}}/product/{{$p->slug}}">{{$p->name}}</h4>
                    <div class="sb-price"><sub>@lang('messages.egp') </sub> 
                      @if($p->percentage != null)
                        {{$p->price_after}} <del>{{$p->price}}</del>
                      @else
                        {{$p->price}} 
                      @endif
                    </div>
                  </div>
                  <div class="sb-card-buttons-frame produ">

                    <!-- button -->
                    <a href="#" 
                      class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0 addToFav"
                      itemid="{{$p->id}}"baseurl="{{url('/')}}">
                      <span class="sb-icon nn n">
                        <i class="@if(!empty($fav)) 
                        @foreach($fav as $f) 
                         @if($f->product_id == $p->id) text-primary @endif
                         @endforeach
                        @endif fas fa-heart"></i>
                      </span>
                    </a>
                    <!-- button end -->

                    <!-- button -->
                    <a href="{{url('/')}}/products/{{$p->slug}}" 
                      class="sb-btn sb-btn-2 sb-btn-gray sb-btn-icon sb-m-0">
                      <span class="sb-icon nn">
                        <img src="{{url('/')}}/img/ui/icons/arrow.svg" alt="icon">
                      </span>
                    </a>
                    <!-- button end -->

                    <!-- button -->
                    {{-- <a href="#." class="sb-btn sb-atc">
                      <span class="sb-icon">
                        <img src="{{url('/')}}/img/ui/icons/cart.svg" alt="icon">
                      </span>
                      <span class="sb-add-to-cart-text">Add to cart</span>
                      <span class="sb-added-text">Added</span>
                    </a> --}}
                    <!-- button end -->

                  </div>
                  {{-- <div class="sb-card-tp">
                    <a href="" class="inf"><i class="fas fa-shopping-cart"></i> @lang('messages.addtocart')</a>
                    <a href="{{url('/')}}/products/{{$p->slug}}" class="inf">@lang('messages.show')</a>
                  </div> --}}
                  <div class="sb-description">
                    <p class="sb-text sb-mb-15"><span>{{$p->description}}</span></p>
                   
                  </div>
                </a>
              </div>
              @empty
                
              @endforelse
            </div>
          </div>
        </div>
      </section>
      <!-- short menu end -->

      <!-- team -->
      {{-- <section class="sb-p-0-60">
        <div class="container">
          <div class="sb-group-title sb-mb-30">
            <div class="sb-left sb-mb-30">
              <h2 class="sb-mb-30">They will <span>cook</span> for you</h2>
              <p class="sb-text">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p>
            </div>
            <div class="sb-right sb-mb-30">
              <!-- button -->
              <a href="about-1.html" class="sb-btn sb-m-0">
                <span class="sb-icon">
                  <img src="{{url('/')}}/img/ui/icons/arrow.svg" alt="icon">
                </span>
                <span>More about us</span>
              </a>
              <!-- button end -->
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="sb-team-member sb-mb-30">
                <div class="sb-photo-frame sb-mb-15">
                  <img src="{{url('/')}}/img/team/1.png" alt="Team member">
                </div>
                <div class="sb-member-description">
                  <h4 class="sb-mb-10">Paul Trueman</h4>
                  <p class="sb-text sb-text-sm sb-mb-10">Chef</p>
                  <ul class="sb-social">
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="sb-team-member sb-mb-30">
                <div class="sb-photo-frame sb-mb-15">
                  <img src="{{url('/')}}/img/team/2.png" alt="Team member">
                </div>
                <div class="sb-member-description">
                  <h3 class="sb-mb-10">Emma Newman</h3>
                  <p class="sb-text sb-text-sm sb-mb-10">Assistant chef</p>
                  <ul class="sb-social">
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="sb-team-member sb-mb-30">
                <div class="sb-photo-frame sb-mb-15">
                  <img src="{{url('/')}}/img/team/3.png" alt="Team member">
                </div>
                <div class="sb-member-description">
                  <h3 class="sb-mb-10">Oscar Oldman</h3>
                  <p class="sb-text sb-text-sm sb-mb-10">Chef</p>
                  <ul class="sb-social">
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="sb-team-member sb-mb-30">
                <div class="sb-photo-frame sb-mb-15">
                  <img src="{{url('/')}}/img/team/4.png" alt="Team member">
                </div>
                <div class="sb-member-description">
                  <h3 class="sb-mb-10">Ed Freeman</h3>
                  <p class="sb-text sb-text-sm sb-mb-10">Assistant chef</p>
                  <ul class="sb-social">
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                    <li><a href="#."><i class="far fa-circle"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
      <!-- team end -->

      <!-- call to action -->
      {{-- <section class="sb-call-to-action">
        <div class="sb-bg-3"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="sb-cta-text">
                <h2 class="sb-h1 sb-mb-30">Download our mobile app.</h2>
                <p class="sb-text sb-mb-30">Consectetur numquam poro nemo veniam<br>eligendi rem adipisci quo modi.</p>
                <a href="#." target="_blank" data-no-swup class="sb-download-btn"><img src="{{url('/')}}/img/buttons/1.svg" alt="{{url('/')}}/img"></a>
                <a href="#." target="_blank" data-no-swup class="sb-download-btn"><img src="{{url('/')}}/img/buttons/2.svg" alt="{{url('/')}}/img"></a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="sb-illustration-3">
                <img src="{{url('/')}}/img/illustrations/phones.png" alt="phones" class="sb-phones">
                <div class="sb-cirkle-1"></div>
                <div class="sb-cirkle-2"></div>
                <div class="sb-cirkle-3"></div>
                <div class="sb-cirkle-4"></div>
                <img src="{{url('/')}}/img/illustrations/1.svg" alt="phones" class="sb-pik-1">
                <img src="{{url('/')}}/img/illustrations/2.svg" alt="phones" class="sb-pik-2">
                <img src="{{url('/')}}/img/illustrations/3.svg" alt="phones" class="sb-pik-3">
              </div>
            </div>
          </div>
        </div>
      </section> --}}
      <!-- call to action end -->

@section('scripts')
<script>
    
    $('#MMoDal').modal('show')
</script>
@stop
@endsection

