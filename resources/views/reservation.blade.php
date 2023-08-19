@extends('layouts.app')

@section('content')

<section class="ecommerce-about bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="text-center">
                    <h1 class="text-white">Réserver</h1>
                    <!-- <p class="fs-16 mb-0 text-white-75">Let's start something great together. Get in touch with one of the team today!</p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                {{-- {{$produit}} --}}

                <div class="element-item  " >
                    <div class="card overflow-hidden">
                        <div class="bg-info-subtle rounded-top py-4">
                            <div class="gallery-product">
                                <img src="{{ Storage::url($produit->image) }}"  alt="" style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                            </div>
                            <div class="gallery-product-actions">
                                <!-- <div class="mb-2">
                                     <button type="button" class="btn btn-danger btn-sm custom-toggle" data-bs-toggle="button">
                                         <span class="icon-on"><i class="mdi mdi-heart-outline align-bottom fs-15"></i></span>
                                         <span class="icon-off"><i class="mdi mdi-heart align-bottom fs-15"></i></span>
                                     </button>
                                </div>
                                <div>
                                     <button type="button" class="btn btn-success btn-sm custom-toggle" data-bs-toggle="button">
                                         <span class="icon-on"><i class="mdi mdi-eye-outline align-bottom fs-15"></i></span>
                                         <span class="icon-off"><i class="mdi mdi-eye align-bottom fs-15"></i></span>
                                     </button>
                                </div> -->
                             </div>

                        </div>
                        <div class="card-body">
                            <div>

                                    <h6 class="fs-15 lh-base text-truncate mb-0"> Name : {{$produit->name}} </h6>
                                    <p> Description : {{$produit->description}}</p>

                                <div class="mt-3">
                                    <!-- <span class="float-end">3.2 <i class="ri-star-half-fill text-warning align-bottom"></i></span> -->
                                    <h5 class="mb-0"> Prix : {{$produit->prix}} $ </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-7">
                <div class="custom-form card p-4 p-lg-5">
                    <form action="{{route('reservation')}}" method="Post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center mb-4">
                                    <h3 class="text-capitalize">Reservé</h3>
                                </div>
                            </div>
                            <input name="produit_id"  id="produit_id" type="hidden" class="form-control"
                            value="{{$produit->id}}">
                            <div class="col-lg-6">
                                {{-- <input type="text" placeholder="{{__('shipementDetail.enterlast')}}" class="form-control @auth is-valid @endauth" id="last_name" value="@auth{{ auth()->user()->Lastname }}@endauth" required/> --}}

                                <div class="form-group mt-3">
                                    <label for="name" class="form-label">Nom<span class="text-danger">*</span></label>
                                    <input name="nom" required id="name" type="text" class="form-control @auth is-valid @endauth"
                                        placeholder="Enter name"
                                        value="@auth{{ auth()->user()->lastname }}@endauth">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="prenom" class="form-label">Prenom<span class="text-danger">*</span></label>
                                    <input name="prenom" required id="prenom" type="text" class="form-control @auth is-valid @endauth"
                                        placeholder="Enter name"
                                        value="@auth{{ auth()->user()->firstname }}@endauth">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="email" class="form-label">Email<span
                                            class="text-danger">*</span></label>
                                    <input name="email" required id="email" type="email" class="form-control @auth is-valid @endauth"
                                        placeholder="Enter email"
                                        value="@auth{{ auth()->user()->email }}@endauth">
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="form-group mt-3">
                                    <label for="subject" class="form-label">date<span
                                            class="text-danger">*</span></label>
                                    <input type="text" required name="subject" class="form-control" id="subject"
                                        placeholder="Enter Subject..">
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-12">
                                <div class="form-group mt-3">
                                    <label for="message" class="form-label">Message<span
                                            class="text-danger">*</span></label>
                                    <textarea name="message" required id="message" rows="4" class="form-control"
                                        placeholder="Enter message..."></textarea>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="text-end mt-4">
                                    @auth
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Reservé
                                    </button>
                                    @else
                                    <button   type="button"  href="#invoiceModal" data-bs-toggle="modal" class="btn btn-primary">
                                        Reservé

                                    </button>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="col-lg-2"></div> --}}
        </div>
    </div>
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="invoiceModalLabel">{{ __('Login') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                                    <div class="card-body">
                                        <form method="POST" action="{{ route('loginReserve') }}">
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



                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>


                                                </div>
                                            </div>
                                        </form>

                    </div>
                    <!--end card-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
