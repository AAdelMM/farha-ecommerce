
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{url('/')}}"><img src="{{url('/')}}/img/logo.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
							<li><a href="{{url('/')}}/">@lang('messages.home')</a></li>
							<li><a href="{{url('/')}}/all/products">@lang('messages.products') </a></li>												
							<li><a href="{{url('/')}}/all/categories">@lang('messages.categories')</a></li>
							<li><a href="{{url('/')}}/blog">@lang('messages.wall')</a>
							</li>
							<li><a href="{{url('/')}}/contact-us">@lang('messages.contact')</a></li>
							<li>
								<a href="{{url('/')}}/switch" class="single-icon"><i class="ti-world"></i>
									@if (App::currentLocale() == 'en')
									عربي
								@elseif (App::currentLocale() == 'ar')
									English
								@endif	
                                </a>
							</li>	
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            @auth
                            <a href="{{url('/')}}/">@if(App::currentLocale() == 'ar') حسابي @else My account @endif</a>
                            @if(Auth::user()->account_type == 3)
                            <a href="{{url('/')}}/dashboard">@if(App::currentLocale() == 'ar') لوحة التحكم @else Dashboard @endif</a>
                            @endif
                            @else
                            <a href="{{url('/')}}/login">@if(App::currentLocale() == 'ar') تسجيل الدخول @else Login @endif</a>
                            <a href="{{url('/')}}/register">@if(App::currentLocale() == 'ar') إنشاء حساب @else Register @endif</a>
                            @endauth
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a  href="{{url('/')}}/my-fav"><span class="icon_heart_alt"></span>
                                <div class="tip">{{$favCount}}</div>
                            </a></li>
                            <li><a href="{{url('/')}}/cart"><span class="icon_bag_alt"></span>
                                <div class="tip">{{$cart_items}}</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
