<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Trop;

use App\Menu;

use App\Setting;

use DB;

class FrontTropController extends Controller
{
    public function index($id){

        //$id = trop id
        $trop = Trop::where('tid','=',$id)->first();

        //return $trop;

        //Fetch All Setting Of This Trop
        $setting = Setting::where('set_type', '=', 'trop')->where('set_type_id', '=', $id)->get();

        //Fetch Slide Item
        $slide = Setting::
        where('set_type', '=', 'trop')->
        where('set_type_id', '=', $id)->
        where('set_name', '=', 'slide')->first();

        $slide_items = [];
        $slide_setting = [];
        if($slide != null){
            $slide_items = DB::select('select * from cp_slide_item where slide_id = ?', [$slide->set_value]);
            $slide_setting = DB::select('select * from cp_slide where slide_id = ?', [$slide->set_value]);
        }       
        //Fetch Menu Item

        $menu = Menu::where('tid', '=', $id)->first();

        if($menu == null){
            $menu = [];
        }
        
        return view('pages.trop',['trop' => $trop, 'slide_setting' => $slide_setting, 'slide_items' => $slide_items, 'menu' => $menu]);
    }
}
