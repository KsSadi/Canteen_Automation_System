
@php
    $total=0;
    $totalproduct=0;
    $totalquantity=0;
    $item=0;
@endphp

@foreach ($purchasedates as $purchase)
    @php
        $total= $total+($purchase->price * $purchase->quantity);

        $totalquantity= $totalquantity+$purchase->quantity;
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
                        <h5 class="modal-title" id="myModalLabel130">Purchase Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Start Date - <span style="color: red; font-style: inherit" >{{$from}}</span>
                        <hr>
                        End Date -<span style="color: red; font-style: inherit" >{{$to}}</span>
                        <hr>
                        Total Purchase - <span style="color: red; font-style: inherit" >{{$item}}</span>
                        <hr>

                        Total Product Quantity - <span style="color: red; font-style: inherit" >{{$totalquantity}}</span>
                        <hr>
                        Total Purchasing Amount - <span style="color: red; font-style: inherit" >{{$total}}</span>
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



<div style="padding-bottom: 15px;"></div>
<div class="card" style="padding-top: 10px;" id="date-range">

    <table class="table table-report -mt-2">
        <thead>
        <tr>

            <th class="whitespace-no-wrap">Purchase ID</th>
            <th class="whitespace-no-wrap">Product</th>
            <th class="whitespace-no-wrap">Quantity</th>
            <th class="whitespace-no-wrap">U. Price</th>
            <th class="whitespace-no-wrap">Total</th>
            <th class="whitespace-no-wrap">Date</th>


        </tr>
        </thead>
        <tbody>

        @foreach ($purchasedates as $purchasedate)
            <tr class="intro-x">

                <td style="text-align:">
                    <a class="flex items-center mr-3" href="{{ route('dashboard.purchases.show', $purchasedate->id) }}">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $purchasedate->id }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </a>
                </td>

                <td style="text-align:">
                    <a class="flex items-center mr-3" href="{{ route('dashboard.sales.show', $purchasedate->id) }}">

                        <span href="" class="font-medium whitespace-no-wrap">
                            @if($purchasedate->product)

                                {{$purchasedate->product->name}}
                            @else
                                Not Found
                            @endif
                        </span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </a>
                </td>

                <td style="text-align:">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $purchasedate->quantity }}</span>
                    {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                </td>

                <td style="text-align:">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $purchasedate->price }}</span>
                    {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                </td>
                <td style="text-align:">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $purchasedate->price * $purchasedate->quantity }}</span>
                    {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                </td>
                <td style="text-align:">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $purchasedate->date }}</span>
                    {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
