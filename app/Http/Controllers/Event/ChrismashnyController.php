<?php

namespace App\Http\Controllers\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use DB;
use Session;
use Carbon\Carbon;

class ChrismashnyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Chrismashny Event';
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

    private function insertWord($login, $word)
    {
        $employee = DB::connection('MSCMain')
                    ->table('EmployeeNew')
                    ->select("*", DB::raw("FirstNameEng + ' ' + LastNameEng as FullNameJa"))
                    ->where('login', $login)->first();


        \Log::info($login);
                    
        $code = intval($employee->EmpCode);

        try {
            DB::table('event_chrismashny')->insert(
                [
                    'name' => $login,
                    'word' =>  $word,
                    'created_at' => Carbon::now()
                ]
            );
            
            $client = new Client();
            //$client->setPort(44301);
            $updateSocketResult = $client->post(\Config::get('newportal.socketio_url') . '/api/updateCard', [
                'verify' => false,
                'json' => [
                    'name' => $login,
                    'word' =>  $word,
                    'display_name' => $employee->FullNameJa,
                    'imgUrl' => "http://appmetro.metrosystems.co.th/empimages/{$code}.jpg"
                ]
            ]);

            return true;

        } catch(\Exception $e) {
            dd($e);
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $login = \Session::get('em_info')->Login;
        $word = $data['word'];
        $word = htmlentities($word, ENT_QUOTES);

        $wordByName = DB::table('event_chrismashny')->where('name', $login);

        if ($wordByName->count() != 0)
        {
            $wordByName = $wordByName->get();
            $lastWord = end($wordByName);
            $createAt = Carbon::parse($lastWord->created_at);
            $diff = $createAt->diffInSeconds(Carbon::now());

            if ($diff < 30) {
                $result = false;
                $block = true;
                $error = 'Please wait ' . (30 - intval($diff)) . ' sec';
            } else {
                $result = $this->insertWord($login, $word);
            }
        } else {
            $result = $this->insertWord($login, $word);
        }

        return response()->json([
            "result" => $result ?? false,
            "block" => $block ?? false,
            "error" => $error ?? ""
        ]);
        
    }


    public function showall($take = 10)
    {
        $all = DB::table('event_chrismashny')->count();
        $takes = $take;
        $words = DB::table('event_chrismashny')->skip($all - $takes)->take($takes)->get();

        foreach ($words as $key => $w) {
            $employee = DB::connection('MSCMain')->table('EmployeeNew')->select("*", DB::raw("FirstNameEng + ' ' + LastNameEng as FullNameJa"))->where('login', $w->name)->first();
            $words[$key]->display_name = $employee->FullNameJa;
            $code = intval($employee->EmpCode);
            $words[$key]->imgUrl = "http://appmetro.metrosystems.co.th/empimages/{$code}.jpg";
        }
        
        return response()->json([
            "words" => $words,
            "countAllWord" => $all
        ]);

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
