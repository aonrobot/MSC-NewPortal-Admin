<!-- Left side column. contains the logo and sidebar -->

{{--*/$name = Session::get('name_trop')/*--}}

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
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">

        <li class="header">{{$name}} Department</li>
        <!-- Optionally, you can add icons to the links -->
        <li ng-class="getClass('/admin')"><a href="{{asset('/admin')}}"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a></li>

        <li ng-class="getClass('/admin/trop/create')">
          <a href="{{asset('/admin/trop/create')}}"><i class="fa fa-magic"></i> <span>Create Department</span></a>
        </li>

	      @if($trop_tid=='0')

        {{--*/ $policy_id = App\Library\Services::setting_getPostPolicyId()/*--}}
        <li ng-class="getClass('/admin/file?pid={{$policy_id}}')">
          <a href="{{asset('/admin/file?pid='.$policy_id)}}"><i class="fa fa-university"></i> <span>Policy Manager</span></a>
        </li>

        <li>
          <a href="{{asset('/admin/calendar')}}"><i class="fa fa-calendar"></i> <span>Calendar Manager</span></a>
        </li>

        <li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/employee/list')}}"><i class="fa fa-user"></i> <span>User</span></a>
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
	      <!--<li ng-class="getClass('/admin/employee/create')">
          <a href="{{asset('/admin/employee/list')}}"><i class="fa fa-link"></i> <span>User Setting</span></a>
        </li>-->
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

	      @if($trop_tid != "")
        <li class="treeview">
          <a href="#"><i class="fa fa-cube"></i> <span><b>{{$name}}</b></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=asset('/admin/trop/detail/')?><?php echo '/' . $trop_tid; ?>"><i class="fa fa-eye"></i> View</a></li>
            @if($trop_tid!=0)  
              <li><a href="<?=asset('/admin/trop/edit/')?><?php echo '/' . $trop_tid; ?>"><i class="fa fa-gears"></i> Setting</a></li>
            @endif
			     <li><a href="{{asset('/admin/category/show')}}"><i class="fa fa-folder"></i> Category</a></li>
			     <li><a href="{{asset('/admin/post')}}"><i class="fa fa-file"></i> Post</a></li>
			     <li><a href="{{asset('/admin/slide/create')}}"><i class="fa fa-image"></i> Slide Gallery</a></li>
			     <li><a href="{{asset('/admin/menu/create')}}"><i class="fa fa-bars"></i> Menu</a></li>
           <li><a href="{{asset('/admin/trop/logout')}}"><i class="fa fa-sign-out"></i> Exit from <b>{{$name}}</b></a></li>
          </ul>
        </li>
  		  @endif  

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>