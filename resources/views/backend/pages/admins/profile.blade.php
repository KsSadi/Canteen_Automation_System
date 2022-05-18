@section('page-title')
   My Profile
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')

    <div style="padding-bottom: 15px;"></div>
    <div class="card" style="padding-top: 10px;">


        <div class="card">
            <!-- Product Details starts -->
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <img
                                src="../../../app-assets/images/pages/eCommerce/1.png"
                                class="img-fluid product-img"
                                alt="product image"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-md-7">


                        <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                            <h4 class="item-price me-1 primary"><b><span class="badge bg-primary">{{ Auth::guard('admin')->user()->name }}</span> </b></h4>

                        </div>
                        <p class="card-text"> <span class="text-success">User Name</span></p>
                        <p class="card-text">
                            {{ Auth::guard('admin')->user()->username }}
                        </p>
                        <p class="card-text"> <span class="text-success">Email</span></p>
                        <p class="card-text">
                            {{ Auth::guard('admin')->user()->email }}
                        </p>
                        <p class="card-text"> <span class="text-success">Phone</span></p>
                        <p class="card-text">
                            {{ Auth::guard('admin')->user()->phone }}
                        </p>

                        <p class="card-text">

                        </p>
                        <hr />

                        <span class="text-success">Created at - {{ Auth::guard('admin')->user()->created_at }}</span>

                        <hr />

                </div>
            </div>
            <!-- Product Details ends -->




        </div>

        <!-- app e-commerce details end -->


    </div>
@endsection
