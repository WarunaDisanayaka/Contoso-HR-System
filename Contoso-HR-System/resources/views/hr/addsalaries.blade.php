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
                     <a href="{{ route('hr.addingusers') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i> <!-- Users Icon -->
                        <p>
                           Adding Users
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('hr.users') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i> <!-- Users Icon -->
                        <p>
                           All Users
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('hr.usersattendance') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           All Users Attendance
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('hr.addsalaries') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i> 
                        <p>
                           Add salaries
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
                     <h1 class="m-0">All Users</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                  </div>
                  <!-- /.col -->
               </div>
               <section class="content">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-6">
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                        </div>
                        <!-- /.col -->
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="card">
                              <div class="card-header">
                                 Add Salary
                              </div>
                              <div class="card-body">
                                 <form action="{{ route('hr.addsalary') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                       <label for="user_id">User</label>
                                       <select name="userid" class="form-control">
                                          @foreach ($users as $user)
                                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label for="month">Month</label>
                                       <input type="month" name="month" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label for="amount">Amount</label>
                                       <input type="number" name="amount" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Salary</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.container-fluid -->
               </section>
               <!-- /.row -->
            </div>
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