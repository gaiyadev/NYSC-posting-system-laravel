
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="https://use.fontawesome.com/b27c5203b7.js"></script>
    <title>PCM Dashboard</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="/css/app.css" rel="stylesheet">
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
    <a href="{{ route('home') }}" class="brand-link" style="margin-left: 70px;">
    <img src="{{ asset('images/download.jpg') }}" with="100" height="100" alt="NYSC-logo"/>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <h5 style="margin-left: 46px;" class="text-white">{{ Auth::user()->name }}</h5>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a-link href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p class="text-success">
                    Dashboard
                  </p>
                </a>
              </li>
              
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('home') }}" class="nav-link active">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('greenCard')}}" class="nav-link">
                  <i class="fa fa-book"></i>
                  <p>Green Card</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('callUpLetter') }} " class="nav-link">
                  <i class="fa fa-book"></i>
                  <p>Call-up letter</p>
                </a>
              </li>

             <!--  <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>Change Names</p>
                </a>
              </li> -->
               <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-lock"></i>
                  <p>Change Password</p>
                </a>
              </li> -->
              
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
<style type="text/css">
  
  /*custom font*/
/*@import url(https://fonts.googleapis.com/css?family=Montserrat);*/

/*basic reset*/
* {
    margin: 0;
    padding: 0;
}

html {
    height: 100%;
    background: #6441A5; /* fallback for old browsers */
    background: -webkit-linear-gradient(to left, #6441A5, #2a0845); /* Chrome 10-25, Safari 5.1-6 */
}

body {
    font-family: montserrat, arial, verdana;
    background: transparent;
}

</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app">  

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"><br><br>
        @include('include/message')

        @if($PcmRegistration)
        <!-- <a href="" class="btn btn-success btn-lg">Register</a> -->
          <a href="/pcm/update/{{ $PcmRegistration->id }}" class="btn btn-lg btn-success">Change Name/Password</a>
       <!-- MultiStep Form -->
             <div class="row">
              <div class="col-md-12"><br/>
                <!-- TAble to view regitration progress -->
            <div class="table-responsive shadow-lg">

       
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Middlename</th>
                      <th>Phone NO.:</th>
                      <th>DOB</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Marital Status</th>
                      <th>State of Origin</th>
                      <th>School</th>
                      <th>Course</th>
                      <th>Qualification</th>
                      <th>Class of Degree</th>
                      <th>Year of graduation</th>
                      <th>First Choice</th>
                      <th>Second Choice</th>
                      <th>Third Choice</th>
                      <th>Fourth Choice</th>
                      <th>Reg Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <td>{{ $PcmRegistration->id }}</td>
                      <td>{{ $PcmRegistration->fname }}</td>
                      <td>{{ $PcmRegistration->lname }}</td>
                      <td>{{ $PcmRegistration->mname }}</td>
                       <td>{{ $PcmRegistration->phone }}</td>
                      <td>{{ $PcmRegistration->dob }}</td>
                       <td>{{ $PcmRegistration->email }}</td>
                        <td>{{ $PcmRegistration->gender }}</td>
                      <td>{{ $PcmRegistration->maritalstatus }}</td>
                       <td>{{ $PcmRegistration->state }}</td>
                      <td>{{ $PcmRegistration->school }}</td>
                       <td>{{ $PcmRegistration->course }}</td>
                        <td>{{ $PcmRegistration->qualification }}</td>
                      <td>{{ $PcmRegistration->grade }}</td>
                      <td>{{ $PcmRegistration->year }}</td>
                        <td>{{ $PcmRegistration->NorthCentral }}</td>
                       <td>{{ $PcmRegistration->NorthWest }}</td>
                      <td>{{ $PcmRegistration->NorthEast }}</td>
                      <td>{{ $PcmRegistration->SouthSouth }}</td>
                      <td>{{ $PcmRegistration->created_at }}</td>
                    </tr>                  
                  </tbody>
                </table>
            </div>
             @else
   <h3 class="text-danger text-center">No Record Found...Please Register</h3>
   @endif

          </div>

                    
             </div>
</div>


        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Ezrabako project
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y"); ?>  <a href="#">&nbsp NYSC_Posting_System &nbsp</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="/js/app.js"></script>
</body>
</html>
