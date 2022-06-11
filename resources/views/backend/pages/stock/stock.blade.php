@section('page-title')
    Current Stock
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

                @if (Auth::guard('admin')->user()->can('stock.edit'))
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                @else
                    <th></th>
                @endif



            </tr>
            </thead>
            <tbody>
            @php
            $i=0;
            @endphp

            @foreach ($purchases as $purchase)
                <tr class="intro-x">

                    <td style="text-align:">

                            <span href="" class="font-medium whitespace-no-wrap">{{ $purchase->id }}</span>
                            {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}

                    </td>

                    <td style="text-align:">


                        <span href="" class="font-medium whitespace-no-wrap">
                            {{ $purchase->name }}
                        </span>
                            {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}

                    </td>

                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $purchase->current_stock }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>
                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap"> {{ $purchase->unit->name }}

                          </span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>
                    <td style="text-align: center">
                        <div class="flex justify-center items-center" >
                            @if (Auth::guard('admin')->user()->can('stock.edit'))
                            <a class="flex items-center mr-3" href="{{ route('dashboard.stock.edit', $purchase->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-2 text-body"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>
                            @endif

                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
