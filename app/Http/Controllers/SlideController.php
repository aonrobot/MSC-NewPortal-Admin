<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests;
use App\category;
use App\trop;
use App\menu;
use App\menu_item;
use App\menu_rela;
use DB;
use App\post;
use App\cp_slide;
use App\cp_slide_item;
use App\setting;

use Session;


class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function edit1($id)
    {	  
	
	 error_reporting(E_ALL ^ E_NOTICE);	
	    $setting = setting::join('trop','trop.tid', '=', 'setting.set_type_id')
		   ->select('trop_name')
		   ->where('set_value', '=', $id)
		   ->get();
	 
	    $slide = cp_slide::where('slide_id', '=', $id)
		   ->get();
	 
	 
	   	$slide_item = cp_slide_item::where('slide_id', '=', $id)
		   ->orderBy('slide_item_sort', 'ASC')
		   ->get();
	//	$show_trop = cp_slide::join('setting','category.tid', '=', 'post.tid')
	//		  ->where('category.catid','=',$id)
      //        ->select('pid','post_name')
       // 	  ->get();	     // show ชื่อ Trop
		   

		  return view('admin.pages.slide.slideedit', ['item_slide' => $slide_item,'item_id' => $id,'slide1' => $slide,'settingtrop' => $setting]);
		  
		  
    }
	  public function edit2(Request $request)
    {   //update title
	
	    $slide_name = $request->input('slide_name');
		$slide_speed = $request->input('slide_speed');
		$slide_delay = $request->input('slide_delay');
		//update 
		$id =$request->input('item_id1');
		$item_name = $request->input('item_name');
		$item_url = $request->input('item_url');
		$item_link = $request->input('item_link');
		$item_title=$request->input('item_title');
	    $item_subtitle = $request->input('item_subtitle');
		$item_content =$request->input('item_content');
		$item_sort = $request->input('item_sort');
		//insert
		$item_name_in = $request->input('item_name_in');
		$item_url_in = $request->input('item_url_in');
		$item_link_in =$request->input('item_link_in');
		$item_title_in = $request->input('item_title_in');
		$item_subtitle_in=$request->input('item_subtitle_in');
		$item_content_in = $request->input('item_content_in');
		$item_sort_in = $request->input('item_sort_in');
		
		
	 cp_slide::where('slide_id','=', $id)
          ->update(['slide_name' => $slide_name,'slide_speed' => $slide_speed,'slide_delay' => $slide_delay]);
	      	
		
$update = cp_slide_item::where('slide_id', '=', $id )
		 ->get();
 foreach($update as $update1){

		 cp_slide_item::where('slide_item_id','=', $update1->slide_item_id)
          ->update(['slide_item_name' => $item_name[$update1->slide_item_id][0],'slide_item_img_url' =>$item_url[$update1->slide_item_id][0]
		  ,'slide_item_content_link' => $item_link[$update1->slide_item_id][0],'slide_item_title' => $item_title[$update1->slide_item_id][0],'slide_item_subtitle' => $item_subtitle[$update1->slide_item_id][0]
		  ,'slide_item_content' => $item_content[$update1->slide_item_id][0],'slide_item_sort' => $item_sort[$update1->slide_item_id][0]]);
	
		 }





		  $j=0;
if($item_name_in){          
     	

		 foreach($item_name_in as $name){

		$userDB = new cp_slide_item();
			$userDB->slide_id = $id;
	    	$userDB->slide_item_name = $item_name_in[$j];
			$userDB->slide_item_img_url = $item_url_in[$j];
			$userDB->slide_item_img_link = $item_link_in[$j];
			$userDB->slide_item_title = $item_title_in[$j];     //"asset(".$type2.'/'.$name4.")"
			$userDB->slide_item_subtitle = $item_subtitle_in[$j];
			$userDB->slide_item_content = $item_content_in[$j]; // set template
			$userDB->slide_item_sort = $item_sort_in[$j];
			if($userDB->save()){    
			$iditem = $userDB->slide_item_id; }

		 $j=$j+1;
}}
		 
		
		 
	
		 
      	  return redirect('/admin/slide/edit/'.$id);
    }
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
	$slide = $request->input('Slide_name');
	$slide_speed = $request->input('Slide_speed');
	
	if($trop_id=='0')
	{
    $slide_type ="administrator";	
	}else{ $slide_type ="trop";}
	$slide_delay = $request->input('Slide_delay');
		$slideDB = new cp_slide;
		$slideDB->emid = Session::get('emid');
		$slideDB->slide_name = $slide;
		$slideDB->slide_type = $slide_type;
		$slideDB->slide_speed =$slide_speed;
		$slideDB->slide_delay =$slide_delay;
		$slideDB->slide_tid = $trop_id;
			if($slideDB->save()){
			$id = $slideDB->slide_id;	}
			
		   	return redirect('/admin/slide/create');
    }


    public function show()
    {
            
	$slide = cp_slide::join('trop','trop.tid', '=', 'cp_slide.slide_tid')
        	  ->get();
    $slide_newportal = cp_slide::where('slide_tid','=','0')
        	  ->get();
			  
	 $trops=DB::select('select T.tid,trop_Name from Trop T left join Menu MN on T.tid = MN.tid where MN.tid IS NULL and trop_status=1');
       return view('admin.pages.slide.slide', ['slide_show' => $slide,'trops' =>$trops,'slide_newportal'=>$slide_newportal]);
 }
  public function update($id)
    {
		
          menu::where('menu_type', 'templatedefault')
          ->update(['menu_type' =>'template']);
	
          menu::where('mid', $id)
          ->update(['menu_type' =>'templatedefault']);
		  
		  
		 
		 menu_item::where('item_type', 'templatedefault')
          ->update(['item_type' =>'template']);
		 
	
		 
		 

        return redirect('/admin/menu/create');
    }
  public function Del($id){

	      cp_slide_item::where('slide_id',$id)->delete(); 
	   cp_slide::where('slide_id',$id)->delete();  
		  
      	return redirect('/admin/slide/create');
	}
	
	public function delitem($id){
		
	  $item_id = explode(',',$id);
		
		 cp_slide_item::where('slide_item_id',$item_id[0])->delete();
  
       return redirect('/admin/slide/edit/'.$item_id[1]);
	}

   public function show1(Request $request)
    {
		$menuname	 = $request->input('name1');
        $type =$request->input('type1');		
 return view('menusetting', compact(['menuname','type']));

 }

		

		
   
	
}
   