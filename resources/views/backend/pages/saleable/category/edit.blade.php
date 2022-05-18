@section('page-title')
    Edit Category
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Category </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.sale.category.update', $scategory->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="name" value="{{ $scategory->name }}">
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
