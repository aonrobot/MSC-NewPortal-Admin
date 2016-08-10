<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests;
use App\category;
use App\trop;

class categoryController extends Controller
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

	    $category= $request->input('category');
	    $trops = $request->input('trop');
		$type = $request->input('type');
		$userDB = new category;
		$userDB->cat_name = $category;
		$userDB->tid = $trops;
		$userDB->cat_type = $type;
        $userDB->save();
			
	
		
		//$userDB = new menu_rela;
	//	$userDB->mid = '1';
	//	$userDB->mtid = $id;
	//	$userDB->save();

		
		return redirect('/admin/category/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
 
    //        $cat = category::join('trop','trop.tid', '=', 'category.tid')
		//    ->where('category.tid', '=', '1')
        //    ->select('catid','trop.trop_name','category.catid','category.cat_name','category.cat_type')
		//	  ->get();
     //   return view('category', ['ca1' => $cat,'ca2' => $cat2]);
			
	  
	      $trops = trop::where('trop_status', '=', '1' )
         ->select('tid','trop_Name','trop_status','trop_slug','trop_type','created_at','updated_at')
         ->get();
        
		     $cat = category::join('trop','trop.tid', '=', 'category.tid')
              ->select('catid','trop_name','category.catid','category.cat_name','category.cat_type')
        	  ->get();
	  return view('admin.pages.category.category', ['ca2' => $cat,'trops' => $trops]); 
 }
  public function del($id){
          category::where('catid',$id)->delete();
      	return redirect('/admin/category/show');
	}
		

		
   
	
}
   