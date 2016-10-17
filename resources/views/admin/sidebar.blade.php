<!-- Left side column. contains the logo and sidebar -->
<?php $trop_tid = Session::get('trop_id');?>
  <aside class="main-sidebar" ng-controller='sideBarCtrl'>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{App\Library\Services::getEmployeeImage(intval(Session::get('em_info')->EmpCode))}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{  $em_info->FirstNameEng }} <br> {{$em_info->LastNameEng}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li ng-class="getClass('/admin')"><a href="{{asset('/admin')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li ng-class="getClass('/admin/trop/create')">
          <a href="{{asset('/admin/trop/create')}}"><i class="fa fa-link"></i> <span>Trop</span></a>
        </li>
        <li ng-class="getClass('/admin/file')">
          <a href="{{asset('/admin/file')}}"><i class="fa fa-files-o"></i> <span>File Manager</span></a>
        </li>

	      @if($trop_tid=='0')

        <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/employee/create')}}"><i class="fa fa-link"></i> <span>User</span></a>
        </li>
        <!--
 	      <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/category/show')}}"><i class="fa fa-link"></i> <span>Create Category</span></a>
        </li>
	      <li ng-class="getClass('/admin/post/create')">
          <a href="{{asset('/admin/post/create')}}"><i class="fa fa-link"></i> <span>Create Post</span></a>
        </li>
        <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/slide/create')}}"><i class="fa fa-link"></i> <span>Create Slide</span></a>
        </li>
		    <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/menu/create')}}"><i class="fa fa-link"></i> <span>Create Menu</span></a>
        </li>
        -->
		    <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/request')}}"><i class="fa fa-link"></i> <span>Request</span></a>
        </li>
	      <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/employee/list')}}"><i class="fa fa-link"></i> <span>User Setting</span></a>
        </li>
		    <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/role/setting')}}"><i class="fa fa-link"></i> <span>Roles Setting</span></a>
        </li>
        <li>
          <a href="{{asset('/admin/permission/index')}}"><i class="fa fa-link"></i> <span>Permissions Setting</span></a>
        </li>
		    <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/trop/edit/')}}<?php echo '/' . $trop_tid; ?>"><i class="fa fa-link"></i> <span>Newportal Setting</span></a>
        </li>

		    @endif

	    <?php
$name = Session::get('name_trop');
if ($trop_tid != "") {?>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>{{$name}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=asset('/admin/trop/detail/')?><?php echo '/' . $trop_tid; ?>">View</a></li>
          @if($trop_tid!=0)  <li><a href="<?=asset('/admin/trop/edit/')?><?php echo '/' . $trop_tid; ?>">Setting</a></li> @endif
			<li><a href="<?=asset('/admin/category/show')?>">Category</a></li>
			<li><a href="<?=asset('/admin/post')?>">Post</a></li>
			<li><a href="<?=asset('/admin/slide/create')?>">Slide</a></li>
			<li><a href="<?=asset('/admin/menu/create')?>">Menu</a></li>


          </ul>
        </li>
		<li><a href="<?=asset('/admin/trop/logout')?>"><i class="fa fa-sign-out"></i> Trop Out</a></li>
		<?php }?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>