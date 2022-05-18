@section('page-title')
  Purchase
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')

    <a href="{{ route('dashboard.purchases.create') }}" style="max-width: 220px" class="btn btn-gradient-primary"> <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> New Purchase </a>

    <div style="padding-bottom: 15px;"></div>
    <div class="card" style="padding-top: 10px;">

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

            @foreach ($purchases as $purchase)
                <tr class="intro-x">

                    <td style="text-align:">
                        <a class="flex items-center mr-3" href="{{ route('dashboard.purchases.show', $purchase->id) }}">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $purchase->id }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                        </a>
                    </td>

                    <td style="text-align:">
                        <a class="flex items-center mr-3" href="{{ route('dashboard.purchases.show', $purchase->id) }}">

                        <span href="" class="font-medium whitespace-no-wrap">
                            @if($purchase->product)

                                {{$purchase->product->name}}
                            @else
                                Not Found
                            @endif
                        </span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                        </a>
                    </td>

                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $purchase->quantity }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>

                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $purchase->price }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>
                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $purchase->price * $purchase->quantity }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>
                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $purchase->created_at }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
