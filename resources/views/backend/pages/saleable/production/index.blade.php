@section('page-title')
    Production
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')

    <a href="{{ route('dashboard.sales.production.create') }}" style="max-width: 220px" class="btn btn-gradient-primary"> <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> New Production </a>

    <div style="padding-bottom: 15px;"></div>
    <div class="card" style="padding-top: 10px;">

        <table class="table table-report -mt-2">
            <thead>
            <tr>

                <th class="whitespace-no-wrap">ID</th>
                <th class="whitespace-no-wrap">Product</th>
                <th class="whitespace-no-wrap">M. Quantity</th>
                <th class="whitespace-no-wrap">U. Price</th>
                <th class="whitespace-no-wrap">Expected Price</th>
                <th class="whitespace-no-wrap">Date</th>
                <th class="whitespace-no-wrap">Action</th>


            </tr>
            </thead>
            <tbody>

            @foreach ($sales as $sale)
                <tr class="intro-x">

                    <td style="text-align:">

                            <span href="" class="font-medium whitespace-no-wrap">{{ $sale->id }}</span>
                            {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}

                    </td>

                    <td style="text-align:">


                        <span href="" class="font-medium whitespace-no-wrap">
                            @if($sale->product)

                                {{$sale->product->name}}
                            @else
                                Not Found
                            @endif
                        </span>
                            {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}

                    </td>

                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $sale->quantity }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>

                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $sale->price }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>
                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $sale->price * $sale->quantity }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>
                    <td style="text-align:">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $sale->date }}</span>
                        {{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>
                    <td style="text-align: ">
                        <div class="flex justify-center items-center" >

                            <a class="flex items-center text-theme-6" href="{{ route('dashboard.sales.production.destroy', $sale->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $sale->id }}').submit()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2 text-body"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </a>
                            <form id="delete-form-{{$sale->id}}" action="{{ route('dashboard.sales.production.destroy', $sale->id) }}" method="POST" style="display: none">
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
@endsection
