<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
	protected $fillable = [
		'title','category_id','comments','incidentDate'	
    ];
	
	
	public function location()
    {
    	return $this->hasOne('App\Models\Location','incident_id');
    }
	
	public function people()
    {
    	return $this->hasMany('App\Models\People','incident_id');
    }
	
	public function categoryDetails()
    {
    	return $this->belongsTo('App\Models\Category','category_id');//->select(array('id','title'));
    }
}
