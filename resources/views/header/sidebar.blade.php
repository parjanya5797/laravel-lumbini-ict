  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Creatu Learning</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @php $user = request()->session()->get('UserLoggedIn');  @endphp
          <a href="#" class="d-block">{{$user['name']??'User'}}</a>
          <a href="#" class="d-block">{{$user['created_at']}}</a>
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
            {{-- <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('dashboard')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
              </ul>
            </li> --}}
            <li class="nav-item">
              <a href="{{route('dashboard')}}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Widgets
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            
            <li class="nav-header">Media Files</li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Images
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Videos
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Files
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
            </li> --}}
            
            <li class="nav-header">Todos</li>
            <li class="nav-item">
              <a href="{{route('todo.create')}}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Add Todos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('todo.view')}}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  View Todos
                </p>
              </a>
            </li>
            
            <li class="nav-header">Blog</li>
            <li class="nav-item">
              <a href="{{route('blog.create')}}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Add Blogs
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('blog.view')}}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  View Blogs
                </p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  View Post
                </p>
              </a>
            </li> --}}
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>