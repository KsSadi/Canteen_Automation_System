
@php
    $total=0;
    $item=0;
@endphp

@foreach ($expensedates as $expensedate)
    @php
        $total= $total+$expensedate->amount;
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
                        <h5 class="modal-title" id="myModalLabel130"> Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Start Date - <span style="color: red; font-style: inherit" >{{$from}}</span>
                        <hr>
                        End Date -<span style="color: red; font-style: inherit" >{{$to}}</span>
                        <hr>
                        Total Expense - <span style="color: red; font-style: inherit" >{{$item}}</span>
                        <hr>
                        Total  Amount - <span style="color: red; font-style: inherit" >{{$total}}</span>
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
            <th class="whitespace-no-wrap">EXPENSE NAME</th>
            <th class="text-center whitespace-no-wrap">AMOUNT</th>
            <th>Date</th>
            <th>Notes</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($expensedates as $expensedate)
            <tr class="intro-x">
                <td class="w-40">
                    <div class="flex">
                        <div class="w-10 h-10 image-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-admins mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>

                    </div>
                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $expensedate->name }}</span>

                </td>

                <td style="text-align: center">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $expensedate->amount }}</span>

                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $expensedate->date }}</span>

                </td>
                <td>
                    <span href="" class="font-medium whitespace-no-wrap">{{ $expensedate->note }}</span>

                </td>


            </tr>

        @endforeach
        </tbody>
    </table>

</div>
