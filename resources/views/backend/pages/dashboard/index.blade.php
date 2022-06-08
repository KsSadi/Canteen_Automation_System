@section('page-title')
    Dashboard Home
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    <section id="dashboard-ecommerce">
        {{--     Start   PHP--}}
        @php
            $totalsale=0;
            $totalpurchase=0;
            $totalsalary=0;
            $lastmonthsale=0;
            $lastmonthpurchase=0;
            $totalexpense=0;
            $lasttotalsalaries=0;
            $lasttotalexpenses=0;


    foreach ($saleitems as $saleitem)
    {
        $totalsale= $totalsale+($saleitem->price * $saleitem->quantity);

    }
    foreach ($lastsales as $lastsale)
    {
        $lastmonthsale= $lastmonthsale+($lastsale->price * $lastsale->quantity);

    }
    foreach ($purchaseitems as $purchaseitem)
    {
        $totalpurchase= $totalpurchase+($purchaseitem->price * $purchaseitem->quantity);

    }
      foreach ($lastpurchases as $lastpurchase)
    {
        $lastmonthpurchase= $lastmonthpurchase+($lastpurchase->price * $lastpurchase->quantity);

    }

    foreach ($salaries as $salary)
    {
        $totalsalary= $totalsalary+$salary->salary;

    }
     foreach ($lastsalaries as $lastsalarie)
    {
        $lasttotalsalaries= $lasttotalsalaries+$lastsalarie->salary;

    }
     foreach ($expenses as $expense)
    {
        $totalexpense= $totalexpense+$expense->amount;

    }
    foreach ($lastexpenses as $lastexpense)
    {
        $lasttotalexpenses= $lasttotalexpenses+$lastexpense->amount;

    }

    $totalprofit=$totalsale-($totalpurchase+$totalsalary+$totalexpense);
    $totalprofitlast=$lastmonthsale-($lastmonthpurchase+$lasttotalsalaries+$lasttotalexpenses);


        @endphp
        {{--     End   PHP--}}




        <div class="row match-height">
            {{--            <!-- Medal Card -->--}}
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>Track Your Sale</h5>
                        <p class="card-text font-small-3">Total sale in this month </p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <a href="#">{{$totalsale}} ৳ </a>
                        </h3>
{{--                        <button type="button" class="btn btn-primary">New Sales</button>--}}
                        <a class="btn btn-primary" href="{{ route('dashboard.sales.create') }}" role="button">New Sales</a>
                        <img src="app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                    </div>
                </div>
            </div>
        {{--            <!--/ Medal Card -->--}}

        <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 me-25 mb-0"></p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <i data-feather="shopping-cart" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{$sale}}</h4>
                                        <p class="card-text font-small-3 mb-0">Products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i data-feather="grid" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{$cat}}</h4>
                                        <p class="card-text font-small-3 mb-0">Category</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{$employee}}</h4>
                                        <p class="card-text font-small-3 mb-0">Employee</p>
                                    </div>
                                </div>
                            </div>
                            {{--                            <div class="col-xl-3 col-sm-6 col-12">--}}
                            {{--                                <div class="d-flex flex-row">--}}
                            {{--                                    <div class="avatar bg-light-success me-2">--}}
                            {{--                                        <div class="avatar-content">--}}
                            {{--                                            <i data-feather="dollar-sign" class="avatar-icon"></i>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="my-auto">--}}
                            {{--                                        <h4 class="fw-bolder mb-0">$9745</h4>--}}
                            {{--                                        <p class="card-text font-small-3 mb-0">Revenue</p>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                        </div>
                    </div>
                </div>
            </div>

            <!--/ New Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="row match-height">
                    <!-- Bar Chart - Orders -->
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body pb-50">
                                <h6 class="fw-bolder">Sale</h6>
                                <h2 class="fw-bolder mb-1 text-success">{{$totalsale}} ৳ </h2>
                                {{--                                    <div id="statistics-order-chart"></div>--}}
                            </div>
                        </div>
                    </div>
                    <!--/ Bar Chart - Orders -->

                    <!-- Line Chart - Profit -->
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Purchase</h6>

                                <h2 class="fw-bolder mb-1 text-danger">{{$totalpurchase}} ৳ </h2>
                                {{--                                    <div id="statistics-profit-chart"></div>--}}
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->
                    <!-- Line Chart - Profit -->
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Salary</h6>
                                <h2 class="fw-bolder mb-1 text-danger">{{$totalsalary}}  ৳ </h2>
                                {{--                                    <div id="statistics-profit-chart"></div>--}}
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->
                    <!-- Line Chart - Profit -->
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Expenses</h6>
                                <h2 class="fw-bolder mb-1 text-danger">{{$totalexpense}} ৳</h2>
                                {{--                                    <div id="statistics-profit-chart"></div>--}}
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->

                    <!-- Earnings Card -->
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="card earnings-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title mb-1 text-info">Earnings</h4>
                                        <div class="font-small-2">This Month</div>
                                        @if($totalprofit>0)
                                            <h5 class="fw-bolder card-title mb-1 text-success">{{$totalprofit}} ৳</h5>
                                        @else
                                            <h5 class="fw-bolder card-title mb-1 text-danger">{{$totalprofit}} ৳</h5>
                                        @endif
                                        <p class="card-text text-muted font-small-2">
                                            @if($totalprofit>$totalprofitlast)
                                                <span class="fw-bolder mb-1 text-success">{{$totalprofit-$totalprofitlast}} ৳</span><span> more earnings than last month.</span>
                                            @else
                                                <span class="fw-bolder mb-1 text-danger">{{$totalprofitlast-$totalprofit}} ৳</span><span> less earnings than last month.</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-6" style="">

                                        {{--                                    <img src="{{url('/img/taka.png')}}" alt="SUB" style="width:80%;height:80px;"/>--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Earnings Card -->
                </div>

            </div>
        {{--            <!--/ Medal Card -->--}}

        <!-- Statistics Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-transaction">
                    <div class="card-header">
                        <h4 class="card-title">Last Month</h4>

                    </div>
                    <div class="card-body">
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-success rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="shopping-cart" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Sale</h6>
                                    <small>Total Sale</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">{{$lastmonthsale}} ৳ </div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-primary rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Purchase</h6>
                                    <small>Total Purchases</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-danger">{{$lastmonthpurchase}} ৳ </div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-danger rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Salary+Expeses</h6>
                                    <small>Total Expenses</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-danger">{{$lasttotalsalaries+$lasttotalexpenses}} ৳ </div>
                        </div>


                    </div>
                </div>

            </div>
            <!--/ Statistics Card -->


        </div>
    </section>
@endsection
