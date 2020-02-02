
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
                <a href="#" class="nav-link">
                  <i class="fa fa-book"></i>
                  <p>Call-up letter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('greenCard')}}" class="nav-link">
                  <i class="fa fa-user"></i>
                  <p>Green Card</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="" class="nav-link">
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

/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 30px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
    padding: 20px 30px;
    box-sizing: border-box;
    width: 80%;
    margin: 0 10%;

    /*stacking fieldsets above each other*/
    position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

/*inputs*/
#msform input[type='text'], input[type='date'],input[type='file'],  #msform textarea, select {
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 10px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 13px;
}

#msform input:focus, select:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #4CAF50;
    /*#ee0979;*/
    outline-width: 0;
    transition: All 0.5s ease-in;
    -webkit-transition: All 0.5s ease-in;
    -moz-transition: All 0.5s ease-in;
    -o-transition: All 0.5s ease-in;
}

/*buttons*/
#msform .action-button {
    width: 100px;
    background: #4CAF50;  
    /*#ee0979;*/
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #4CAF50;
}

#msform .action-button-previous {
    width: 100px;
    background: #C5C5F1;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
}

/*headings*/
.fs-title {
    font-size: 18px;
    text-transform: uppercase;
    color: #2C3E50;
    margin-bottom: 10px;
    letter-spacing: 2px;
    font-weight: bold;
}

.fs-subtitle {
    font-weight: normal;
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}









/* Not relevant to this form */
.dme_link {
    margin-top: 30px;
    text-align: center;
}
.dme_link a {
    background: #FFF;
    font-weight: bold;
    color: #ee0979;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 5px 25px;
    font-size: 12px;
}

.dme_link a:hover, .dme_link a:focus {
    background: #C5C5F1;
    text-decoration: none;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app">  

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"><br><br>
        <!-- <a href="" class="btn btn-success btn-lg">Register</a> -->

       <!-- MultiStep Form/saveProfile/<?php //echo($PcmRegistrations->id) ?> -->
       <div class="row">
         <div class="col-md-3">                       
         </div>
         <div class="col-md-6">                       
            @include('include/message')
         </div>
         <div class="col-md-3">                       
         </div>
       </div>
<div class="row">

    <div class="col-md-6">
              <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header bg-success text-white">Change Names</h5>
                                    <div class="card-body">
                <form action="{{route('saveProfile', $PcmRegistrations->id) }}" method="post">
                        @csrf      
                        <div class="form-group">
                            <label for="surname"  class="text-success font-weight-bold">Surname</label>
                            <input type="text" name="lname"  value="{{ $PcmRegistrations->lname }}"  class="form-control" id="surname" aria-describedby="emailHelp" required="required">
                        </div>

                        <div class="form-group">
                                <label for="mname" class="text-success font-weight-bold">Middle Names</label>
                                <input type="text" name="mname" value="{{ $PcmRegistrations->mname }}" class="form-control" id="mname" name="mname" required="required">
                            </div>
                        <div class="form-group">
                            <label for="fname" class="text-success font-weight-bold">First Name</label>
                            <input type="text" name="fname" value="{{ $PcmRegistrations->fname }}" class="form-control" id="fname" required="required">
                        </div>
                          <div class="form-group">
                            <label for="email" class="text-success font-weight-bold"> Email</label>
                            <input type="text" name="email" readonly="readonly" value="{{ $PcmRegistrations->email }}" class="form-control" id="email" required="required">
                        </div>
                          <div class="form-group">
                            <label for="dob"  class="text-success font-weight-bold"> Date of Birth</label>
                            <input type="text" name="dob" readonly="readonly" value="{{ $PcmRegistrations->dob }}" class="form-control" id="dob" required="required">
                        </div>

                        
                      
                        <button type="submit" class="btn btn-success bg-lg">Update</button>
                    </form>
                        </div>
                    </div>
                    </div>

<div class="col-md-6">

	        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header bg-success text-white">Change Password</h5>
                                    <div class="card-body">
                <form action=" {{ route('passSave')}}" method="post">
                     @csrf 
                        <div class="form-group">
                            <label for="Cpass" class="text-success font-weight-bold">Current Password</label>
                            <input type="password" class="form-control" id="Cpass" aria-describedby="emailHelp" name="oldPassword" required="required">
                        </div>

                        <div class="form-group">
                                <label for="Npass" class="text-success font-weight-bold">New Password</label>
                                <input type="password" class="form-control" id="Npass" name="newPassword" required="required">
                            </div>
                        <div class="form-group">
                            <label for="Rpass" class="text-success font-weight-bold">Retype Password</label>
                            <input type="password" class="form-control" id="Rpass"  name="confirmPassword" required="required">
                        </div>

                        
                      
                        <button type="submit" class="btn btn-success bg-lg">Change</button>
                    </form>
                        </div>
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
