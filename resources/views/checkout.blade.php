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
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{url('/')}}">@lang('messages.home')</a>
                <span class="breadcrumb-item active">@lang('messages.Checkout')</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 ">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">@lang('messages.billingandinfo')</span></h5>
            <div class="contact-us">
                <form action="{{url('/')}}/user-info" method="post" class="form">
                    @csrf
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>@lang('messages.name')</label>
                                <input class="form-control" type="text" required value="@isset($user[0]->name){{$user[0]->name}}@endisset" placeholder="@lang('messages.name')" name="name" id="name"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>@lang('messages.email')</label>
                                <input class="form-control" type="email" name='email' id="email" placeholder="@lang('messages.email')" required value="@isset($user[0]->email){{$user[0]->email}}@endisset">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>@lang('messages.phone')</label>
                                <input class="form-control" type="number" required placeholder="@lang('messages.phone')" name="phone" id="phone" value="@isset($user[0]->phone){{$user[0]->phone}}@endisset">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>@lang('messages.address')</label>
                                <input class="form-control" type="text" id="address" required name="address" value="@isset($user[0]->address){{$user[0]->address}}@endisset" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>@lang('messages.Governorate')</label>
                                <select class="form-control" name="gov" id="gov" required>
                                    <option disabled @isset($user[0]->shipping_id) @else selected @endisset >@lang('messages.selectGovernorate')</option>
                                    @foreach ($shipping as $sh)
                                        <option value="{{$sh->id}}" @isset($user[0]->shipping_id) @if($user[0]->shipping_id == $sh->id) selected @endif @endisset>
                                            {{$sh->gov_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>@lang('messages.city')</label>
                                <input class="form-control" name="city" id="city" type="text" placeholder="@lang('messages.city')" required  value="@isset($user[0]->city){{$user[0]->city}}@endisset" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label>@lang('messages.postal')</label>
                                <input class="form-control" type="text" name="postal" id="postal" value="@isset($user[0]->postal){{$user[0]->postal}}@endisset"  placeholder="@lang('messages.postal')">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>@lang('messages.notes')</label>
                                <textarea class="form-control" name="notes" id="notes" placeholder="@lang('messages.notes')">@isset($user[0]->notes){{$user[0]->notes}}@endisset</textarea>
                            </div>
                            
                            <button class="btn btn-primary mr-auto ml-auto font-weight-bold py-3">@lang('messages.savePersonalInfo')</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        @if (count($user) > 0)
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">@lang('messages.OrderTotal')</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">@lang('messages.products')</h6>
                    @foreach ($products as $key => $c)
                    <div class="d-flex justify-content-between">
                        <p>{{$c->product_name}} | {{$c->size}} x {{$c->count}} </p>
                        <p>{{$c->price}} @lang('messages.egp')</p>
                    </div>
                    @endforeach
                    
                </div>
                <div class="border-bottom pt-3">
                    @if(!is_null($cart[0]->coupon))
                    <div class="d-flex justify-content-between mb-3">
                        <h6>@lang('messages.productsTotal')</h6>
                        <h6>{{$total[0]->total}} @lang('messages.egp')</h6>
                    </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>{{$cart[0]->coupon}}</h6>
                            <h6>-{{$cart[0]->percentage}}% @lang('messages.off')</h6>
                            <h6>-{{$total[0]->total / 100 * $cart[0]->percentage;}} @lang('messages.egp')</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>@lang('messages.subtotal')</h6>
                            <h6><?php $tot = $total[0]->total / 100 * $cart[0]->percentage;
                            echo $total[0]->total - $tot; ?> @lang('messages.egp')</h6>
                        </div>
                        @else
                        <div class="d-flex justify-content-between mb-3">
                            <h6>@lang('messages.subtotal')</h6>
                            <h6>{{$total[0]->total}} @lang('messages.egp')</h6>
                        </div>
                        @endif
                    
                </div>
                <div class="border-bottom pt-3 pb-2">
                    
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">@lang('messages.shipping')</h6>
                        <h6 class="font-weight-medium">{{$user[0]->shipping_rate}} @lang('messages.egp')</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>@lang('messages.Total')</h5>
                        @if(!is_null($cart[0]->coupon))
                        <h5><?php
                        $tot = $total[0]->total / 100 * $cart[0]->percentage;
                            $afterSale = $total[0]->total - $tot;
                        echo  $afterSale; ?> @lang('messages.egp')</h5>
                        @else
                        <h5><?php echo $total[0]->total + $user[0]->shipping_rate; ?> @lang('messages.egp')</h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">@lang('messages.Payment')</span></h5>
                <div class="bg-light p-30">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="delivery" id="delivery" checked>
                            <label class="custom-control-label" for="paypal">@lang('messages.UponDelivery')</label>
                        </div>
                    </div>
                    <form method="post" action="{{url('/')}}/checkout">
                        @csrf
                        <button class="btn btn-block btn-primary font-weight-bold py-3">@lang('messages.PlaceOrder')</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- Checkout End -->



@endsection

