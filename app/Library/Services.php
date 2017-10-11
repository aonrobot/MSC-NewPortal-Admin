<?php
namespace App\Library {

	use App\Employee;
	use App\Post;
	use Config;
	use DB;

	class Services {

		static public function getEmployeeImage($EmpCode) {
			return asset('http://appmetro.metrosystems.co.th/empimages/' . intval($EmpCode) . '.jpg?' . rand(0, 10000));

		}

		//Return Ex. /newportal/uploads/
		static public function getUploadPathFromPID($id) {

			$upload_path = Config::get('newportal.upload_dir');

			$tid = Post::select('tid')->where('pid', $id)->first();

			$upload_path = $upload_path . '/trop/' . $tid['tid'] . '/post/' . $id . '/file/';

			return $upload_path;
		}

		static public function fetchPhonebook($option = 'default') {

			$phonebook = DB::connection('MSCMain')->select("

				SELECT DISTINCT Emp.OrgCode, Emp.EmpCode, Emp.OrgUnitCode, Emp.FirstName, Emp.LastName, Emp.NickName, Emp.FullName,
				 				Emp.FullNameEng, Emp.OrgUnitName, Emp.email, Emp.phone3 EmpPhone,Emp.location EmpLocation,
				 				isnull([LOCATE],'') [LOCATE] ,isnull(EXTNO,'') EXTNO,isnull(REMARK,'') REMARK, Phone.*
				FROM MSCMain.dbo.EmployeeNew Emp left outer join MSCMain.dbo.EmpPhonebook Phone
				ON Emp.EmpCode = Phone.EMPNO and Emp.OrgCode = Phone.COMCOD
				WHERE Emp.WorkingStatus = 1
					  and (Emp.OrgCode  = 'MSC'  or  Emp.OrgCode = 'MID' or  Emp.OrgCode  = 'MCC' or  Emp.OrgCode  = 'MIT' or  Emp.OrgCode  = 'HIS') and Emp.Login <> ''
			");

			$data = [];

			switch ($option) {
			case 'ITS':
				foreach ($phonebook as $pb) {

					$hostname = Employee::where('EmpCode', '=', $pb->EmpCode)->first();

					$data[] = [

						$pb->EmpCode . ' : ' . $pb->FullName . '(' . $pb->FullNameEng . ')',
						$pb->email,
						$pb->EmpPhone,
						$pb->EmpLocation,
						empty($hostname['hostname']) ? 'ยังไม่มีข้อมูล' : '<b style="color:red;">' . $hostname['hostname'] . '</b>',

					];
				}
				break;

			case 'MIS':

				$img_404 = asset('/images/avatar-404.jpg');
				foreach ($phonebook as $pb) {

					if (!Tools::is_avatar_exist($pb->EmpCode)) {
						$data[] = [

							$pb->EmpCode,
							$pb->FullNameEng,
							$pb->email,
							$pb->EmpPhone,
							$pb->OrgCode,
							$pb->OrgUnitName,

						];
					}

				}
				break;

			case 'BUILDING':

				foreach ($phonebook as $pb) {

					$img_url = Services::getEmployeeImage($pb->EmpCode);
					$img_404 = asset('/images/avatar-404.jpg');
					$image = Tools::is_avatar_exist($pb->EmpCode) ? $img_url : $img_404;

					//echo $img_404;

					$data[] = [

						"<div id='div_avatar' style='width:200;height:100;'><a href='" . $image . "' data-toggle='lightbox' data-title='" . $pb->FullNameEng . "'><img id='avatar' src='" . $image . "' class='main-img img-responsive' alt='" . $pb->FullNameEng . "'></a></div>",

						$pb->FirstName . ' ' . $pb->LastName . '<br>(<span style="font-size: 12px">' . $pb->FullNameEng . '</span>)',

						$pb->NickName,
						'<a href="mailto:' . $pb->email . '" target="_top">' . $pb->email . '</a>',
						$pb->EmpPhone,
						$pb->EmpLocation,
						$pb->OrgUnitName,
						$pb->REMARK,

					];
				}
				break;

			default:
				foreach ($phonebook as $pb) {

					$img_url = Services::getEmployeeImage($pb->EmpCode);
					$img_404 = asset('/images/avatar-404.jpg');
					$image = Tools::is_avatar_exist($pb->EmpCode) ? $img_url : $img_404;

					//echo $img_404;

					$data[] = [

						"<div id='div_avatar' style='width:200;height:100;'><a href='" . $image . "' data-toggle='lightbox' data-title='" . $pb->FullNameEng . "'><img id='avatar' src='" . $image . "' class='main-img img-responsive' alt='" . $pb->FullNameEng . "'></a></div>",

						ltrim($pb->FirstName) . ' ' . $pb->LastName . '<br>(<span style="font-size: 12px">' . $pb->FullNameEng . '</span>)',

						$pb->NickName,
						'<a href="mailto:' . $pb->email . '" target="_top">' . $pb->email . '</a>',
						$pb->EmpPhone,
						$pb->EmpLocation,
						$pb->OrgCode,
						substr($pb->OrgUnitCode,0,3) . '-' . $pb->OrgUnitName,

					];
				}
				break;
			}

			$result = ['data' => $data];
			echo json_encode($result);
		}

		static public function fetchEvent() {
			echo '{
					  "monthly": [
					    {
					      "id": 1,
					      "name": "This is a JSON event",
					      "startdate": "2016-12-15",
					      "enddate": "2016-12-18",
					      "starttime": "12:00",
					      "endtime": "2:00",
					      "color": "#FFB128",
					      "url": ""
					    },
					    {
					      "id": 2,
					      "name": "This is a JSON event",
					      "startdate": "2016-11-15",
					      "enddate": "",
					      "starttime": "12:00",
					      "endtime": "2:00",
					      "color": "#EF44EF",
					      "url": ""
					    }
					  ]
				}';
		}

		//Setting Service

		static public function setting_getPostPolicyId() {
			return DB::table('setting')->where('set_type', 'newportal')->where('set_subtype', 'policy')->first()->set_value;
		}
	}
}
