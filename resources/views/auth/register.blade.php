@extends('layouts.app')

@section('content')
<section class="section">
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <label class="form-label" for="firstname">{{__('firstname')}}</label>
                                        <div class="form-outline mb-1">
                                            <input id="firstname" type="text" placeholder="{{__('firstname')}}" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <label class="form-label" for="lastname">{{__('lastname')}}</label>
                                        <div class="form-outline mb-1">
                                            <input id="lastname" type="text" placeholder="{{__('lastname')}}" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <label class="form-label" for="email">{{ __('email') }}</label>
                                        <div class="form-outline mb-1">
                                            <input id="email" type="email" placeholder="{{ __('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="password">{{__('password')}}</label>
                                            <input id="password" type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-outline mb-1">
                                            <label class="form-label" for="password_confirmation">{{__('confirm password')}}</label>
                                            <input id="password_confirmation" placeholder="*********" type="password" class="form-control @error('cpassword') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="text-center pt-1 mb-1 pb-1">
                                            <button class="btn btn-primary btn-block  gradient-custom-2 mb-3 w-100 h-100" type="submit"> {{__('Register')}} </button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center ">
                                            <p class="mb-0 me-2">{{__('You have a count ?')}}</p>
                                            @if (Route::has('login'))
                                            <li class="actv d-md-block d-sm-none d-none"><a href="/login">{{__('Login')}}</a></li>
                                            @endif

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
                            <p class="text-muted fs-15">Sign up to continue to compte.</p>
                            <div class="p-2">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <label class="form-label" for="firstname">{{__('firstname')}}</label>
                                    <div class="form-outline mb-1">
                                        <input id="firstname" type="text" placeholder="{{__('firstname')}}" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <label class="form-label" for="lastname">{{__('lastname')}}</label>
                                    <div class="form-outline mb-1">
                                        <input id="lastname" type="text" placeholder="{{__('lastname')}}" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <label class="form-label" for="email">{{ __('email') }}</label>
                                    <div class="form-outline mb-1">
                                        <input id="email" type="email" placeholder="{{ __('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-1">
                                        <label class="form-label" for="password">{{__('password')}}</label>
                                        <input id="password" type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-1">
                                        <label class="form-label" for="password_confirmation">{{__('confirm password')}}</label>
                                        <input id="password_confirmation" placeholder="*********" type="password" class="form-control @error('cpassword') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="text-center pt-1 mb-1 pb-1">
                                        <button class="btn btn-primary btn-block  gradient-custom-2 mb-3 w-100 h-100" type="submit"> {{__('Register')}} </button>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center ">
                                        <p class="mb-0 me-2">{{__('You have a count ?')}}</p>
                                        @if (Route::has('login'))
                                        <li class="actv d-md-block d-sm-none d-none"><a href="/login">{{__('Login')}}</a></li>
                                        @endif

                                    </div>
                                </form>


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
