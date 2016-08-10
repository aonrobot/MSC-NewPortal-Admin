<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\trop;
use App\request1;
use App\menu_rela;
use App\menu;
use App\trop_rela;
use App\employee;

class tropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        $trops = $request->input('trop');

		$userDB = new trop;
		$userDB->trop_name = $trops;
		$userDB->trop_type = 'trop';
		$userDB->trop_status = "0";
			if($userDB->save()){
			$id = $userDB->id;}	
			
			

	
	
		$userDB = new request1;
		$userDB->emid = 2;
		$userDB->request_detail = 'create_Trop';
		$userDB->request_type = 'trop';
		$userDB->request_object = 'trop';
		$userDB->request_status = "0";
	    $userDB->object_id = $id;
	//	$userDB->created_at = "0";
	//  $userDB->update_at = "0";
		$userDB->save();
			  
	    $userDB = new trop_rela;
		$userDB->emid = 2;
	    $userDB->tid = $id;
	    $userDB->save();
		
		//$userDB = new menu_rela;
	//	$userDB->mid = '1';
	//	$userDB->mtid = $id;
	//	$userDB->save();
		
		
		
		
		return redirect('/admin/trop/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $trops = trop::all();
        return view('admin.pages.trop.trop', ['trops' => $trops]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit1($id)
    {
          $detail1 = trop::where('tid', '=', $id)->get();
		   $template = menu::where('menu_type', '=', 'TemplateDefault')
         ->select('mid','menu_name','menu_type','is_tem')
		 ->get();
	       $template2 = menu::where('menu_type', '=', 'Template')
         ->select('mid','menu_name','menu_type','is_tem')
		 ->get();
	  return view('admin.pages.trop.tropsetting', ['detail1' => $detail1,'menu1' => $template,'menu2' => $template2]);
				  
    }
	    public function edit(Request $request) //update
    {
		$trops = $request->input('idtrop');
		$trops1 = $request->input('trop1');
		$type = $request->input('type1');
		
          trop::where('tid', $trops)
          ->update(['Trop_Name' => $trops1]);
		 		
          trop::where('tid', $trops)
          ->update(['Trop_type' => $type]);
		
        return redirect('/trop');
    }
	
	
	
	public function detailset($id) //edit
    {	
     $menu1 = menu::where('menu_type', '=', 'Trop' )
         ->select('mid','menu_name','menu_type','is_tem')
		 ->get();
		 
	 $employee = employee::all();
 
	
	 $detail1 = trop::where('tid', '=', $id)->get();

    return view('admin.pages.trop.tropedit', ['detail1' => $detail1,'menu1' => $menu1,'employee' => $employee]);
        
    }
	
	
	public function detail($id)
    {	
	$detail1 = trop::where('tid', '=', $id)->get();
    return view('tropsetting', ['detail1' => $detail1]);
        //
    }
	public function cat()
    {	
			      return view('category');
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
    public function Del($id){
		trop_rela::where('tid',$id)->delete();
          trop::where('tid',$id)->delete();
		   request1::where('object_id',$id)->delete();
		    menu::where('tid',$id)->delete();
			  
			 
      	return redirect('/admin/trop/create');
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
