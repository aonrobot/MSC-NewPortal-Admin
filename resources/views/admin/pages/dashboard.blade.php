@extends('admin.admin_template')
@section('content')
{{--*/$per = new App\Library\Permission()/*--}}

<center>
<?php $em_info = Session::get('em_info');
$can_access = ['admin','owner','trop_admin'];

?>
<?php 
	$user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first();
	$can_access = ['admin','owner'];
	
?>

@if(($per::can($can_access)))

 <h1>Admin Newportal</h1>
 <div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
            </div>
            <div class="box-body">	 
    
                <a href="<?=asset('/admin/trop/detail/') ?><?php echo '/'.$tropadmin;?>">
                <div class="col-md-2 text-center">
                    <div class="bg-yellow" style="padding:25px 15px 5px 15px;">
                        <i class="fa fa-file-text-o fa-3x"></i>
                        <h4><p style="word-break: break-all;">Admin Newportal</p></h4>
                    </div>
                </div>
                </a>
                                
            </div>
        </div>
    </div>
</div>
@endif
 <h1>Department </h1>
        <div class="row">
	
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
					
				  
                    </div>
                    <div class="box-body">
					  
					  
					  <?php foreach($trops as $trop){
                        if($trop->trop_status)
						{
							
					  ?>
					 
					   <a href="<?=asset('/admin/trop/detail/') ?><?php echo '/'.$trop->tid;?>">

                        <div class="col-md-2" style="margin-top: 15px;">
                           <div class="bg-yellow" style="padding:25px 15px 5px 15px;">
                                <i class="fa fa-file-text-o fa-3x"></i>
								 <h4><p style="word-break: break-all;">{{$trop->trop_name}}</p></h4>
							</div>
                        </div>
						</a>
 						<?php  }} ?>
                    </div>
                </div>
            </div>
        </div>

 <h1>Meeting Document </h1>
        <div class="row">
    
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                    
                  
                    </div>
                    <div class="box-body">
                      
                      
                      <?php foreach($meets as $meet){
                        if($meet->trop_status)
                        {
                            
                      ?>
                     
                       <a href="<?=asset('/admin/trop/detail/') ?><?php echo '/'.$meet->tid;?>">

                        <div class="col-md-2" style="margin-top: 15px;">
                           <div class="bg-yellow" style="padding:25px 15px 5px 15px;">
                                <i class="fa fa-file-text-o fa-3x"></i>
                                 <h4><p style="word-break: break-all;">{{$meet->trop_name}}</p></h4>
                            </div>
                        </div>
                        </a>
                        <?php  }} ?>
                    </div>
                </div>
            </div>
        </div>



@stop
