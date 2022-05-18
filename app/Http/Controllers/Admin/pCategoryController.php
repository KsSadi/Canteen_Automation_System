<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pCategoryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('purchase.category.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $pcategory= pCategory::all();
        return view('backend.pages.purchase.category.index',compact('pcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('purchase.category.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $pcategorys= pCategory::all();
        return view('backend.pages.purchase.category.create',compact('pcategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('purchase.category.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $pcategory=new pCategory();
        $pcategory->name = $request->name;
        $pcategory->save();


        if (!empty($request->roles)) {
            $admin->assignRole($request->roles);
        }
        session()->flash('success', 'Category has been Created!!');
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('purchase.category.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $pcategory = pCategory::find($id);
        return view('backend.pages.purchase.category.edit', compact('pcategory'));
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('purchase.category.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $pcategory = pCategory::find($id);
        $request->validate([
            'name' =>  'required|max:50',

        ]);

        $pcategory->name = $request->name;
        $pcategory->save();

        if ($pcategory->save()) {
            session()->flash('success', 'Category has been Updated!!');
        }else{
            session()->flash('failed', 'Failed Updating Category!!');
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
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('purchase.category.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        $pcategory = pCategory::find($id);
        if(!is_null($pcategory)){
            $pcategory->delete();
            session()->flash('success', 'Category has been Deleted!!');
        }else {
            session()->flash('failed', 'Category could not be deleted!!');
        }
        return back();
    }
}
