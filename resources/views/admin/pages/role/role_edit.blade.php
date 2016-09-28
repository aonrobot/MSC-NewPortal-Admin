@extends('admin.admin_template')
@section('content')
<form action="<?=asset('/admin/role/edit')?>" method="get">
   <div class="row metrop-row-content">
      <div class="col-md-12">
	   <h2><i class="fa  fa-edit" aria-hidden="true"></i> Role Edit</h2>

             <ol class="breadcrumb" style="background-color:white" >
            <font color="black">
            <div>
                Permissions Add 
               <select name="perid[]" class="form-control select2" multiple="multiple"  data-placeholder="Select a State" style="width: 75%;">
                  <?php 
                     error_reporting(E_ALL ^ E_NOTICE);
                     			 foreach($select_per as $per){ 	
                     			  $i=0;
                     			 foreach($show_per_role as $per_role){
                                  if($per->id==$per_role->permission_id)
                     		     {$i=$i+1;} 	
                     			 }
                     			 if($i==0){
                     ?>
                  <option value="<?php echo  $per->id ?>"><?php echo  $per->name?></option>
                  <?php
                     }  }
                     ?>
               </select>
               <INPUT name="sum" TYPE="submit" VALUE="Update" class="btn btn-success"  >
            </div>
			<input value="<?php  echo $role_id;?>" name="idrole" type="hidden" >
</form>
</ol>
<br>
<form action="<?=asset('/admin/role/delPermissions')?>" method="get">

<input value="<?php  echo $role_id;?>" name="idrole" type="hidden" >
<h2>Control List </h2><label><input type="checkbox" id="checkAll"/> Select all</label>
<div  class="box box-info">
  <div class="box-body">
 <table id="table_category" class="table table-bordered">
 <thead>
<tr>
<th><center>Id</center></th>
<th><center>Name</center></th>
<th><center>Display</center></th>
<th><center>Description</center></th>
<th></th>
</tr>
 </thead>
<tbody>
<?php
   foreach($show_per_role as $show){
   ?>
   
<tr>
<td><center><input type="checkbox" name="rela_id[]" value="<?php echo $show->id ?>"><?php echo $show->id?></center></td>
<td><center><?php echo $show->name?></center></td>
<td><center><?php echo $show->display_name?></center></td>
<td><center><?php echo $show->description?></center></td>
<td><center><a href="<?=asset('/admin/category/delpost1/') ?><?php echo '/'.$show->name;?>"><font color="white">
<button class="btn btn-danger"   type="button" style="height:33px"  onclick="return confirm('Are you sure you want to delete :: <?php echo $show->name?> ?')"><span class="glyphicon glyphicon-trash" ></span>
Delete</font></button></a></center></td>

</tr>
<?php };?>
<tbody>
</table>
<font color="white">
<button class="btn btn-danger"  TYPE="submit"  style="height:33px" onclick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span>
Delete</font></button>

</div>
</div>
<script>
   $("#checkAll").change(function () {
       $("input:checkbox").prop('checked', $(this).prop("checked"));
   });
</script>
<script>
   $(function () {
     $("#table_category").DataTable();

   });
</script>
</div>
</div>
</form>
@stop