@section('page-title')
    Salary Report
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Salary Report </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form  id="date-range" method="POST">

                <div class="row" style="">
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Starting Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder=""id="start_date" name="start_date">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Ending Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder=""id="end_date" name="end_date">
                        </div>
                    </div>

                    <div class="sm:ml-20 sm:pl-5 mt-5" >
                        <center> <input type="submit" class="btn btn-gradient-primary" value="Search" style="margin-top: -100px;"/></center>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div id="table-container">

    </div>

    <script>
        $(document).ready(function(){

            var form=$('#date-range');
            form.on('submit',function (e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var formdata = new FormData(document.getElementById('date-range'));
                console.log(formdata);

                var actionurl = "{{route('dashboard.reports.salary.date-range')}}";


                $.ajax({
                    url: actionurl,
                    type:'POST',processData: false, contentType: false,
                    headers: {
                        'X-CSRF-Token': _token
                    },
                    data: formdata,
                    success: function(data) {
                        $("#table-container").html(data.html);
                        console.log(data)


                    }
                });



            })






        });



    </script>
@endsection
