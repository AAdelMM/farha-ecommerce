@extends('layouts.main')

@section('content')
<!-- Categories Section Begin -->
<section class="categories mt-6">
    <div class="container-fluid mt-5">
        <!-- Banner -->
        <div class="row">
            <div class="col-lg-12">
                <img src="https://farha-fashion.com/uploads/banner1.jpg" class="col-12 mb-5 height: auto;" alt="Banner Image">
            </div>
        </div>
        <!-- End Banner -->

        <!-- Category Rows -->
        <div class="row">
            @forelse ($categories as $category)
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="categories__text d-flex justify-content-center">
                            <h1 style="font-family: 'El Messiri', sans-serif; font-size: 40px; font-weight: 600; color:#491981;">
                                @if (App::currentLocale() == 'en')
                                    {{ $category->name }}
                                @else
                                    {{ $category->name_ar }}
                                @endif
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ url('/') }}/cat/{{ $category->id }}" class="entire-image-link">
                            <div class="categories__item set-bg mt-4" style="height:400px; transition: transform 0.3s ease; background-size:cover; border-radius:25px;"
                                data-setbg="{{ url('/') }}/uploads/{{ $category->avatar }}"
                                onmouseover="this.style.transform='scale(1.1)'"
                                onmouseout="this.style.transform='scale(1)'">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-4">
                <!-- Placeholder or message when no categories are found -->
                <p>No categories found.</p>
            </div>
            @endforelse
        </div>
        <!-- End Category Rows -->
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
        </div>
        <div class="row property__gallery">
            @forelse ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ url('/') }}/uploads/{{ $product->avatar }}">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="{{ url('/') }}/uploads/{{ $product->avatar }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a class="addToFav" itemid="{{ $product->id }}" baseurl="{{ url('/') }}"><span class="icon_heart_alt @if(!empty($fav)) @foreach($fav as $f) @if($f->product_id == $product->id) text-red @endif @endforeach @endif"></span></a></li>
                            <li><a href="{{ url('/') }}/products/{{ $product->slug }}"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ url('/') }}/products/{{ $product->slug }}">
                            @if (App::currentLocale() == 'en')
                                {{ $product->name }}
                            @elseif (App::currentLocale() == 'ar')
                                {{ $product->name_ar }}
                            @endif
                        </a></h6>
                        <div class="product__price">@lang('messages.egp')
                            @if($product->percentage != null)
                                {{ $product->price_after }} <del>{{ $product->price }}</del>
                            @else
                                {{ $product->price }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    @lang('messages.ThereAreNoProductsToShow')
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>@lang('messages.fast_secure_shipping')</h6>
                    <p>@lang('messages.fast_secure_shipping_desc')</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>@lang('messages.money_back_guarantee')</h6>
                    <p>@lang('messages.money_back_guarantee_desc')</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>@lang('messages.online_support_247')</h6>
                    <p>@lang('messages.dedicated_support')</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>@lang('messages.payment_secure')</h6>
                    <p>@lang('messages.secure_payment')</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

@section('scripts')
<script>
    const section = document.querySelector('.services');
    const language = '<?= App::currentLocale() ?>'; // PHP variable passed to JS
    section.dir = (language === 'ar') ? 'rtl' : 'ltr';
</script>
@stop

@endsection
