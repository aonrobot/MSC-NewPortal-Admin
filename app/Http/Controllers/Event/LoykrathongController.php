<?php

namespace App\Http\Controllers\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LoykrathongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'loykrathong Event';
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

        $result = "false";

        $data = $request->all();
        $emp_id = $data['login'];
        $word_id = $data['word_id'];
        
        $word = [
            "",
            "ขอให้มีความสุข",
            "ขอให้มีสุขภาพร่างกายแข็งแรง",
            "ขอให้ร่ำรวย มีเงินทองใช้",
            "ขอให้เจริญในหน้าที่การงาน",
            "ขอขมาแม่คงคา ขอสิ่งศักดิ์สิทธิ์คุ้มครอง",
            "ขอให้ผู้บริหารทุกท่านมีความสุข",
            "ขอให้บริษัทเจริญรุ่งเรือง",
            "ขอให้ได้โบนัสเยอะๆ",
            "ขอให้เกษียณสุข",

        ];

        $attemptInsert = 10;

        // // Check ว่าเคย insert ไปรึยัง คนเดียว insert ได้ครั้งเดียว
        
        //     $price = DB::table('event_loykrathong')
        //         ->where('finalized', 1)
        //         ->count();
        // $users = DB::table('event_loykrathong')
        //     ->select(DB::raw('count(name) as user_count'))
        //     ->where('name', '=', $emp_id)
        //     ->get();

        $countuser = DB::table('event_loykrathong')
                ->where('name', $emp_id)
                ->count();
            
        if ($countuser >= $attemptInsert) return $result;

        // Insert DB
        /*DB::table('users')->insert(
            ['email' => 'john@example.com', 'votes' => 0]
        );
        */

        DB::table('event_loykrathong')->insert(
            ['name' => $emp_id, 'word' =>  $word[$word_id]]
        );
        $result = "true";
        return $result;
        
    }

    public function testShowAll($take)
    {
        if ($take == 10) {
            $result = json_decode($this->showall(10)->getContent());
            $assertCount = 0;
            foreach ($result as $r) {
                if ($r->id == 95) $assertCount++;
                if ($r->id == 99) $assertCount++;
                if ($r->id == 104) $assertCount++;
            }
            if ($assertCount == 3) echo '.';
            else echo 'F';
        }

        if ($take == 3) {
            $result = json_decode($this->showall(3)->getContent());
            $assertCount = 0;
            foreach ($result as $r) {
                if ($r->id == 102) $assertCount++;
                if ($r->id == 103) $assertCount++;
                if ($r->id == 104) $assertCount++;
            }
            if ($assertCount == 3) echo '.';
            else echo 'F';
        }

        if ($take == 16) {
            $result = json_decode($this->showall(16)->getContent());
            $assertCount = 0;
            foreach ($result as $r) {
                if ($r->id == 89) $assertCount++;
                if ($r->id == 96) $assertCount++;
                if ($r->id == 104) $assertCount++;
            }
            if ($assertCount == 3) echo '.';
            else echo 'F';
        }
    }

    public function runTest()
    {
        echo $this->testShowAll(10);
        echo $this->testShowAll(3);
        echo $this->testShowAll(16);
    }

    public function showall($take = 10)
    {
        $all = DB::table('event_loykrathong')
            ->count();
        $takes = $take;
        $words = DB::table('event_loykrathong')->skip($all - $takes)->take($takes)->get();

        $all_words = DB::table('event_loykrathong')->get();
        foreach ($words as $key => $w) {
            $words[$key]->display_name = DB::connection('MSCMain')->table('EmployeeNew')->where('EmpID', $w->name)->first()->FirstNameEng;
            $words[$key]->total =  DB::table('event_loykrathong')->count();
        }
        
        return response()->json($words);

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
