<?php

namespace App\Http\Controllers;

use App\Category_rela;
use App\Component;
use App\Post;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Schema;
use Session;
use Storage;

class PostController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$tid = Session::get('trop_id');

		if ($tid == 0) {
			$postList = DB::table('post')->join('trop', 'post.tid', '=', 'trop.tid', 'left outer')->get();
		} else {
			$postList = DB::table('post')->where('post.tid', '=', $tid)->join('trop as trop', 'post.tid', '=', 'trop.tid')->get();
		}

		return view('admin.pages.post.post', ['postList' => $postList]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {

		$post_ins = ['pid' => ''];
		$tid = Session::get('trop_id');

		$input = $request->all();

		//Event Date
		if (!empty($input['post_event_date']) && !is_null($input['post_event_date'])) {
			$event_date = $input['post_event_date'];
		} else {
			$event_date = date("YYYY/MM/DD h:mm A") . ' - ' . date("YYYY/MM/DD h:mm A");
		}

		$event_date = explode('-', $event_date);

		$event_start_date = date_format(date_create($event_date[0]), "Y-m-d h:i:sa");

		$event_end_date = date_format(date_create($event_date[1]), "Y-m-d h:i:sa");
		//

		$post = new Post;
		$post->tid = $tid;
		$post->emid = intval(Session::get('em_info')->EmpCode);

		$post->post_title = htmlentities($input['post_title']);
		$post->post_name = htmlentities($input['post_name']);
		$post->post_type = $input['post_type'];
		$post->post_status = 1;
		$post->event_start_date = $event_start_date;
		$post->event_end_date = $event_end_date;
		$post->save();

		Storage::disk('uploads')->makeDirectory('trop/' . $tid . '/post/' . $post->pid . '/video');
		Storage::disk('uploads')->makeDirectory('trop/' . $tid . '/post/' . $post->pid . '/image');
		Storage::disk('uploads')->makeDirectory('trop/' . $tid . '/post/' . $post->pid . '/gallery');
		Storage::disk('uploads')->makeDirectory('trop/' . $tid . '/post/' . $post->pid . '/policy');
		Storage::disk('uploads')->makeDirectory('trop/' . $tid . '/post/' . $post->pid . '/file');
		Storage::disk('uploads')->makeDirectory('trop/' . $tid . '/post/' . $post->pid . '/thumbnail');
		Storage::disk('uploads')->makeDirectory('trop/' . $tid . '/post/' . $post->pid . '/upload');

		$post_ins['pid'] = $post->pid;

		return json_encode($post_ins);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		/*if (!Session::has('post_create_session')) {
					Session::put('post_create_session', Session::get('emid') . '_' . date("Y-m-d-H-i-s"));
				}
				$image_files = File::where('session', '=', Session::get('post_create_session'))->get();

			return view('admin.pages.post.post_create', ['image_files' => $image_files]);
		*/
		$tid = Post::where('pid', '=', $id)->first()->tid;

		Session::put('post_path', '/trop/' . $tid . '/post/' . $id);

		$components = Component::where('pid', '=', $id)->orderBy('sort', 'asc')->get();

		$post = Post::where('pid', '=', $id)->first();

		$get_cats = DB::table('post')->leftJoin('category_rela', 'post.pid', '=', 'category_rela.pid')->join('category', 'category.catid', '=', 'category_rela.catid', 'left outer')->where('post.pid', '=', $id)->get();

		$post_cat = [];

		foreach ($get_cats as $get_cat) {
			array_push($post_cat, $get_cat->catid);
		}

		return view('admin.pages.post.post_edit', ['post' => $post, 'post_cat' => $post_cat, 'components' => $components]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		$input = $request->all();
		$date_now = Carbon::now();

		$event_date = $input['post_event_date'];

		$event_date = explode('-', $event_date);

		$event_start_date = date_format(date_create($event_date[0]), "Y-m-d h:i:sa");

		$event_end_date = date_format(date_create($event_date[1]), "Y-m-d h:i:sa");

		//Update Category
		DB::table('category_rela')->where('pid', '=', $id)->delete();

		//return $post_cats;

		if (!empty($input['post_cat'])) {

			$post_cats = $input['post_cat'];

			$data_set = [];

			foreach ($post_cats as $post_cat) {
				array_push($data_set, ['pid' => $id, 'catid' => $post_cat]);
			}

			DB::table('category_rela')->insert($data_set);
		}
		//

		if(isset($input['post_owner'])){

			DB::table('post')
			->where('pid', $id)
			->update([

				'emid' => $input['post_owner'],

			]);
		}

		DB::table('post')
			->where('pid', $id)
			->update([

				'author_contact' => $input['author_contact'],
				'post_name' => $input['post_name'],
				'post_icon' => $input['post_icon'],
				'post_title' => $input['post_title'],
				'post_detail' => strip_tags($input['post_detail']),
				'post_thumbnail' => $input['post_thumbnail'],
				'post_status' => $input['post_status'],
				'post_permission' => $input['post_permission'],
				'post_type' => $input['post_type'],
				'updated_at' => $date_now,
				'event_start_date' => $event_start_date,
				'event_end_date' => $event_end_date,

			]);

		return redirect('admin/post/edit/' . $id);
	}
	public function update_sort(Request $request, $id) {
		//
		$sorts = $request['sort'];
		$i = 1;
		foreach ($sorts as $sort) {
			DB::table('component')
				->where('comid', $sort['comid'])
				->update(['sort' => $i]);
			$i++;
		}
	}

	public function destroy_component($id) {

		$component_lists = Component::where('pid', '=', $id)->get();

		foreach ($component_lists as $list) {

			$com_name = $list->ref_table_name; //Component Table Name

			$com_id = $list->ref_id; //Component ID
			$col_id_name = substr($com_name, 3) . '_id'; //Col id name

			$table_item_name = $list->ref_table_name . '_item'; //Component Item Table Name

			$has_table_item = Schema::hasTable($table_item_name); //Check has Item Table

			if ($has_table_item) {
				DB::table($table_item_name)->where($col_id_name, '=', $com_id)->delete();
			}

			DB::table('component')->where('pid', '=', $id)->where('ref_table_name', '=', $com_name)->where('ref_id', '=', $com_id)->delete();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		Category_rela::where('pid', '=', $id)->delete();

		$this::destroy_component($id);

		Post::destroy($id);

		return redirect('admin/post');
	}
}
