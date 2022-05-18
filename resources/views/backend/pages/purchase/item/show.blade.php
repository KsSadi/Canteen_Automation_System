@section('page-title')
    Item - {{ $pitem->name }}
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
                        <h4>{{ $pitem->name }}</h4>

                        <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                            <h4 class="item-price me-1 primary"><b><span class="badge bg-primary">৳ {{ $pitem->price }}</span> </b></h4>

                        </div>
                        <p class="card-text"> <span class="text-success">Details</span></p>
                        <p class="card-text">
                            {{ $pitem->description}}
                        </p>
                        <p class="card-text"> <span class="text-success">Category</span></p>
                        <p class="card-text">
                            @if($pitem->category)
                                {{ $pitem->category->name}}
                            @else
                                Not Found
                            @endif
                        </p>
                        <p class="card-text"> <span class="text-success">Purchasing Unit</span></p>
                        <p class="card-text">
                            @if($pitem->unit)

                                {{ $pitem->unit->name}}
                            @else
                                Not Found
                            @endif
                        </p>
                        <hr />

                        <span class="text-success">Created at - {{ $pitem->created_at}}</span>

                        <hr />
                        <div class="d-flex flex-column flex-sm-row pt-1">
                            <a href="{{ route('dashboard.purchase.item.edit', $pitem->id) }}" class="btn btn-info btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                <i data-feather="edit" class="me-50"></i>
                                <span class="edit">Edit</span>
                            </a>
                            <a class="btn btn-danger btn-wishlist me-0 me-sm-1 mb-1 mb-sm-0" href="{{ route('dashboard.purchase.item.destroy', $pitem->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $pitem->id }}').submit()">
                                <i data-feather="delete" class="me-50"></i>
                                <span>Delete</span>
                            </a>
                            <form id="delete-form-{{$pitem->id}}" action="{{ route('dashboard.purchase.item.destroy', $pitem->id) }}" method="POST" style="display: none">
                                @method('DELETE')
                                @csrf
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Details ends -->




        </div>

        <!-- app e-commerce details end -->


    </div>
@endsection
