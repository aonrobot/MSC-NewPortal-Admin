@extends('admin.admin_template')
@section('content')
<center>
<?php $em_info = Session::get('em_info');?>
<?php 
	$user = App\Employee::where('EmpCode', '=', $em_info->EmpCode)->first();
	$can_access = ['admin','owner'];
	
?>

@if($user->hasRole($can_access))

 <h1>Trop Newportalxx</h1>
 <div class="row">
	
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                    </div>
                    <div class="box-body">	 
			
					   <a href="<?=asset('/admin/trop/detail/') ?><?php echo '/'.$tropadmin;?>">
                        <div class="col-md-2" style="margin-left: 670px; ">
                           <div class="bg-yellow" style="padding:25px 15px 5px 15px;">
                                <i class="fa fa-file-text-o fa-3x"></i>
								 <h4><p style="word-break: break-all;">Newportal</p></h4>
							</div>
                        </div>
						</a>
										
                    </div>
                </div>
            </div>
        </div>
@endif
 <h1>Trop </h1>
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
{{$user = Auth::user()}}

@role('owner')
    <p>This is visible to users with the admin role. Gets translated to
    \Entrust::role('admin')</p>
@endrole



@stop
