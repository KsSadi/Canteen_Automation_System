<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expenses;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Salary;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\sCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });

    }

    public function index()
    {
        //print_r(gettype($this->user));
        if($this->user == null){
            return view("backend.auth.login");
        }
        else{
            $statData = [];

            //return $courses;
          //  $to = Carbon::now();
           // $from = Carbon::now()->subDays(30)->toDateString();
          // $saleitem = Sale::whereBetween('created_at', [$from, $to])->get()->count();
            $saleitems =Sale::whereMonth('date', date('m'))
                ->whereYear('date', date('Y'))->get();
            $expenses =Expenses::whereMonth('date', date('m'))
                ->whereYear('date', date('Y'))->get();
            $purchaseitems = Purchase::whereMonth('date', date('m'))
                ->whereYear('date', date('Y'))->get();
            $salaries = Salary::whereMonth('salary_date', date('m'))
                ->whereYear('salary_date', date('Y'))->get();

            $lastsales = Sale::select('*')
                ->whereBetween('date', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->get();
            $lastpurchases = Purchase::select('*')
                ->whereBetween('date', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->get();
            $lastsalaries = Salary::select('*')
                ->whereBetween('salary_date', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->get();
            $lastexpenses = Expenses::select('*')
                ->whereBetween('date', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->get();

            $sale=SaleItem::count();
            $cat=sCategory::count();
            $employee=Employee::count();

            return view('backend.pages.dashboard.index', compact('statData','saleitems','lastsalaries','lastexpenses','lastpurchases','expenses','purchaseitems','salaries','sale','cat','employee','lastsales'));
        }
        //return view('backend.pages.dashboard.index');
    }
}
