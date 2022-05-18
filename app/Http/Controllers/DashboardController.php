<?php

namespace App\Http\Controllers;

use App\Models\Sale;
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
            $to = Carbon::now();
            $from = Carbon::now()->subDays(30)->toDateString();
            $saleitem = Sale::whereBetween('created_at', [$from, $to])->get()->count();


            return view('backend.pages.dashboard.index', compact('statData','saleitem'));
        }
        //return view('backend.pages.dashboard.index');
    }
}
