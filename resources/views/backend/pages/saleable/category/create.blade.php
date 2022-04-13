@section('page-title')
    Create Category
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Category </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.sale.category.store') }}" method="POST">
                @csrf
                <div class="row" style="">
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Category Name" name="name">
                        </div>
                    </div>


                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <input type="submit" class="btn btn-gradient-primary" value="Create" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
