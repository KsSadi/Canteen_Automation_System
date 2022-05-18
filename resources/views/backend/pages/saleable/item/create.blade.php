@section('page-title')
    Create Item
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Item </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.sale.item.store') }}" method="POST">
                @csrf
                <div class="row" style="">
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Products Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Products Name" name="name" required>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Products Description" name="description" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Category</label>
                        <div class="col-sm-10">
                            <select class="select2 form-select" id="select2-basic" name="scat_id" required>
                                <option value=""> Select </option>
                                @foreach($scategories as $scategory)

                                        <option value="{{ $scategory->id }}"> {{ $scategory->name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Unit</label>
                        <div class="col-sm-10">
                            <select class="select2 form-select" id="select2-basic" name="sunit_id" required>
                                <option value=""> Select </option>
                                @foreach($sunits as $sunit)

                                    <option value="{{ $sunit->id }}"> {{ $sunit->name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Price </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="100" name="price" required>
                        </div>
                    </div>
{{--                    <div class="mb-1 row">--}}
{{--                        <label class="col-sm-2 col-form-label" style="font-size: medium">Products Picture</label>--}}
{{--                        <div class="col-sm-10">--}}
{{--                            <input type="file" class="form-control" placeholder="Picture" name="img">--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <input type="submit" class="btn btn-gradient-primary" value="Create" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
