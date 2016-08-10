@extends('admin.admin_template')
@section('content')

        <div class="row metrop-row-content">
            <div class="col-md-9">
                <h1><i class="fa fa-newspaper-o" aria-hidden="true"></i> Trop Edit</h1>
				<hr>
                <ol class="breadcrumb">

                    <li class="active"><font color="black">Trop Name <input value="<?php echo $detail1[0]->trop_name;?>" name="trop1"> Type <input value="<?php echo $detail1[0]->trop_type;?>" name="type1"> Slug <select name="slug">
 <option value="5-10" selected="selected">Normal</option>
 <option value="11-15"></option>


 </select> Status <select name="status">
 <option value="0" selected="selected">Active</option>
 <option value="11-15">2</option>

 </select></font> </li>
                </ol>
</div>
</div>

                <style>

  table {
      border-collapse: collapse;
      width: 50%;
  }

  th, td {
      text-align: left;
      padding: 8px;
  }

  tr:nth-child(even){background-color: #f2f2f2}

  th {
      background-color: #4CAF50;
      color: white;
  }
  </style>
  </head>

  <div class="row" style="margin-Top:20px;">
    <div class="col-md-2">
 Slide Setting 
 <select name="Slide1">
 <option value="5-10" selected="selected">Normal -  1</option>
 <option value="11-15"></option>
</select>	
</div>
  <div class="col-md-2">
Menu Setting
<select name="menu">
  <?php
	foreach($menu1 as $menu1){
?>
    <option value="<?php echo $menu1->mid ?>"><?php echo  $menu1->menu_name ?></option>
	<?php }
	?>
  </select>
</div>
</div>



			


<div class="row" style="margin-Top:20px;">
    <div class="col-md-12">
Admin Assistant List
			  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 15%;">
<?php 
foreach($employee as $employee){
?>
                  <option><?php echo  $employee->emid ?></option>
<?php 
}
?>
                </select> <INPUT class="button4" TYPE="submit" VALUE="Add Admin">
</div>
</div>
<input value="<?php  echo $detail1[0]->tid;?>" name="idtrop" type="hidden">
<div class="row" style="margin-Top:20px;">
    <div class="col-md-12">
	
	
	
	


</div>
</div>
 <br>


  <table>

    <tr>
      <th><center>Em_Id</th>
      <th><center>Name</th>
	  <th><center>Status</th>
	 
      
    </tr>
	  <?php

?>
    <tr>
      <td><center><center></td>
	  <td><center></center></td></td>
	  <td><center></td>
	
	
    </tr>

	<?php ?>



  </table>
  </form>

                <hr >
<INPUT class="button4" TYPE="submit" VALUE="update">
                     


            </div>

        </div>

		@stop

  