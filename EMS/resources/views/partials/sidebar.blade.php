    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link">
        <img src="{{asset('dist/img/logo.svg')}}" alt="Genuity_Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-bolder">EMS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if (!is_null(Auth::user()->employeeInfo->image) && !file_exists(public_path().'/EmployeePhoto'.Auth::user()->employeeInfo->image))
            <img src="{{ asset('EmployeePhoto/'.Auth::user()->employeeInfo->image) }}" class="img-circle elevation-2" alt="User Image2">
            @else
            <img src="{{ asset('EmployeePhoto/default.png') }}" class="img-circle elevation-2" alt="No Image">
            @endif
          </div>
          <div class="info">
            <a href="{{ url('/') }}" class="d-block">{{Auth::user()->employeeInfo->name}}</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item {{'employees'  == request()->path() ? 'menu-open' : ''}} {{'profile-update-req'  == request()->path() ? 'menu-open' : ''}}">
              <a href="{{ url('employees') }}" class="nav-link ">
                <i class="nav-icon fas fa-id-card-alt"></i>
                <p>
                  Employee
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('employees') }}" class="nav-link {{'employees'  == request()->path() ? 'text-info' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('profile-update-req') }}" class="nav-link {{'profile-update-req'  == request()->path() ? 'text-info' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Profile Update History</p>
                    </a>
                  </li> 

                @foreach ($sideBarDept as $dept)            
                  <li class="nav-item">
                    <a href="{{ url('employees?dept_code='.$dept->dept_code) }}" class="nav-link  {{'employees?dept_code='.$dept->dept_code == request()->path() ? 'text-info' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $dept->dept_name }}</p>
                    </a>
                  </li>
                @endforeach
            </li>
          </ul>

            <li class="nav-item {{'attachment'  == request()->path() ? 'menu-open' : ''}} {{'notice'  == request()->path() ? 'menu-open' : ''}} {{'policy'  == request()->path() ? 'menu-open' : ''}} {{'holiday'  == request()->path() ? 'menu-open' : ''}} {{'incident'  == request()->path() ? 'menu-open' : ''}} {{'job-description-board'  == request()->path() ? 'menu-open' : ''}} "> 
              <a href="pages/widgets.html" class="nav-link ">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                  Board
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('notice') }}" class="nav-link {{'notice'  == request()->path() ? 'text-info' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notice
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('attachment') }}" class="nav-link {{'attachment'  == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p class="">Attachment
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('policy') }}" class="nav-link {{'policy'  == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Policy
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('holiday') }}" class="nav-link {{'holiday'  == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Holiday
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('incident') }}" class="nav-link {{'incident'  == request()->path() ? 'text-info' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Incident
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('jobdescription') }}" class="nav-link {{'job-description-board'  == request()->path() ? 'text-info' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Job Description
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item {{'leave-list' == request()->path() ? 'menu-open' : ''}} {{'leave-at-a-glance' == request()->path() ? 'menu-open' : ''}} {{'yearly-leave' == request()->path() ? 'menu-open' : ''}} {{'search-today-leave' == request()->path() ? 'menu-open' : ''}} {{'pending-leave'  == request()->path() ? 'menu-open' : ''}} ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Leave
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('leave-list')}}" class="nav-link {{'leave-list' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Leave List
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('leave-at-a-glance')}}" class="nav-link {{'leave-at-a-glance' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>At a Glance
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('yearly-leave')}}" class="nav-link {{'yearly-leave' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yearly Leave Report
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('pending-leave')}}" class="nav-link {{'pending-leave' == request()->path() ? 'text-info' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('search-today-leave')}}" class="nav-link {{'search-today-leave' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Today's Leave
                      <span class="badge badge-info right">6</span>
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item {{'archive' == request()->path() ? 'menu-open' : ''}}">
              <a href="/archive" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                  Archive
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('archive') }}" class="nav-link {{'archive' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item {{'department' == request()->path() ? 'menu-open' : ''}} {{'designation' == request()->path() ? 'menu-open' : ''}} {{'facility' == request()->path() ? 'menu-open' : ''}} {{'note' == request()->path() ? 'menu-open' : ''}} {{'admin-prev' == request()->path() ? 'menu-open' : ''}} {{'permission-prev' == request()->path() ? 'menu-open' : ''}} {{'office-time' == request()->path() ? 'menu-open' : ''}} ">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Settings
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('department') }}" class="nav-link {{'department' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Department
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('designation') }}" class="nav-link {{'designation' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Designation
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('facility') }}" class="nav-link {{'facility' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Facility
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('note') }}" class="nav-link {{'note' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Note
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('adminpriv')}}" class="nav-link {{'adminpriv' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Administration Privilege
                      <span class="badge badge-info right">6</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('permission-priv') }}" class="nav-link {{'permission-priv' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Permission Privilege
                      <span class="badge badge-info right">6</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('office-time') }}" class="nav-link {{'office-time' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Office Time
                      <span class="badge badge-info right">6</span>
                    </p>
                  </a>
                </li>

                
              </ul>
            </li>

            <li class="nav-item {{'ramadan' == request()->path() ? 'menu-open' : ''}}">
              <a href="{{ url('ramadan') }}" class="nav-link">
                <i class="nav-icon fas fa-moon"></i>
                <p>
                  Ramadan Time
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('ramadan') }}" class="nav-link {{'ramadan' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Set Ramadan list
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item {{'report' == request()->path() ? 'menu-open' : ''}} {{'emp-today' == request()->path() ? 'menu-open' : ''}} {{'upload-attendance' == request()->path() ? 'menu-open' : ''}} {{'late-early-req' == request()->path() ? 'menu-open' : ''}} {{'office-schedule' == request()->path() ? 'menu-open' : ''}}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-export"></i>
                <p>
                  Attendance
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('reports')}}" class="nav-link {{'report' == request()->path() ? 'text-info' : ''}} ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('emp-today')}}" class="nav-link {{'emp-today' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Today's Employee
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('upload-attendance')}}" class="nav-link {{'upload-attendance' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Upload
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('late-early-req')}}" class="nav-link {{'late-early-req' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Late/Early Request
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('pending-req')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Late/Early Request Pending
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('missing-attendance-req')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Missing Att. Req. Pending
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('office-schedule')}}" class="nav-link {{'office-schedule' == request()->path() ? 'text-info' : ''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Office Schedule
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('set-roster')}}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roster Set
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('roster/holiday-request') }}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roster Pending
                    </p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>