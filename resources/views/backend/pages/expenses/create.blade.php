@section('page-title')
   Salaries
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Expenses </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.expense.other.store') }}" method="POST">
                @csrf
                <div class="row" style="">



                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Expenses Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="" id="name" placeholder="" name="name">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Expense Amount</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" value="" id="amount" placeholder="" name="amount" required>
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Expense Date</label>
                        <div class="col-sm-10">
                            <input  type="date" class="form-control"  id="date" value="" placeholder="" name="date" required>
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Note</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Products Description" name="note" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <input type="submit" class="btn btn-gradient-primary" value="Create" />
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
            $("#employee").on('change',function () {
                console.log("Changing");

                var _token = $("input[name='_token']").val();

                var searchValue =  $("#employee").val();
                console.log(searchValue)
                var actionurl = "{{route('getsalary')}}";

                if(searchValue.length>0)
                {

                    $.ajax({
                        url: actionurl,
                        type:'POST',

                        data: {_token:_token, product_id:searchValue},
                        success: function(data) {
                            console.log(data)


                            $("#designation").val(data.designation)


                            $("#salary").val(data.salary)

                        }
                    });

                }
            })


        });

    </script>




@endsection
