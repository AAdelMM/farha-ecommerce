@extends('layouts.main')

@section('content')

<style>
    header.all-category, header.main-category{
        display: none;
   }
</style>

<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class=" pr-3">@lang('messages.allproducts')</span>
        <span class=" float-right">
            <div class="dropdown filter">
                <button class="btn btn-block  dropdown-toggle" style="width: 150px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('messages.sort')
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="?sort=price&value=tolow">@lang('messages.sort-price-highto')</a>
                  <a class="dropdown-item" href="?sort=price&value=tohigh">@lang('messages.sort-price-lowto')</a>
                  <a class="dropdown-item" href="?sort=latest">@lang('messages.sort-latest')</a>
                </div>
              </div>
        </span>
        
    </h2>
</div>
<div class="container-fluid pb-3 mt-5">
    <div class="row w-100 m-0">
      @forelse ($products as $p)
      <div class="col-lg-3 col-md-3 col-sm-6 col-6">
          <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="{{url('/')}}/uploads/{{$p->avatar}}">
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
<!-- Products End -->

<div class="pagination d-flex justify-content-center">
   
    {{ $products->withQueryString()->links() }}
 
  </div>



@endsection

