@extends('admin.admin_template')
@section('content')
	<form action="<?=asset('/admin/trop/insert')?>" method="get">
 <div class="row metrop-row-content">
            <div class="col-md-8">
                <h1><i class="fa fa-newspaper-o" aria-hidden="true"></i> Create Trop</h1>
                <ol class="breadcrumb">

                    <li class="active"><font color="black">Trop Name <input value="" name="trop"  maxlength="20">  <INPUT class="button4" TYPE="submit" VALUE="Create"></li>
                </ol>
 
  </head>
  <body>
  <br>
  <h2>List Trop</h2>
  <table class="table table-bordered">
    <tr>
      <th><center>Id_Trop</th>
      <th><center>Name</th>
	  <th><center>Type</th>
      <th><center>Status</th>
      <th><center></th>
    </tr>
	  <?php
foreach($trops as $trop){
?>
    <tr>
      <td><center><?php echo $trop->tid?><center></td>
	  <td><center><?php echo $trop->trop_name?></center></td></td>
	  <td><center><?php echo $trop->trop_type?></td>
	  <td><center><?php  if(!$trop->trop_status){?><font size="3" color="red"><span class="glyphicon glyphicon-remove"></span>
      <?php }if($trop->trop_status){?><a href="<?=asset('/settrop/$trop->tid')?>"><font size="3" color="green"><span class="glyphicon glyphicon-ok"></a> <?php } ?></td></font>
      <td><center><a href="<?=asset('/admin/trop/setting/') ?><?php echo '/'.$trop->tid;?>"> Setting /</a> <a href="<?=asset('/admin/trop/edit/') ?><?php echo '/'.$trop->tid;?>"> Edit /</a> <a href="<?=asset('/admin/trop/del/') ?><?php echo '/'.$trop->tid;?>">Delete</a></center></td>
    </tr>
	<?php };?>

  </table>
  </form>
        </div>
        </div>
@stop