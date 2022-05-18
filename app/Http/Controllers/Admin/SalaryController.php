<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
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


    public function findSalary(Request $request)
    {
        $employee=$request->product_id;

        $employee = Employee::findOrFail($employee);
        $employee_designation=$employee->post;
        $employee_salary=$employee->salary;

       // return ["status"=>'success','designation'=>$employee_designation,'salary'=>$employee_salary];
        return ["status"=>'success','designation'=>$employee_designation,'salary'=>$employee_salary];
    }


    public function index()
    {
        //
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('employee.salary')) {
            abort(403, 'Unauthorized Access!');
        }
        $salaries =Salary::all();

        return view('backend.pages.employee.salary.index',compact('salaries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('employee.salary')) {
            abort(403, 'Unauthorized Access!');
        }
        $employees = Employee::all();

        return view('backend.pages.employee.salary.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('employee.salary')) {
            abort(403, 'Unauthorized Access!');
        }

        $salary = new Salary();
        $salary ->employee = $request->employee;
        $salary ->designation = $request->designation;
        $salary ->salary = $request->salary;
        $salary ->salary_date = $request->salary_date;
        $salary ->note = $request->note;


        if($salary->save()) {
            session()->flash('success', 'Salary has been Created!!');
        }else{
            session()->flash('failed', 'Failed Creating Salary!!');
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
        if (is_null($this->user) || !$this->user->can('salary.delete')) {
            abort(403, 'Unauthorized Access!');
        }

        $salary=Salary::find($id);
        if(!is_null($salary)){
            $salary->delete();
            session()->flash('success', 'Salary Data   has been Deleted!!');
        }else {
            session()->flash('failed', 'Salary Data  could not be deleted!!');
        }
        return back();
    }
}
