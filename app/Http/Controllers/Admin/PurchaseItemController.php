<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pCategory;
use App\Models\PurchaseItem;
use App\Models\PurchaseUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseItemController extends Controller
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
        if (is_null($this->user) || !$this->user->can('purchase.item.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $pitems=PurchaseItem::all();
        return view('backend.pages.purchase.item.index',compact('pitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('purchase.item.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $pcats=pCategory::all();
        $punits=PurchaseUnit::all();
        return view('backend.pages.purchase.item.create',compact('pcats','punits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pitem=new PurchaseItem();
        $pitem->name = $request->name;
        $pitem ->pcat_id = $request->pcat_id;
        $pitem ->punit_id = $request->punit_id;
        $pitem ->description = $request->description;
        $pitem ->price = $request->price;
//        $sitem = $request->title.time().'.'.$request->img->extension();
//
//        //$request->img->move(public_path('images'), $imageName);
//        $request->img->storeAs('images', $imageName);
//



        if($pitem->save()) {
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
    }
}
