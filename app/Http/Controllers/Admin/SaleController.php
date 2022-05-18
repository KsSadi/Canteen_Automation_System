<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SaleUnit;
use App\Models\sCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{

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

        $product= SaleItem::find($product);
        $cat="";
        $product_price=$product->price;
        $product_unit=$product->sunit_id;
        $unit= SaleUnit::find($product_unit);

//        return response($products);
        return ["status"=>'success','price'=>$product_price,'unit'=>$unit->name];

    }

    public function findProduct(Request $request){
        $category=$request->category_id;
        $products= SaleItem::where('scat_id',$category)->get();
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
        //
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('sale.view')) {
            abort(403, 'Unauthorized Access!');
        }

        $sales = Sale::all();

        return view('backend.pages.saleable.sale.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('sale.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $categories = sCategory::all();
        return view('backend.pages.saleable.sale.create',compact('categories'));
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

        $sale = new Sale();
        $sale ->name = $request->name;
        $sale ->scat_id = $request->scat_id;
        $sale ->sunit_id = $request->sunit_id;
        $sale ->quantity = $request->quantity;
        $sale ->price = $request->price;
        $sale ->note = $request->note;


        if($sale->save()) {
            session()->flash('success', 'Sale has been Created!!');
        }else{
            session()->flash('failed', 'Failed Creating Sale!!');
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
        $sale=Sale::findOrFail($id);

//            return view('backend.pages.saleable.sale.show', ['sale' => $sale]);
        return view('backend.pages.saleable.sale.show',compact('sale'));

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
        if (is_null($this->user) || !$this->user->can('sale.delete')) {
            abort(403, 'Unauthorized Access!');
        }

        $sale= Sale::find($id);

        if(!is_null($sale)){
        $sale->delete();
        session()->flash('success', 'Sale Item  has been Deleted!!');
    }else {
        session()->flash('failed', 'Sale Item could not be deleted!!');
    }
        return back();
    }
}
