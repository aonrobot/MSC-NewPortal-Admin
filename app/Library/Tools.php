<?php

namespace App\Library {

	use App\MainEmployeeImage;
	use App\Post;
	use Config;

	class Tools {

		static public function is_defaultType($pid) {

			$post_type = Post::where('pid', $pid)->first()->post_type;

			$default_type = Config::get('newportal.post.default_type');

			if (in_array($post_type, $default_type)) {
				return true;
			} else {
				return false;
			}
		}

		static public function sortPost($posts, $by = 'created_at', $type = 'time', $sort = SORT_DESC) {
			$times = [];
			$word = [];

			switch ($type) {
			case 'time':
				foreach ($posts as $post => $val) {
					$times[$post] = strtotime($val[$by]);
				}
				break;

			case 'word':
				foreach ($posts as $post => $val) {
					$times[$post] = $val[$by];
				}
				break;
			}

			array_multisort($times, $sort, $posts, $sort);

			return $posts;
		}

		static public function postTime($created_time) {

			$timeString = "";

			$created = ['year' => 0, 'month' => 0, 'day' => 0, 'hour' => 0, 'min' => 0, 'sec' => 0];
			$created_time = strtotime($created_time);

			$diff['year'] = date('Y') - date('Y', $created_time);
			$diff['month'] = date('m') - date('m', $created_time);
			$diff['day'] = date('d') - date('d', $created_time);
			$diff['hour'] = date('H') - date('H', $created_time);
			$diff['min'] = date('i') - date('i', $created_time);
			$diff['sec'] = date('s') - date('s', $created_time);

			if ($diff['year'] != 0) {
				$timeString = $diff['year'] . " ปีก่อน.";
			} else if ($diff['month'] != 0) {
				$timeString = $diff['month'] . " เดือนที่แล้ว.";
			} else if ($diff['day'] != 0) {
				$timeString = $diff['day'] . " วันที่แล้ว.";
			} else if ($diff['hour'] != 0) {
				$timeString = $diff['hour'] . " ชั่วโมงที่แล้ว.";
			} else if ($diff['min'] != 0) {
				$timeString = $diff['min'] . " นาทีที่แล้ว.";
			} else if ($diff['sec'] != 0) {
				if ($diff['sec'] <= 5) {
					$timeString = "ไม่กี่วินาที.";
				} else {
					$timeString = $diff['sec'] . " วินาทีที่แล้ว.";
				}

			}

			return $timeString;
		}

		# Set date format
		static public function thaiDate($date, $f) {
			// Full month array
			$f_m = array("01" => "มกราคม",
				"02" => "กุมภาพันธ์",
				"03" => "มีนาคม",
				"04" => "เมษายน",
				"05" => "พฤษภาคม",
				"06" => "มิถุนายน",
				"07" => "กรกฎาคม",
				"08" => "สิงหาคม",
				"09" => "กันยายน",
				"10" => "ตุลาคม",
				"11" => "พฤศจิกายน",
				"12" => "ธันวาคม",
			);

			// Quick month array
			$q_m = array("01" => "ม.ค.",
				"02" => "ก.พ.",
				"03" => "มี.ค.",
				"04" => "เม.ย.",
				"05" => "พ.ค.",
				"06" => "มิ.ย.",
				"07" => "ก.ค.",
				"08" => "ส.ค.",
				"09" => "ก.ย.",
				"10" => "ต.ค.",
				"11" => "พ.ย.",
				"12" => "ธ.ค.",
			);

			if ($f == '1') {
				return ((int) substr($date, 8)) . ' ' .
					$q_m[substr($date, 5, -3)] . ' ' . (substr($date, 2, -6) + 43);
			}

			if ($f == '2') {
				return (int) substr($date, 8) . ' ' .
					$f_m[substr($date, 5, -3)] . ' ' . ((int) substr($date, 0, -6) + 543);
			}

			if ($f == '3') {
				return  (int) substr($date, 8) . ' ' .
					$f_m[substr($date, 5, -3)] . ' พ.ศ. ' . ((int) substr($date, 0, -6) + 543);
			}

		}

		# Set time format
		static public function thaiTime($time, $f) {
			if ($f == '1') {
				return substr($time, 0, -6) . ':' .
				substr($time, 3, -3) . ' น.';
			}

			if ($f == '2') {
				return substr($time, 0, -6) . ':' .
				substr($time, 3, -3) . ':' .
				substr($time, 6);
			}

		}

		static public function is_url_exist($url) {

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_NOBODY, true);
			curl_exec($ch);
			$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			if ($code == 200) {
				$status = true;
			} else {
				$status = false;
			}
			curl_close($ch);
			return $status;

		}

		static public function is_avatar_exist($EmpCode) {

			$count = MainEmployeeImage::where('EmpCode', $EmpCode)->count();

			if ($count <= 0) {
				return false;
			} else {
				return true;
			}

		}

		static public function emid2color($emid) {
			$hexNum = dechex($emid);
			$lenHexNum = strlen($hexNum);
			if ($lenHexNum < 6) {
				for ($i = 0; $i < 6 - $lenHexNum; $i++) {
					$hexNum = $i + 4 . $hexNum;
				}

			} else {
				$hexNum = substr($hexNum, 0, 7);
			}
			return '#' . $hexNum;
		}

		// Function to get the client IP address
		static public function get_client_ip() {
			$ipaddress = '';
			if (getenv('HTTP_CLIENT_IP')) {
				$ipaddress = getenv('HTTP_CLIENT_IP');
			} else if (getenv('HTTP_X_FORWARDED_FOR')) {
				$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
			} else if (getenv('HTTP_X_FORWARDED')) {
				$ipaddress = getenv('HTTP_X_FORWARDED');
			} else if (getenv('HTTP_FORWARDED_FOR')) {
				$ipaddress = getenv('HTTP_FORWARDED_FOR');
			} else if (getenv('HTTP_FORWARDED')) {
				$ipaddress = getenv('HTTP_FORWARDED');
			} else if (getenv('REMOTE_ADDR')) {
				$ipaddress = getenv('REMOTE_ADDR');
			} else {
				$ipaddress = 'UNKNOWN';
			}

			return $ipaddress;
		}

		static public function have_link($str) {
			if (empty($str) || $str == null) {
				return '/images/image-404.png';
			} else {
				return $str;
			}
		}

		////////////////////////////////////////////////////////////////////////////

		//taken from wordpress
		static function utf8_uri_encode($utf8_string, $length = 0) {
			$unicode = '';
			$values = array();
			$num_octets = 1;
			$unicode_length = 0;

			$string_length = strlen($utf8_string);
			for ($i = 0; $i < $string_length; $i++) {

				$value = ord($utf8_string[$i]);

				if ($value < 128) {
					if ($length && ($unicode_length >= $length)) {
						break;
					}

					$unicode .= chr($value);
					$unicode_length++;
				} else {
					if (count($values) == 0) {
						$num_octets = ($value < 224) ? 2 : 3;
					}

					$values[] = $value;

					if ($length && ($unicode_length + ($num_octets * 3)) > $length) {
						break;
					}

					if (count($values) == $num_octets) {
						if ($num_octets == 3) {
							$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
							$unicode_length += 9;
						} else {
							$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
							$unicode_length += 6;
						}

						$values = array();
						$num_octets = 1;
					}
				}
			}

			return $unicode;
		}

		//taken from wordpress
		static function seems_utf8($str) {
			$length = strlen($str);
			for ($i = 0; $i < $length; $i++) {
				$c = ord($str[$i]);
				if ($c < 0x80) {
					$n = 0;
				}
				# 0bbbbbbb
				elseif (($c & 0xE0) == 0xC0) {
					$n = 1;
				}
				# 110bbbbb
				elseif (($c & 0xF0) == 0xE0) {
					$n = 2;
				}
				# 1110bbbb
				elseif (($c & 0xF8) == 0xF0) {
					$n = 3;
				}
				# 11110bbb
				elseif (($c & 0xFC) == 0xF8) {
					$n = 4;
				}
				# 111110bb
				elseif (($c & 0xFE) == 0xFC) {
					$n = 5;
				}
				# 1111110b
				else {
					return false;
				}
				# Does not match any model
				for ($j = 0; $j < $n; $j++) {
					# n bytes matching 10bbbbbb follow ?
					if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80)) {
						return false;
					}

				}
			}
			return true;
		}

		//function sanitize_title_with_dashes taken from wordpress
		static function sanitize($title) {
			$title = strip_tags($title);
			// Preserve escaped octets.
			$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
			// Remove percent signs that are not part of an octet.
			$title = str_replace('%', '', $title);
			// Restore octets.
			$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

			if (seems_utf8($title)) {
				if (function_exists('mb_strtolower')) {
					$title = mb_strtolower($title, 'UTF-8');
				}
				$title = utf8_uri_encode($title, 200);
			}

			$title = strtolower($title);
			$title = preg_replace('/&.+?;/', '', $title); // kill entities
			$title = str_replace('.', '-', $title);
			$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
			$title = preg_replace('/\s+/', '-', $title);
			$title = preg_replace('|-+|', '-', $title);
			$title = trim($title, '-');

			return $title;
		}

		static public function getDataURI($image, $mime = '') {
			return 'data: ' . (function_exists('mime_content_type') ? mime_content_type($image) : $mime) . ';base64,' . base64_encode(file_get_contents($image));

		}

		static public function getEmployeeImage($EmpCode) {
			return asset('http://appmetro.metrosystems.co.th/empimages/' . intval($EmpCode) . '.jpg');

		}

	}
}
