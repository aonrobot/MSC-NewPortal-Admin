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
use Session;

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
         ->select('mid','menu_name','menu_type','is_tem','menu_title','menu_template_id','tid')
		 ->get();
		  error_reporting(E_ALL ^ E_NOTICE);
		  $menu_template = menu::where('mid', '=', $menu0[0]->menu_template_id)
		 ->first()->menu_name;
		  $trops = trop::orderBy('trop_status', 'ASC')->get();
		  $post1 = post::all();
		  $category1 = category::where('tid', '=',$menu0[0]->tid)->get();
		 
	error_reporting(E_ALL ^ E_NOTICE);
		 foreach($menu0 as $menu1){
		 $iditem=$menu1->mid;
		 }
		    $menuitem1 = menu_item::join('menu_rela','menu_rela.mtid', '=', 'menu_item.mtid')
		   ->where('mid', '=', $iditem)
           ->select('mid','menu_rela.mtid','item_parent_id','item_sort','item_icon','item_name','item_link','item_style','item_type','item_description','item_image')
		   ->orderBy('item_sort', 'ASC')
		   ->get();
		   

		  
		  return view('admin.pages.menu.menuedit', ['menuitem' => $menuitem1,'mid' => $id,'menu' => $menu0,'post' => $post1,'category' => $category1,'trop1' => $trops,'template_name' => $menu_template]);
		  
		  
    }
	 public function listedit($id)
    {	  

		  $menu0 = menu::where('mid', '=', $id)
         ->select('mid','menu_name','menu_type','is_tem','menu_title','menu_template_id')
		 ->get();
		  error_reporting(E_ALL ^ E_NOTICE);
		  $menu_template = menu::where('mid', '=', $menu0[0]->menu_template_id)
		 ->first()->menu_name;
		  $trops = trop::orderBy('trop_status', 'ASC')->get();
		  $post1 = post::all();
		  $category1 = category::where('cat_type', 'trop')->get();
		 
	error_reporting(E_ALL ^ E_NOTICE);
		 foreach($menu0 as $menu1){
		 $iditem=$menu1->mid;
		 }
		    $menuitem1 = menu_item::join('menu_rela','menu_rela.mtid', '=', 'menu_item.mtid')
		   ->where('mid', '=', $iditem)
           ->select('mid','menu_rela.mtid','item_parent_id','item_sort','item_icon','item_name','item_link','item_style','item_type','item_description','item_image')
		   ->orderBy('item_sort', 'ASC')
		   ->get();
		   

		  
		  return view('admin.pages.menu.menuitemdel', ['menuitem' => $menuitem1,'mid' => $id,'menu' => $menu0,'post' => $post1,'category' => $category1,'trop1' => $trops,'template_name' => $menu_template]); 
    }
	  public function edit2(Request $request)
    {   //update title
	    $title= $request->input('title');
		$menu_name=$request->input('menu_name');
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
		$type2 = $request->input('type_new');
		$Link1 =$request->input('link1');
		$name4 = $request->input('object_new');
		$description1=$request->input('description1');
		$icon1 = $request->input('icon1');
		$image1 = $request->input('image1');
		$txt1 = $request->input('txt1');
		$sort1 = $request->input('sort1');
		
		  $menu_update_tem = menu::where('mid', '=', $mid )
		 ->first()->menu_type;
	
		
	       menu::where('mid', '=', $mid)
          ->update(['menu_title' => $title,'menu_name' => $menu_name]);
	      	
		
		  $menurela = menu_rela::where('mid', '=', $mid )
         ->select('mrid','mid','mtid')
		 ->get();
   // ถ้าไม่ใช่ template
if($menu_update_tem!="trop" and $menu_update_tem!="menubar")
		{
			
	foreach($menurela as $menurela){
		 if($type_name[$menurela->mtid][0]=="A")
	       { $sum="";}
	else if($type_name[$menurela->mtid][0]=="B")
		{
          $check = substr($Link[$menurela->mtid][0],0,4);
	   if($check!="http")
	     {$sum="http://".$Link[$menurela->mtid][0];
	     }
       else{$sum=$Link[$menurela->mtid][0];}
		}

	else 
		{
			if($type[$menurela->mtid][0]=="post_option"){
			$sum = "post/".$type_name[$menurela->mtid][0];
			}
			else {
			$sum=$type[$menurela->mtid][0]."/".$type_name[$menurela->mtid][0];
			}
	     }
		 menu_item::where('item_template_id', $menurela->mtid)
          ->update(['item_name' => $name[$menurela->mtid][0],'item_icon' => $icon[$menurela->mtid][0],'item_sort' => $sort[$menurela->mtid][0]
		  ,'item_description' => $description[$menurela->mtid][0],'item_image' => $image[$menurela->mtid][0]]);
	    
		menu_item::where('mtid', $menurela->mtid)
          ->update(['item_name' => $name[$menurela->mtid][0],'item_link' =>$sum,'item_icon' => $icon[$menurela->mtid][0],'item_sort' => $sort[$menurela->mtid][0]
		  ,'item_description' => $description[$menurela->mtid][0],'item_image' => $image[$menurela->mtid][0]]);
		
			}
			 
		}


// อัพเดธซ้ำอีก 1 รอบ
else {
$rela = menu_rela::where('mid', '=', $mid )
         ->select('mrid','mid','mtid')
		 ->get();
 foreach($rela as $rela1){
	     if($type_name[$rela1->mtid][0]=="A")
	       { $sum="";}
	else if($type_name[$rela1->mtid][0]=="B")
		{
          $check = substr($Link[$rela1->mtid][0],0,4);
	   if($check!="http")
	     {$sum="http://".$Link[$rela1->mtid][0];
	     }
       else{$sum=$Link[$rela1->mtid][0];}
		}

	else 
		{
			if($type[$rela1->mtid][0]=="post_option"){
			$sum = "post/".$type_name[$rela1->mtid][0];
			}
			else {
			$sum=$type[$rela1->mtid][0]."/".$type_name[$rela1->mtid][0];
			}
	}
		 menu_item::where('mtid', $rela1->mtid)
          ->update(['item_name' => $name[$rela1->mtid][0],'item_link' =>$sum,'item_icon' => $icon[$rela1->mtid][0],'item_sort' => $sort[$rela1->mtid][0]
		  ,'item_description' => $description[$rela1->mtid][0],'item_image' => $image[$rela1->mtid][0]]);
	
		
		 }

}

		 
		 
		 //check ว่าเพิ่ม iTem จาก  menu Template หรือ  Trop ถ้าเป็น Tem จะ
		 //กำหนด ITem_type เป็น Template 
		 $checkTemplate = menu::where('mid', '=', $mid )
         ->select('mid','menu_type')
		 ->get();	
		 foreach($checkTemplate as $check){
			 $item_type="";
		 if($check->menu_type=="template" or $check->menu_type=="templatedefault")
		 {
			 $item_type="template";
		 }}
		 
		 //insert item ใหม่
		 $j=0;
	if($item_name2){          
     	

		 foreach($item_name2 as $name){
    if($name4[$j]=="A")
	       { $sum1=$Link1[$j];}
	else if($name4[$j]=="B")
		{
          $check1 = substr($Link1[$j],0,4);
	   if($check1!="http")
	     {$sum1="http://".$Link1[$j];
	     }
       else{$sum1=$Link1[$j];}
	   }
    else 
		{
			if($type2[$j]=="post_option2"){
			$sum1 = "post/".$name4[$j];
			}
			else {
			$sum1=$type2[$j]."/".$name4[$j];
			}
		}
		$userDB = new Menu_item();
			$userDB->item_parent_id = 0;
	    	$userDB->item_sort = $sort1[$j];
			$userDB->item_icon = $icon1[$j];
			$userDB->item_name = $item_name2[$j];
		//	$userDB->item_link = $sum1;     //"asset(".$type2.'/'.$name4.")"
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
			
			$menu_check_id = menu::where('menu_template_id', '=', $mid )
		    ->get();
			
			if($menu_check_id){
				
				
			foreach($menu_check_id as $check){
				
	     if($name4[$j]=="A")
	       { $sum1=$Link1[$j];}
	     else if($name4[$j]=="B")
		  {
          $check1 = substr($Link1[$j],0,4);
	     if($check1!="http")
	     {$sum1="http://".$Link1[$j];
	      }
         else{$sum1=$Link1[$j];}
	      }
         else 
		 {
			if($type2[$j]=="post_option2"){
			$sum1 = "post/".$name4[$j];
			}
			else {
			$sum1=$type2[$j]."/".$name4[$j];
			}
			}
				
				$userDB = new Menu_item();
			$userDB->item_parent_id = 0;
	    	$userDB->item_sort = $sort1[$j];
			$userDB->item_icon = $icon1[$j];
			$userDB->item_name = $item_name2[$j];
		//	$userDB->item_link = $sum1;     //"asset(".$type2.'/'.$name4.")"
			$userDB->item_style = $txt1[$j];
			$userDB->item_type = $item_type; // set template
			$userDB->item_image = $image1[$j];
			$userDB->item_description = $description1[$j];
			$userDB->item_template_id = $iditem;
			$userDB->item_status = 1;
			if($userDB->save()){    
			$iditem1 = $userDB->mtid; }
			
			$userDB = new Menu_rela();
	     	$userDB->mid = $check->mid;
	    	$userDB->mtid = $iditem1;
            $userDB->save();
				
			}}
			
			
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
	$trop_tid = Session::get('trop_id');	
    $menu_template = menu::where('menu_type', '=','templatedefault')
	   ->first()->mid;	
	
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
		$userDB->menu_template_id = $menu_template;
		$userDB->is_tem = 1;
		$userDB->tid = $trop_tid;
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
         ->select('mtid','item_parent_id','item_sort','item_icon','item_image','item_description','item_name','item_link','item_style','item_type','item_status')
		 ->get();	
		   foreach($menurela as $menurela){
			$userDB = new menu_item;
			$userDB->item_parent_id = $menurela->item_parent_id;
	    	$userDB->item_sort = $menurela->item_sort;
			$userDB->item_icon = $menurela->item_icon;
			$userDB->item_name = $menurela->item_name;
			$userDB->item_image = $menurela->item_image;
			$userDB->item_description = $menurela->item_description;
			$userDB->item_link = $menurela->item_link;
			$userDB->item_style = $menurela->item_style;
			$userDB->item_type = $menurela->item_type;
			$userDB->item_template_id = $menurela->mtid;
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
		$menu0 = menu::where('menu_type', '=', 'template' ) //
         ->orWhere('menu_type','=','templatedefault')		
         ->select('mid','menu_name','menu_type','is_tem')
		 ->get();	
        $menu1 = menu::join('trop','trop.tid', '=', 'menu.tid')
         ->select('mid','trop.tid','trop.trop_name','menu_name','menu_type','is_tem','menu_title')
	     ->get();
		$menu2 = menu::where('menu_type', '=', 'menubar' ) //
         ->select('mid','menu_name','menu_type','is_tem','menu_title')
		 ->get();	


	 $trops=DB::select('select T.tid,trop_Name from Trop T left join Menu MN on T.tid = MN.tid where MN.tid IS NULL and trop_status=1');


       return view('admin.pages.menu.menu', ['menu0' => $menu0,'menu1' => $menu1,'trops' => $trops,'menu2' => $menu2]);
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
		  
		  $menu_del = menu_item::join('menu_rela','menu_rela.mtid', '=', 'menu_item.mtid')
		 ->where('item_template_id','=',$mids[0])
         ->select('menu_item.mtid')
	     ->get();
		 
		 if($menu_del)
		 {  
	  foreach($menu_del as $menu_del1){
	      menu_rela::where('mtid',$menu_del1->mtid)->delete();
	      menu_item::where('item_template_id',$menu_del1->mtid)->delete();
		  
	     }}
	

  
       return redirect('/admin/menu/listitemdel/'.$mids[1]);
	}

   public function show1(Request $request)
    {
		$menuname	 = $request->input('name1');
        $type =$request->input('type1');		
 return view('menusetting', compact(['menuname','type']));

 }

		

		
   
	
}
   