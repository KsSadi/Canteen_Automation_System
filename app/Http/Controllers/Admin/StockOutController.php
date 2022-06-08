<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockOutController extends Controller
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('stock.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $purchases = Purchase::all();
        return view('backend.pages.stock.stock-out',compact('purchases'));
    }

}
