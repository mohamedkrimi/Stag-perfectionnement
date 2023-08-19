@extends('layouts.app')

@section('content')

<div class="offcanvas offcanvas-end product-list" tabindex="-1" id="ecommerceCart" aria-labelledby="ecommerceCartLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="ecommerceCartLabel">My Cart <span class="badge bg-danger align-middle ms-1 cartitem-badge">4</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <div data-simplebar  class="h-100">
            <ul class="list-group list-group-flush cartlist">
                <li class="list-group-item product">
                    <div class="d-flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="avatar-md" style="height: 100%;">
                                <div class="avatar-title bg-warning-subtle rounded-3">
                                    <img src="../assets/images/products/img-4.png" alt="" class="avatar-sm">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <a href="#!">
                                <h5 class="fs-15">Borosil Paper Cup</h5>
                            </a>
                            <div class="d-flex mb-3 gap-2">
                                <div class="text-muted fw-medium mb-0">$<span class="product-price">24.00</span></div>
                                <div class="vr"></div>
                                <span class="text-success fw-medium">In Stock</span>
                            </div>
                            <div class="input-step">
                                <button type="button" class="minus">–</button>
                                <input type="number" class="product-quantity" value="2" min="0" max="100" readonly>
                                <button type="button" class="plus">+</button>
                            </div>
                        </div>
                        <div class="flex-shrink-0 d-flex flex-column justify-content-between align-items-end">
                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-close-fill fs-16"></i></button>
                            <div class="fw-medium mb-0 fs-16">$<span class="product-line-price">48.00</span></div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item product">
                    <div class="d-flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="avatar-md" style="height: 100%;">
                                <div class="avatar-title bg-info-subtle rounded-3">
                                    <img src="../assets/images/products/img-1.png" alt="" class="avatar-sm">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <a href="#!">
                                <h5 class="fs-15">Rockerz Ear Bluetooth Hea...</h5>
                            </a>
                            <div class="d-flex mb-3 gap-2">
                                <div class="text-muted fw-medium mb-0">$<span class="product-price">160.00</span></div>
                                <div class="vr"></div>
                                <span class="text-success fw-medium">In Stock</span>
                            </div>
                            <div class="input-step">
                                <button type="button" class="minus">–</button>
                                <input type="number" class="product-quantity" value="1" min="0" max="100" readonly>
                                <button type="button" class="plus">+</button>
                            </div>
                        </div>
                        <div class="flex-shrink-0 d-flex flex-column justify-content-between align-items-end">
                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-close-fill fs-16"></i></button>
                            <div class="fw-medium mb-0 fs-16">$<span class="product-line-price">160.00</span></div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item product">
                    <div class="d-flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="avatar-md" style="height: 100%;">
                                <div class="avatar-title bg-danger-subtle rounded-3">
                                    <img src="../assets/images/products/img-6.png" alt="" class="avatar-sm">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <a href="#!">
                                <h5 class="fs-15">Monte Carlo Sweaters</h5>
                            </a>
                            <div class="d-flex mb-3 gap-2">
                                <div class="text-muted fw-medium mb-0">$ <span class="product-price">244.99</span></div>
                                <div class="vr"></div>
                                <span class="text-success fw-medium">In Stock</span>
                            </div>
                            <div class="input-step">
                                <button type="button" class="minus">–</button>
                                <input type="number" class="product-quantity" value="3" min="0" max="100" readonly>
                                <button type="button" class="plus">+</button>
                            </div>
                        </div>
                        <div class="flex-shrink-0 d-flex flex-column justify-content-between align-items-end">
                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-close-fill fs-16"></i></button>
                            <div class="fw-medium mb-0 fs-16">$<span class="product-line-price">734.97</span></div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item product">
                    <div class="d-flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="avatar-md" style="height: 100%;">
                                <div class="avatar-title bg-primary-subtle rounded-3">
                                    <img src="../assets/images/products/img-8.png" alt="" class="avatar-sm">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <a href="#!">
                                <h5 class="fs-15">Men's Running Shoes Act...</h5>
                            </a>
                            <div class="d-flex mb-3 gap-2">
                                <div class="text-muted fw-medium mb-0">$<span class="product-price">120.30</span></div>
                                <div class="vr"></div>
                                <span class="text-success fw-medium">In Stock</span>
                            </div>
                            <div class="input-step">
                                <button type="button" class="minus">–</button>
                                <input type="number" class="product-quantity" value="2" min="0" max="100" readonly>
                                <button type="button" class="plus">+</button>
                            </div>
                        </div>
                        <div class="flex-shrink-0 d-flex flex-column justify-content-between align-items-end">
                            <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-close-fill fs-16"></i></button>
                            <div class="fw-medium mb-0 fs-16">$<span class="product-line-price">240.60</span></div>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="table-responsive mx-2 border-top border-top-dashed">
                <table class="table table-borderless mb-0 fs-14 fw-semibold">
                    <tbody>
                        <tr>
                            <td>Sub Total :</td>
                            <td class="text-end cart-subtotal">$1183.57</td>
                        </tr>
                        <tr>
                            <td>Discount <span class="text-muted">(Toner15)</span>:</td>
                            <td class="text-end cart-discount">- $177.54</td>
                        </tr>
                        <tr>
                            <td>Shipping Charge :</td>
                            <td class="text-end cart-shipping">$65.00</td>
                        </tr>
                        <tr>
                            <td>Estimated Tax (12.5%) : </td>
                            <td class="text-end cart-tax">$147.95</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 text-center">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="m-0 fs-16 text-muted">Total:</h6>
            <div class="px-2">
                <h6 class="m-0 fs-16 cart-total">$1218.98</h6>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-6">
                <button type="button" class="btn btn-light w-100" id="reset-layout">View Cart</button>
            </div>
            <div class="col-6">
                <a href="#!" target="_blank" class="btn btn-info w-100">Continue to Checkout</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded">
            <div class="modal-header p-3">
                <div class="position-relative w-100">
                    <input type="text" class="form-control form-control-lg border-2" placeholder="Search for Toner..." autocomplete="off" id="search-options" value="">
                    <span class="bi bi-search search-widget-icon fs-17"></span>
                    <a href="javascript:void(0);" class="search-widget-icon fs-14 link-secondary text-decoration-underline search-widget-icon-close d-none" id="search-close-options">Clear</a>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 overflow-hidden" id="search-dropdown">

                <div class="dropdown-head rounded-top">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 fs-14 text-muted fw-semibold"> RECENT SEARCHES </h6>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-item bg-transparent text-wrap">
                        <a href="index-2.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i class="mdi mdi-magnify ms-1 align-middle"></i></a>
                        <a href="index-2.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i class="mdi mdi-magnify ms-1 align-middle"></i></a>
                    </div>
                </div>

                <div data-simplebar style="max-height: 300px;" class="pe-2 ps-3 my-3">
                    <div class="list-group list-group-flush border-dashed">
                        <div class="notification-group-list">
                            <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">Apps Pages</h5>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-speedometer2 me-2"></i> <span>Analytics Dashboard</span></a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-filetype-psd me-2"></i> <span>Toner.psd</span></a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-ticket-detailed me-2"></i> <span>Support Tickets</span></a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-file-earmark-zip me-2"></i> <span>Toner.zip</span></a>
                        </div>

                        <div class="notification-group-list">
                            <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">Links</h5>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-link-45deg me-2 align-middle"></i> <span>www.themesbrand.com</span></a>
                        </div>

                        <div class="notification-group-list">
                            <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">People</h5>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2">
                                    <div>
                                        <h6 class="mb-0">Ayaan Bowen</h6>
                                        <span class="fs-12 text-muted">React Developer</span>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2">
                                    <div>
                                        <h6 class="mb-0">Alexander Kristi</h6>
                                        <span class="fs-12 text-muted">React Developer</span>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                <div class="d-flex align-items-center">
                                    <img src="../assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2">
                                    <div>
                                        <h6 class="mb-0">Alan Carla</h6>
                                        <span class="fs-12 text-muted">React Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- removeItemModal -->
<div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="remove-product">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- end modal -->


<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-info btn-icon" style="bottom: 50px;" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->



<section class="position-relative">
    <div id="ecommerceHero" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            {{-- <div class="carousel-item active">
                <div class="ecommerce-home bg-danger-subtle" style="background-image: url('../assets/images/ecommerce/home/img-1.png');">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-lg-7">
                                <div class="text-sm-end">
                                    <p class="fs-15 fw-semibold text-uppercase"><i class="ri-flashlight-fill text-primary align-bottom me-1"></i> In this season, find the best</p>
                                    <h1 class="display-4 fw-bold lh-base text-capitalize mb-3">Exclusive collection for everyone</h1>
                                    <p class="fs-20 mb-4">Biggest offers on this season</p>
                                    <button class="btn btn-danger btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> Shop Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="carousel-item active">
                <div class="ecommerce-home bg-primary-subtle" style="background-image: url('../assets/images/ecommerce/home/img-2.png');">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <p class="fs-15 fw-semibold text-uppercase"><i class="ri-flashlight-fill text-info align-bottom me-1"></i> Save up to <span class="text-danger">50%</span> off</p>
                                    <h1 class="display-4 fw-semibold text-capitalize lh-base">Pro Smart watches for smart People</h1>
                                    <p class="fs-18 mb-4"><b>40% off</b> up to on all selected products</p>
                                    <button class="btn btn-primary btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> Shop Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="ecommerce-home" style="background-image: url('../assets/images/ecommerce/home/img-6.jpg');background-size: cover;">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <div class="text-end">
                                    <p class="fs-15 fw-semibold text-uppercase text-dark">Jewelry Design with Love</p>
                                    <h1 class="display-4 fw-semibold text-capitalize lh-base text-dark">Discover world best Jewelry</h1>
                                    <p class="text-dark lead fs-19 mb-4">Jewelry are like a tribute to being a woman</p>
                                    <div class="hstack gap-2 justify-content-end">
                                        <button class="btn btn-success btn-hover">Shop Now <i class="ph-arrow-up-right align-middle ms-1"></i></button>
                                        <button class="btn btn-ghost-secondary btn-hover">Watch Now <i class="ph-play-circle align-middle ms-1 fs-16"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#ecommerceHero" data-bs-slide="prev">
            <i class="ph-caret-left"></i>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#ecommerceHero" data-bs-slide="next">
            <i class="ph-caret-right"></i>
        </button>
    </div>
</section>


<section class="section bg-light bg-opacity-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center">
                    <h3 class="mb-3">Shop insights & feeds</h3>
                    <p class="text-muted fs-15">Shopping Insights gives marketers a 360-degree view of a product's popularity. Harnessing search volume data for more than 7,000 popular products (and counting)</p>
                </div>
        </div>
        </div>




    </div>
</section>
<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-content text-center mb-5">
                    <h2 class="title fw-normal"> <b>Exemple Produit</b></h2>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-animate watch-category-widgets">
                    <div class="card-body p-2">
                        <div class="bg-light">
                            <img src="../assets/images/watch/products/img-07.png" alt="" class="img-fluid">
                        </div>
                        <div class="category-btn mx-3 pb-3">
                            <a href="#!" class="btn btn-danger stretched-link w-100">Fancy Watches</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-lg-3 col-md-6">
                <div class="card card-animate watch-category-widgets">
                    <div class="card-body p-2">
                        <div class="bg-light">
                            <img src="../assets/images/watch/products/img-01.png" alt="" class="img-fluid">
                        </div>
                        <div class="category-btn mx-3 pb-3">
                            <a href="#!" class="btn btn-danger stretched-link w-100">Women's Watches</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-lg-3 col-md-6">
                <div class="card card-animate watch-category-widgets">
                    <div class="card-body p-2">
                        <div class="bg-light">
                            <img src="../assets/images/watch/products/img-04.png" alt="" class="img-fluid">
                        </div>
                        <div class="category-btn mx-3 pb-3">
                            <a href="#!" class="btn btn-danger stretched-link w-100">Men's Watches</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-lg-3 col-md-6">
                <div class="card card-animate watch-category-widgets">
                    <div class="card-body p-2">
                        <div class="bg-light">
                            <img src="../assets/images/watch/products/img-06.png" alt="" class="img-fluid">
                        </div>
                        <div class="category-btn mx-3 pb-3">
                            <a href="#!" class="btn btn-danger stretched-link w-100">Smartwatch's</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-fluid-->
</section>
<!-- START PRODUCT -->

<!-- END PRODUCT -->



<section class="section ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center">
                    <h3 class="mb-3">What Customers Say About Us</h3>
                    <p class="text-muted fs-15">A customer is a person or business that buys goods or services from another business. Customers are crucial because they generate revenue.</p>
                </div>
           </div><!--end col-->
        </div><!--end row-->




    </div>
</section>

<!-- START BLOG -->


@endsection
