@extends('layouts.main')

@section('content')

<style>
    header .all-category, header .main-category{
        display: none;
    }
</style>
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class=" pr-3">@lang('messages.resultsfor') {{$query}}</span></h2>
    <div class="row px-xl-5">
        @if (count($products) > 0)
            @foreach ($products as $p)
            
            <div class="col-xl-3 col-lg-4 col-md-4 col-6">
                <div class="single-product">
                    <div class="product-img">
                        <a href="{{url('/')}}/products/{{$p->slug}}">
                            <img class="default-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                           <img class="hover-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}"> 
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                {{-- <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a> --}}
                                <a title="Wishlist" class="addToFav" itemid="{{$p->id}}"baseurl="{{url('/')}}"><i class="@if(!empty($fav)) @foreach($fav as $f) @if($f->product_id == $p->id) text-primary @endif @endforeach @endif ti-heart "></i><span>Add to Wishlist</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" class="addToCart" itemid="{{$p->id}}" size="{{$p->size}}" count="1" price=@if($p->percentage != null) "{{$p->price_after}}" @else "{{$p->price}}" @endif baseurl="{{url('/')}}">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="{{url('/')}}/products/{{$p->slug}}"> 
                            @if (App::currentLocale() == 'en')
                            {{$p->name}}
                        @elseif (App::currentLocale() == 'ar')
                            {{$p->name_ar}}
                        @endif </a></h3>
                        <div class="product-price">
                            <span>
                                @if($p->percentage != null)
                                {{$p->price_after}} @lang('messages.egp') &nbsp; <del>{{$p->price}} @lang('messages.egp')</del>
                            @else
                            {{$p->price}} @lang('messages.egp')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
<!-- Products End -->
<div class="pagination">
   
    {{ $products->withQueryString()->links() }}
 
  </div>



@endsection

