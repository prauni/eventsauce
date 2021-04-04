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
		return $this->hasOne(Location::class);
    }
	
	public function people()
    {
    	return $this->hasMany(People::class);
    }
	
	public function categoryDetails()
    {
    	return $this->belongsTo(Category::class);
    }
}
