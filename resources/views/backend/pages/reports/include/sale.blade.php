<div style="padding-bottom: 15px;"></div>
<div class="card" style="padding-top: 10px;" id="date-range">

    <table class="table table-report -mt-2">
        <thead>
        <tr>

            <th class="whitespace-no-wrap">Sales ID</th>
            <th class="whitespace-no-wrap">Product</th>
            <th class="whitespace-no-wrap">Quantity</th>
            <th class="whitespace-no-wrap">U. Price</th>
            <th class="whitespace-no-wrap">Total</th>
            <th class="whitespace-no-wrap">Date</th>


        </tr>
        </thead>
        <tbody>

        @foreach ($saledates as $saledate)
            <tr class="intro-x">

                <td style="text-align:">
                    <a class="flex items-center mr-3" href="{{ route('dashboard.sales.show', $saledate->id) }}">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $saledate->id }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </a>
                </td>

                <td style="text-align:">
                    <a class="flex items-center mr-3" href="{{ route('dashboard.sales.show', $saledate->id) }}">

                        <span href="" class="font-medium whitespace-no-wrap">
                            @if($saledate->product)

                                {{$saledate->product->name}}
                            @else
                                Not Found
                            @endif
                        </span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </a>
                </td>

                <td style="text-align:">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $saledate->quantity }}</span>
                    {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                </td>

                <td style="text-align:">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $saledate->price }}</span>
                    {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                </td>
                <td style="text-align:">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $saledate->price * $saledate->quantity }}</span>
                    {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                </td>
                <td style="text-align:">
                    <span href="" class="font-medium whitespace-no-wrap">{{ $saledate->date }}</span>
                    {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
