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

        <div class="alert alert-success p-4 mt-5 mr-auto ml-auto">
            @if(App::currentLocale() == 'en')
            We received your request, We will contact you as soon as possible.
            @elseif(App::currentLocale() == 'ar')
            تم استلام طلبك وسيتم التواصل معك
            @endif
        </div>

    </div>


    <div class="row">
        
        <div class="col-md-4 col-12">
            <div class="stage-box" stage="stage1">
                @if($stage == 1) <i class="fa fa-check green"></i>  @endif
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
                        <li><i class="ti-check px-1 text-primary"></i> اختر الابواب</li>
                        <li><i class="ti-check px-1 text-primary"></i> اختر الدلائل</li>
                        <li><i class="ti-check px-1 text-primary"></i> ارسل بياناتك</li>
                        <li><i class="ti-check px-1 text-primary"></i> سيتم التواصل معك</li>
                    </ul>
                    @endif
                </span>
            </div>
        </div>
        
        <div class="col-md-4 col-12">
            <div class="stage-box" stage="stage2">
                @if($stage == 2) <i class="fa fa-check green"></i>  @endif
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
                        <li><i class="ti-check px-1 text-primary"></i> اختر الكابينة</li>
                        <li><i class="ti-check px-1 text-primary"></i> اختر الماكينة</li>
                        <li><i class="ti-check px-1 text-primary"></i> ارسل بياناتك</li>
                        <li><i class="ti-check px-1 text-primary"></i> سيتم التواصل معك</li>
                    </ul>
                    @endif
                </span>
            </div>
        </div>
        
        <div class="col-md-4 col-12">
            <div class="stage-box" stage="stage3">
                @if($stage == 3) <i class="fa fa-check green"></i>  @endif
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
                        <li><i class="ti-check px-1 text-primary"></i> اختر مستلزمات الكهرباء</li>
                        <li><i class="ti-check px-1 text-primary"></i> اختر مستلزمات التشغيل</li>
                        <li><i class="ti-check px-1 text-primary"></i> ارسل بياناتك</li>
                        <li><i class="ti-check px-1 text-primary"></i> سيتم التواصل معك</li>
                    </ul>
                    @endif
                </span>
            </div>
        </div>

    </div>



</div>


</div>

</div>
<!-- Products End -->

@section('scripts')

@stop
@endsection

