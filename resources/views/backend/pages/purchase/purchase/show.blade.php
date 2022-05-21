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
                        <td>Purchase Id</td>

                        <th>{{ $purchase->id }}</th>
                    </tr>
                    <tr>
                        <td>Product Name</td>

                        <th> @if($purchase->product)

                                {{$purchase->product->name}}
                            @else
                                Not Found
                            @endif</th>
                    </tr>
                    <tr>
                        <td> Quantity</td>

                        <td>{{ $purchase->quantity }}</td>
                    </tr>
                    <tr>
                        <td>Unit Price</td>

                        <td>{{ $purchase->price }}</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>

                        <td>{{ $purchase->price * $purchase->quantity }}</td>
                    </tr>
                    <tr>
                        <td> Note</td>

                        <td>{{ $purchase->note }}</td>
                    </tr>
                    <tr>
                        <td>Purchase Date </td>

                        <th>{{ $purchase->date }}</th>
                    </tr>
                    <tr>
                        <td>Created </td>

                        <th>{{ $purchase->created_at }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <hr />
         <div class="d-flex flex-column flex-sm-row pt-1" style="justify-content: center;">
{{--                <a href="{{ route('dashboard.purchases.edit', $purchase->id) }}" class="btn btn-info btn-cart me-0 me-sm-1 mb-1 mb-sm-0">--}}
{{--                    <i data-feather="edit" class="me-50"></i>--}}
{{--                    <span class="edit">Edit</span>--}}
{{--                </a>--}}
                <a class="btn btn-danger btn-wishlist me-0 me-sm-1 mb-1 mb-sm-0" href="{{ route('dashboard.sales.destroy', $purchase->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $purchase->id }}').submit()">
                    <i data-feather="trash" class="me-50"></i>
                    <span>Delete</span>
                </a>
                <form id="delete-form-{{$purchase->id}}" action="{{ route('dashboard.purchases.destroy', $purchase->id) }}" method="POST" style="display: none">
                    @method('DELETE')
                    @csrf
                </form>

            </div>
    </div>
    </div>

@endsection
