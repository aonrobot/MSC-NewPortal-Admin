<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calendars = DB::table('calendar')->join('trop','calendar.tid','=','trop.tid')->get();

        return view('admin.pages.calendar.index',['calendars' => $calendars]);
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
        $input = $request->all();

        $name = $input['name'];
        $tid = $input['tid'];

        DB::table('calendar')->insert(["tid" => $tid, "calendar_name" => $name]);

        return redirect('/admin/calendar');

    }

    public function event_store(Request $request)
    {
        $input = $request->all();

        $calendar_id = $input['calendar_id'];
        $title = $input['title'];
        $place = $input['place'];
        $detail = $input['detail'];

        //Event Date
        if (!empty($input['datetime']) && !is_null($input['datetime'])) {
            $event_date = $input['datetime'];
        } else {
            $event_date = date("YYYY/MM/DD h:mm A") . ' - ' . date("YYYY/MM/DD h:mm A");
        }

        $event_date = explode('-', $event_date);

        $event_start_date = date_format(date_create($event_date[0]), "Y-m-d h:i:sa");

        $event_end_date = date_format(date_create($event_date[1]), "Y-m-d h:i:sa");
        //

        DB::table('calendar_event')->insert([

            "calendar_id" => $calendar_id, 
            "event_title" => $title, 
            "event_start_date" => $event_start_date, 
            "event_end_date" => $event_end_date, 
            "event_detail" => $detail, 
            "event_place" => $place

        ]);

        //return redirect('/admin/calendar/edit/' . $calendar_id);

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
        $events = DB::table('calendar_event')->get();

        return view('admin.pages.calendar.edit',['events' => $events]);
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
        DB::table('calendar')->where('calendar_id', $id)->delete();

        return redirect('/admin/calendar');
    }
}
