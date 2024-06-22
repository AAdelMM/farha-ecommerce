@extends('layouts.main')

@section('content')
<style>
    header .all-category, header .main-category{
        display: none;
    }
</style>
<!-- Products Start -->
<div class="container pt-5 pb-3 mt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4 mt-5"><span class=" pr-3">
        @if (App::currentLocale() == 'en')
                {{$post->title}}
            @elseif (App::currentLocale() == 'ar')
                {{$post->title_ar}} 
            @endif   
        </span></h2>
    <div class="row px-xl-5">
        <div class="col-md-6 ml-auto mr-auto mb-5 mt-5">
            <img src="{{url('/')}}/uploads/posts/{{$post->image}}" class="rounded img-responsive w-100 d-block ml-auto mr-auto" alt="post-img"/>
        </div>
        <div class="col-12 col-md-12 mt-5">
            @if (App::currentLocale() == 'en')
                {!! $post->description !!}
            @elseif (App::currentLocale() == 'ar')
                {!! $post->desc_ar !!}
            @endif   
        
        </div>
    </div>

    <div class="row px-xl-5">
        <div class="d-flex pt-2 text-center">
            <strong class="text-dark mr-2">@lang('messages.shareon')</strong>
            <div class="d-inline-flex">
                <a class="text-dark px-2" href="http://www.facebook.com/sharer/sharer.php?u={{url('/')}}/blog/post/{{$post->id}}" target="_blank">
                    <i class="ti-facebook"></i>
                </a>
                <a class="text-dark px-2" href="https://twitter.com/intent/tweet?text={{url('/')}}/blog/post/{{$post->id}}" target="_blank">
                    <i class="ti-twitter"></i>
                </a>
                <a class="text-dark px-2" href="https://www.linkedin.com/shareArticle?mini=true&url={{url('/')}}/blog/post/{{$post->id}}" target="_blank">
                    <i class="ti-linkedin"></i>
                </a>
                <a class="text-dark px-2" href="https://telegram.me/share/url?url={{url('/')}}/blog/post/{{$post->id}}" target="_blank">
                    <i class="ti-telegram"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Products End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class=" pr-3">@lang('messages.youMayAlsoLike')</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
            @foreach ($posts as $p)
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{url('/')}}/uploads/posts/{{$p->image}}" alt="">
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="{{url('/')}}/blog/post/{{$p->id}}">
                            @if (App::currentLocale() == 'en')
                                {{$p->title}}
                            @elseif (App::currentLocale() == 'ar')
                                {{$p->title_ar}} 
                            @endif 
                    </a>
                    </div>
                </div>
            @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

@endsection

