@extends('layouts.app')

@section('content')

<section class="ecommerce-about bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="text-center">
                    <h1 class="text-white">Contact Us</h1>
                    <!-- <p class="fs-16 mb-0 text-white-75">Let's start something great together. Get in touch with one of the team today!</p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container ">
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
            <div class="col-lg-2"></div>


            <div class="col-lg-8">
                <div class="custom-form card p-4 p-lg-5">
                    <form action="{{route('storeContact')}}" method="Post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center mb-4">
                                    <h3 class="text-capitalize">Get more Information</h3>
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
</section>
@endsection
