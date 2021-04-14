<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
	//public $table = 'employees';
    protected $fillable = ['dept_id','first_name','last_name'];	
	protected $visible 	= ['id','dept_id','first_name','last_name'];
	
	public function DeptDetails()
    {
    	return $this->belongsTo('App\Models\Department','dept_id');
    }
	
	public function EmpTransferLog()
    {
    	return $this->hasMany('App\Models\EmployeeTransfer','emp_id');
    }
	
	
}
