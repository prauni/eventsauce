<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTransfer extends Model
{
    use HasFactory;
	//public $table = 'employees';
    protected $fillable = ['emp_id','dept_id'];	
	protected $visible 	= ['emp_id','dept_id'];	
	
	public function DeptDetails()
    {
    	return $this->belongsTo('App\Models\Department','dept_id');
    }

	public function EmpDetails()
    {
    	return $this->belongsTo('App\Models\Employee','emp_id');
    }

	
}
