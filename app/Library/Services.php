<?php
namespace App\Library {

	class Services {

		static public function getEmployeeImage($EmpCode) {
			return asset('http://appmetro.metrosystems.co.th/empimages/' . intval($EmpCode) . '.jpg');

		}
	}
}
