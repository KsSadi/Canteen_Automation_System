@section('page-title')
    Edit Role
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Role </h4>

        </div>
<p><hr/></p>

        <div class="card-body">

            <form action="{{ route('dashboard.roles.update', $role->id) }}" method="POST">
                @method('PUT')
                @csrf


                <div class="mb-1 row">
                    <label for="colFormLabel" class="col-sm-1 col-form-label" style="font-size: medium">Role Name</label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" placeholder="Admin" name="name" value="{{ $role->name }}"/>
                    </div>
                </div>



                @foreach ($permissions as $item)

                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10" style="margin-left: 50px">
                    <div class="form-check form-check-success">
                        <input type="checkbox" {{ $role->hasPermissionTo($item->name) ? 'checked' : '' }} class="form-check-input" style="padding: 5px;" value="{{ $item->name }}" name="permissions[]" id="permission-{{ $loop->index }}">

                        <label class="form-check-label" style="padding: 3px;" for="permission-{{ $loop->index }}"><span class="rounded-pill badge badge-light-primary">{{ $item->name }}</span></label>
                    </div>
                    </div>



                @endforeach
                <div class="sm:ml-20 sm:pl-5 mt-5">
                    <input type="submit" class="btn btn-gradient-primary" value="Update" />
                </div>
        </form>

        </form>
    </div>





    </div>
@endsection
