@extends('layouts.main')

@section('content')

<style>
  header .all-category, header .main-category{
      display: none;
  }
</style>
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-8 ml-auto mr-auto mt-5 mb-5 contact-us">
      <form class="form mt-5 mb-5 " method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <h4 class="card-title d-block text-center text-primary pt-3 m-1"><strong>{{ __('messages.Login') }}</strong></h4>
          <hr/>
          <div class="card-body">
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="form-group">
                {{-- <div class="input-group-prepend  ">
                  <span class="input-group-text bg-primary">
                    <i class="fa fa-envelope text-white"></i>
                  </span>
                </div> --}}
                <input type="email" name="email" class="form-control" placeholder="{{ __('messages.email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="form-group">
                {{-- <div class="input-group-prepend  ">
                  <span class="input-group-text bg-primary">
                    <i class="fa fa-lock text-white"></i>
                  </span>
                </div> --}}
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('messages.password') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.Rememberme') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
            {{-- <div class="row">
              <a href="{{ route('facebook.login') }}" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i>
                @lang('messages.LoginWithFacebook')
              </a>
            </div> --}}
            <a href="{{url('/')}}/register" class="float-right text-primary p-1 mt-2"> <strong>@lang('messages.RegisterNow')</strong> </a>
            <a href="{{url('/')}}/password/reset" class="float-left text-primary p-1 mt-2"> @lang('messages.LostYourPassword?')</a>
          </div>
         
            <button type="submit" class="btn btn-primary btn-link btn-sm btn-block">{{ __('messages.Login') }}</button>
        </div>
      </form>
      <div class="row">
        
        {{-- <div class="col-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-light">
                    <small>{{ __('Forgot password?') }}</small>
                </a>
            @endif
        </div> --}}
      </div>
    </div>
  </div>
</div> 
@endsection
