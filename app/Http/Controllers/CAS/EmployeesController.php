<?php

namespace App\Http\Controllers\CAS;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class EmployeesController extends Controller
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
        if (is_null($this->user) || !$this->user->can('employee.view')) {
            abort(403, 'Unauthorized Access!');
        }
        //

        $employees = Employee::all();
        return view('backend.pages.employee.index', compact('employees'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Check and guard the permission
        if (is_null($this->user) || !$this->user->can('employee.create')) {
            abort(403, 'Unauthorized Access!');
        }
        //

        $employees = Employee::all();
        return view('backend.pages.employee.create', compact('employees'));

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
        if (is_null($this->user) || !$this->user->can('employee.create')) {
            abort(403, 'Unauthorized Access!');
        }
        //Validate form
        $request->validate([
            'name' =>  'required|max:50',
            'mobile' => 'required|max:14',
            'post' => 'required|max:14',
            'salary' => 'required|max:14',

        ]);

        $employees = new Employee();
        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->mobile = $request->mobile;
        $employees->post = $request->post;
        $employees->salary = $request->salary;
        $employees->join_date = $request->join_date;

        $employees->save();

        if (!empty($request->roles)) {
            $admin->assignRole($request->roles);
        }
        session()->flash('success', 'Employee has been Created!!');
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
