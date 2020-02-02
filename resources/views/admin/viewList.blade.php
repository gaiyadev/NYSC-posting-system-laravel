
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="https://use.fontawesome.com/b27c5203b7.js"></script>
    <title>Admin Dashboard</title>
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
    <a href="{{route('admin.h') }}" class="brand-link" style="margin-left: 70px;">
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
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
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
#msform input[type='text'], input[type='date'], input[type='email'], input[type='file'],  #msform textarea, select {
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
  <div class="content-wrapper">  

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"><br><br>
        <!-- <a href="" class="btn btn-success btn-lg">Register</a> -->
           @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
       <!-- MultiStep Form -->
<div class="row">

    <div class="col-md-12">
      @include('include/message')


         
       @if(count($SenateLists) > 0)
       @foreach ($SenateLists as $SenateList)
 <a style="float: right;" href="/update/{{ $SenateList->id }}" class="btn btn-lg btn-primary text-white">Update Record</a>
 <a href="/delete/{{ $SenateList->id }}" class="btn btn-lg btn-danger">Delete Record</a>
 <br/><br/>
      <div class="table-responsive shadow-lg">       
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Middlename</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>State of Origin</th>
            <th>School</th>
            <th>Course</th>
            <th>Matric No.:</th>
            <th>Qualification</th>
            <th>Class of Degree</th>
            <th>Year of graduation</th>
            <th>Reg Time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
             <td>{{ $SenateList->id }}</td>
            <td>{{ $SenateList->fname }}</td>
            <td>{{ $SenateList->lname }}</td>
            <td>{{ $SenateList->mname }}</td>
            <td>{{ $SenateList->dob }}</td>
            <td>{{ $SenateList->gender }}</td>
             <td>{{ $SenateList->state }}</td>
            <td>{{ $SenateList->school }}</td>
             <td>{{ $SenateList->course }}</td>
            <td>{{ $SenateList->matric }}</td>
              <td>{{ $SenateList->qualification }}</td>
            <td>{{ $SenateList->grade }}</td>
            <td>{{ $SenateList->year }}</td>              
            <td>{{ $SenateList->created_at }}</td>
          </tr>   

        </tbody>
      </table>
      @endforeach
      

    </div>
     <div class="text-center text-success shadow-sm" style="margin-left: 30px;" >
         <p class="text-success" > {{ $SenateLists->links() }}</p>

  </div>
             @else
   <h4 class="text-danger text-center">No Record Found</h4>
   @endif

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
