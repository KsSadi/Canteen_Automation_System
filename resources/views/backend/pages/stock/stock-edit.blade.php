@section('page-title')
    Edit Stock
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Stock </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.stock.update', $purchaseItem->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $purchaseItem->name }}" disabled>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Products Description" name="description" rows="4" cols="50" disabled>{{ $purchaseItem->description }}</textarea>
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Unit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $purchaseItem->unit->name}}" disabled>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Current Stock</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="current_stock" value="{{ $purchaseItem->current_stock}}">
                        </div>
                    </div>
                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <input type="submit" class="btn btn-gradient-primary" value="Update" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
