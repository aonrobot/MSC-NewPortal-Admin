<?php $em_info = Session::get('em_info');?>
<?php $user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first();?>