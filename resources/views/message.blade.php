@extends('layouts.main')

@section('content')
<style>
    header .all-category, header .main-category{
        display: none;
    }
</style>
 <!-- Breadcrumb Start -->
 <div class="container-fluid">
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
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">@lang('messages.OrderStatus')</span></h5>
           <div class="alert alert-success">
            {{$message}}

           </div>
        </div>
    </div>
</div>

@endsection
<script>
    setTimeout(() => {
        window.location.href = '{{url('/')}}';
    }, 5000);
</script>
