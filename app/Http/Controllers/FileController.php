<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use DB;
use Config;
use App\Library\Tools;
use App\Post;

class FileController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return view('admin.pages.file.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {

		$input = $request->all();

		$pid = $input['pid'];

		$add_type = $input['type'];

		$display_name = $input['display_name'];

		////////////////////////////////////////////////

		$is_default = Tools::is_defaultType($pid); // Check Default Post Type

		$post_type = Post::where('pid', $pid)->first()->post_type;
		


		//$upload_folder = \App\Library\Services::getUploadPathFromPID($pid);

		if(!$is_default){
			$upload_folder = Config::get('newportal.upload_dir') . '/files/' . $post_type . '/';
		}else{
			$upload_folder = \App\Library\Services::getUploadPathFromPID($pid);
		}


		$count_pid = DB::table('post')->where('pid',$pid)->count();

		$db_fn = new db_fn;


		if(!is_null($pid) && $count_pid > 0){

			if ($add_type == 'file') {

				$fileupload = $request->file("fileupload");

				//Upload

				$allow_type = ["jpg", "png", "pdf", "mov", "mp4", "pptx", "rar", "zip", "7z", "doc", "docx", "ppt", "xls", "xlsx"];

				$file_name = $fileupload->getClientOriginalName();

				$tmp_name = $fileupload->getPathName();

				$file_path = $upload_folder . basename($file_name);

				$file_type = pathinfo($file_path, PATHINFO_EXTENSION);

				$can_upload = true;

				if (!in_array(strtolower($file_type), $allow_type)) {
					$can_upload = false;
				}

				if (!$can_upload) {
					echo "Sorry, file type isn't allow.";
				} else {

					$fid = $db_fn->insert_db($pid, $display_name, $file_name, 0, 0, $this->safe_name($file_name), $upload_folder, NULL, 0, NULL);

					if (move_uploaded_file($tmp_name, $upload_folder . $fid . '~' . basename($this->safe_name($file_name)))) {

						return redirect('/admin/file?pid=' . $pid);

					} else {
						echo "fail wa sad jung T^T";
						$db_fn->delete_db($fid);
					}
				}

			} else if ($add_type == 'folder') {

				$fid = $db_fn->insert_db($pid, $display_name, $display_name, 1, 0, $this->safe_name($display_name) . '/', $upload_folder . $this->safe_name($display_name) . '/', NULL, 0, NULL);

				if (mkdir($upload_folder . $fid . '~' . $this->safe_name($display_name))) {

					return redirect('/admin/file?pid=' . $pid);

				} else {
					echo "fail wa sad jung T^T";
				}

			} else if ($add_type == 'link') {

				$link = $input['link'];

				if (strpos($link, 'http://') == FALSE && strpos($link, 'https://') == FALSE) {
					$link = 'http://' . $link;
				}

				$fid = $db_fn->insert_db($pid, $display_name, $display_name, 0, 1, NULL, NULL, $link, 0, NULL);

				if ($file = fopen($upload_folder . $fid . '~link.link', "w")) {
					fwrite($file, $link);
					fclose($file);

					return redirect('/admin/file?pid=' . $pid);
				} else {
					echo "fail wa sad jung T^T";
				}
			}

			else if ($add_type == 'policy') {

				$file_id = $input['file_id'];

				$fid = $db_fn->insert_db($pid, $display_name, NULL, 0, 0, NULL, NULL, NULL, 1, $file_id);

				if ($file = fopen($upload_folder . $fid . '~policy.clone', "w")) {
					fwrite($file, $file_id);
					fclose($file);

					return redirect('/admin/file?pid=' . $pid);
				} else {
					echo "fail wa sad jung T^T";
				}
			}
		}
	}

	public function safe_name($string) {

		$ext = preg_replace('/^.*\./', '', $string);
		$dot_pos = strrpos($string, '.');
		$file_exten = strtolower(substr($string, $dot_pos));

		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		//$string = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $string); // Removes utf8 chars.
		//
		$string = preg_replace('/[^A-Za-z0-9\-\.]/', '', $string); // Removes special chars.

		if (count(explode('.', $string)) == 2 && explode('.', $string)[0] == NULL) {
			$string = strtotime("now") . $file_exten;
		}

		if($string == ""){
			$string = strtotime("now") . $file_exten;
		}

		return preg_replace('/[^A-Za-z0-9\-\.]/', '', $string); // Removes special chars.
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

	public function utf8_urldecode($str) {
		return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
	}

	public function is_hidden($file_name){

		return $file_name[0] == '.' ? true : false;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request) {

		$pid = $request->input('pid');

		$get_dir = $request->input('id');

		$upload_dir = Config::get('newportal.upload_dir');

		$is_default = Tools::is_defaultType($pid); // Check Default Post Type

		$post_type = Post::where('pid', $pid)->first()->post_type;

		//Create List
		if (isset($get_dir)) {
			
			$dir = $get_dir;

		} else {

			if(!$is_default){
				$dir = Config::get('newportal.upload_dir') . '/files/' . $post_type . '/';
			}else{
				$root_dir = \App\Library\Services::getUploadPathFromPID($pid);
				$dir = $root_dir;
			}

		}

		if ($dir == "#" or $dir == "/" or $dir[0] == "/") {

			if(!$is_default){
				$dir = Config::get('newportal.upload_dir') . '/files/' . $post_type . '/';
			}else{
				$root_dir = \App\Library\Services::getUploadPathFromPID($pid);
				$dir = $root_dir;
			}
			
		}


		//Start

		//$dir = iconv("tis-620", "utf-8//IGNORE", $dir); // Fix Thai style
		$dir = $this->utf8_urldecode($dir);

		//echo $dir;

		if (file_exists('wfio://' . $dir)) {

			$files = scandir('wfio://' . $dir);

			natcasesort($files);

			if (count($files) > 2) {

				echo "<ul>";

				//DIR
				foreach ($files as $file) {

					if(is_dir($file) and $file != "." && $file != "..") $filelist .= sprintf('<option value="%s">%s</option>' . PHP_EOL, $file, $file );
						echo "<pre>";
						echo "<li id='" . $dir . $file . "/' class='jstree-closed jstree-drop '>" . $file . "</li>";
       					 echo "</pre>";
				  }
				/*foreach ($files as $file) {

					$path = $dir . $file;

					if (is_dir('wfio://' . $path) && !$this->is_hidden($file)) {

						if(strpos($file, "~") == FALSE){ //Don't have data in database

							//$file = iconv("tis-620", "utf-8", $file);

							echo "<li id='" . $dir . $file . "/' class='jstree-closed jstree-drop '>" . $file . "</li>";
						}
						else{
							
							$file_info = DB::table('files')->where('fid', explode('~', $file)[0])->first();

							$display_name = $file_info->display_name;

							echo "<li id='" . $path . "/' class='jstree-closed jstree-drop '>" . $display_name . "</li>";
						}
						
					}

				}*/

				//FILE
				foreach ($files as $file) {

					$path = $dir . $file;

					if (!is_dir('wfio://' . $path) && !$this->is_hidden($file)) {

						if(strpos($file, "~") == FALSE){ //Don't have data in database

							echo '<li id="' . $path . '" data-jstree=\'{"icon":"glyphicon glyphicon-file","type" : "file"}\'>';

							echo '<a href="' . $path . '">' . $file;

							echo '</a></li>';
						}

						else{

							$file_info = DB::table('files')->where('fid', explode('~', $file)[0])->first();

							$display_name = $file_info->display_name;

							$link = $file_info->link;

							$is_link = $file_info->is_link;

							$is_clone = $file_info->is_clone;

							if ($is_link) {

								echo '<li id="' . $path . '" data-jstree=\'{"icon":"glyphicon glyphicon-link","type" : "link"}\'>';

								echo '<a href="' . $link . '">' . $display_name;

								echo '</a></li>';

							}

							else if ($is_clone) {

								$origin_info = DB::table('files')->where('fid', $file_info->clone_id)->first();

								//print_r($origin_info->file_path);

								if(is_null($origin_info)){

									echo '<li id="' . $path . '" data-jstree=\'{"icon":"glyphicon glyphicon-eye-close","type" : "file"}\'>';

									echo '<a href="' . '/newportal/uploads' . str_replace($upload_dir, "", $path) . '">' . 'The Original File Has Been Deleted.';

									echo '</a></li>';

								}else{

									echo '<li id="' . $path . '" data-jstree=\'{"icon":"glyphicon glyphicon-eye-open","type" : "clone"}\'>';

									echo '<a href="' . '/newportal/uploads' . str_replace($upload_dir, "", $origin_info->file_path . $file_info->clone_id . '~' . $origin_info->file_name) . '">' . $display_name;

									echo '</a></li>';
								}

				
							} else {
								echo '<li id="' . $path . '" data-jstree=\'{"icon":"glyphicon glyphicon-file","type" : "file"}\'>';

								echo '<a href="' . '/newportal/uploads' . str_replace($upload_dir, "", $path) . '">' . $display_name;

								echo '</a></li>';
							}
						}
						

					}
				}

				echo "</ul>";
			}

		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request) {

		$operation = $request->input('operation');

		$pid = $request->input('pid');

		$id = $request->input('id');

		$parent = $request->input('parent');

		$text = $request->input('text');

		$root_dir = \App\Library\Services::getUploadPathFromPID($pid);

		if (isset($operation)) {
			$fn = new fn($root_dir);
			try {
				$rslt = null;
				switch ($operation) {
				case 'rename_node':
					$node = isset($id) && $id !== '#' ? $id : '/';
					$rslt = $fn->rename($node, isset($text) ? $text : ' ');

					return $rslt;

					break;
				case 'delete_node':
					$node = isset($id) && $id !== '#' ? $id : '/';
					$rslt = $fn->remove($node);

					return $rslt;

					break;
				case 'move_node':
					$node = isset($id) && $id !== '#' ? $id : '/';
					$parn = isset($parent) && $parent !== '#' ? $parent : '/';
					$rslt = $fn->move($node, $parn);

					return $rslt;

					break;
				default:
					throw new Exception('Unsupported operation: ' . $_GET['operation']);
					break;
				}
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($rslt);
			} catch (Exception $e) {
				header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
				header('Status:  500 Server Error');
				echo $e->getMessage();
			}
			die();
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

	}
}

class fn {

	protected $upload_folder = null;

	protected $_db = null;

	public function __construct($root_folder) {
		$this->upload_folder = $root_folder;
		$this->_db = new db_fn;
	}

	public function safepath($path) {

		if ($path == '/') {
			return $this->upload_folder;
		}
		return $path;
	}

	public function move($id, $par) {
		$dir = $this->safepath($id);
		$par = $this->safepath($par);

		$par = urldecode($par); //Fix thai charecter in url (urlencode)

		if (substr($dir, -1) == '/') {
			$dir = substr($dir, 0, -1);
		}

		$new = explode('/', $dir);
		$new = array_pop($new);
		$new = $par . $new;

		rename('wfio://' . $dir, 'wfio://' . $new);
		$this->_db->move_db($new); // Update Database

		return array('status' => $par);

	}

	public function remove($id) {
		$dir = $this->safepath($id);

		//Check root
		if ($dir === $this->upload_folder) {
			throw new Exception('Cannot remove root');
		}

		if (is_dir('wfio://' . $dir)) {

			if (substr($dir, -1) != '/') {
				$dir = $dir . '/';
			}

			foreach (array_diff(scandir($dir), array(".", "..")) as $f) {

				$this->remove($dir . $f);

			}

			$this->_db->remove_db($dir); // Update Database
			rmdir('wfio://' . $dir);
		}
		if (is_file('wfio://' . $dir)) {

			$this->_db->remove_db($dir); // Update Database

			unlink('wfio://' . $dir);
		}
		return array('status' => 'OK');
	}

	public function rename($id, $name) {

		$this->_db->rename_db($id, $name);
		return array('status' => 'OK');
	}

}

class db_fn {

	//For Upload File

	public function insert_db($pid, $display_name, $real_name, $is_dir, $is_link, $file_name, $file_path, $link, $is_clone, $clone_id) {

		$id = DB::table('files')->insertGetId([

			'pid' => $pid,
			'display_name' => $display_name,
			'real_name' => $real_name,
			'is_dir' => $is_dir,
			'is_link' => $is_link,
			'file_name' => $file_name,
			'file_path' => $file_path,
			'link' => $link,
			'is_clone' => $is_clone,
			'clone_id' => $clone_id


			]);

		return $id;

	}

	public function delete_db($fid) {

		DB::table('files')->where('fid', $fid)->delete();

	}

	//

	public function realid($id) {

		if(is_dir($id)){
			if (substr($id, -1) == '/') {
				$id = substr($id, 0, -1);
			}
		}

		$id = explode('/', $id);

		$id = array_pop($id);

		$id = explode('~', $id)[0];

		return $id;

	}

	public function rename_db($id, $name) {

		$id = $this->realid($id);

		DB::table('files')->where('fid', $id)->update(['display_name' => $name]);

		echo $id;

	}

	public function move_db($new_path) {

		$path = $new_path;

		echo $path . '<br>';

		if (is_dir('wfio://' . $path)) {

			if (substr($path, -1) != '/') {
				$path = $path . '/';
			}

			foreach (array_diff(scandir($path), array(".", "..")) as $f) {

				$this->move_db($path . $f);

			}

			echo $path . "<br>";

			$id = $this->realid($new_path);

			DB::table('files')->where('fid', $id)->update(['file_path' => $path]);

		}

		if (is_file('wfio://' . $path)) {

			$path = explode('/', $path);
			array_pop($path);
			$path = implode('/', $path) . '/';

			echo 'file : ' . $path . "<br>";

			$id = $this->realid($new_path);

			DB::table('files')->where('fid', $id)->update(['file_path' => $path]);

		}

	}

	public function remove_db($id) {

		$id = $this->realid($id);

		DB::table('files')->where('fid', $id)->delete();

	}
}
