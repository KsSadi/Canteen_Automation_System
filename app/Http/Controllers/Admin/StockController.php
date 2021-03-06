<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pCategory;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
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
        if (is_null($this->user) || !$this->user->can('stock.view')) {
            abort(403, 'Unauthorized Access!');
        }

        $purchaseItems = PurchaseItem::all();

        return view('backend.pages.stock.stock', ['purchases' => $purchaseItems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if (is_null($this->user) || !$this->user->can('stock.edit')) {
            abort(403, 'Unauthorized Access!');
        }

        $purchaseItem = PurchaseItem::find($id);
        $pcategories = pCategory::all();

        return view('backend.pages.stock.stock-edit',compact('purchaseItem','pcategories'));
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
        if (is_null($this->user) || !$this->user->can('stock.edit')) {
            abort(403, 'Unauthorized Access!');
        }

        $purchaseItem = PurchaseItem::find($id);
        $purchaseItem->current_stock = $request->current_stock;
        $purchaseItem->save();

        if($purchaseItem->save()) {
            session()->flash('success', 'Stock has been Updated!!');
        }else{
            session()->flash('failed', 'Failed Updating Stock !!');
        }
        return back();
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
