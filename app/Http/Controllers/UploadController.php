<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Storage;

use App\File;

use Session;

class UploadController extends Controller
{
    public function upload_image(Request $request){

    	$files = $request->file('file');

    	$file_type = ["JPEG","PNG","JPG",'jpeg','jpg','png'];

    	$emid = Session::get('emid');

    	$create_session = Session::get('post_create_session');

    	$upload_location = 'images/'.$_SERVER['PHP_AUTH_USER'].'/';

    	$file_uploads = [];

    	if(!empty($files)){
	    	foreach ($files as $file) {

	    		if(!in_array($file->getClientOriginalExtension() , $file_type)){
	    			return response()->json(['success' => false]);
	    		}else{
	    			$file_date = date("YmdHis");
	    			$file_name = $file_date . str_random(6) . '_' . $file->getClientOriginalName();
	    			$file_name = str_replace(' ', '', $file_name);
	    			//$file->move($upload_location, $file_name);
	    			Storage::disk('uploads')->put($upload_location.$file_name, file_get_contents($file));

	    			$file_upload = File::create([ 
	    				'emid' => $emid,
	    				'used' => '0',
	    				'session' => $create_session,
	    				'file_location' => 'uploads/' . $upload_location.$file_name, 
	    				'file_file_name' => $file_name,
	    				'file_file_size' => $file->getSize(),
	    				'file_content_type' => $file->getClientOriginalExtension()
	    			]);

	    			array_push($file_uploads, $file_upload);
	    		}    		
	    	}

	    	return response()->json(['success' => true,'files' => $file_uploads]);
    	}

    }

    public function delete($id){

    	$upload_location = 'images/'.$_SERVER['PHP_AUTH_USER'].'/';

    	$file = File::where('id', '=', $id);

    	Storage::disk('uploads')->delete($upload_location.$file->file_file_name);

    	$file->delete();
    }
}
