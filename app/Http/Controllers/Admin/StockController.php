<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
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
        $items = [];
        foreach ($purchases as $purchase) {
            $items[$purchase->name] = $purchase->name;
        }

        $purchaseItems = [];
        foreach ($items as $key => $item){

            $itemForTotal = DB::table('purchases')->select([DB::raw("SUM(quantity) as total")])->groupBy('name')->where('name', $item)->first();
            $itemForAll =  DB::table('purchases')->where('name', $item)->first();

            $purchaseItems[$key]['total'] = $itemForTotal->total;
            $purchaseItems[$key]['name'] = $itemForAll->name;
            $purchaseItems[$key]['punit_id'] = $itemForAll->punit_id;
            $purchaseItems[$key]['id'] = $itemForAll->id;

            //$purchaseItems[] = Purchase::select([DB::raw("SUM(quantity) as total, name, id")])->groupBy('quantity')->where('name', $item)->first();
        }

        foreach ($purchaseItems as $key => $item){
            $purchaseItems[$key] = (object) $item;
        }

        //dd( (object) $purchaseItems);


        return view('backend.pages.stock.stock', ['purchases' => (object) $purchaseItems]);
    }



}
