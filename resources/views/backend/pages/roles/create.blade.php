@section('page-title')
    Roles Control
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Role </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.roles.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-1 row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label" style="font-size: medium">Role Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Admin" name="name"/>
                        </div>
                    </div>



                    <div class="flex flex-col sm:flex-row items-center" style="display: none">
                        <label class="w-full sm:w-20 sm:text-right sm:mr-5">Guard Name</label>
                        <div class="mt-2">
                            <select class="input input--lg border mr-2" name="guard">
                                <option value="admin">admin</option>
                                {{--                                <option value="web">web</option>--}}
                            </select>
                        </div>
                    </div>



                    @foreach ($permissions as $item)

                        <div class="col-sm-2">

                        </div>
                        <div class="form-check form-check-success col-sm-10">
                            <input type="checkbox" class="form-check-input" value="{{ $item->name }}" name="permissions[]" id="permission-{{ $loop->index }}">

                            <label class="form-check-label" style="padding: 3px;" for="permission-{{ $loop->index }}"><span class="rounded-pill badge badge-light-primary">{{ $item->name }}</span> <small class="text-white rounded-full px-1 report-box__indicator bg-theme-18 tooltip cursor-pointer tooltipstered">{{ $item->guard_name }}</small></label>
                        </div>



                    @endforeach
                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <input type="submit" class="btn btn-gradient-primary" value="Create" />
                    </div>
                </div>
            </form>
        </div>


    </div>
@endsection
