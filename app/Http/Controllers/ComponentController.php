<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Config;
use DB;
use Illuminate\Http\Request;
use Storage;

class ComponentController extends Controller {

	public function create(Request $request) {

		$input = $request->all();

		$date_now = Carbon::now();

		$component = $input['component'];

		$path = $input['path'];

		if ($component == 'video' || $component == 'image') {

			$filename = $input['filename'];

			$filename_origin = $input['filename_origin'];

			$url = Config::get('newportal.upload_url') . $path . '/' . $component . '/' . $filename;

		} else if ($component == 'gallery') {

			$filenames = $input['filename'];

			$filename_origins = $input['filename_origin'];

			$urls = [];

			foreach ($filenames as $filename) {
				array_push($urls, Config::get('newportal.upload_url') . $path . '/' . $component . '/' . $filename);
			}

		}

		$pid = explode('/', $path);

		$pid = $pid[4];

		switch ($component) {

		case "video":

			$ref_id = DB::table('cp_video')->insertGetId([
				'video_path' => $url,
				'video_name' => $filename,
				'video_name_origin' => $filename_origin,
				'video_type' => 'MP4',
				'created_at' => $date_now,
				'updated_at' => $date_now,
			]);

			break;

		case "image":

			$ref_id = DB::table('cp_image')->insertGetId([
				'image_path' => $url,
				'image_name' => $filename,
				'image_name_origin' => $filename_origin,
				'image_alt' => $filename_origin,
				'image_type' => 'JPEG',
				'created_at' => $date_now,
				'updated_at' => $date_now,
			]);

			break;

		case "content":

			$ref_id = DB::table('cp_content')->insertGetId([
				'content_content' => $input['content'],
				'content_type' => 'text',
				'created_at' => $date_now,
				'updated_at' => $date_now,
			]);

			break;

		case "gallery":

			$ref_id = DB::table('cp_gallery')->insertGetId([
				'gallery_name' => 'post ' . $pid,
				'gallery_title' => 'gallery title',
				'created_at' => $date_now,
				'updated_at' => $date_now,
			]);

			for ($i = 0; $i < count($filenames); $i++) {

				DB::table('cp_gallery_item')->insert([
					'gallery_id' => $ref_id,
					'item_path' => $urls[$i],
					'item_alt' => $filenames[$i],
					'created_at' => $date_now,
					'updated_at' => $date_now,
				]);
			}

			break;
		}

		$comid = DB::table('component')->insertGetId([
			'pid' => $pid,
			'ref_table_name' => 'cp_' . $component,
			'ref_id' => $ref_id,
			'sort' => 0,
		]);

		if ($component == 'video' || $component == 'image') {

			return json_encode(['comid' => $comid, 'id' => $ref_id, 'filename' => $filename_origin]);

		} else if ($component == 'content') {

			return json_encode(['comid' => $comid, 'id' => $ref_id]);

		} else if ($component == 'gallery') {

			return json_encode(['comid' => $comid, 'id' => $ref_id]);
		}
	}

	public function update(Request $request) {

		$input = $request->all();

		$component = $input['component'];

		$date_now = Carbon::now();

		switch ($component) {

		case "content":

			$ref_id = DB::table('cp_content')->where('content_id', $input['id'])
				->update([
					'content_content' => $input['content'],
					'updated_at' => $date_now,
				]);

			break;

		}
	}

	public function delete(Request $request) {

		$input = $request->all();

		$type = explode('_', $input['type'])[1];

		$comid = $input['comid'];

		$id = $input['id'];

		if ($type == 'video' || $type == 'image') {

			$filename = $input['filename'];

			$path = substr($input['path'], 1);

			$filepath = $path . '/' . $type . '/';

			Storage::disk('uploads')->delete($filepath . $filename);

			DB::table('cp_' . $type)->where($type . '_id', '=', $id)->delete();

			DB::table('component')->where('comid', '=', $comid)->delete();

		} else if ($type == 'content') {

			DB::table('cp_' . $type)->where($type . '_id', '=', $id)->delete();

			DB::table('component')->where('comid', '=', $comid)->delete();

		} else if ($type == 'gallery') {

			DB::table('cp_' . $type . '_item')->where($type . '_id', '=', $id)->delete();

			DB::table('cp_' . $type)->where($type . '_id', '=', $id)->delete();

			DB::table('component')->where('comid', '=', $comid)->delete();
		}

	}

	public function orgChart($id) {

		$items = DB::select('select * from cp_orgchart_item where orgchart_id = ?', [$id]);
		$items = json_decode(json_encode($items), true);
		//echo '<pre>'; print_r($this->parseTree($items)); echo '</pre>';
		return $this->parseTree($items)[0];
	}

	public function findIndex($products, $field, $value) {
		foreach ($products as $key => $product) {
			if ($product[$field] === $value) {
				return $key;
			}

		}
		return false;
	}

	public function fetch($component, $id) {

		if ($component == 'content') {
			$content = DB::table('cp_content')->where('content_id', '=', $id)->first();
			return $content->content_content;
		}
	}

	public function parseTree($items, $root = null) {
		$return = [];
		foreach ($items as $item) {
			if ($item['item_parent'] == $root) {
				$index = $this->findIndex($items, 'orgchart_item_id', $item['orgchart_item_id']);
				unset($items[$index]);
				if (empty($this->parseTree($items, $item['item_id']))) {
					$return[] = [
						'id' => $item['item_id'],
						'name' => $item['item_name'],
						'title' => $item['item_title'],
					];
				} else {
					$return[] = [
						'id' => $item['item_id'],
						'name' => $item['item_name'],
						'title' => $item['item_title'],
						'children' => $this->parseTree($items, $item['item_id']),
					];
				}

			}
		}
		return empty($return) ? [] : $return;
	}

}
