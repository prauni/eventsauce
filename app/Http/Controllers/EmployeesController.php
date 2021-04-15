<?php

namespace App\Http\Controllers;
use App\Models\Incident;
use App\Models\Employee;
use App\Models\EmployeeTransfer;
use Illuminate\Http\Request;
use Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$employee = Employee::query()->with(['DeptDetails','EmpTransferLog'])->get();
		$employee = Employee::query()->get();
		
		$response = array('status'=>1,'msg'=>'Employee list.','emp_list' => $employee);		
		return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$rules = [
					'dept_id' => 'integer|exists:departments,id|gt:0',					
					'first_name' => 'required|max:255',
					'last_name' => 'required|max:255'					
				 ];
		$validation = Validator::make($request->all(),$rules);
		
		if($validation->fails()){
			$responseCode		= 202;
			$response['status'] = 0;
			$response['msg']	= 'Form validation failed';
			$response['errors'] = $validation->messages();
		}
		else{
			$employee  				= new Employee;
			$employee->dept_id 		= $request->dept_id;
			$employee->first_name 	= $request->first_name;		
			$employee->last_name 	= $request->last_name;
			$res = $employee->save();
			
			EmployeeTransfer::create(['emp_id'=>$employee->id,'dept_id'=>$employee->dept_id]);
			
			$responseCode		= 201;
			$response = array('status'=>1,'msg'=>'Employee added successfully.');
		}
		return response()->json($response, $responseCode);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
	 
    public function update(Request $request)
    {
		
	}
	
    public function transfer(Request $request)
    {
		$rules = [
					'emp_id' => 'required|integer|exists:employees,id|gt:0',					
					'dept_id' => 'integer|exists:departments,id|gt:0'
				 ];
		$validation = Validator::make($request->all(),$rules);	

		if($validation->fails()){
			$responseCode		= 202;
			$response['status'] = 0;
			$response['msg']	= 'Form validation failed';
			$response['errors'] = $validation->messages();
		}
		else{	
			$emp_id 	= $request->emp_id;
			$arr['dept_id']	= $request->dept_id;		
			$employee 	= Employee::find($emp_id);
			$employee->update($arr);
			
			EmployeeTransfer::create(['emp_id'=>$emp_id,'dept_id'=>$request->dept_id]);
			
			$responseCode		= 201;
			$response = array('status'=>1,'msg'=>'Employee department updated successfully.');			
		}
		return response()->json($response, $responseCode);
    }

	public function transfer_log(Request $request)
	{
		$emp_id = $request->emp_id;				
		if($emp_id>0){
			$transferLog = EmployeeTransfer::where('emp_id',$emp_id)->get();
		}
		else{
			$transferLog = EmployeeTransfer::orderBy('emp_id')->get();
		}
		
		
		$response['status']		= 1;
		$response['msg']		= 'Transfer Log found successfully.';		
		$response['emp_transfer_log_list']	= $transferLog;
		return response()->json($response, 200);
	}
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
		//echo '------'.$employee->id;exit;
        $employee->delete();
		$response['status']		= 1;
		$response['msg']		= 'Employee deleted successfully..';		
		return response()->json($response, 200);		
    }
}
