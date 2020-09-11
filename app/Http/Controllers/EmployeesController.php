<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        // return "welcome index";
        $employees=Employee::all();
        return view('employees.employees',["employees"=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request());
        $data=$this->validate_info();
        $emp_name=request('emp_name');
        $email=request('email');
        $salary=request('salary');
        // $emp= new Employee();
        // $emp->emp_name=$emp_name;
        // $emp->email=$email;
        // $emp->salary=$salary;
        // $emp->save();

        Employee::create([
            "emp_name"=>$emp_name,
            "email"=>$email,
            "salary"=>$salary,
        ]);
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        $emp=Employee::findOrFail($employee->id);
        return view ("employees.show",["employee"=>$emp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        $emp=Employee::findOrFail($employee->id);
        return view ("employees.edit",["employee"=>$emp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $employee=Employee::findOrFail($employee->id);
        $this->validate_info();
        $data = $request->all();
        $employee->fill($data)->save();
        return redirect("/employees/".$employee->id);

        // $data=request()->validate([
        //     "emp_name"=>"required",
        //     "email"=>"required|email",
        //     "salary"=>"numeric"
        // ]);
          // $emp->emp_name=request('emp_name');
        // $emp->email=request('email');
        // $emp->salary=request('salary');
        // $emp->save();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // dd($employee);
        $employee->delete();
        return redirect("/employees");
    }

    public function validate_info(){
        return request()->validate([
            "emp_name"=>"required",
            "email"=>"required|email",
            "salary"=>"numeric"
        ]);
    }
}
