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
         ->select('mid','menu_name','menu_type','is_tem')
		 ->get();
		 
		 foreach($menu0 as $menu1){
		 $iditem=$menu1->mid;
		 }
		    $menuitem1 = menu_item::join('menu_rela','menu_rela.mtid', '=', 'menu_item.mtid')
		   ->where('mid', '=', $iditem)
           ->select('mid','menu_rela.mtid','item_parent_id','item_sort','item_icon','item_name','item_link','item_style','item_type')
		   ->get();
		  
		  return view('admin.pages.menu.menuedit', ['menuitem' => $menuitem1]);
		  
		  
    }
	  public function edit2(Request $request)
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
	  if($type=="Trop")
	  {
		$userDB = new menu;
		$userDB->menu_name = $menuname;
		$userDB->menu_type = $type;
		$userDB->is_tem = 1;
		$userDB->tid = $trop;
			if($userDB->save()){
			$id = $userDB->id;	}
			
	  }
      else{
		$userDB = new menu;
		$userDB->menu_name = $menuname;
		$userDB->menu_type = $type;
		$userDB->is_tem = 1;
		$userDB->tid = "";
			if($userDB->save())
			$id = $userDB->id;	
        }
		
		
		$menu0 = menu::where('menu_type', '=', 'TemplateDefault')
         ->select('mid','menu_name','menu_type','is_tem')
		 ->get();
		 if($type=="Trop")
	  {
	
		   
		     
		  $menurela = menu_item::where('item_type', '=', 'TemplateDefault' )
         ->select('mtid','item_parent_id','item_sort','item_icon','item_name','item_link','item_style','item_type','item_status')
		 ->get();	
		   foreach($menurela as $menurela){
			$userDB = new menu_item;
			$userDB->item_parent_id = $menurela->item_parent_id;
	    	$userDB->item_sort = $menurela->item_sort;
			$userDB->item_icon = $menurela->item_icon;
			$userDB->item_name = $menurela->item_name;
			$userDB->item_link = asset($type.'/'.$id);
			$userDB->item_style = $menurela->item_style;
			$userDB->item_type = '';
			$userDB->item_status = 1;
			if($userDB->save()){
			$iditem = $userDB->id;	}
					
			$userDB = new menu_rela;
	     	$userDB->mid = $id;
	    	$userDB->mtid = $iditem;
            $userDB->save();
		   }
		   
		
	     
		 
	  }
		 
		   	return redirect('/admin/menu/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
		$menu0 = menu::where('tid', '=', '0' )
         ->select('mid','menu_name','menu_type','is_tem')
		 ->get();	
        $menu1 = menu::join('trop','trop.tid', '=', 'menu.tid')
         ->select('mid','trop.tid','trop.trop_name','menu_name','menu_type','is_tem')
	     ->get();
	
	 $trops=DB::select('select T.tid,trop_Name from Trop T left join Menu MN on T.tid = MN.tid where MN.tid IS NULL and trop_status=1');

		 
       return view('admin.pages.menu.menu', ['menu0' => $menu0,'menu1' => $menu1,'trops' => $trops]);
 }
  public function update($id)
    {
          menu::where('menu_type', 'TemplateDefault')
          ->update(['menu_type' =>'Template']);
	

	
          menu::where('mid', $id)
          ->update(['menu_type' =>'TemplateDefault']);
		  
		  $menurela = menu_rela::where('mid', '=', $id )
         ->select('mrid','mid','mtid')
		 ->get();	
		 
		 
		 menu_item::where('item_type', 'TemplateDefault')
          ->update(['item_type' =>'Template']);
		 
		 foreach($menurela as $menurela){
		 menu_item::where('mtid', $menurela->mtid)
          ->update(['item_type' =>'TemplateDefault']);
		 }
		   
		 
		 

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

   public function show1(Request $request)
    {
		$menuname	 = $request->input('name1');
        $type =$request->input('type1');		
 return view('menusetting', compact(['menuname','type']));

 }

		

		
   
	
}
   