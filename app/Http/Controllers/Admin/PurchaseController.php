<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pCategory;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\PurchaseUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
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
    public function findProductList(Request $request){
        $product=$request->product_id;
        $product = PurchaseItem::find($product);
        $cat="";
        $product_price=$product->price;
        $product_unit=$product->punit_id;
        $unit= PurchaseUnit::find($product_unit);

//        return response($products);
        return ["status"=>'success','price'=>$product_price,'unit'=>$unit->name];

    }
    public function findProduct(Request $request){
        $category=$request->category_id;
        $products= PurchaseItem::where('pcat_id',$category)->get();
        $cat=' <option value="">Choose</option>';
        foreach ($products as $product )
        {
            $product_name = $product->name;
            $product_id = $product->id;
            $cat=$cat.' <option value="'.$product_id.'">'.$product_name.'</option>';

        }
        return response($cat);
//        return ["status"=>'success','sadi']

    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('purchase.view')) {
            abort(403, 'Unauthorized Access!');
        }

        $purchases = Purchase::all();
        return view('backend.pages.purchase.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('purchase.create')) {
            abort(403, 'Unauthorized Access!');
        }
        $categories = pCategory::all();
        return view('backend.pages.purchase.purchase.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('sale.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $purchase = new Purchase();
        $purchase ->name = $request->name;
        $purchase ->pcat_id = $request->pcat_id;
        $purchase ->punit_id = $request->punit_id;
        $purchase ->quantity = $request->quantity;
        $purchase ->price = $request->price;
        $purchase ->note = $request->note;


        if($purchase->save()) {
            session()->flash('success', 'Purchase has been Created!!');
        }else{
            session()->flash('failed', 'Failed Creating Purchase!!');
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('sale.view')) {
            abort(403, 'Unauthorized Access!');
        }

        $purchase = Purchase::findOrFail($id);

        return view('backend.pages.purchase.purchase.show',compact('purchase'));
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
        if (is_null($this->user) || !$this->user->can('purchase.delete')) {
            abort(403, 'Unauthorized Access!');
        }

        $purchase =Purchase::find($id);

        if(!is_null($purchase)){
            $purchase->delete();
            session()->flash('success', 'Purchase   has been Deleted!!');
        }else {
            session()->flash('failed', 'Purchase  could not be deleted!!');
        }
        return back();
    }


}
