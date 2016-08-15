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

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function edit1($id)
    {	  
		  $menu0 = menu::where('mid', '=', $id)
         ->select('mid','menu_name','menu_type','is_tem','menu_title')
		 ->get();
		 
	
			
		 foreach($menu0 as $menu1){
		 $iditem=$menu1->mid;
		 }
		    $menuitem1 = menu_item::join('menu_rela','menu_rela.mtid', '=', 'menu_item.mtid')
		   ->where('mid', '=', $iditem)
           ->select('mid','menu_rela.mtid','item_parent_id','item_sort','item_icon','item_name','item_link','item_style','item_type','item_description','item_image')
		   ->get();
		   
		  
		  return view('admin.pages.menu.menuedit', ['menuitem' => $menuitem1,'mid' => $id,'menu' => $menu0]);
		  
		  
    }
	  public function edit2(Request $request)
    {   //update title
	    $title= $request->input('title');
		// update 
		$mid =$request->input('mid');
		$name = $request->input('item_name');
		$type = $request->input('type');
		$type_name = $request->input('type_name');
		$description=$request->input('description');
	    $icon = $request->input('icon');
		$Link =$request->input('link');
		$image = $request->input('image');
	    $txt = $request->input('txt');
		$sort = $request->input('sort');
		//insert
		$item_name2 = $request->input('item_name2');
		$type2 = $request->input('type2');
		$Link1 =$request->input('link1');
		$name4 = $request->input('name4');
		$description1=$request->input('description1');
		$icon1 = $request->input('icon1');
		$image1 = $request->input('image1');
		$txt1 = $request->input('txt1');
		$sort1 = $request->input('sort1');
		
	       menu::where('mid', '=', $mid)
          ->update(['menu_title' => $title]);
	      	
		
		  $menurela = menu_rela::where('mid', '=', $mid )
         ->select('mrid','mid','mtid')
		 ->get();	
		 $i=0;
		 //update item เริ่มต้น
		 
		 foreach($menurela as $menurela){
		 menu_item::where('mtid', $menurela->mtid)
          ->update(['item_name' => $name[$i],'item_link' =>$Link[$i],'item_icon' => $icon[$i],'item_sort' => $sort[$i]
		  ,'item_description' => $description[$i],'item_image' => $image[$i]]);
	
		 $i=$i+1;
		 }
		 
		 
		 //check ว่าเพิ่ม iTem จาก  menu Template หรือ  Trop ถ้าเป็น Tem จะ
		 //กำหนด ITem_type เป็น Template 
		 $checkTemplate = menu::where('mid', '=', $mid )
         ->select('mid','menu_type')
		 ->get();	
		 foreach($checkTemplate as $check){
			 $item_type="";
		 if($check->menu_type=="template")
		 {
			 $item_type="template";
		 }}
		 
		 //insert item ใหม่
		 $j=0;
	if($item_name2){
		 foreach($item_name2 as $name){
		$userDB = new Menu_item();
			$userDB->item_parent_id = 0;
	    	$userDB->item_sort = $sort1[$j];
			$userDB->item_icon = $icon1[$j];
			$userDB->item_name = $item_name2[$j];
			$userDB->item_link = $Link1[$j];     //"asset(".$type2.'/'.$name4.")"
			$userDB->item_style = $txt1[$j];
			$userDB->item_type = $item_type; // set template
			$userDB->item_image = $image1[$j];
			$userDB->item_description = $description1[$j];
			$userDB->item_status = 1;
			if($userDB->save()){    
			$iditem = $userDB->mtid; }
			  
				$userDB = new Menu_rela();
	     	$userDB->mid = $mid;
	    	$userDB->mtid = $iditem;
            $userDB->save();
			
		 $j=$j+1;
	}}
		 
		 $id=$mid; //ส่งค่า
		 
      	  return redirect('/admin/menu/edit/'.$id);
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
    $menuname = $request->input('name1');
    $type =$request->input('type1');
    $trop =$request->input('trop');
	$title =$request->input('title');
	  if($type=="trop")
	  {
		$userDB = new menu;
		$userDB->menu_name = $menuname;
		$userDB->menu_title = $title;
		$userDB->menu_type = $type;
		$userDB->is_tem = 1;
		$userDB->tid = $trop;
			if($userDB->save()){
			$id = $userDB->mid;	}
			
	  }
      else{
		$userDB = new menu;
		$userDB->menu_name = $menuname;
		$userDB->menu_title = $title;
		$userDB->menu_type = $type;
		$userDB->is_tem = 1;
		$userDB->tid = "";
			if($userDB->save())
			$id = $userDB->mid;	
        }
		
		
		$menu0 = menu::join('menu_rela','menu_rela.mid', '=', 'menu.mid')
		 ->where('menu_type', '=', 'templatedefault')
         ->select('mtid')
		 ->get();
		
			 
			  foreach($menu0 as $menu1){
		 if($type=="trop")
	  {

		  $menurela = menu_item::where('mtid', '=',$menu1->mtid)
         ->select('mtid','item_parent_id','item_sort','item_icon','item_name','item_link','item_style','item_type','item_status')
		 ->get();	
		   foreach($menurela as $menurela){
			$userDB = new menu_item;
			$userDB->item_parent_id = $menurela->item_parent_id;
	    	$userDB->item_sort = $menurela->item_sort;
			$userDB->item_icon = $menurela->item_icon;
			$userDB->item_name = $menurela->item_name;
			$userDB->item_link = $menurela->item_link;
			$userDB->item_style = $menurela->item_style;
			$userDB->item_type = $menurela->item_type;
			$userDB->item_status = 1;
			if($userDB->save()){
			$iditem = $userDB->mtid;	}

			$userDB = new menu_rela;
	     	$userDB->mid = $id;
	    	$userDB->mtid = $iditem;
            $userDB->save();
		   }}}
		   	return redirect('/admin/menu/create');
    }


    public function show()
    {
		$menu0 = menu::where('tid', '=', '0' )
         ->select('mid','menu_name','menu_type','is_tem')
		 ->get();	
        $menu1 = menu::join('trop','trop.tid', '=', 'menu.tid')
         ->select('mid','trop.tid','trop.trop_name','menu_name','menu_type','is_tem','menu_title')
	     ->get();

	 $trops=DB::select('select T.tid,trop_Name from Trop T left join Menu MN on T.tid = MN.tid where MN.tid IS NULL and trop_status=1');


       return view('admin.pages.menu.menu', ['menu0' => $menu0,'menu1' => $menu1,'trops' => $trops]);
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
	    $menurela = menu_rela::where('mid', '=', $id )
         ->select('mrid','mid','mtid')
		 ->get();	
	
	  	  
	   menu_rela::where('mid',$id)->delete();
          menu::where('mid',$id)->delete();
		  
		  foreach($menurela as $menurela){
	      menu_item::where('mtid',$menurela->mtid)->delete();
		 }
		    
		
		  
		  
      	return redirect('/admin/menu/create');
	}
	
	public function delitem($id){
		
	  $mids = explode(',',$id);
		 
		  menu_rela::where('mtid',$mids[0])->delete();
	      menu_item::where('mtid',$mids[0])->delete();

  
       return redirect('/admin/menu/edit/'.$mids[1]);
	}

   public function show1(Request $request)
    {
		$menuname	 = $request->input('name1');
        $type =$request->input('type1');		
 return view('menusetting', compact(['menuname','type']));

 }

		

		
   
	
}
   