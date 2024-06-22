@extends('layouts.main')

@section('content')

<style>
    header .all-category, header .main-category{
        display: none;
    }
</style>
<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class=" pr-3">@lang('messages.categories')</span></h2>
    
 <section class="categories">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-6 p-0">
              <div class="categories__item categories__large__item set-bg"
              data-setbg="{{url('/')}}/uploads/{{$categories[0]->avatar}}">
              <div class="categories__text">
                  <h1>
                    @if (App::currentLocale() == 'en')
                    {{$categories[0]->name}}
                    @else
                    {{$categories[0]->name_ar}}
                    @endif
                </h1>
                  {{-- <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                  edolore magna aliquapendisse ultrices gravida.</p> --}}
                  <a href="{{url('/')}}/cat/{{$categories[0]->id}}">@lang('messages.Shop now')</a>
              </div>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                <div class="categories__item set-bg"
                data-setbg="{{url('/')}}/uploads/{{$categories[1]->avatar}}">
                <div class="categories__text">
                    <h1>
                      @if (App::currentLocale() == 'en')
                      {{$categories[1]->name}}
                      @else
                      {{$categories[1]->name_ar}}
                      @endif
                  </h1>
                    {{-- <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                    edolore magna aliquapendisse ultrices gravida.</p> --}}
                    <a href="{{url('/')}}/cat/{{$categories[1]->id}}">@lang('messages.Shop now')</a>
                </div>
            </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                <div class="categories__item  set-bg"
                data-setbg="{{url('/')}}/uploads/{{$categories[2]->avatar}}">
                <div class="categories__text">
                    <h1>
                      @if (App::currentLocale() == 'en')
                      {{$categories[2]->name}}
                      @else
                      {{$categories[2]->name_ar}}
                      @endif
                  </h1>
                    {{-- <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                    edolore magna aliquapendisse ultrices gravida.</p> --}}
                    <a href="{{url('/')}}/cat/{{$categories[2]->id}}">@lang('messages.Shop now')</a>
                </div>
            </div>
              </div>
              
          </div>
      </div>
  </div>
</div>
</section>
<!-- Categories Section End -->
    </div>
<!--
</div>
</section>
        
</div>
-->
<!-- Categories End -->

@endsection

