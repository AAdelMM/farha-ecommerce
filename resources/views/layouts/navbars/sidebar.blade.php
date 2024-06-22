<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-2.jpg">

  <div class="logo">
    <a href="{{ url('/') }}/dashboard" class="simple-text logo-normal">
      @lang('messages.brand')
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/dashboard">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="true">
          <i class="">u</i>
          <p>{{ __('Users') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="users">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'posttags' || $activePage == 'postags') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#postss" aria-expanded="true">
          <i class="material-icons">content_paste</i>
          <p>Posts
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="postss">
          <ul class="nav">
            
            <li class="nav-item{{ $activePage == 'postags' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('/')}}/postags">
                <i class="material-icons">bubble_chart</i>
                <p> wall categories  </p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'post' ? ' active' : '' }}">
              <a class="nav-link" href="{{url('/')}}/post">
                <i class="material-icons">library_books</i>
                <p> wall  </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      
     
      <li class="nav-item {{ ($activePage == 'posttags' || $activePage == 'postags') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#manage_all" aria-expanded="true">
          <i class="material-icons">settings</i>
          <p>Manage my website
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="manage_all">
          <ul class="nav">
      <li class="nav-item{{ $activePage == 'home-meta' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/home-meta">
          <i class="material-icons">library_books</i>
            <p> home meta </p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'slider' ? ' active' : '' }}">
        <a class="nav-link" href="{{url('/')}}/slider">
          <i class="material-icons">image</i>
          <p> Manage sliders </p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'favicon' ? ' active' : '' }}">
        <a class="nav-link" href="{{url('/')}}/favicon">
          <i class="material-icons">image</i>
            <p> Manage Favicon </p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'about' ? ' active' : '' }}">
        <a class="nav-link" href="{{url('/')}}/about">
          <i class="material-icons">?</i>
          <p> about us </p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'social' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/social">
          <i class="material-icons">language</i>
          <p> social links  </p>
        </a>
      </li>


      <li class="nav-item{{ $activePage == 'phone' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/phone">
          <i class="material-icons">phone</i>
          <p> phone  </p>
        </a>
      </li>
          </ul>
        </div>
      </li>


      <li class="nav-item{{ $activePage == 'cat' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/product-cat">
          <i class="material-icons">map</i>
          <p> categories </p>
        </a>
      </li>

      {{-- <li class="nav-item{{ $activePage == 'main-cat' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/product-main-cat">
          <i class="material-icons">map</i>
          <p>main categories </p>
        </a>
      </li> --}}

      <li class="nav-item{{ $activePage == 'subcat' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/product-subcat">
          <i class="material-icons">bubble_chart</i>
          <p> sub-Categories </p>
        </a>
      </li>
     
      <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/product">
          <i class="material-icons">map</i>
          <p> Products </p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'shipping' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/shipping">
          <i class="material-icons">money</i>
          <p> Shipping rate </p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'orders' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/orders">
          <i class="material-icons">menu</i>
          <p> orders </p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'coupons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}/coupons">
          <i class="material-icons">content_paste</i>
          <p> coupons </p>
        </a>
      </li>

    </ul>
  </div>
</div>
