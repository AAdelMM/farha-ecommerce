@extends('layouts.peak')

@section('content')
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5 mt-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active" style="height:auto">
                            <img class="w-100" src="{{url('/')}}/uploads/{{$p[0]->avatar}}" alt="Image">
                        </div>
                        @foreach ($pictures as $pic)
                        <div class="carousel-item" style="height:auto">
                            <img class="w-100" src="{{url('/')}}/uploads/{{$pic->picture}}" alt="Image">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>
                        @if (App::currentLocale() == 'en')
                        {{$p[0]->name}}
                    @elseif (App::currentLocale() == 'ar')
                        {{$p[0]->name_ar}}
                    @endif  
                        </h3>
                    
                    <h3 class="font-weight-semi-bold mb-4 text-primary">
                            @if(count($sale) > 0)
                                {{$sale[0]->price_after}}  @lang('messages.egp') <del> {{$p[0]->price}} @lang('messages.egp')</del>
                            @else
                                {{$p[0]->price}} @lang('messages.egp')
                            @endif
                    </h3> 
                    <p class="mb-4">
                        @if (App::currentLocale() == 'en')
                        {{$p[0]->description}}
                    @elseif (App::currentLocale() == 'ar')
                    {{$p[0]->description_ar}}
                    @endif    
                        
                    </p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">@lang('messages.sizes'):</strong>
                        <form>
                            @foreach ($sizes as $key => $s)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" @if($key == 0) checked @endif id="size-{{$key+1}}" name="size" value="{{$s->size}}" stock="{{$s->stock}}">
                                <label class="custom-control-label" for="size-{{$key+1}}">{{$s->size}}</label>
                            </div>
                            @endforeach
                        </form>
                    </div> 
                    <div class="d-flex mb-3">
                        <div class="no-stock" style="color: red">@lang('messages.itemNotAvail')</div>
                        <div class="low-stock" style="color: red">@lang('messages.only1Left')</div>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center toUpdate" value="1" min="0">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-1 AddToCartBtn"
                        @if(count($sale) > 0)
                                price="{{$sale[0]->price_after}}"
                            @else
                                price="{{$p[0]->price}}"
                            @endif
                            itemid="{{$p[0]->id}}"
                            baseurl="{{url('/')}}"                       
                            ><i class="fa fa-shopping-cart mr-1"></i>@lang('messages.addtocart')</button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">@lang('messages.shareon')</strong>
                        <div class="d-inline-flex">
                           <a class="text-primary px-2" href="http://www.facebook.com/sharer/sharer.php?u={{url('/')}}/products/{{$p[0]->slug}}" target="_blank">
                                <i class="ti-facebook"></i>
                            </a>
                            <a class="text-primary px-2" href="https://twitter.com/intent/tweet?text={{url('/')}}/products/{{$p[0]->slug}}" target="_blank">
                                <i class="ti-twitter"></i>
                            </a>
                            <a class="text-primary px-2" href="https://www.linkedin.com/shareArticle?mini=true&url={{url('/')}}/products/{{$p[0]->slug}}" target="_blank">
                                <i class="ti-linkedin"></i>
                            </a>
                            <a class="text-primary px-2" href="https://telegram.me/share/url?url={{url('/')}}/products/{{$p[0]->slug}}" target="_blank">
                                <i class="ti-telegram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">@lang('messages.description')</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">@lang('messages.information')</a>
                        {{-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a> --}}
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3 text-primary">@lang('messages.productDesc')</h4>
                            <p>
                                @if (App::currentLocale() == 'en')
                                {{$p[0]->description}}
                            @elseif (App::currentLocale() == 'ar')
                            {{$p[0]->description_ar}}
                            @endif 
                            </p>    
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3 text-primary">@lang('messages.additionalinfo')</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-group list-group-flush">
                                        <div class="row">
                                            <div class="col-lg-8 col-12">
                                                <li class="list-group-item px-0" style="padding:5px;border:none;border-bottom:1px solid #EEE">
                                                    @if (App::currentLocale() == 'en')
                                                    <h3 class="text-primary">Care Instructions</h3>
                                                    Put a cloth on top while ironing on low setting,
                                                     Wash under running water, 
                                                     not in a bucket or full sink. Do not soak. 
                                                     Use Downy not Persil Gel, Delicate Fabric, 
                                                     Handle with Care, Don't use pins when styling, 
                                                     Hand Wash with Care.
                                                @elseif (App::currentLocale() == 'ar')
                                                <h3 class="text-primary"> تعليمات العناية </h3>
                                                    ضع قطعة قماش في الأعلى أثناء الكي على حرارة منخفضة ،
                                                     يغسل تحت الماء الجاري ،
                                                     ليس في دلو أو حوض. لا ينقع.
                                                     استخدم داوني وليس برسيل جل  ،
                                                     تعامل بعناية ، لا تستخدم الدبابيس ،
                                                     غسل اليدين بعناية.
                                                @endif    
                                                </li>
                                                <li class="list-group-item px-0" style="padding:5px;border:none;border-bottom:1px solid #EEE">
                                                    @if (App::currentLocale() == 'en')
                                                    <h3 class="text-primary">Exchange policy</h3>
                                                    Exchange is only offered within 48 hours of receiving a wrong scarf other than the one you ordererd
                                                     or one that has a defect.
                                                @elseif (App::currentLocale() == 'ar')
                                                <h3 class="text-primary"> سياسة التبديل </h3>
                                                    يتم تقديم الاستبدال فقط في غضون 48 ساعة من استلام سكارف خاطئ بخلاف الذي طلبته
                                                     أو كان به عيب.
                                                @endif    
                                                </li>
                                                @foreach($product_info as $info)
                                                    <li class="list-group-item px-0" style="padding:5px;border:none;border-bottom:1px solid #EEE">
                                                        @if (App::currentLocale() == 'en')
                                                        <h3>{{$info->title}}</h3>
                                                        {{$info->description}}
                                                    @elseif (App::currentLocale() == 'ar')
                                                        <h3>{{$info->title_ar}}</h3>
                                                        {{$info->description_ar}}
                                                    @endif 
                                                    </li>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                      </ul> 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    @endsection
