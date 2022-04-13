<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaleUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleUnitController extends Controller
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
        if (is_null($this->user) || !$this->user->can('sale.unit.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $sunits = SaleUnit::all();
        return view('backend.pages.saleable.unit.index',compact('sunits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('sale.unit.create')) {
            abort(403, 'Unauthorized Access!');
        }
        $sunits = SaleUnit::all();
        return view('backend.pages.saleable.unit.create',compact('sunits'));
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

        $sunit = new SaleUnit();
        $sunit->name = $request->name;


        if($sunit->save()) {
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('sale.unit.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        $sunit = SaleUnit::find($id);
        if(!is_null($sunit)){
            $sunit->delete();
            session()->flash('success', 'Unit has been Deleted!!');
        }else {
            session()->flash('failed', 'Unit could not be deleted!!');
        }
        return back();


    }
}
