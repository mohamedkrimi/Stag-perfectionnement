@extends('layouts.app')

@section('content')
<section class="section">
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="auth-card mx-lg-3">
                    <div class="card border-0 mb-0">
                        <div class="card-header bg-primary border-0">
                            <div class="row">
                                <div class="col-lg-4 col-3">
                                    <img src="../assets/images/auth/img-1.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-8 col-9">
                                    <h1 class="text-white lh-base fw-lighter">Join Our Store</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-muted fs-15">Sign in to continue to compte.</p>
                            <div class="p-2">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>


                        <div class=" mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>


                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>




                                    <div class="mt-4">
                                        {{-- <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button> --}}
                                        <button class="btn btn-primary w-100" type="submit"> {{ __('Login') }}</button>
                                    </div>

                                </form>

                                {{-- <div class="text-center mt-5">
                                    <p class="mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-secondary text-decoration-underline"> SignUp</a> </p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->


</div>
</section>
@endsection
