<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pCategory;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Usage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('stockout.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $categories = pCategory::all();
        return view('backend.pages.stock.stock-out',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $purchaseItem = PurchaseItem::findOrFail($request->name);

        if($purchaseItem->current_stock < (int) $request->quantity){
            session()->flash('failed',  'Quantity cannot be more than current stock');
            return back();
        }


        $purchase = new Usage();
        $purchase ->name = $request->name;
        $purchase ->pcat_id = $request->pcat_id;
        $purchase ->punit_id = $request->punit_id;
        $purchase ->quantity = $request->quantity;
        $purchase ->note = $request->note;
        $purchase ->date = $request->date;


        if($purchase->save()) {

            $purchaseItem = PurchaseItem::findOrFail($request->name);
            $purchaseItem->current_stock -=  $request->quantity;
            $purchaseItem->save();
            session()->flash('success', 'Stock Out Product!!');
        }else{
            session()->flash('failed', 'Failed Stock Out');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
