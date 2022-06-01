<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
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
        if (is_null($this->user) || !$this->user->can('expense.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $expenses = Expenses::all();

        return view('backend.pages.expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('expense.view')) {
            abort(403, 'Unauthorized Access!');
        }


        return view('backend.pages.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('expense.view')) {
            abort(403, 'Unauthorized Access!');
        }

        $expense = new Expenses();
        $expense ->name = $request->name;

        $expense ->amount = $request->amount;
        $expense ->date = $request->date;
        $expense ->note = $request->note;


        if($expense->save()) {
            session()->flash('success', 'Expense has been Created!!');
        }else{
            session()->flash('failed', 'Failed Creating Expense!!');
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
        if (is_null($this->user) || !$this->user->can('expense.view')) {
            abort(403, 'Unauthorized Access!');
        }

        $expense=Salary::find($id);
        if(!is_null($expense)){
            $expense->delete();
            session()->flash('success', 'Expense Data   has been Deleted!!');
        }else {
            session()->flash('failed', 'Expense Data  could not be deleted!!');
        }
        return back();
    }
}
