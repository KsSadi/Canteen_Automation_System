@section('page-title')
    Create Employee
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Employee </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.employees.store') }}" method="POST">
                @csrf
                <div class="row" style="">
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Employee Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Employee Name" name="name">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="email" name="email">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Mobile</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="017*******" name="mobile">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Post</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Manager" name="post">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Salary</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="50000" name="salary">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Join Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder="Date" name="join_date">
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
