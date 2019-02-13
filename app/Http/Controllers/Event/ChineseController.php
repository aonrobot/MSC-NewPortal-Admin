<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ChineseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Chinese New Year";
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
        $login = $request->input('login');
        $cardid = $request->input('cardid');

        \Log::info($login ." Random Chinese Card #{$cardid}");
                    
        try {
            DB::table('event_ChineseNewYear')->insert(
                [
                    'name' => $login,
                    'img_id' => intval($cardid),   
                ]
            );
            return 200;
        } catch(\Exception $e) {
            return 500;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($login)
    {
        try {
            $cards = DB::table('event_ChineseNewYear')->where('name', $login)->get();
            $allLogin = DB::table('event_ChineseNewYear')->where('name', $login)->count();
            $all = DB::table('event_ChineseNewYear')->count();
            return response()->json([
                'data' => $cards,
                'allLogin' => $allLogin,
                'all' => $all
            ]);
        } catch(\Exception $e) {
            return $e;
        }
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
