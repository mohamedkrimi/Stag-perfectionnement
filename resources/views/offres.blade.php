@extends('layouts.app')

@section('content')

<section class="ecommerce-about bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="text-center">
                    <h1 class="text-white">Nos offres (Catégories et produit) </h1>
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

{{-- <section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>


            <div class="col-lg-8">
                <div class="custom-form card p-4 p-lg-5">
                    <form action="{{route('storeContact')}}" method="Post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center mb-4">
                                    <h3 class="text-capitalize">Get In Touch with us for more Information</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input name="name" required id="name" type="text" class="form-control"
                                        placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="email" class="form-label">Email<span
                                            class="text-danger">*</span></label>
                                    <input name="email" required id="email" type="email" class="form-control"
                                        placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mt-3">
                                    <label for="subject" class="form-label">Subject<span
                                            class="text-danger">*</span></label>
                                    <input type="text" required name="subject" class="form-control" id="subject"
                                        placeholder="Enter Subject..">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mt-3">
                                    <label for="message" class="form-label">Message<span
                                            class="text-danger">*</span></label>
                                    <textarea name="message" required id="message" rows="4" class="form-control"
                                        placeholder="Enter message..."></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-end mt-4">
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Send Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section> --}}

<section class="section ">
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center">
                    <h3 class="mb-3">Top Picks Products Of The Week</h3>
                    <p class="text-muted fs-15 mb-0"> This ranges from women and men's outfits to children's clothing, shoes, accessories, and more. People love their clothes, and fashion isn't going anywhere!</p>
                </div>
           </div>
        </div> -->


        <div class="row ">
            <div class="col-lg-12">
                <div class="text-center">
                    <ul class="list-inline categories-filter animation-nav " id="filter">
                    <li class="list-inline-item"><a class="categories active" id="filter-menu" href="/offres">All</a></li>
                        @foreach($categories as $cat)

                        <li class="list-inline-item"><a class="categories " href="/filter/{{$cat->id}}" >{{$cat->name}}</a></li>


                        @endforeach
                        <!-- <li class="list-inline-item"><a class="categories active" data-filter="*">All Arrival</a></li>
                        <li class="list-inline-item"><a class="categories" data-filter=".seller">Best Seller</a></li>
                        <li class="list-inline-item"><a class="categories" data-filter=".hot">Hot Collection</a></li>
                        <li class="list-inline-item"><a class="categories" data-filter=".trendy">Trendy</a></li>
                        <li class="list-inline-item"><a class="categories" data-filter=".arrival">New Arrival</a></li> -->
                    </ul>
                </div>

                <div class="row gallery-wrapper mt-4 pt-2" id="product-list">


                    <!-- end col -->
                    @if(count($produits)==0)
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>Auccun produit </strong>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>
                    @endif
                    @foreach($produits as $prod)
                    <div class="element-item col-xxl-3 col-xl-4 col-sm-6 seller hot" data-category="seller hot">
                        <div class="card overflow-hidden">
                            <div class="bg-info-subtle rounded-top py-4">
                                <div class="gallery-product">
                                    <img src="{{ Storage::url($prod->image) }}"  alt="" style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
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
                                 <div class="product-btn px-3">
                                     <a href="/reserve/{{$prod->id}}" class="btn btn-primary btn-sm w-75 add-btn"> Réserver</a>
                                 </div>
                            </div>
                            <div class="card-body">
                                <div>

                                        <h6 class="fs-15 lh-base text-truncate mb-0">{{$prod->name}} </h6>
                                        <p>{{$prod->description}}</p>

                                    <div class="mt-3">
                                        <!-- <span class="float-end">3.2 <i class="ri-star-half-fill text-warning align-bottom"></i></span> -->
                                        <h5 class="mb-0">{{$prod->prix}} $ </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach

                    <!-- end col -->



                    <!-- end col -->
                </div>


                <!-- <div class="mt-4 text-center">
                    <a href="product-list-defualt.html" class="btn btn-soft-primary btn-hover">View All Products <i class="mdi mdi-arrow-right align-middle ms-1"></i></a>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection
