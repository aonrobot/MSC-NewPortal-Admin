<?php
namespace App\Library {

	use App\Library\Tools;
	use App\Statistic;
	use Carbon\Carbon;
	use Session;

	class Statistic_lib {

		static public function FirstOfDay() {

			$ip = Tools::get_client_ip();
			$EmpCode = intval(Session::get('emid'));
			$date_now = Carbon::now();

			$last_stat = Statistic::where('emid', '=', $EmpCode)->where('event', '=', 'First Of Day')->where('ip_address', '=', $ip)->orderBy('created_at', 'desc')->first();

			$last_six_hour = time() - (12 * 60 * 60);

			if (empty($last_stat) or strtotime($last_stat->created_at) <= $last_six_hour) {

				$stat = new Statistic;
				$stat->emid = $EmpCode;
				$stat->event = 'First Of Day';
				$stat->object_id = 0;
				$stat->stat_type = 'Stat Visit';
				$stat->stat_count = empty($last_stat->stat_count) ? 1 : ++$last_stat->stat_count;
				$stat->created_at = $date_now;
				$stat->updated_at = $date_now;
				$stat->ip_address = $ip;
				$stat->save();
			}

		}

		static public function LinkClick($obj_name, $obj_where, $current, $destination, $duration) {

			$ip = Tools::get_client_ip();
			$EmpCode = intval(Session::get('emid'));
			$date_now = Carbon::now();
			$event_name = 'Click : ' . $obj_name . ' | ' . 'At : ' . $obj_where;

			//Get in same event
			$last_count = Statistic::where('emid', '=', $EmpCode)->where('ip_address', '=', $ip)->
				where('event', '=', $event_name)->
				orderBy('created_at', 'asc')->first();

			$stat = new Statistic;
			$stat->emid = $EmpCode;
			$stat->ip_address = $ip;
			$stat->event = 'Click : ' . $obj_name . ' | ' . 'At : ' . $obj_where;
			$stat->object_id = 0;
			$stat->current_url = $current;
			$stat->destination_url = $destination;
			$stat->stat_type = 'Link Click';
			$stat->stat_count = empty($last_count->stat_count) ? 1 : ++$last_count->stat_count;
			$stat->duration = $duration; // milisec
			$stat->created_at = $date_now;
			$stat->updated_at = $date_now;
			$stat->save();
		}
	}
}
