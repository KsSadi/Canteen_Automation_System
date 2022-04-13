<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaleItem;
use App\Models\SaleUnit;
use App\Models\sCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleItemController extends Controller
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
        //
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('sale.item.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $sitems = SaleItem::all();
        return view('backend.pages.saleable.item.index',compact('sitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('sale.item.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $scategorys = sCategory::all();
        $sunits = SaleUnit::all();
        return view('backend.pages.saleable.item.create',compact('scategorys','sunits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('sale.item.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $sitem = new SaleItem();
        $sitem ->name = $request->name;
        $sitem ->scat_id = $request->scat_id;
        $sitem ->sunit_id = $request->sunit_id;
        $sitem ->description = $request->description;
        $sitem ->price = $request->price;
//        $sitem = $request->title.time().'.'.$request->img->extension();
//
//        //$request->img->move(public_path('images'), $imageName);
//        $request->img->storeAs('images', $imageName);
//



        if($sitem->save()) {
            session()->flash('success', 'Item has been Created!!');
        }else{
            session()->flash('failed', 'Failed Creating Item!!');
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('sale.item.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        $sitem = SaleItem::find($id);
        if(!is_null($sitem)){
            $sitem->delete();
            session()->flash('success', 'Item has been Deleted!!');
        }else {
            session()->flash('failed', 'Item could not be deleted!!');
        }
        return back();

    }
}
