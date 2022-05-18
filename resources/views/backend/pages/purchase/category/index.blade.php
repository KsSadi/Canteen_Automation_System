@section('page-title')
    Category
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <a href="{{ route('dashboard.purchase.category.create') }}" style="max-width: 220px" class="btn btn-gradient-primary"> <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> New Category </a>
    <div style="padding-bottom: 15px;"></div>
    <div class="card" style="padding-top: 10px;">

        <table class="table table-report -mt-2">
            <thead>
            <tr>
                <th class="whitespace-no-wrap" width="10%"></th>
                <th class="whitespace-no-wrap">CATEGORY NAME</th>


                <th class="text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($pcategory as $pcategory)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit">
                                <i data-feather='box'></i> </div>

                        </div>
                    </td>
                    <td style="">
                        <span href="" class="font-medium whitespace-no-wrap">{{ $pcategory->name }}</span>
{{--                        <div class="text-gray-600 text-xs whitespace-no-wrap"> <span class="badge badge bg-info">{{ $employee->post }}</span></div>--}}
                    </td>



                    <td style="text-align: center">
                        <div class="flex justify-center items-center" >
                            <a class="flex items-center mr-3" href="{{ route('dashboard.purchase.category.edit', $pcategory->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-2 text-body"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>

                            <a class="flex items-center text-theme-6" href="{{ route('dashboard.purchase.category.destroy', $pcategory->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $pcategory->id }}').submit()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2 text-body"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </a>
                            <form id="delete-form-{{$pcategory->id}}" action="{{ route('dashboard.purchase.category.destroy', $pcategory->id) }}" method="POST" style="display: none">
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
