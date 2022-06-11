@section('page-title')
    Create Productions
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Sell </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.sales.production.store') }}" method="POST">
                @csrf
                <div class="row" style="">
                      <div class="mb-1 row">
                            <label class="col-sm-2 col-form-label" style="font-size: medium">Category</label>
                            <div class="col-sm-10">
                                <select class="select2 form-select" id="category" name="scat_id" required>
                                    <option value="">Choose</option>
                                    @foreach($categories as $category)

                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                      </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Products Name</label>
                        <div class="col-sm-10">
                            <select class="select2 form-select" id="product" name="name" required>
                                <option value="">Choose</option>


                            </select>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" value="1" id="" placeholder="" name="quantity" required>
                        </div>
                    </div>

                        <div class="mb-1 row">
                            <label class="col-sm-2 col-form-label" style="font-size: medium">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" id="price" placeholder="" name="price" required>
                            </div>
                        </div>

                        <div class="mb-1 row">
                            <label class="col-sm-2 col-form-label" style="font-size: medium">Unit</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control"  id="unit" value="" placeholder="" name="sunit_id" >
                            </div>
                        </div>
                    <div class="mb-1 row">
                            <label class="col-sm-2 col-form-label" style="font-size: medium">Making date</label>
                            <div class="col-sm-10">
                                <input  type="date" class="form-control"  value="" placeholder="" name="date" >
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
            $("#product").on('change',function () {
                console.log("Changing");
                var _token = $("input[name='_token']").val();
                var searchValue =  $("#product").val();
                console.log(searchValue)
                var actionurl = "{{route('getproduct')}}";

                if(searchValue.length>0)
                {

                    $.ajax({
                        url: actionurl,
                        type:'POST',

                        data: {_token:_token, product_id:searchValue},
                        success: function(data) {
                            console.log(data)


                            $("#price").val(data.price)


                            $("#unit").val(data.unit)

                        }
                    });

                }
            })





            $("#category").on('change',function () {
               var _token = $("input[name='_token']").val();
               var searchValue =  $("#category").val();
               var actionurl = "{{route('getcategory')}}";
               if(searchValue.length>0)
               {

                   $.ajax({
                       url: actionurl,
                       type:'POST',

                       data: {_token:_token, category_id:searchValue},
                       success: function(data) {
                           console.log(data)

                               $("#product").html('')
                               $("#product").html(data)

                       }
                   });

               }
           })



        });

    </script>




@endsection
