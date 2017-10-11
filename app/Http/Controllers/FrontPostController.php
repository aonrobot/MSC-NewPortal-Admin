<?php

namespace App\Http\Controllers;

use App\Component;
use App\Post;
use DB;

class FrontPostController extends Controller {
	public function index($id = 0) {

		$post = Post::where('pid', '=', $id)->first();

		if (empty($post) or $post->post_status == "0") {
			abort(404, 'This post is not found');
		}

		$components = Component::where('pid', '=', $id)->get()->sortBy('sort');

		$component_array = [];
		foreach ($components as $component) {
			/*if($component['ref_relation'] > 0){
				    			$ids = [];
				    			$col_id_name = explode('_', $component['ref_table_name'])[1] . '_item' . '_id';
				    			$col_root_id_name = explode('_', $component['ref_table_name'])[1] . '_id';
				    			$col_item_name = $component['ref_table_name'] . '_item';
				    			$db_ids = DB::select('select '. $col_id_name .' as id from '. $col_item_name .' where '. $col_root_id_name .' = ' . $component['ref_id']);
				    			foreach ($db_ids as $db_id ) {
				    				array_push($ids, $db_id->id);
				    			}
				    			array_push($component_array, ['name' => $component['ref_table_name'] , 'id' => $ids]);
			*/

			if($component['ref_table_name'] == "cp_redirect"){
				$redirect = DB::table('cp_redirect')->where('redirect_id', $component['ref_id'])->first();

				$url = $redirect->redirect_url;

				if(strpos($url, 'http') === FALSE){
					$url = 'http://' . $url;
				}

				return redirect($url);
			}
			array_push($component_array, ['name' => $component['ref_table_name'], 'id' => $component['ref_id']]);
			//}
		}
		//return json_encode($component_array);
		return view('pages.post', ['components' => json_encode($component_array), 'post' => $post]);
		//return view('pages.post',['components' => $components]);
	}
}
