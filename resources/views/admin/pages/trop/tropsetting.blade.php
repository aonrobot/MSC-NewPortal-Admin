@extends('admin.admin_template')
@section('content')
        <div class="row">
            <div class="col-md-15">
                <h1><i class="fa fa-newspaper-o" aria-hidden="true"></i> <?php echo $detail1[0]->trop_Name;?></h1>
                <hr>
				<br>
				<br>
				<br>
				<br>
                <br>
				

<div class="styled-select black rounded"><center>Menu Template Setting
<select name="template">
  <?php
 foreach($menu1 as $menu1){
?>
    <option value="<?php echo $menu1->menu_name; ?>"><?php echo  $menu1->menu_name; ?></option>
	<?php };
	?>
	  <?php
 foreach($menu2 as $menu2){
?>
    <option value="<?php echo $menu2->menu_name; ?>"><?php echo  $menu2->menu_name; ?></option>
	<?php };
	?>
  </select>



  </center>
</div>

		
				<br>
				<br>
				<br>
				<br>
				<div> <center><INPUT class="button4" TYPE="submit" VALUE="summit"></center></div>
                <br>
</div>

        </div>
        <!-- /.row -->
@stop
  
 