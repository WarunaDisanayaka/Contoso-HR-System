<x-header/>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
         </div>
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
            </ul>
         </nav>
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">HR</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar Menu -->
               <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- ... other menu items ... -->
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           Users
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('employee.attendance')}}" class="nav-link">
                     <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                           Attendance
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="fas fa-sign-out-alt"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                  </li>
               </ul>
            </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Mark Attendance</h1>
                     </div>
                     <div class="col-sm-6">
                     </div>
                  </div>
               </div>
               @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               <form action="" method="POST"> <!-- Change the route to match the attendance storing route -->
                  @csrf
                  <div class="card-body">
                     <div class="form-group">
                        <label for="user_id">Select User</label>
                        <select class="form-control" id="user_id" name="user_id">
                           <option value="1">User 1</option>
                           <option value="2">User 2</option>
                           <!-- Add more options dynamically based on your users -->
                        </select>
                     </div>
                     <button type="submit" class="btn btn-primary">Mark Attendance</button>
                  </div>
               </form>
            </div>
         </div>
         <footer class="main-footer">
         </footer>
         <aside class="control-sidebar control-sidebar-dark">
         </aside>
      </div>
      <x-footer/>
   </body>
</html>