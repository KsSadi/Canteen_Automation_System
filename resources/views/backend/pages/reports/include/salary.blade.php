
@php
    $total=0;
    $item=0;
@endphp

@foreach ($salarydates as $salarydate)
@php
    $total= $total+$salarydate->salary;
     $item++;
@endphp
@endforeach


<div class="card" style="padding-top: 10px;">
    <div class="d-inline-block" style="padding-left: 10px;padding-bottom: 10px">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#info">
            Report
        </button>
        <!-- Modal -->
        <div
            class="modal fade modal-info text-start"
            id="info"
            tabindex="-1"
            aria-labelledby="myModalLabel130"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel130">Salary Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Start Date - <span style="color: red; font-style: inherit" >{{$from}}</span>
                        <hr>
                        End Date -<span style="color: red; font-style: inherit" >{{$to}}</span>
                        <hr>
                        Total Employee - <span style="color: red; font-style: inherit" >{{$item}}</span>
                        <hr>
                        Total Salary Amount - <span style="color: red; font-style: inherit" >{{$total}}</span>
                        <hr>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card" style="padding-top: 10px;">




    <table class="table table-report -mt-2">
        <thead>
        <tr>
            <th class="whitespace-no-wrap" width="10%"></th>
            <th class="whitespace-no-wrap">NAME</th>
            <th class="text-center whitespace-no-wrap">Salary</th>
            <th>Payment Date</th>
            <th>Notes</th>

            <th class="text-center whitespace-no-wrap">ACTIONS</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($salarydates as $salarydates)
            <tr class="intro-x">
                <td class="w-40">
                    <div class="flex">
                        <div class="w-10 h-10 image-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-admins mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>

                    </div>
                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $salarydates->employeesname->name }}</span>
                    <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $salarydates->designation }}</span></div>
                </td>

                <td style="text-align: center">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $salarydates->salary }}</span>

                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $salarydates->salary_date }}</span>

                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $salarydates->note }}</span>

                </td>

                <td style="text-align: center">
                    <div class="flex justify-center items-center" >
                        <a class="flex items-center mr-3" href="{{ route('dashboard.employees.salary.edit', $salarydates->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-2 text-body"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </a>

                        <a class="flex items-center text-theme-6" href="{{ route('dashboard.employees.salary.destroy', $salarydates->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $salarydates->id }}').submit()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2 text-body"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </a>
                        <form id="delete-form-{{$salarydates->id}}" action="{{ route('dashboard.employees.salary.destroy', $salarydates->id) }}" method="POST" style="display: none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

</div>
