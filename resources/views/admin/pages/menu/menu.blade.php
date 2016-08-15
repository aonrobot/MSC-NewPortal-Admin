@extends('admin.admin_template')
@section('content')
        <div class="row metrop-row-content">
			<form action="<?=asset('/admin/menu/insert')?>" method="get">
            <div class="col-md-8">
                <h1><i class="fa fa-newspaper-o" aria-hidden="true"></i> Create Menu</h1>
                <ol class="breadcrumb">

                    <li class="active"><font color="black">Menu Name <input value="" name="name1"> 
    Title			
    <input value="" name="title"> 	
	Type <select name="type1">
    <option>template</option>
    <option>normal</option>
    <option>trop</option>
  </select>
  Trop
 <select name="trop">
  <?php
	foreach($trops as $trops1){
		
	
?> 
    <option value="<?php echo $trops1->tid ?>"><?php echo  $trops1->trop_Name ?></option>
		<?php }
	?>
	
  </select>
  <INPUT class="button4" TYPE="submit" VALUE="Create"></li>
                </ol>
                <style>
  table {
      border-collapse: collapse;
      width: 100%;
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
  <body>
  <br>
  <h2>List Menu</h2>
  <table>
    <tr>
      <th><center>mid</th>
      <th><center>menu_name</th>
	  <th><center>menu_title</th>
	  <th><center>menu_type</th>
      <th><center>trop_name</th>
      <th><center></th>
    </tr>
	<?php
	foreach($menu0 as $menu0){
?>
    <tr>
      <td><center><?php echo $menu0->mid?><center></td>
	  <td><center><?php echo $menu0->menu_name?></center></td>	
	  <td><center><?php echo $menu0->menu_title?></center></td>
	  <td><center><?php echo $menu0->menu_type?></td>
	  <td><center> -- </td>
	  
		<td><center> <a href="<?=asset('/admin/menu/default/') ?><?php echo '/'.$menu0->mid;?>"> @if($menu0->menu_type == 'template')  Default /   @elseif ($menu0->menu_type == 'templatedefault')
			<font size="3" color="green"><span class="glyphicon glyphicon-ok"> @endif</a>
	  
  
	 <a href="<?=asset('/admin/menu/edit/') ?><?php echo '/'.$menu0->mid;?>">  Edit /</a> <a href="<?=asset('/admin/menu/del/') ?><?php echo '/'.$menu0->mid;?>">Delete</a></center></td>
    </tr>

	<?php };?>
	  <?php
foreach($menu1 as $menu){
?>
    <tr>
      <td><center><?php echo $menu->mid?><center></td>
	  <td><center><?php echo $menu->menu_name?></center></td>
	  <td><center><?php echo $menu->menu_title?></center></td>	
	  <td><center><?php echo $menu->menu_type?></td>
	  <td><center><?php echo $menu->trop_name?></td>
      <td><center>	 <a href="<?=asset('/admin/menu/edit/') ?><?php echo '/'.$menu->mid;?>"> Edit /</a> <a href="<?=asset('/admin/menu/del/') ?><?php echo '/'.$menu->mid;?>">Delete</a></center></td>
    </tr>
	<?php };?>
	  


  </table>
  </form>
        </div>
        </div>
        <!-- /.row -->
		
	@stop

