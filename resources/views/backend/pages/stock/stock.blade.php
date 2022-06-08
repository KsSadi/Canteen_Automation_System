@section('page-title')
    Purchase
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')


    <div style="padding-bottom: 15px;"></div>
    <div class="card" style="padding-top: 10px;">

        <table class="table table-report -mt-2">
            <thead>
            <tr>

                <th class="whitespace-no-wrap">ID</th>
                <th class="whitespace-no-wrap">Product</th>
                <th class="whitespace-no-wrap">Quantity</th>
                <th class="whitespace-no-wrap">Unit</th>



            </tr>
            </thead>
            <tbody>
            @php
            $i=0;
            @endphp

            @foreach ($purchases as $purchase)
                <tr class="intro-x">

                    <td style="text-align:">

                            <span href="" class="font-medium whitespace-no-wrap">{{$i=$i+1}}</span>
                            {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}

                    </td>

                    <td style="text-align:">


                        <span href="" class="font-medium whitespace-no-wrap">
                            {{ \App\Models\PurchaseItem::where('id', $purchase->name)->first()->name }}
                        </span>
                            {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}

                    </td>

                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $purchase->total }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>
                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap"> {{$purchase->punit_id}}

                          </span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
