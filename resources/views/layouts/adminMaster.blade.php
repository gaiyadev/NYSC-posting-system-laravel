
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="https://use.fontawesome.com/b27c5203b7.js"></script>
    <title>Admin Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="/css/app.css" rel="stylesheet">
<script>
    $(".alert").fadeOut(8000 );
</script>
</head>
<body class="hold-transition sidebar-mini">
<div id="app" class="wrapper" >

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>   
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        {{--  <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">Logout</span>
        </a>  --}}
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">logout</a>
        </div>
      </li>    
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" {{route('admin.h') }} " class="brand-link" style="margin-left: 70px;">
    <img src="{{ asset('images/download.jpg') }}" with="100" height="100" alt="NYSC-logo"/>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
 <h5 style="margin-left: 46px;" class="text-white">{{ Auth::user()->name }}</h5>        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a-link href="" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p class="text-success">
                    Dashboard
                  </p>
                </a>
              </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                PCM Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('senate.list')}} " class="nav-link">
                  <i class="fa fa-book"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{route('senate.view')}} " class="nav-link">
                  <i class="fa fa-book"></i>
                  <p>View PCM</p>
                </a>
              </li>              
               <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-lock"></i>
                  <p>Change Password</p>
                </a>
              </li> -->
              
            </ul>      
          </li>              
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Profile Settings
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">            
             <!--  <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>Update Profile</p>
                </a>
              </li> -->
               <li class="nav-item">
                <a href=" {{route('changePass')}} " class="nav-link">
                  <i class="fa fa-lock"></i>
                  <p>Change Password</p>
                </a>
              </li>
              
            </ul>            
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  <i class="nav-icon fa fa-power-off red"></i>
                  <p>
                      {{ __('Logout') }}
                  </p>
               </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
           </form>
      </li>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"><br/><br/><br/>
              @include('include/message')

         <!-- ============================================================== -->
                <!-- Admin Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                  @foreach($pcms as $pcm) 
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3 ">
                        <div class="card card-hover shadow-lg" style="height: 77px;">
                            <div class=" box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i> {{ $pcm->user_id}} </h1>
                                <h6 class="text-success"><a class="text-success" href="#">Active Registration</a></h6>
                            </div>
                        </div>
                    </div>
                  @endforeach

                    @foreach($users as $user) 
                    <!-- Column -->
                     <div class="col-md-6 col-lg-4 col-xlg-3 ">
                        <div class="card card-hover shadow-lg" style="height: 77px;">
                            <div class=" box bg-primary text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i> {{ $user->id }}</h1>
                                <h6 class="text-success"><a class="text-success" href="#">Active Users</a></h6>
                            </div>
                        </div>
                    </div>
                     @endforeach
                     <!-- Column -->
                     @foreach($fetchs as $fetch)
                    <div class="col-md-6 col-lg-4 col-xlg-3 ">
                        <div class="card card-hover shadow-lg" style="height: 77px;">
                            <div class=" box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>{{ $fetch->id }}</h1>
                                <h6 class="text-success"><a class="text-success" href=" {{route('senate.view')}} ">Senate List</a></h6>
                            </div>
                        </div>
                    </div> @endforeach
                    <!-- Column -->
                    <!-- <div class="col-md-6 col-lg-4 col-xlg-3 ">
                        <div class="card card-hover shadow-lg" style="height: 77px;">
                            <div class=" box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>545</h1>
                                <h6 class="text-success"><a class="text-success" href="#">Active users</a></h6>
                            </div>
                        </div>
                    </div> -->
                  
                    <!-- Column -->                  
                </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Ezra Bako
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y")?> <a href="">EzraLaban_project</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="/js/app.js"></script>
</body>
</html>
