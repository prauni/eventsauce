<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Location;
use App\Models\People;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incident = Incident::with(['location','people'])->get();
		//$incident = Incident::with(['peopleList' => function($query) {$query->select('type','name');}])->get();
		return response($incident);
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

		
		$incident 				= new Incident;
		$incident->title 		= $request->title;
		$incident->category_id 	= $request->category;		
		$incident->comments 	= $request->comments;		
		$incident->incidentDate = $request->incidentDate;		
		$incident->save();		
		
		$location 			= new Location;
		$location->lat 		= $request->lat;
		$location->long 	= $request->long;
		$incident->location()->save($location);			
		
		
		$peopleArr			= array();
		$peopleName 		= $request->name;
		$peopleType 		= $request->type;
		
		foreach($peopleName as $key=>$val){
			$people 		= new People;
			$people->name	= $peopleName[$key];
			if(isset($peopleType[$key]) && in_array($peopleType[$key],array('staff','witness'))){
				$people->type	= $peopleType[$key];
			}			
			$incident->people()->save($people);			
		}

        $arr = array('status'=>'success','msg'=>'Incident created successfully.');
		return response($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function edit(Incident $incident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        //
    }
}
