@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
@vite([
'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card px-sm-6 px-0">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
              <span class="app-brand-text demo text-heading fw-bold">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1">Welcome to {{config('variables.templateName')}}! 👋</h4>
          <p class="mb-6">Please sign-in to your account and start the adventure</p>

          @session('status')
          <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
          </div>
          @endsession

          <form id="formAuthentication" class="mb-6" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-6">
              <label for="identity" class="form-label">{{ __('Email or Username') }}</label>
              <input type="text" class="form-control" value="{{ old('email') }}" id="identity" name="identity" placeholder="Enter your email or username" required autofocus>
            </div>
            <div class="mb-6 form-password-toggle">
              <label class="form-label" for="password">{{ __('Password') }}</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required autofocus autocomplete="current-password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-8">
              <div class="d-flex justify-content-between mt-8">
                <div class="form-check mb-0 ms-2">
                  <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                  <label class="form-check-label" for="remember_me">
                    {{ __('Remember me') }}
                  </label>
                </div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                  <span>Forgot Password?</span>
                </a>
                @endif
              </div>
            </div>
            <div class="mb-6">
              <button class="btn btn-outline-primary d-grid w-100" type="submit">{{ __('Log in') }}</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{route('register')}}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
@endsection