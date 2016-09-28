@extends('admin.admin_template')
@section('content')
<?php $trop_tid = Session::get('trop_id');?>
<form action="<?=asset('/admin/category/insert')?>" method="get">
   <div class="row">
      <div class="col-md-12">
	  <h2><i class="fa fa-clone" aria-hidden="true"></i> Create Category</h2>
      
		 
        <ol class="breadcrumb" style="background-color:white">
		 <font color="black">
            <li class="active"> 
			  
			  
               Category Name <input value="" name="category"  maxlength="20" />   
             
			   
			   
               <!-- <select name="trop" id="trop_select">
                  <?php
                     foreach($trops as $trops1){
                        ?>
                  <option value="<?php echo $trops1->tid ?>"><?php echo  $trops1->trop_Name ?></option>
                  <?php }
                     ?>
               </select> -->
			 
               <INPUT class="btn btn-success" TYPE="submit" VALUE="Create" style="height:30px" onclick="return confirm('Are you sure you want to create category?')"/>
			
             </li>
			</font>
           </ol>
	   
         <br>

		 
     <div  class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Category Trop</h3>
            </div>
			  <div class="box-body">
         <table id="category" class="table table-bordered">
		  <thead>
            <tr class="w3-blue">
               <th><center>Id_category</th>
               <th><center>Category_Name</th>
               <th><center>Trop_Name</th>
               <th><center>Type</th>
               <th></th>
            </tr>
	      </thead>
	       <tbody>
		   @if($trop_tid=='0')
		   <?php 
			foreach($ca2 as $cat2){
				   
               ?>  
			   
            <tr>
               <td><center><?php echo $cat2->catid?></td>
               <td><center><?php echo $cat2->cat_name?></center></td>      
               <td><center><?php echo $cat2->trop_name?></center></td>
               <td> <center><?php echo $cat2->cat_type?></td><td>
                  <center>  
				  <a href="<?=asset('/admin/category/showedit/') ?><?php echo '/'.$cat2->catid;?>">
				  <button class="btn btn-default"  type="button" style="background-color:white;height:33px"><span class="glyphicon glyphicon-pencil"></span>
				 edit 
				  </button>
				  </a>
				  <a href="<?=asset('/admin/category/del/') ?><?php echo '/'.$cat2->catid;?>">
				  <button class="btn btn-danger"   type="button" style="height:33px" onclick="return confirm('Are you sure you want to Delete :: <?php echo $cat2->cat_name?> ?')"><span class="glyphicon glyphicon-trash"></span>
				  <font color="white"> Delete</font>
				  </button>
				  </a>
				  </center>
               </td>
            </tr>			
		   <?php  };?>
		   @else
            <?php 
			foreach($ca2 as $cat2){
				   if($trop_tid==$cat2->tid){
               ?>  
			   
            <tr>
               <td><center><?php echo $cat2->catid?></td>
               <td><center><?php echo $cat2->cat_name?></center></td>      
               <td><center><?php echo $cat2->trop_name?></center></td>
               <td> <center><?php echo $cat2->cat_type?></td><td>
                  <center>  
				  <a href="<?=asset('/admin/category/showedit/') ?><?php echo '/'.$cat2->catid;?>">
				  <button class="btn btn-default"  type="button" style="background-color:white;height:33px"><span class="glyphicon glyphicon-pencil"></span>
				 edit 
				  </button>
				  </a>
				  <a href="<?=asset('/admin/category/del/') ?><?php echo '/'.$cat2->catid;?>">
				  <button class="btn btn-danger"   type="button" style="height:33px" onclick="return confirm('Are you sure you want to Delete :: <?php echo $cat2->cat_name?> ?')"><span class="glyphicon glyphicon-trash"></span>
				  <font color="white"> Delete</font>
				  </button>
				  </a>
				  </center>
               </td>
            </tr>			
				   <?php } };?>
				   @endif
	       </tbody>
		</table>
			</div>
          </div>
			@if($trop_tid=='0')
	     <div  class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Category Newportal</h3>
            </div>
			  <div class="box-body">
         <table id="category_admin" class="table table-bordered">
		  <thead>
            <tr class="w3-blue">
               <th><center>Id_category</th>
               <th><center>Category_Name</th>
               <th><center>Type</th>
               <th><center></th>
            </tr>
		  </thead>
			<tbody>
            <?php 
               foreach($catad as $catadmin){
               ?>  
            <tr>
               <td><center><?php echo $catadmin->catid?></td>
               <td><center><?php echo $catadmin->cat_name?></center></td>
               <td><center><?php echo $catadmin->cat_type?></td>
               <td><center>
			     <center>   
				 <a href="<?=asset('/admin/category/showedit/') ?><?php echo '/'.$catadmin->catid;?>">
				  <button class="btn btn-default"  type="button" style="background-color:white;height:33px"><span class="glyphicon glyphicon-pencil"></span>
				edit 
				  </button>
				  </a>
				  
				  <a href="<?=asset('/admin/category/del/') ?><?php echo '/'.$catadmin->catid;?>"><button class="btn btn-danger"   type="button" style="height:33px" onclick="return confirm('Are you sure you want to Delete :: <?php echo $catadmin->cat_name?> ?')"><span class="glyphicon glyphicon-trash"></span><font color="white"> Delete</font></button></a>
				  
				  </center></a></td>
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

<!-- /.row -->
<script>
   $('#trop_select').hide('500');
   		$('#type_select').click(function(){
   			$(this).val();
   			if($(this).val()=="administrator"){
   	     $('#trop_select').hide('500');
   			}
   			else
   			{
   				$('#trop_select').show('500');
   			}
   		});
   
    
    
     
</script>
<script>
  $(function () {
    $("#category").DataTable();
    $("#category_admin").DataTable();
  });
</script>
@stop
