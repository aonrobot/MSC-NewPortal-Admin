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
					    <th><center></center></th>
                        <th><center>FullName</center></th>
						<th><center>NickName</center></th>
						<th><center>FullNameEng</center></th>
                        <th><center>Tel.</center></th>
                        <th><center></center></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
foreach ($employee as $emp) {
	$em = App\MainEmployee::where('EmpCode', '=', $emp->EmpCode)->first()
	?>
		  {{--*/ $img_url = asset('http://appmsc.metrosystems.co.th/epages/Employeepic/' . intval($emp->EmpCode) . '.jpg') /*--}} {{--*/ $img404_url = asset('images/avatar-404.jpg') /*--}}
                     <tr>

                        <td><center><?php echo $emp->emid ?></td>
				  <td>
                        <a href="{{ App\Library\Tools::is_url_exist($img_url) ? $img_url : $img404_url }}" data-toggle="lightbox" data-title="{{ $em->FullNameEng }}">
                          <img id="avatar" src="{{ App\Library\Tools::is_url_exist($img_url) ? $img_url : $img404_url }}" width="10%">
                        </a>
                  </td>
				   <td><center>{{$em->FullName}}</td>
				         <td><center>{{$em->NickName}}</td>
                        <td><center>{{$em->FullNameEng}}</td>
						<td><center>@foreach($tel as $pb)
						@if($em->EmpCode==$pb->EmpCode)
						{{$pb->EXTNO}}
                        @endif
						@endforeach</center></td>
                        <td><center><a href="<?=asset('/admin/employee/setting/')?><?php echo '/' . $emp->emid; ?>"><button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><i class="fa fa-cogs" aria-hidden="true"></i> setting </button></a></center></td>
                     </tr>
                     <?php }
;?>
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