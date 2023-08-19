@extends('layouts.app')

@section('content')

<section class="ecommerce-about bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="text-center">
                    <h1 class="text-white">Liste Reservation</h1>
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

{{-- <section class="section"> --}}
    <div class="container mt-4">
        <div class="row">



                <div class="custom-form card p-4 p-lg-5">

                        <div class="table-responsive">
                            <table class="table fs-15 align-middle table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Produit</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Email</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $rev)
                                    <tr>
                                        <td>
                                           {{$rev->id}}
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="{{ Storage::url($rev->produit->image) }}"  alt="" class="avatar-xs">

                                                        {{-- <img src="../assets/images/products/img-19.png" alt="" > --}}
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">

                                                        <h6 class="fs-15 mb-1">{{$rev->produit->name}}</h6>

                                                    <p class="mb-0 text-muted fs-13">{{$rev->produit->prix}} $</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="text-muted">{{$rev->created_at}}</span></td>
                                        <td class="fw-medium"> {{$rev->nom}}</td>
                                        <td class="fw-medium"> {{$rev->prenom}}</td>
                                        <td class="fw-medium"> {{$rev->email}}</td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>


                </div>


        </div>
    </div>
{{-- </section> --}}
@endsection
