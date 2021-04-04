<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
	public $table = 'peoples';
	protected $fillable = ['incident_id','name','type'];
	protected $visible 	= ['name','type'];
	
}
