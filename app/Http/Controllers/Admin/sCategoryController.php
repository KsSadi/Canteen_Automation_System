<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sCategoryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('sale.category.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $scategory = sCategory::all();
        return view('backend.pages.saleable.category.index',compact('scategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('sale.category.create')) {
            abort(403, 'Unauthorized Access!');
        }
        $scategory = sCategory::all();
        return view('backend.pages.saleable.category.create',compact('scategory'));
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
        if (is_null($this->user) || !$this->user->can('sale.category.create')) {
            abort(403, 'Unauthorized Access!');
        }

        $scategory = new sCategory();
        $scategory->name = $request->name;
        $scategory->save();

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
        if (is_null($this->user) || !$this->user->can('sale.category.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $scategory=sCategory::find($id);
        return view('backend.pages.saleable.category.edit', compact('scategory'));
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
        if (is_null($this->user) || !$this->user->can('sale.category.edit')) {
            abort(403, 'Unauthorized Access!');
        }
        //
        $scategory=sCategory::find($id);
        $request->validate([
            'name' =>  'required|max:50',

        ]);

        $scategory->name = $request->name;
        $scategory->save();

        if ($scategory->save()) {
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
        if (is_null($this->user) || !$this->user->can('sale.category.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        $scategory =sCategory::find($id);
        if(!is_null($scategory)){
            $scategory->delete();
            session()->flash('success', 'Item has been Deleted!!');
        }else {
            session()->flash('failed', 'Item could not be deleted!!');
        }
        return back();

    }
}
