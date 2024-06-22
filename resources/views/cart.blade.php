@extends('layouts.main')

@section('content')
<style>
    header .all-category, header .main-category{
        display: none;
    }
</style>

    <!-- Breadcrumb Start -->
    <div class="container-fluid mt-5">
        <div class="row px-xl-5">
            <div class="col-12 ">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{url('/')}}">@lang('messages.home')</a>
                    <span class="breadcrumb-item active">@lang('messages.shoppingCart')</span>
                </nav>
            </div>
        </div>
    </div>

  
    <!-- Breadcrumb End -->
    @if($errors->has('count'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb bg-light">
                    
                    <span class="breadcrumb-item active" style="color: red">{{$errors->first('count')}}</span>
                </nav>
            </div>
        </div>
    </div>
    @endif

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 mt-2">
            <div class="col-lg-8 mb-5">
                {{-- <h3 class="text-center d-block w-100">
                    @if (App::currentLocale() == 'en')
                    Delivery 3-8 working days
                @elseif (App::currentLocale() == 'ar')
                    التوصيل يتم خلال 3-8 أيام عمل
                @endif   
                </h3> --}}
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>@lang('messages.Product')</th>
                            <th>@lang('messages.Price')</th>
                            <th>@lang('messages.Size')</th>
                            <th>@lang('messages.color')</th>
                            <th>@lang('messages.sticker')</th>
                            <th>@lang('messages.Quantity')</th>
                            <th>@lang('messages.Total')</th>
                            <th>@lang('messages.Remove')</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cart_products as $key => $c)
                        <tr>
                            <td class="allign-middle">{{$key + 1}}</td>
                            <td class="align-middle">
                                <a class="openImage" href="{{url('/')}}/uploads/{{$c->avatar}}" data-lightbox="{{$c->product_name}}" data-title="{{$c->product_name}}"><img src="{{url('/')}}/uploads/{{$c->avatar}}" alt="" style="width: 50px;"></a>
                                <a href="{{url('/')}}/products/{{$c->slug}}">{{$c->product_name}}</a>
                            </td>
                            <td class="align-middle">{{$c->price}} @lang('messages.egp')</td>
                            <td class="align-middle">{{$c->size}}</td>
                            <td class="align-middle">{{$c->color}}</td>
                            <td class="align-middle">
                                @if (App::currentLocale() == 'ar')
                                {{$c->sticker_ar}}
                                @else
                                {{$c->sticker_en}}
                                @endif
                            </td>

                            <td class="align-middle">
                               <form action="{{url('/')}}/update-cart" method="POST">
                                @csrf
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus SUBmitFOrm">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="hidden" name="id" value="{{$c->id}}"/>
                                    <input type="text" name="count" class="form-control toUpdate form-control-sm bg-white border-0 text-center" min="1" value="{{$c->count}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus SUBmitFOrm">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                               </form>
                            </td>
                            <td class="align-middle">{{$c->price * $c->count}} @lang('messages.egp')</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger deleteItem"baseurl="{{url('/')}}" itemid="{{$c->id}}"><i class="fa fa-times"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if(count($cart_products) > 0)
            <div class="col-lg-4">
               
                <form class="mb-30" action="{{url('/')}}/coupon" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="cart" value="{{$cart[0]->id}}"/>
                        <input type="text" name="coupon" id="coupon" required class="form-control border-0 p-4" placeholder="@lang('messages.coupon')">
                        <div class="input-group-append">
                            <button class="btn btn-primary">@lang('messages.applycoupon')</button>
                        </div>

                    </div>
                    @if($errors->has('msg'))
                    <h6>{{$errors->first()}}</h6>
                    @endif
                </form>
                
                <h5 class=" text-uppercase mb-3 text-center">@lang('messages.cartsummary')</h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            @if(!is_null($cart[0]->coupon))
                                <del>
                                <h6>@lang('messages.subtotal')</h6>
                                <h6>{{$total[0]->total}} @lang('messages.egp')</h6>
                                </del>
                            @else
                            <h6>@lang('messages.subtotal')</h6>
                            <h6>{{$total[0]->total}} @lang('messages.egp')</h6>
                                @endif

                        </div>
                        @if(!is_null($cart[0]->coupon))
                        <div class="d-flex justify-content-between mb-3">
                            <h6>{{$cart[0]->coupon}}</h6>
                            <h6>-{{$cart[0]->percentage}}% @lang('messages.off')</h6>
                            <h6>-{{$total[0]->total / 100 * $cart[0]->percentage;}} @lang('messages.egp')</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>@lang('messages.subtotal')</h6>
                            <h6><?php $tot = $total[0]->total / 100 * $cart[0]->percentage;
                            echo $total[0]->total - $tot
                            ?> @lang('messages.egp')</h6>
                        </div>
                        @endif
                    </div>
                    <div class="pt-2">
                        @if(count($cart_products) > 0)
                        <form action="{{url('/')}}/checkout">
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" >@lang('messages.proceed')</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>

            @endif
        </div>
    </div>
    <!-- Cart End -->

    @endsection
    @section('scripts')
    <script>
        // $(".toUpdate").blur(); 
        //  let ssii = $('input[type="radio"]:checked').attr('stock');
        //  if(ssii <= 0){
        //  $('.no-stock').show();
        //  $('.toUpdate').attr('value', 0);
        //  $('.toUpdate').attr('max', 0)
        //  }else if(ssii == 1){
        //  $('.low-stock').show();
        //  $('.toUpdate').attr('max', 1)
        //  }else{
        //  $('.toUpdate').attr('max', ssii)
        //  }
        //  $('input[type="radio"]').click(function(){
        //  let ssii2 = $('input[type="radio"]:checked').attr('stock');
        //  $('.no-stock, .low-stock').hide();
        //      if(ssii2 <= 0){
        //  $('.no-stock').show();
        //  $('.toUpdate').attr('value', 0);
        //  $('.toUpdate').attr('max', 0)
        //  }else if(ssii2 == 1){
        //  $('.low-stock').show();
        //  $('.toUpdate').attr('max', 1)
        //  }else{
        //      $('.toUpdate').attr('max', ssii2)
        //  }
        //  })
         $('.quantity button').on('click', function () {
                 var button = $(this);
                 var oldValue = button.parent().parent().find('.toUpdate').val();
                 if (button.hasClass('btn-plus')) {
                     var newVal = parseFloat(oldValue) + 1;
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