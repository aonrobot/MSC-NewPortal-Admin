<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests;
use App\category;
use App\trop;
use App\category_rela;
use App\post;
use Session;

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
        $trop_id = Session::get('trop_id');
	    $category= $request->input('category');
	    $trops = $request->input('trop');

		
		if($trop_id=="0"){
		$userDB = new category;
		$userDB->tid = 0;
		$userDB->cat_name = $category;
		$userDB->cat_type = "administrator";
        $userDB->save();}
		else{
			$userDB = new category;
		$userDB->cat_name = $category;
		$userDB->tid = $trop_id;
		$userDB->cat_type = "trop";
        $userDB->save();}
	
	
		
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
              ->select('catid','trop.tid','trop_name','category.catid','category.cat_name','category.cat_type')
        	  ->get();
			 $catadmin = category::where('cat_type','=','administrator')
              ->select('catid','catid','cat_name','cat_type')
        	  ->get();
			  
	  return view('admin.pages.category.category', ['ca2' => $cat,'trops' => $trops,'catad' => $catadmin]); 
 }
  public function del($id){
	      category_rela::where('catid',$id);
          category::where('catid',$id)->delete();
      	return redirect('/admin/category/show');
	}
  public function delpost(Request $request){
	  $rela_id = $request->input('rela_id');	
	  $catid = $request->input('idcat');	
	  $i1=count($rela_id);
		  for($i=0;$i<$i1;$i++)
		  {
          category_rela::where('cat_rela_id',$rela_id[$i])->delete();
		  }
		  
      	return redirect('/admin/category/showedit/'.$catid);
	}
	  public function delpost1($id){
		   $cat_id = category_rela::where('cat_rela_id', '=', $id)->first()->catid;
          category_rela::where('cat_rela_id',$id)->delete();
      	return redirect('/admin/category/showedit/'.$cat_id);
	}
	

 public function editdetail($id){
	    $catname = category::where('catid','=',$id)
		          ->select('cat_name','cat_type')
				  ->get();

   foreach($catname as $cattype){
      if($cattype->cat_type=="administrator"){
	    $post =post::all();
	     }
	  else{
	    $post=category::join('post','category.tid', '=', 'post.tid')
			  ->where('category.catid','=',$id)
              ->select('pid','post_name')
        	  ->get();			  
		  } 
			                    }
			  
        $cat = post::join('category_rela','post.pid', '=', 'category_rela.pid')
			  ->where('category_rela.catid','=',$id)
              ->select('cat_rela_id','catid','post.pid','tid','post_name','post_title','post_detail')
        	  ->get();
      	return view('admin.pages.category.categoryedit', ['showpost' => $cat,'post_option' => $post,'cid' => $id,'namecat' => $catname]);
	}	

		
public function edit(Request $request) //update
    {

		$postid = $request->input('postid');	
		$catid = $request->input('idcat');	
		$category_name = $request->input('catagory_name');

		category::where('catid', $catid)
          ->update(['cat_name' => $category_name]);
	
	$i1=count($postid);
		  for($i=0;$i<$i1;$i++)
		  {
        $postDB = new category_rela;
		$postDB->pid = $postid[$i];
	    $postDB->catid = $catid;
	    $postDB->save();
		  }
        return  redirect('/admin/category/showedit/'.$catid);
		
    }
	
	
	
}
   