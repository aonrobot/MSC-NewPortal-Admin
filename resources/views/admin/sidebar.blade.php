<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" ng-controller='sideBarCtrl'>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=asset('dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
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
        <li ng-class="getClass('/admin')"><a href="<?=asset('/admin')?>"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
		<li ng-class="getClass('/admin/trop/create')"><a href="<?=asset('/admin/trop/create')?>"><i class="fa fa-link"></i> <span>Create Trop</span></a></li>
        <li ng-class="getClass('/admin/employee/create')"><a href="<?=asset('/admin/employee/create')?>"><i class="fa fa-link"></i> <span>Create User</span></a></li>
		<li ng-class="getClass('/admin/employee/create')"><a href="<?=asset('/admin/category/show')?>"><i class="fa fa-link"></i> <span>Create Category</span></a></li>      
	    <li ng-class="getClass('/admin/post/create')"><a href="<?=asset('/admin/post/create')?>"><i class="fa fa-link"></i> <span>Create Post</span></a></li>
		<li ng-class="getClass('/admin/employee/create')"><a href="<?=asset('/admin/menu/create')?>"><i class="fa fa-link"></i> <span>Create Menu</span></a></li>
		<li ng-class="getClass('/admin/employee/create')"><a href="<?=asset('/admin/request')?>"><i class="fa fa-link"></i> <span>Request</span></a></li>
	
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>