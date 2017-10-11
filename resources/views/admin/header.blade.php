<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="{{asset('/')}}" target="_blank" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>NP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>NewPortal</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{App\Library\Services::getEmployeeImage(intval(Session::get('em_info')->EmpCode))}}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{  $em_info->FirstNameEng }} {{$em_info->LastNameEng}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{App\Library\Services::getEmployeeImage(intval(Session::get('em_info')->EmpCode))}}" class="img-circle" alt="User Image">
                            <p>
                                <b>{{  $em_info->FirstNameEng }} {{$em_info->LastNameEng}} </b><br> {{$em_info->PositionName}}
                                <small>{{$em_info->OrgNameEng}}</small>
                            </p>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
