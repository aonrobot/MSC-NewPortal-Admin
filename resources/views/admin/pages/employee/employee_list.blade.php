@extends('admin.admin_template')
@section('content')

<form action="<?=asset('/admin/trop/insert')?>" method="get">
<h3><i class="fa fa-user" aria-hidden="true" ></i> User List</h3>
  <div class="row metrop-row-content">
      <div class="col-md-12">
         <div class="box box-info">

            <div class="box-body">
               <table id="employee_data" class="table table-bordered">
                  <thead>
                     <tr>
						      <th><center>ID</center></th>
                        <th><center>Login</center></th>
						      <th><center>NickName</center></th>
						      <th><center>FullNameEng</center></th>
                        <th><center></center></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        foreach ($employee as $emp) {
                        $em = App\MainEmployee::where('EmpCode', $emp->EmpCode)->first();
	                  ?>
                     <tr>

                        <td>{{$emp->EmpCode}}</td>
      				      <td>{{$emp->Login}}</td>
      				      <td>{{$em['NickName']}}</td>
                        <td>{{$em['FullNameEng']}} ({{$em['FullName']}})</td>
                        <td><center><a href="{{asset('/admin/employee/setting/')}}<?php echo '/' . $emp->emid; ?>"><button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><i class="fa fa-cogs" aria-hidden="true"></i> setting </button></a></center></td>
                     </tr>
                     <?php };?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</form>
<script>
   $(function () {
     $("#employee_data").DataTable();

   });
</script>
@stop