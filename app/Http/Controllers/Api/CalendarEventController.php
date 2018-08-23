<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CalendarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = DB::select('SELECT * FROM calendar_event');
        print_r($event);

        $eventpost1 = DB::select("SELECT event_title as name, event_detail as detail, event_start_date as startdate, event_end_date as enddate, event_type as type ,event_place as place ,event_link as link 
        FROM  mscnewportal.dbo.calendar_event");
        // print_r($eventpost1);
        
        $eventpost = DB::select("SELECT b.post_name as name,b.event_end_date as Enddate,b.event_start_date as Startdate, b.post_detail as detail 
                                FROM mscnewportal.dbo.category_rela as a
                                join
                                mscnewportal.dbo.post as b
                                on a.pid = b.pid
                                where catid ='74'");
        // print_r($eventpost);

        $eventpost1 = DB::select("SELECT event_title as name, event_detail as detail, event_start_date as startdate, event_end_date as enddate, event_type as type ,event_place as place ,event_link as link 
        FROM  mscnewportal.dbo.calendar_event");
        // print_r($eventpost1);
       
        $stack = array();

        foreach($eventpost as $value){
            array_push($stack,$value);
        }
        foreach($eventpost1 as $value){
            array_push($stack,$value);
        }
        
        dd($stack);

        return 0;

    
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
        //
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
