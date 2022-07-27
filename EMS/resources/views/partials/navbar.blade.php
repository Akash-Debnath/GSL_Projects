    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light layout-fixed layout-navbar-fixed">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center justify-content-center" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="font-size: 23px;"></i></a>
          </li>
          {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li> --}}
        </ul>
  
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto navbar-logout">
          <!-- Navbar Search -->
          {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> --}}
  
  
  
  
          {{-- <li class="nav-item dropdown">
            <form id="logout-form" action="{{ url('logout') }}" method="POST">
              @csrf
              <!-- <button type="submit"  class="dropdown-item" >Logout</button> -->
              <button type="submit" class="btn btn-info ml-auto btn-sm  " data-toggle="modal" data-target="#modal-default">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg> logout
              </button>
            </form>
          </li> --}}
  
  
  
  
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell" style="font-size: 25px;"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>

           <!-- settings Dropdown Menu -->
           <li class="nav-item dropdown">
            <a class="nav-link d-flex  justify-content-center align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">

              <img class=" img-circle img-thumbnail" style="height:25px; width:25px;" src="{{ asset('EmployeePhoto/'.Auth::user()->employeeInfo->image) }}" alt="User">

              {{-- @if (!is_null(Auth::user()->employeeInfo->image) && !file_exists(public_path().'/EmployeePhoto'.Auth::user()->employeeInfo->image))
              <img class=" img-circle img-thumbnail" style="height:25px; width:25px;" src="{{ asset('EmployeePhoto/'.Auth::user()->employeeInfo->image) }}" alt="User">
              @else
              <img src="{{ asset('EmployeePhoto/default.png') }}" class="img-circle elevation-2" alt="No Image">
              @endif --}}
              <span class="float-right text-light text-md ml-1 " >{{ Auth::user()->employeeInfo->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">Settings</span>
                 


              <div class="dropdown-divider"></div>
              <a href="{{ url('changePass') }}" class="dropdown-item">
                <i class="fas fa-edit mr-2"></i> Change Password
                <span class="float-right text-muted text-sm">3 mins ago</span>
              </a>

              <div class="dropdown-divider"></div>
              <a href="http://127.0.0.1:8000/" class="dropdown-item">
                <i class="fas fa-eye mr-2" ></i> View Profile
                <span class="float-right text-muted text-sm">3 mins ago</span>
              </a>
              
              <div class="dropdown-divider"></div>
              <form id="logout-form" action="{{ url('logout') }}" method="POST">
                @csrf
                <!-- <button type="submit"  class="dropdown-item" >Logout</button> -->
               
                 
                    <button type="submit" class="btn btn-info ml-auto btn-sm  form-control rounded-0  dropdown-item" style="font-size: 1.06rem;" data-toggle="modal" data-target="#modal-default">
                      <div class="center">
                        <i class="fas fa-sign-out-alt mr-2"  ></i>  Logout
                      </div>
                    </button>
                  
                
              </form>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
  
        </ul>
      </nav>
      <!-- /.navbar -->