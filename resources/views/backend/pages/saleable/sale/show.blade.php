@section('page-title')
    Create Sale
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Sale Details </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">

                    <tbody>
                    <tr>
                        <td>Sale Id</td>

                        <th>{{ $sale->id }}</th>
                    </tr>
                    <tr>
                        <td>Product Name</td>

                        <th>{{ $sale->product->name }}</th>
                    </tr>
                    <tr>
                        <td> Quantity</td>

                        <td>{{ $sale->quantity }}</td>
                    </tr>
                    <tr>
                        <td>Unit Price</td>

                        <td>{{ $sale->price }}</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>

                        <td>{{ $sale->price * $sale->quantity }}</td>
                    </tr>
                    <tr>
                        <td> Note</td>

                        <td>{{ $sale->note }}</td>
                    </tr>

                    <tr>
                        <td>Created </td>

                        <th>{{ $sale->created_at }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <hr />
         <div class="d-flex flex-column flex-sm-row pt-1" style="justify-content: center;">
{{--                <a href="{{ route('dashboard.sales.edit', $sale->id) }}" class="btn btn-info btn-cart me-0 me-sm-1 mb-1 mb-sm-0">--}}
{{--                    <i data-feather="edit" class="me-50"></i>--}}
{{--                    <span class="edit">Edit</span>--}}
{{--                </a>--}}
                <a class="btn btn-danger btn-wishlist me-0 me-sm-1 mb-1 mb-sm-0" href="{{ route('dashboard.sales.destroy', $sale->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $sale->id }}').submit()">
                    <i data-feather="trash" class="me-50"></i>
                    <span>Delete</span>
                </a>
                <form id="delete-form-{{$sale->id}}" action="{{ route('dashboard.sales.destroy', $sale->id) }}" method="POST" style="display: none">
                    @method('DELETE')
                    @csrf
                </form>

            </div>
    </div>
    </div>

@endsection
