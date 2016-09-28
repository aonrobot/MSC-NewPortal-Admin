<?php
namespace App\Library {

	class Tools {

		static public function sortPost($posts) {
			$times = [];
			foreach ($posts as $post => $val) {
				$times[$post] = strtotime($val['created_at']);
			}
			array_multisort($times, SORT_DESC, $posts, SORT_DESC);

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
				$timeString = $diff['month'] . " วันที่แล้ว.";
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
	}
}
