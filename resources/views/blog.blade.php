@extends('layouts.main')

@section('content')
<style>
    header .all-category, header .main-category{
        display: none;
    }
</style>
<!-- Products Start -->
<div class="container pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4 text-center"><span class=" pr-3">@lang('messages.recentposts')</span></h2>
    <div class="row px-xl-5">
        @if (count($posts) > 0)
            @foreach ($posts as $p)
                <div class="col-md-3">
                    <div class="swiper-slide">
                        <a href="{{url('/')}}/blog/post/{{$p->id}}" class="sb-blog-card sb-mb-30">
                          <div class="sb-cover-frame sb-mb-30">
                            <img src="{{url('/')}}/uploads/posts/{{$p->image}}" alt="cover">
                          </div>
                          <div class="sb-blog-card-descr">
                            <h3 class="sb-mb-10">
                                @if (App::currentLocale() == 'en')
                                        {{$p->title}}
                                    @elseif (App::currentLocale() == 'ar')
                                        {{$p->title_ar}}
                                    @endif  
                            </h3>
                            <div class="sb-suptitle sb-mb-15"><span>{{date('d-m-Y', strtotime($p->created_at));}}</span></div>
                           </div>
                        </a>
                      </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<!-- Products End -->

<div class="pagination">
   
    {{ $posts->withQueryString()->links() }}
 
  </div>

@endsection

