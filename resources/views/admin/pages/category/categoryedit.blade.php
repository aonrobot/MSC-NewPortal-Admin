@extends('admin.admin_template')
@section('content')
<form action="<?=asset('/admin/category/edit')?>" method="get">
   <input value="<?php  echo $cid;?>" name="idcat" type="hidden" >
   <div class="row metrop-row-content">
      <div class="col-md-12">
	   <h2><i class="fa  fa-edit" aria-hidden="true"></i> Category Edit</h2>
         <h3>Category Name <input value="{{$namecat[0]->cat_name}}" name="catagory_name"  size="20"></h3>
             <ol class="breadcrumb" style="background-color:white" >
            <font color="black">
            <div>
               Post Add 
               <select name="postid[]" class="form-control select2" multiple="multiple"  data-placeholder="Select a State" style="width: 75%;">
                  <?php 
                     error_reporting(E_ALL ^ E_NOTICE);
                     			 foreach($post_option as $post_op){ 	
                     			  $i=0;
                     			 foreach($showpost as $post){
                                  if($post->pid==$post_op->pid)
                     		     {$i=$i+1;} 	
                     			 }
                     			 if($i==0){
                     ?>
                  <option value="<?php echo  $post_op->pid ?>"><?php echo  $post_op->post_name?></option>
                  <?php
                     }  }
                     ?>
               </select>
               <INPUT name="sum" TYPE="submit" VALUE="Update" class="btn btn-success"  >
            </div>
</form>
</ol>
<br>
<form action="<?=asset('/admin/category/delpost')?>" method="get">

<input value="<?php  echo $cid;?>" name="idcat" type="hidden" >
<h2>Post List </h2><label><input type="checkbox" id="checkAll"/> Select all</label>
<div  class="box box-info">
  <div class="box-body">
 <table id="table_category" class="table table-bordered">
 <thead>
<tr>
<th><center>rela_id</center></th>
<th><center>post_name</center></th>
<th><center>post_title</center></th>
<th><center>post_detail</center></th>
<th></th>
</tr>
 </thead>
<tbody>
<?php
   foreach($showpost as $post){
   ?>
   
<tr>
<td><center><input type="checkbox" name="rela_id[]" value="<?php echo $post->cat_rela_id ?>"><?php echo $post->pid?></center></td>
<td><center><?php echo $post->post_name?></center></td>
<td><center><?php echo $post->post_title?></center></td>
<td><center></center><?php echo $post->post_detail?></center></td>
<td><center><a href="<?=asset('/admin/category/delpost1/') ?><?php echo '/'.$post->cat_rela_id;?>"><font color="white">
<button class="btn btn-danger"   type="button" style="height:33px"  onclick="return confirm('Are you sure you want to delete :: <?php echo $post->post_name?> ?')"><span class="glyphicon glyphicon-trash" ></span>
Delete</font></button></a></center></td>

</tr>
<?php };?>
<tbody>
</table>
<font color="white">
<button class="btn btn-danger"  TYPE="submit"  style="height:33px" onclick="return confirm('Are you sure you want to delete select all?')"><span class="glyphicon glyphicon-trash"></span>
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