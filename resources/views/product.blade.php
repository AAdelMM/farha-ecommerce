@extends('layouts.main')

@section('content')
  <style>
    .sticker_label-cancel{
        height: 23px;
        width: 30px;
        text-align: center;
        color: red;
        margin: 0;
        top: -30px;
    }
    .sticker_label.active{
        border: 3px solid #47167e;
    border-radius: 45%;
    }
  .sticker_label{
    margin-right: 0px !important;
    transition: all .2s linear;
    display: inline-block;
    overflow: hidden;
    border-radius: 50%;
  }
  .sticker_label img{
    transform: scale(1.5)
  }
  .stickerImg{
    z-index: 2;
  }
    .owl-nav{
        display: none;
    }
    .owl-carousel .owl-item{
        height: 412.891px;
        position: relative;
     
    }
    .owl-carousel .owl-item img{
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }
    @media(max-width:767px){
        .owl-carousel .owl-item {
            height: 292px;
        }
        .product__details__slider__content {
            float: none;
            display: block;
            margin: 0 auto;
    }
    /* .ar .product__details__widget ul li span{
        float: right;
        direction: rtl;
        text-align: right;
    } */
    .ar .product__details__text h3{
        direction: rtl;
        text-align: right;
    }
    .ar .product__details__price{
        text-align: right;
    }
    .ar .product__details__text p{
        direction: rtl;
        text-align: right;
        margin-bottom: 0 !important;
    }
    .ar .product__details__widget ul li span{
        float: right;
        direction: rtl;
        text-align: right;
    }
    .ar .product__details__widget{
        padding-top: 10px
    }
    .ar .color__checkbox{
        width: 60%;
        display: inline-block;
        text-align: right;
        direction: rtl;
    }
    .ar .product__details__widget ul li .color__checkbox label:last-child {
    margin-right: 35px;
}
}
  </style>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb__links">
                      <a href="{{url('/')}}"><i class="fa fa-home"></i> @lang('messages.home')</a>
                      {{-- <a href="#"></a> --}}
                      <span>
                        @if (App::currentLocale() == 'en')
                            {{$p[0]->name}}
                        @elseif (App::currentLocale() == 'ar')
                            {{$p[0]->name_ar}}
                        @endif
                  </span>
                  
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Breadcrumb End -->

  <!-- Product Details Section Begin -->
  <section class="product-details spad">
      <div class="container">
          <div class="row">
            
              <div class="col-lg-6">
                  <div class="product__details__pic">
                      {{-- <div class="product__details__pic__left product__thumb nice-scroll">
                          <a class="pt active" href="#product-1">
                              <img src="{{url('/')}}/uploads/{{$p[0]->avatar}}" alt="hi">
                          </a>
                          @foreach ($sizes as $key => $c)
                          <a class="pt" href="#product-{{$key+2}}">
                              <img src="{{url('/')}}/uploads/customerUploads/{{$c->image}}" alt="">
                          </a>
                          @endforeach
                          
                      </div> --}}
                      
                      <div class="product__details__slider__content">
                        
                          <div class="product__details__pic__slider owl-carousel">
                              <img data-hash="product-1" class="product__big__img" src="{{url('/')}}/uploads/{{$p[0]->avatar}}" alt="To be colored">
                             
                              {{-- @foreach ($sizes as $key => $c)
                                
                              <img data-hash="product-{{$key}}" class="product__big__img"
                              src="{{url('/')}}/uploads/customerUploads/{{$c->images}}" alt="">
                            
                              @endforeach --}}
                              
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="col-lg-6">
                  <div class="product__details__text">
                      <h3>
                        @if (App::currentLocale() == 'en')
                            {{$p[0]->name}}
                        @elseif (App::currentLocale() == 'ar')
                            {{$p[0]->name_ar}}
                        @endif

                        <span>
                        
                            @if(App::currentLocale() == 'en')
                                {{$cat->name}}
                            @elseif(App::currentLocale() == 'ar')
                                {{$cat->name_ar}}
                            @endif

                        </span></h3>
                      {{-- <div class="rating">
                       
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <span>( 138 reviews )</span>
                      </div> --}}
                      <div class="product__details__price">@lang('messages.egp')
                        @if(count($sale) > 0)
                            {{$sale[0]->price_after}} <span> {{$p[0]->price}} </span>
                        @else
                            {{$p[0]->price}}
                        @endif
                      </div>
                      <p>
                        @if (App::currentLocale() == 'en')
                            {{$p[0]->description}}
                        @elseif (App::currentLocale() == 'ar')
                            {{$p[0]->description_ar}}
                        @endif 
                      </p>
                      
                      <a class="sizeChart" href="{{url('/')}}/size-chart">@lang('messages.sizechart')</a>
                      <div class="product__details__widget">
                          <ul>
                              {{-- <li>
                                  <span>Availability:</span>
                                  <div class="stock__checkbox">
                                      <label for="stockin">
                                          In Stock
                                          <input type="checkbox" id="stockin">
                                          <span class="checkmark"></span>
                                      </label>
                                  </div>
                              </li> --}}
                              
                              <li>
                                  <div class="color__checkbox">
                                    @if(count($stickers) > 0)
                                      <span>@lang('messages.Stickers For Prints'):</span>
                                    @endif
                                      @foreach ($stickers as $c)
                                      <label for="stickers-{{$c->id}}" class="sticker_label">
                                        <input type="radio" name="sticker"  class="sticker_btn" id="stickers-{{$c->id}}" value="{{$c->id}}">
                                        <img src="{{url('/')}}/uploads/{{$c->sticker}}" class=""/>
                                        <span class="hiddenImg0" style="display: none;" src="{{url('/')}}/uploads/{{$c->product_sticker}}"></span>
                                    </label>
                                      @endforeach
                                      @if(count($stickers) > 0)
                                      <label class="sticker_label-cancel">
                                        <i class="fa fa-times"></i>
                                      </label>
                                    @endif
                                      
                                  </div>

                              </li>
                              @foreach ($product_color_heading as $dd)
                              <li>
                                <span>@if(App::currentLocale() == 'en') {{$dd->title_en}} @else {{$dd->title_ar}} @endif :</span>
                                <div class="color__checkbox">
                                    @foreach ($colors as $c)
                                        @if ($dd->id == $c->color_heading)
                                        <label for="color{{$c->id}}">
                                            <input type="radio" name="color_radio{{$dd->id}}" class="color_radio1" 
                                            oid="{{$dd->id}}:{{$c->id}}" 
                                                id="color{{$c->id}}" uncheck-value="uncheck{{$dd->id}}" value="@if(App::currentLocale() == 'en'){{$dd->name_en}}@else{{$dd->name_ar}}@endif:@if(App::currentLocale() == 'en'){{$c->color}}@else{{$c->color_ar}}@endif">
                                            <span class="checkmark one" style="background:{{$c->color_code}}"></span>
                                            <span class="hiddenImg0" target-class="head{{$c->color_heading}}" style="display:none;" src="{{url('/')}}/uploads/{{$c->color_image}}"></span>
                                        </label>
                                        @endif
                                    @endforeach
                                    <label class="disable" disable="head{{$dd->id}}" uncheck="uncheck{{$dd->id}}">    
                                    <span class="checkmark"><i class="fa fa-times"></i></span>
                                    </label>
                                </div>
                               
                            </li>
                              @endforeach
                              
                              <li>
                                
                              </li>
                              <li>
                                  <span>@lang('messages.Available size')</span>
                                  <div class="size__btn">
                                    @foreach ($sizes as $key => $s)
                                    <label for="xs-{{$key}}" class="@if($key == 0) active @endif">
                                        <input type="radio" name="size" class="size" @if($key == 0) checked @endif id="xs-{{$key}}" value="{{$s->size}}"stock="{{$s->stock}}">
                                        {{$s->size}}
                                    </label>
                                    @endforeach
                                
                                  </div>
                              </li>
                              {{-- <li>
                                  <span>Promotions:</span>
                                  <p>Free shipping</p>
                              </li> --}}
                          </ul>
                      </div>
                      
                  </div>
                  <div class="product__details__button mt-2">
                    <div class="quantity">
                        <span>@lang('messages.Quantity')</span>
                        <div class="pro-qty">
                            <input type="number" value="1" min="1" name="quantity" class="toUpdate">
                        </div>
                    </div>
                    <a href="#" class="cart-btn AddToCartBtn"
                    @if(count($sale) > 0)
                            price="{{$sale[0]->price_after}}"
                        @else
                            price="{{$p[0]->price}}"
                        @endif
                        itemid="{{$p[0]->id}}"
                        baseurl="{{url('/')}}"><span class="icon_bag_alt"></span> @lang('messages.Add to cart')</a>
                    <ul>
                        <li><a class="addToFav"
                          itemid="{{$p[0]->id}}"baseurl="{{url('/')}}"><span class="icon_heart_alt @if(!empty($fav)) 
                          @foreach($fav as $f) 
                           @if($f->product_id == $p[0]->id) text-red @endif
                           @endforeach
                          @endif"></span></a></li>
                        {{-- <li><a href="#"><span class="icon_adjust-horiz"></span></a></li> --}}
                    </ul>
                </div>

              </div>
              
              <div class="col-lg-12">
                  <div class="product__details__tab">
                      <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"> @lang('messages.productDesc')</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">@lang('messages.additionalinfo')</a>
                          </li>
                          {{-- <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                          </li> --}}
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane active" id="tabs-1" role="tabpanel">
                              <h6> @lang('messages.productDesc')</h6>
                              <p>
                                @if (App::currentLocale() == 'en')
                                    {{$p[0]->description}}
                                @elseif (App::currentLocale() == 'ar')
                                    {{$p[0]->description_ar}}
                                @endif
                              </p>
                          </div>
                          <div class="tab-pane" id="tabs-2" role="tabpanel">
                              <h6>@lang('messages.additionalinfo')</h6>
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
                          </div>
                          
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="related__title">
                      <h5>@lang('messages.youMayAlsoLikeProducts')</h5>
                  </div>
              </div>
              @foreach($more as $m)
              <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="product__item">
                    
                      <div class="product__item__pic set-bg" data-setbg="{{url('/')}}/uploads/{{$m->avatar}}">
                          <ul class="product__hover">
                              <li><a href="{{url('/')}}/uploads/{{$m->avatar}}" class="image-popup">
                                <span class="arrow_expand"></span></a></li>
                              <li><a class="addToFav"itemid="{{$m->id}}"baseurl="{{url('/')}}">
                                <span class="icon_heart_alt 
                                @if(!empty($fav)) 
                                @foreach($fav as $f) 
                                 @if($f->product_id == $m->id) text-red @endif
                                 @endforeach
                                @endif"></span></a></li>
                              <li><a href="{{url('/')}}/products/{{$m->slug}}">
                                <span class="icon_bag_alt"></span></a></li>
                          </ul>
                      </div>
                      <div class="product__item__text">
                          <h6><a href="{{url('/')}}/products/{{$m->slug}}">
                            @if (App::currentLocale() == 'ar')
                            {{$m->name_ar}}
                            @else
                            {{$m->name}}
                            @endif
                          </a></h6>
                          {{-- <div class="rating">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                          </div> --}}
                          <div class="product__price"> @lang('messages.egp') 
                            @if($m->percentage != null)
                            {{$m->price_after}} <span>{{$m->price}}</span>
                          @else
                            {{$m->price}} 
                          @endif
                        </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </section>
  <!-- Product Details Section End -->

  

     <div class="url" url="{{url('/')}}"></div>
     <!-- short menu end -->
     @section('scripts')
     <script>
        //ensure image captured

        //end of test
        $(".sticker_label-cancel").click(function(){
            $('.sticker_label').removeClass('active');
            $('.stickerImg').hide();
            $('.sticker_btn').prop('checked', false);
        })
        $("label.disable").click(function(e){
            e.preventDefault()
            remov = '.' + $(this).attr('disable');
            uncheck_value = $(this).attr('uncheck');
            $('[uncheck-value="'+uncheck_value+'"]').prop('checked', false);
            $(remov).hide();

        })
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

        $('.checkmark.one').click(function(){
            tval = $(this).parents('label').children('input').val();
            image = $(this).next('.hiddenImg0').attr('src');
            targetC = $(this).next('.hiddenImg0').attr('target-class');
           $('.owl-item.active').append('<img src="'+image+'" class="'+targetC+'"/>');
        })

$(".sticker_label").click(function(){
    let stickerIMG = $(this).children('.hiddenImg0').attr('src');
    th = $(this);
    $('.sticker_label').removeClass('active');
    setTimeout(function(){th.addClass('active'); $('.stickerImg').hide();}, 400)
    setTimeout(function(){
        $(".owl-item.active").append('<img src="'+stickerIMG+'" class="stickerImg"/>')
    }, 500)
})
        function SendVal(id, image){
                tval2 = image;
            let requestUrl = $('.url').attr('url') + '/get-sub2';
            $.ajax({
                type:"POST",
                data: {tval:tval2},
                url: requestUrl,
                success: function(res) {
                    $(".subcolors").html(res);
                        $('.owl-item.active').append('<img src="'+image+'"/>');
                        console.log(image)
                }, error: function(err){
                  console.log(err)
                }
            });
            }
      
         $(".myslide").click(function(){
           $('.myslide').removeClass('active');
           let url = $(this).attr('data-slide-to');
           $('#carouselExampleControls').carousel($(url).index());
           setTimeout(() => {
             $(this).addClass('active')
           }, 400);
  let color = $(this).attr('color');
  let requestUrl = $('.url').attr('url') + '/get-size';
  consol.log(sent)
  $.ajax({
                type:"POST",
                data: {color:color},
                url: requestUrl,
                success: function(res) {
                    $(".sizes").html(res);
                }, error: function(err){
                   console.log(err)
                }
            });
         })
         //Add to cart button
         $(".AddToCartBtn").click(function(e){
    e.preventDefault();
    let itemId = $(this).attr('itemid');
    let quantity = $("input[name='quantity']").val();
    let baseUrl = $(this).attr('baseurl');
    let price = $(this).attr('price');

    let selectedColors = [];
    $(".sticker_label.active").each(function(){
        let color = $(this).attr('color');
        if (color) {
            selectedColors.push(color);
        }
    });

    let customImages = [];
    $(".owl-item.active img").each(function() {
        let imageUrl = $(this).attr('src');
        if (imageUrl) {
            customImages.push(imageUrl);
        }
    });

    let cartData = {
        item_id: itemId,
        quantity: quantity,
        price: price,
        colors: selectedColors,
        custom_images: customImages
    };

    // عرض البيانات في وحدة التحكم
    console.log("Cart Data:", cartData);
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $.ajax({
    type: "POST",
    url: baseUrl + "/uploads",
    data: cartData,
    success: function(response){
        console.log("Product added to cart with customizations", response);
    },
    error: function(xhr, status, error){
        console.error("Error adding product to cart", error);
        console.error("Status:", status);
        console.error("Response Text:", xhr.responseText);
    }
});

});







/* $(".addToCart").click(function(e){
  if($('[name="size"]').is(':checked')) { 
    return true;
  }else{
    e.preventDefault();
  }
}) */
//end of add to cart

$(".toUpdate").blur(); 
        let ssii = $('input[name="size"]:checked').attr('stock');
        if(ssii <= 0){
        $('.no-stock').show();
        $('.toUpdate').attr('value', 0);
        $('.toUpdate').attr('max', 0)
        }else if(ssii == 1){
        $('.low-stock').show();
        $('.toUpdate').attr('max', 1)
        }else{
        $('.toUpdate').attr('max', ssii)
        }
        // $('input[type="radio"]').click(function(){
        // let ssii2 = $('input[name="size"]:checked').attr('stock');
        // $('.no-stock, .low-stock').hide();
        //     if(ssii2 <= 0){
        // $('.no-stock').show();
        // $('.toUpdate').attr('value', 0);
        // $('.toUpdate').attr('max', 0)
        // }else if(ssii2 == 1){
        // $('.low-stock').show();
        // $('.toUpdate').attr('max', 1)
        // }else{
        //     $('.toUpdate').attr('max', ssii2)
        // }
        // })


        $('.sb-input-number-btn').on('click', function () {
                var button = $(this);
                var oldValue = $('.toUpdate').val();
                if (button.hasClass('btn-plus')) {
                    let ol = parseInt(oldValue) + 1
                    let bt = parseInt($('input[name="size"]:checked').attr('stock'))
                    if(bt >= ol){
                    var newVal = parseFloat(oldValue) + 1;
                }else{
                    var newVal = parseFloat(0) 
                }
                } else {
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                button.parent().parent().find('.toUpdate').val(newVal);
            });
     </script>
     @stop
   @endsection