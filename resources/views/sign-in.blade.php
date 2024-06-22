@extends('layouts.main')

@section('content')
<style>
  header .all-category, header .main-category{
      display: none;
  }
</style>

<div class="container">
    <div class="row">
      <div class="col-lg-6 col-12 ml-auto mr-auto bg-white p-5">
        {{-- <img class="mx-auto w-auto d-block mr-auto ml-auto mb-3" style="height:150px" src="{{url('/')}}/img/logo.png" alt="SEMA"> --}}
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Or
          <a href="{{url('/')}}/signup" class="font-medium text-dark hover:text-dark">Register now</a>
        </p>
     
      <form class="form contact-us" method="POST" action="{{ route('login') }}">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="-space-y-px rounded-md shadow-sm">
          <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
            <div class="input-group">
              {{-- <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-envelope text-primary"></i>
                </span>
              </div> --}}
              <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" required>
            </div>
            @if ($errors->has('email'))
              <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                <strong>{{ $errors->first('email') }}</strong>
              </div>
            @endif
          </div>
          <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
            <div class="input-group">
              {{-- <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fa fa-lock text-primary"></i>
                </span>
              </div> --}}
              <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
            </div>
            @if ($errors->has('password'))
              <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                <strong>{{ $errors->first('password') }}</strong>
              </div>
            @endif
          </div>
        </div>
  
        <div class="flex items-center justify-between mt-2">
          <div class="form-check mr-auto ml-3 mt-1">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
              <span class="form-check-sign">
                <span class="check"></span>
              </span>
            </label>
          </div>
  
          <div class="text-sm ">
            <a href="#" class="font-medium text-dark hover:text-dark">Forgot your password?</a>
          </div>
        </div>
  
        <div class="mt-2">
          <button type="submit" class="btn btn-sm btn-primary btn-block p-2 text-black">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
              </svg>
            </span>
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div> </div>
  
@endsection

