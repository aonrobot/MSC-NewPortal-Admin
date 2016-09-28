@extends('admin.admin_template')
@section('content')
<?php $trop_tid = Session::get('trop_id');?>
<form action="<?=asset('/admin/slide/insert')?>" method="get">
<div class="row metrop-row-content">
      <div class="col-md-11">
         <h3><i class="fa fa-calendar-o" aria-hidden="true"></i> Create Slide</h3>
         <ol class="breadcrumb"  style="background-color:white">
            <li class="active">
               <font color="black">
			   Slide Name <input value="" name="Slide_name"> 
			   Slide Speed <input value="" name="Slide_speed"> 
               Slide Delay <input value="" name="Slide_delay">             
               <INPUT class="btn btn-success" TYPE="submit" VALUE="Create" style="height:30px" onclick="return confirm('Are you sure you want to create slide?')">
			   </font>
            </li>
         </ol>
       <div  class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Slide List</h3>
            </div>
        <div  class="box-body">
            <table id="slide" class="table table-bordered table-hover">
			<thead>
               <tr>
			   <th><center>slide_id</center></th>
			   <th><center>trop_name</center></th>
               <th><center>slide_name</center></th>
               <th><center>slide_type</center></th>
			   <th><center>slide_speed</center></th>
			   <th><center>slide_delay</center></th>
               <th><center></th>
               </tr>
			 </thead>
		    <tbody>
			  @if($trop_tid=='0')
               <?php
                  foreach($slide_show as $slide_all){
                  ?>
				
				<tr>
			   <td><center><?php echo $slide_all->slide_id?></td>
			   <td><center><?php echo $slide_all->trop_name?></</td>
               <td><center><?php echo $slide_all->slide_name?></</td>
               <td><center><?php echo $slide_all->slide_type?></td>
			   <td><center><?php echo $slide_all->slide_speed?></td>
			   <td><center><?php echo $slide_all->slide_delay?></td>
               <td>
                     <center> 
					 
					 
                     <a href="<?=asset('/admin/slide/edit/') ?><?php echo '/'.$slide_all->slide_id;?>">
					 <button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><span class="glyphicon glyphicon-pencil"></span>  Edit </button></a> 
					 
					 <a href="<?=asset('/admin/slide/del/') ?><?php echo '/'.$slide_all->slide_id;?>">   
					 <button class="btn btn-danger" type="button" style="height:33px"onclick="return confirm('Are you sure you want to Delete :: <?php echo $slide_all->slide_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
                    
               </td>
               </tr>
               <?php };?>
			   @else
				    <?php
                  foreach($slide_show as $slide_all){
                  ?>
				   @if($trop_tid==$slide_all->tid)
				
				<tr>
			   <td><center><?php echo $slide_all->slide_id?></td>
			   <td><center><?php echo $slide_all->trop_name?></</td>
               <td><center><?php echo $slide_all->slide_name?></</td>
               <td><center><?php echo $slide_all->slide_type?></td>
			   <td><center><?php echo $slide_all->slide_speed?></td>
			   <td><center><?php echo $slide_all->slide_delay?></td>
               <td>
                     <center> 
					 
					 
                     <a href="<?=asset('/admin/slide/edit/') ?><?php echo '/'.$slide_all->slide_id;?>">
					 <button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><span class="glyphicon glyphicon-pencil"></span>  Edit </button></a> 
					 
					 <a href="<?=asset('/admin/slide/del/') ?><?php echo '/'.$slide_all->slide_id;?>">   
					 <button class="btn btn-danger" type="button" style="height:33px"onclick="return confirm('Are you sure you want to Delete :: <?php echo $slide_all->slide_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
                    
               </td>
               </tr>
			   @endif
               <?php };?>
			   @endif
			   
			</tbody> 
            </table>
			</div>
			</div> 
			@if($trop_tid=='0')
			  <div  class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Slide Newportal</h3>
            </div>
        <div  class="box-body">
            <table id="slide_admin" class="table table-bordered table-hover">
			<thead>
               <tr>
			   <th><center>slide_id</center></th>
               <th><center>slide_name</center></th>
               <th><center>slide_type</center></th>
			   <th><center>slide_speed</center></th>
			   <th><center>slide_delay</center></th>
               <th><center></th>
               </tr>
			 </thead>
		    <tbody>
               <?php
                  foreach($slide_newportal as $newportal){
                  ?>
				 
			   <td><center><?php echo $newportal->slide_id?></td>
               <td><center><?php echo $newportal->slide_name?></</td>
               <td><center><?php echo $newportal->slide_type?></td>
			   <td><center><?php echo $newportal->slide_speed?></td>
			   <td><center><?php echo $newportal->slide_delay?></td>
               <td>
                     <center> 
                     <a href="<?=asset('/admin/slide/edit/') ?><?php echo '/'.$newportal->slide_id;?>">
					 <button class="btn btn-default btn-sm" style="background-color:white;height:33px"  type="button"><span class="glyphicon glyphicon-pencil"></span>  Edit </button></a> 
					 <a href="<?=asset('/admin/slide/del/') ?><?php echo '/'.$newportal->slide_id;?>">   
					 <button class="btn btn-danger" type="button" style="height:33px"onclick="return confirm('Are you sure you want to Delete :: <?php echo $newportal->slide_name?> ?')"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
               </td>
               </tr>
               <?php };?>
			</tbody> 
            </table>
			</div>
			</div> 
			@endif
   </div>
</div>
</form>
<script>
 $('#tropselect').hide('500');
 $('#typeselect').click(function(){
   			$(this).val();
   			if($(this).val()=="trop"){
   	     $('#tropselect').show('500');
   			}
   			else
   			{
   				$('#tropselect').hide('500');
   			}
   		});
   	
</script>
<script>
  $(function () {
    $("#slide").DataTable();
    $("#slide_admin").DataTable();
  });
</script>

<!-- /.row -->
@stop