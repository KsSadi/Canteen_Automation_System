@section('page-title')
    Employee
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <a href="{{ route('dashboard.employees.create') }}" style="max-width: 220px" class="btn btn-gradient-primary"> <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> New Employee </a>
    <div style="padding-bottom: 15px;"></div>
    <div class="card" style="padding-top: 10px;">

        <table class="table table-report -mt-2">
            <thead>
            <tr>
                <th class="whitespace-no-wrap" width="10%"></th>
                <th class="whitespace-no-wrap">NAME</th>
                <th class="text-center whitespace-no-wrap">Mobile</th>
                <th>Join Date</th>
                <th>Salary</th>

                <th class="text-center whitespace-no-wrap">Status</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($employees as $employee)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-admins mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>

                        </div>
                    </td>
                    <td>
                        <span href="" class="font-medium whitespace-no-wrap">{{ $employee->name }}</span>
                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>
                    </td>

                    <td style="text-align: center">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $employee->mobile }}</span>

                    </td>
                    <td>
                        <span href="" class="font-medium whitespace-no-wrap">{{ $employee->join_date }}</span>

                    </td>
                    <td>
                        <span href="" class="font-medium whitespace-no-wrap">{{ $employee->salary }}</span>

                    </td>

                    <td style="text-align: center">
                        @if($employee->status==1)
                            <a href="{{url('dashboard/employee-status/'.$employee->id)}}"  onclick="return confirm('Are you Sure?')" class="btn btn-relief-success">Active</a>

                        @else
                            <a href="{{url('dashboard/employee-status/'.$employee->id)}}"  onclick="return confirm('Are you Sure?')"  class="btn btn-relief-danger">Inactive</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
