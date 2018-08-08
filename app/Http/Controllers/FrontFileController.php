<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Library\Tools;

use App\Library\Services;

use App\Post;

use DB;

use Config;

class FrontFileController extends Controller
{

	function utf8_urldecode($str) {
		return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
	}

	public function is_hidden($file_name){

		return $file_name[0] == '.' ? true : false;
	}

	public function make_file_link($str){

		$upload_dir = Config::get('newportal.upload_dir'); // D:\MSCNewPortal\public/uploads

		$root_url = Config::get('newportal.root_url'); // newportal

		$upload_folder = Config::get('newportal.upload_folder'); // uploads

		$str = str_replace($upload_dir, '', $str);

		return $root_url . $upload_folder . $str;
	}

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request) {

		$pid = $request->input('pid');

		$dir = $request->input('dir');

		////////////////////////////////////////////////////////////////////

		$is_default = Tools::is_defaultType($pid); // Check Default Post Type

		$post_type = Post::where('pid', $pid)->first()->post_type;

		//$root = \App\Library\Services::getUploadPathFromPID($pid);

		if(!$is_default){
			$root = Config::get('newportal.upload_dir') . '/files/' . $post_type . '/';
		}else{
			$root = Services::getUploadPathFromPID($pid);
		}

		if (isset($dir)) {
			$dir = $dir;

			if ($dir == "#" or $dir == "/" or $dir[0] == "/") {
				$dir = "";
			}
		} else {
			$dir = "";
		}

		$dir = $this->utf8_urldecode($dir);

		if (file_exists('wfio://' . $root . $dir)) {

			$files = scandir('wfio://' . $root . $dir);

			natcasesort($files);
			if (count($files) > 2) {

				echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";

				// All dirs
				foreach ($files as $file) {
					$file = urldecode($file);

					if (file_exists('wfio://' . $root . $dir . $file) && !$this->is_hidden($file) && is_dir('wfio://' . $root . $dir . $file)) {

						if(strpos($file, "~") == FALSE){

							echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . $dir . $file . "/\">" . $file . "</a></li>";
							
						}else{

							$file_info = DB::table('files')->where('fid', explode('~', $file)[0])->first();

							$display_name = $file_info->display_name;

							echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . $dir . $file . "/\">" . $display_name . "</a></li>";
						}
					}	
					
				}

				// All files
				foreach ($files as $file) {

					if (file_exists('wfio://' . $root . $dir . $file) && !$this->is_hidden($file) && !is_dir('wfio://' . $root . $dir . $file)) {

						$ext = preg_replace('/^.*\./', '', $file);
						$dot_pos = strrpos($file, '.');
						$file_exten = substr($file, $dot_pos);

						if(strpos($file, "~") == FALSE){

							if ($file_exten == '.pdf') {
								echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . '/newportal/plugins/pdfjs/web/viewer.html?file=' . $this->make_file_link($root . $dir . $file) . "\">" . $file . "</a></li>";
							} else {
								echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . $this->make_file_link($root . $dir . $file) . "\">" . $file . "</a></li>";
							}

						}else{

							$file_info = DB::table('files')->where('fid', explode('~', $file)[0])->first();

							$display_name = $file_info->display_name;

							$link = $file_info->link;

							$is_link = $file_info->is_link;

							$is_clone = $file_info->is_clone;

							if ($is_link) {

								echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . $link . "\">" . $display_name . "</a></li>";

							}

							else if ($is_clone) {

								$origin_info = DB::table('files')->where('fid', $file_info->clone_id)->first();

								if(!is_null($origin_info)){

									if ($file_exten == '.pdf') {
										echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . '/newportal/plugins/pdfjs/web/viewer.html?file=' . $this->make_file_link($origin_info->file_path . $file_info->clone_id . '~' . $origin_info->file_name) . "\">" . $display_name . "</a></li>";
									} else {
										echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . $this->make_file_link($origin_info->file_path . $file_info->clone_id . '~' . $origin_info->file_name) . "\">" . $display_name . "</a></li>";
									}
								}

								

							} else {
								
								if ($file_exten == '.pdf') {
									echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . '/newportal/plugins/pdfjs/web/viewer.html?file=' . $this->make_file_link($root . $dir . $file) . "\">" . $display_name . "</a></li>";
								} else {
									echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . $this->make_file_link($root . $dir . $file) . "\">" . $display_name . "</a></li>";
								}
							}


						}
						

					}
				}

				echo "</ul>";
			}
		}
	}
}
