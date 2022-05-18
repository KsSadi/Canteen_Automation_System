<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchaseUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseUnitController extends Controller
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
        if (is_null($this->user) || !$this->user->can('purchase.unit.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $punits = PurchaseUnit::all();
        return view('backend.pages.purchase.unit.index',compact('punits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('purchase.unit.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $punits = PurchaseUnit::all();
        return view('backend.pages.purchase.unit.create',compact('punits'));
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
        if (is_null($this->user) || !$this->user->can('sale.item.create')) {
            abort(403, 'Unauthorized Access!');
        }
        $punits = new PurchaseUnit();
        $punits->name = $request->name;

        if($punits->save()) {
            session()->flash('success', 'Unit has been Created!!');
        }else{
            session()->flash('failed', 'Failed Creating Unit!!');
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
        if (is_null($this->user) || !$this->user->can('purchase.unit.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        $punit= PurchaseUnit::find($id);

        return view('backend.pages.purchase.unit.edit',compact('punit'));
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
        if (is_null($this->user) || !$this->user->can('purchase.unit.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        $punit= PurchaseUnit::find($id);
        $request->validate([
            'name' =>  'required|max:50',

        ]);
        $punit->name = $request->name;
        $punit->save();


        if($punit->save()) {
            session()->flash('success', 'Unit has been Updated!!');
        }else{
            session()->flash('failed', 'Failed Updating Unit!!');
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('purchase.unit.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        $punit = PurchaseUnit::find($id);
        if(!is_null($punit)){
            $punit->delete();
            session()->flash('success', 'Unit has been Deleted!!');
        }else {
            session()->flash('failed', 'Unit could not be deleted!!');
        }
        return back();

    }
}
