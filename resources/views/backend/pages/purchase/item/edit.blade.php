@section('page-title')
    Edit Item
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Item </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.purchase.item.update', $pitem->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Item Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $pitem->name }}">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Products Description" name="description" rows="4" cols="50">{{ $pitem->description }}</textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $pitem->category->name}}" disabled>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Unit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $pitem->unit->name}}" disabled>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="price" value="{{ $pitem->price }}">    </div>
                    </div>





                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <input type="submit" class="btn btn-gradient-primary" value="Update" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
