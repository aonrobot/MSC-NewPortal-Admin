<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Menu;

class FrontHomeController extends Controller
{
    public function index(){
    	return view('pages.home');
    }
}
