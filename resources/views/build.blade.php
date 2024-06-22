@extends('layouts.main')

@section('content')

<style>
    header .all-category, header .main-category{
        display: none;
    }
</style>
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class=" pr-3"><strong>
           @lang('messages.Build_your_elevator') 
    </h2>
</div>


<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-4 col-12">
            <div class="stage-box" stage="stage1">
                <h3 class="text-center" style="font-size:16px">@lang('messages.stage1')</h3>
                <span class="p-3 d-block">
                    @if (App::currentLocale() == 'en')
                        <ul class="list-unstyled">
                            <li><i class="ti-check px-1 text-primary"></i> Choose Doors</li>
                            <li><i class="ti-check px-1 text-primary"></i> Choose guide rails</li>
                            <li><i class="ti-check px-1 text-primary"></i> Send your information</li>
                            <li><i class="ti-check px-1 text-primary"></i> We will contact you</li>
                        </ul>
                    @elseif(App::currentLocale() == 'ar')
                    <ul class="list-unstyled" dir="rtl">
                        <li class="text-right"><i class="ti-check px-1 text-primary"></i> اختر الابواب</li>
                        <li class="text-right"><i class="ti-check px-1 text-primary"></i> اختر الدلائل</li>
                        <li class="text-right"><i class="ti-check px-1 text-primary"></i> ارسل بياناتك</li>
                        <li class="text-right"><i class="ti-check px-1 text-primary"></i> سيتم التواصل معك</li>
                    </ul>
                    @endif
                </span>
            </div>
        </div>
        
        <div class="col-md-4 col-12">
            <div class="stage-box" stage="stage2">
                <h3 class="text-center" style="font-size:16px">@lang('messages.stage2')</h3>
                <span class="p-3 d-block">
                    @if (App::currentLocale() == 'en')
                        <ul class="list-unstyled">
                            <li><i class="ti-check px-1 text-primary"></i> Choose cabin</li>
                            <li><i class="ti-check px-1 text-primary"></i> Choose motor</li>
                            <li><i class="ti-check px-1 text-primary"></i> Send your information</li>
                            <li><i class="ti-check px-1 text-primary"></i> We will contact you</li>
                        </ul>
                    @elseif(App::currentLocale() == 'ar')
                    <ul class="list-unstyled" dir="rtl">
                        <li  class="text-right"><i class="ti-check px-1 text-primary"></i> اختر الكابينة</li>
                        <li  class="text-right"><i class="ti-check px-1 text-primary"></i> اختر الماكينة</li>
                        <li  class="text-right"><i class="ti-check px-1 text-primary"></i> ارسل بياناتك</li>
                        <li  class="text-right"><i class="ti-check px-1 text-primary"></i> سيتم التواصل معك</li>
                    </ul>
                    @endif
                </span>
            </div>
        </div>
        
        <div class="col-md-4 col-12">
            <div class="stage-box" stage="stage3">
                <h3 class="text-center" style="font-size:16px">@lang('messages.stage3')</h3>
                <span class="p-3 d-block">
                    @if (App::currentLocale() == 'en')
                        <ul class="list-unstyled">
                            <li><i class="ti-check px-1 text-primary"></i> Choose electrical supplies</li>
                            <li><i class="ti-check px-1 text-primary"></i> Operation</li>
                            <li><i class="ti-check px-1 text-primary"></i> Send your information</li>
                            <li><i class="ti-check px-1 text-primary"></i> We will contact you</li>
                        </ul>
                    @elseif(App::currentLocale() == 'ar')
                    <ul class="list-unstyled" dir="rtl">
                        <li class="text-right"><i class="ti-check px-1 text-primary"></i> اختر مستلزمات الكهرباء</li>
                        <li class="text-right"><i class="ti-check px-1 text-primary"></i>  التشغيل</li>
                        <li class="text-right"><i class="ti-check px-1 text-primary"></i> ارسل بياناتك</li>
                        <li class="text-right"><i class="ti-check px-1 text-primary"></i> سيتم التواصل معك</li>
                    </ul>
                    @endif
                </span>
            </div>
        </div>

    </div>
</div>



<div class="container-fluid stage1 stages">
    <div class="contact-us">
    <form method="post" class="form" id="contactForm" action="{{url('/')}}/build-elevator">
        @csrf
        <input type="hidden" name="stage" value="1"/>
        <h4 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class=" pr-3"><strong>
                @if (App::currentLocale() == 'en')
               {{$doorCat->name}}
               @elseif (App::currentLocale() == 'ar')
                {{$doorCat->name_ar}}
               @endif
        </h4>
    <div class="row px-xl-5">
       @foreach($doors as $p)
       <div class="col-xl-2 col-lg-2 col-md-3 col-6">
        <input type="radio" name="door" id="door{{$p->id}}" value="{{$p->id}}" />
        <label for="door{{$p->id}}">
            <div class="single-product p-0 m-0">
                <div class="product-img">
                    <a >
                        <img class="default-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @if(is_null($p->plusPic))
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @else
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->plusPic}}" alt="{{$p->name}}">
                        @endif    
                    </a>
                    
                </div>
                <div class="product-content">
                    <h3><a href="{{url('/')}}/products/{{$p->slug}}" target="_blank"> 
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
        </label>
    </div>
       @endforeach
    </div>


        <h4 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class=" pr-3"><strong>
                @if (App::currentLocale() == 'en')
               {{$railCat->name}}
               @elseif (App::currentLocale() == 'ar')
                {{$railCat->name_ar}}
               @endif
        </h4>
    <div class="row px-xl-5">
       @foreach($rails as $p)
       <div class="col-xl-2 col-lg-2 col-md-3 col-6">
        <input type="radio" name="rail" id="rail{{$p->id}}" value="{{$p->id}}" />
        <label for="rail{{$p->id}}">
            <div class="single-product p-0 m-0">
                <div class="product-img">
                    <a >
                        <img class="default-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @if(is_null($p->plusPic))
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @else
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->plusPic}}" alt="{{$p->name}}">
                        @endif    
                    </a>
                    
                </div>
                <div class="product-content">
                    <h3><a href="{{url('/')}}/products/{{$p->slug}}" target="_blank"> 
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
        </label>
    </div>
       @endforeach
       <div class="col-12">
        <div class="container">
            
        <div class="col-md-8 mr-auto ml-auto">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.name')<span>*</span></label>
                        <input name="name" type="text" placeholder="@lang('messages.name')">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.floors')<span>*</span></label>
                        <input name="floors" type="text" placeholder="@lang('messages.floors')">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.email')<span>*</span></label>
                        <input name="email" type="email" placeholder="@lang('messages.email')">
                    </div>	
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Your Phone<span>*</span></label>
                        <input name="phone" type="text" placeholder="#">
                    </div>	
                </div>
                <div class="col-12">
                    <div class="form-group message">
                        <label>@lang('messages.message')<span>*</span></label>
                        <textarea name="message" placeholder="@lang('messages.message')"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group button">
                        <button type="submit" class="btn ">@lang('messages.send')</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
       </div>
</form>
</div>
</div>
</div>



</div>
</div>
<div class="container-fluid stage2 stages">
    <div class="contact-us">
    <form method="post" class="form" id="contactForm"action="{{url('/')}}/build-elevator">
        @csrf
        <input type="hidden" name="stage" value="2"/>
        <h4 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class=" pr-3"><strong>
                @if (App::currentLocale() == 'en')
               {{$cabinCat->name}}
               @elseif (App::currentLocale() == 'ar')
                {{$cabinCat->name_ar}}
               @endif
        </h4>
    <div class="row px-xl-5">
       @foreach($cabins as $p)
       <div class="col-xl-2 col-lg-2 col-md-3 col-6">
        <input type="radio" name="cabin" id="cabin{{$p->id}}" value="{{$p->id}}" />
        <label for="cabin{{$p->id}}">
            <div class="single-product p-0 m-0">
                <div class="product-img">
                    <a >
                        <img class="default-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @if(is_null($p->plusPic))
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @else
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->plusPic}}" alt="{{$p->name}}">
                        @endif    
                    </a>
                    
                </div>
                <div class="product-content">
                    <h3><a href="{{url('/')}}/products/{{$p->slug}}" target="_blank"> 
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
        </label>
    </div>
       @endforeach
    </div>


        <h4 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class=" pr-3"><strong>
                @if (App::currentLocale() == 'en')
               {{$motorCat->name}}
               @elseif (App::currentLocale() == 'ar')
                {{$motorCat->name_ar}}
               @endif
        </h4>
    <div class="row px-xl-5">
       @foreach($motors as $p)
       <div class="col-xl-2 col-lg-2 col-md-3 col-6">
        <input type="radio" name="motor" id="motor{{$p->id}}" value="{{$p->id}}" />
        <label for="motor{{$p->id}}">
            <div class="single-product p-0 m-0">
                <div class="product-img">
                    <a >
                        <img class="default-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @if(is_null($p->plusPic))
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @else
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->plusPic}}" alt="{{$p->name}}">
                        @endif    
                    </a>
                    
                </div>
                <div class="product-content">
                    <h3><a href="{{url('/')}}/products/{{$p->slug}}" target="_blank"> 
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
        </label>
    </div>
       @endforeach
       <div class="col-12">
        <div class="container">
            
        <div class="col-md-8 mr-auto ml-auto">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.name')<span>*</span></label>
                        <input name="name" type="text" placeholder="@lang('messages.name')">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.floors')<span>*</span></label>
                        <input name="floors" type="text" placeholder="@lang('messages.floors')">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.email')<span>*</span></label>
                        <input name="email" type="email" placeholder="@lang('messages.email')">
                    </div>	
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Your Phone<span>*</span></label>
                        <input name="phone" type="text" placeholder="#">
                    </div>	
                </div>
                <div class="col-12">
                    <div class="form-group message">
                        <label>@lang('messages.message')<span>*</span></label>
                        <textarea name="message" placeholder="@lang('messages.message')"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group button">
                        <button type="submit" class="btn ">@lang('messages.send')</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
       </div>
</form>
</div>
</div>

</div>
</div>




<div class="container-fluid stage3 stages">
    <div class="contact-us">
    <form method="post" class="form" id="contactForm"action="{{url('/')}}/build-elevator">
        @csrf
        <input type="hidden" name="stage" value="3"/>
        <h4 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class=" pr-3"><strong>
                @if (App::currentLocale() == 'en')
               {{$controllerCat->name}}
               @elseif (App::currentLocale() == 'ar')
                {{$controllerCat->name_ar}}
               @endif
        </h4>
    <div class="row px-xl-5">
       @foreach($controllers as $p)
       <div class="col-xl-2 col-lg-2 col-md-3 col-6">
        <input type="radio" name="controller" id="controller{{$p->id}}" value="{{$p->id}}" />
        <label for="controller{{$p->id}}">
            <div class="single-product p-0 m-0">
                <div class="product-img">
                    <a >
                        <img class="default-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @if(is_null($p->plusPic))
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @else
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->plusPic}}" alt="{{$p->name}}">
                        @endif    
                    </a>
                    
                </div>
                <div class="product-content">
                    <h3><a href="{{url('/')}}/products/{{$p->slug}}" target="_blank"> 
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
        </label>
    </div>
       @endforeach
    </div>


        <h4 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class=" pr-3"><strong>
                @if (App::currentLocale() == 'en')
               {{$wiresCat->name}}
               @elseif (App::currentLocale() == 'ar')
                {{$wiresCat->name_ar}}
               @endif
        </h4>
    <div class="row px-xl-5">
       @foreach($wires as $p)
       <div class="col-xl-2 col-lg-2 col-md-3 col-6">
        <input type="radio" name="wire" id="wire{{$p->id}}" value="{{$p->id}}" />
        <label for="wire{{$p->id}}">
            <div class="single-product p-0 m-0">
                <div class="product-img">
                    <a >
                        <img class="default-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @if(is_null($p->plusPic))
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->avatar}}" alt="{{$p->name}}">
                        @else
                        <img class="hover-img" src="{{url('/')}}/uploads/{{$p->plusPic}}" alt="{{$p->name}}">
                        @endif    
                    </a>
                    
                </div>
                <div class="product-content">
                    <h3><a href="{{url('/')}}/products/{{$p->slug}}" target="_blank"> 
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
        </label>
    </div>
       @endforeach
       <div class="col-12">
        <div class="container">
            
        <div class="col-md-8 mr-auto ml-auto">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.name')<span>*</span></label>
                        <input name="name" type="text" placeholder="@lang('messages.name')">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.floors')<span>*</span></label>
                        <input name="floors" type="text" placeholder="@lang('messages.floors')">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>@lang('messages.email')<span>*</span></label>
                        <input name="email" type="email" placeholder="@lang('messages.email')">
                    </div>	
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Your Phone<span>*</span></label>
                        <input name="phone" type="text" placeholder="#">
                    </div>	
                </div>
                <div class="col-12">
                    <div class="form-group message">
                        <label>@lang('messages.message')<span>*</span></label>
                        <textarea name="message" placeholder="@lang('messages.message')"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group button">
                        <button type="submit" class="btn ">@lang('messages.send')</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
       </div>
</form>
</div>
</div>

</div>

</div>
<!-- Products End -->
<div class="pagination">
   
    {{-- {{ $products->withQueryString()->links() }} --}}
 
  </div>
@section('scripts')
<script>
    $(".stage-box").click(function(){
        let view = '.'+$(this).attr('stage');
        $('.stages').fadeOut()
        setTimeout(() => {
            $(view).fadeIn();
        },500);

    })

    
    if ($(window).width() < 767) {
   $('.stage-box').click(function(){
    $('body').scrollTop(550);
   })
}

</script>
@stop
@endsection

