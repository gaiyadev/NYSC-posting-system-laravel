
<!DOCTYPE html>

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
    <img src="images/download.jpg" with="100" height="100" alt="NYSC-logo"/>

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
                <a href=" {{ route('callUpLetter') }} " class="nav-link">
                  <i class="fa fa-book"></i>
                  <p>Call-up letter</p>
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
  <div class="content-wrapper" id="app">  

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"><br><br>
               @include('include/message')

<div class="row">

    <div class="col-md-12">
        <form id="msform" action="{{route('store')}}" method="POST" autocomplete="on" enctype="multipart/form-data"> 
         @csrf      
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title text-success">Registration Form</h2><br/>
                <!-- <h3 class="fs-subtitle">Tell us something more about you</h3><br/> -->
                <input type="text"  value="{{ old('fname')}}" name="fname" placeholder="First Name" required="required" />
                <input type="text" value="{{ old('lname') }}" name="lname" placeholder="Last Name" required="required" />
                <input type="text"  name="mname" placeholder="Middle Name" />
                 <input type="email" value=" {{ old('email')}} " name="email" placeholder="Email Address" required="required" />
                <input type="text"  name="phone" placeholder="Phone Number" required="required" />
                   <p class="text-success" style="margin-left: 0px; font-size: 12px;">Date Of Birth</p>

                <input type="date" value=" {{old('dob')}} " name="dob" min="1000-01-01" max="2020-03-01" required="required" />


                 <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-success" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" value=" {{ old('photo')}} " class="custom-file-input" name="photo" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required="required">
                  <label class="custom-file-label text-info" for="inputGroupFile01">Upload passport</label>
                </div>
              </div>

                 <select name="gender" required="required">
                   <option value="gender"  >Gender</option>
                    <option value="Male" {{ old('gender') ==  "Male" ? 'selected' : ''}}>Male</option>
                     <option value="Female" {{ old('gender') ==  "Female" ? 'selected' : ''}} >Female</option>
                </select> 

                 <select name="maritalstatus" required="required">
                     <option value="">Marital Status</option>
                      <option value="Single" {{ old('maritalstatus') == "Single"  ? 'selected' : ''}} >Single</option>
                     <option value="Married"{{ old('maritalstatus') == "Married"  ? 'selected' : ''}} >Married</option>
                </select>

                
               <textarea  name="address"  placeholder="Residential Address" rows="4" cols="4" required="required">

                </textarea>

                <select name="state" required="required">
                   <option value="none" >State of Origin</option>
                  <option value="Kaduna" {{ old('state') == "Kaduna" ? 'selected' : '' }}  >Kaduna</option>
                  <option value="Katsina"{{ old('state') == "Katsina" ? 'selected' : '' }} >Katsina</option>
                  <option value="Enugu" {{ old('state') == "Enugu" ? 'selected' : '' }} >Enugu</option>
                     <option value="Gombe" {{ old('state') == "Gombe" ? 'selected' : '' }} >Gombe</option>
                    <option value="Imo"  {{ old('state') == "Imo" ? 'selected' : '' }}>Imo</option>
                    <option value="Kogi"  {{ old('state') == "Kogi" ? 'selected' : '' }}>Kogi</option>
                    <option value="Kwara"  {{ old('state') == "Kwara" ? 'selected' : '' }}>Kwara</option>
                    <option value="Lagos"  {{ old('state') == "Lagos" ? 'selected' : '' }}>Lagos</option>
                   <option value="Kano"{{ old('state') == "Kano" ? 'selected' : '' }}>Kano</option>
                   <option value="Jigawa"{{ old('state') == "Jigawa" ? 'selected' : '' }}>Jigawa</option>                 
                   <option value="Nassarawa"{{ old('state') == "Nassarawa" ? 'selected' : '' }}>Nassarawa</option>
                     <option value="Plateau"  {{ old('state') == "Plateau" ? 'selected' : '' }}>Plateau</option>
                   <option value="Kebbi"{{ old('state') == "Kebbi" ? 'selected' : '' }} >Kebbi</option>
                   <option value="Akwa Ibom"{{ old('state') == "Akwa Ibom" ? 'selected' : '' }}>Akwa Ibom</option>
                     <option value="Anambra" {{ old('state') == "Anambra" ? 'selected' : '' }}>Anambra</option>
                   <option value="Bayelsa"{{ old('state') == "Bayelsa" ? 'selected' :   '' }}>Bayelsa</option>
                    <option value="Benue" {{ old('state') == "Benue" ? 'selected' : '' }}>Benue</option>
                     <option value="Cross River"{{ old('state') == "Cross River" ? 'selected' : '' }}>Cross River</option>
                    <option value="Delta"{{ old('state') == "Delta" ? 'selected' : '' }}>Delta</option>
                    <option value="Ebonyi" {{ old('state') == "Ebonyi" ? 'selected' :   '' }}>Ebonyi</option>
                    <option value="Edo" {{ old('state') == "Edo" ? 'selected' : '' }}>Edo</option>
                     <option value="Ekiti"{{ old('state') == "Ekiti" ? 'selected' : '' }}>Ekiti</option>
                       <option value="Yobe" {{ old('state') == "Yobe" ? 'selected' : '' }}>Yobe</option>
                   <option value="Adamawa"{{ old('state') == "Adamawa" ? 'selected'  :  '' }}>Adamawa</option>
                  <option value="Niger" {{ old('state') == "Niger" ? 'selected' : '' }}>Niger</option>
                   <option value="Sokoto" {{ old('state') == "Sokoto" ? 'selected' : '' }}>Sokoto</option>
                   <option value="Taraba" {{ old('state') == "Taraba" ? 'selected' : '' }}>Taraba</option>
                  <option value="Borno" {{ old('state') == "Borno" ? 'selected' : '' }}>Borno</option>
                   <option value="Bauchi" {{ old('state') == "Bauchi" ? 'selected' : '' }}>Bauchi</option>
                    <option value="Zamfara" {{ old('state') == "Zamfara" ? 'selected' : '' }}>Zamfara</option>
                    <option value="Ogun" {{ old('state') == "Ogun" ? 'selected' : '' }}>Ogun</option>
                    <option value="Ondo" {{ old('state') == "Ondo" ? 'selected' : '' }}>Ondo</option>
                    <option value="Osun" {{ old('state') == "Osun" ? 'selected' : '' }}>Osun</option>
                    <option value="Oyo" {{ old('state') == "Oyo" ? 'selected' : '' }}>Oyo</option>
                    <option value="Rivers" {{ old('state') == "Rivers" ? 'selected'  :  '' }}>Rivers</option>
                    <option value="Taraba" {{ old('state') == "Taraba" ? 'selected'  :  '' }}>Taraba</option>
                    <option value="Fct" {{ old('state') == "Fct" ? 'selected' : '' }}>FCT</option>
                </select>

                <input type="text" name="school" placeholder="School Graduated" required="required" />
                <input type="text" name="matric" placeholder="Matric Number" required="required" />


                   <select name="qualification" required="required">
                      <option value="Bachelor Degree" {{ old('qualification') == "Bachelor Degree" ?  'selected' : '' }}>BSc</option>
                      <option value="Higher National Diploma" {{ old('qualification') == "Higher National Diploma" ? 'selected' : '' }}>HND</option>
                      <option value="Medcine"  {{ old('qualification')  == "medcine" ? 'selected' : '' }}>MBBS</option>
                      <option value="Bachelor of Technology"  {{ old('qualification') == "Bachelor of Technology" ? 'selected' : '' }}>B.Tech</option>
                      <option value="Bachelor of Pharmacy"  {{ old('qualification')    == "Bachelor of Pharmacy" ? 'selected' : '' }}>B.Pharm</option>                
                 
                </select>

                 <input type="text"  name="course" placeholder="Course of study" required="required" />

                  <select name="grade" required="required">
                     <option value="Clas">Class of Degree</option>
                    <option value="First class"  {{ old('grade') == "First class" ? 'selected' : '' }}>First class</option>
                   <option value="Destination"  {{ old('grade') == "Destination" ? 'selected' : '' }}>Destination</option>
                   <option value="Second class upper"  {{ old('grade')  == "Second class upper" ? 'selected' : '' }}>second class upper</option>
                    <option value="Upper credit"  {{ old('grade') == "Upper credit" ? 'selected' : '' }}>Upper Credit</option>
                   <option value="Second class lower"   {{ old('grade') == "Second class lower" ? 'selected' : '' }}>Second class lower</option>
                   <option value="Lower credit"  {{ old('grade') == "Lower credit" ? 'selected' : '' }}>Lower credit</option>
                   <option value="Third class"  {{ old('grade') == "Third class" ? 'selected' : '' }}>Third class</option>
                  <option value="pass degree"  {{ old('grade') == "Pass degree" ? 'selected' : '' }}>Pass Degree</option>
                </select>

                   <p class="text-success" style="margin-left: 0px; font-size: 12px;">year Of Graduation</p>
                <input type="date" value=" {{old('year')}} " name="year" min="1000-01-01" max="2019-03-01" required="required" />
                 <select name="NorthCentral" required="required">
                    <option value="First class">First choice of state</option>
                   <option value="Nassarawa"  {{ old('NorthCentral') == "Nassarawa" ? 'selected' : '' }}>Nassarawa</option>
                   <option value="Plateau" {{ old('NorthCentral') == "Plateau" ? 'selected' : '' }}>Plateau</option>
                    <option value="Kogi" {{ old('NorthCentral') == "Kogi" ? 'selected' : '' }}>Kogi</option>
                    <option value="Port Harcourt" {{ old('NorthCentral') == "Port Harcourt" ? 'selected' : '' }}>Port Harcourt </option>
                   <option value="Kwara" {{ old('NorthCentral') == "Kwara" ? 'selected' : '' }}>Kwara</option>
                   <option value="Enugu" {{ old('NorthCentral') == "Enugu" ? 'selected' : '' }}>Enugu</option>
                   <option value="Niger" {{ old('NorthCentral') == "Niger" ? 'selected' : '' }}>Niger</option>
                   <option value="Benue" {{ old('NorthCentral') == "Benue" ? 'selected' : '' }}>Benue</option>
                   <option value="Lagos" {{ old('NorthCentral') == "Lagos" ? 'selected' : '' }}>Lagos</option>
                </select>

                 <select name="NorthWest" required="required">
                    <option value="First class">Second choice of state</option>
                   <option value="Jigawa" {{ old('NorthWest') == "Jigawa" ? 'selected' : '' }}>Jigawa</option>
                   <option value="Kano" {{ old('NorthWest') == "Kano" ? 'selected' : '' }}>Kano</option>
                    <option value="Ondo" {{ old('NorthWest') == "Ondo" ? 'selected' :   '' }}>Ondo</option>
                   <option value="Kaduna" {{ old('NorthWest') == "Kaduna" ? 'selected' : '' }}>Kaduna</option>
                   <option value="Niger"  {{ old('NorthWest') == "Niger" ? 'selected'  : '' }}>Kebbi</option>
                   <option value="Zamfara"  {{ old('NorthWest') == "Zamfara" ?    'selected' : '' }}>Zamfara</option>
                 <option value="Sokoto"  {{ old('NorthWest') == "Sokoto" ? 'selected' :  '' }}>Sokoto</option>
                 <option value="Abia" {{ old('NorthWest') == "Abia" ? 'selected' : '' }}>Abia</option>

                </select>

                 <select name="NorthEast" required="required">
                    <option value="First class">Third choice of state</option>
                   <option value="Gombe"  {{ old('NorthEast') == "Gombe" ? 'selected' : '' }}>Gombe</option>
                   <option value="Bauchi" {{ old('NorthEast') == "Bauchi" ? 'selected' : '' }}>Bauchi</option>
                    <option value="Yobe" {{ old('NorthEast') == "Yobe" ? 'selected'  :  '' }}>Yobe</option>
                   <option value="Ekiti" {{ old('NorthEast') == "Ekiti" ? 'selected'  : '' }}>Ekiti</option>
                   <option value="Adamawa" {{ old('NorthEast') == "Adamawa" ?  'selected' : '' }}>Adamawa</option>
                   <option value="Taraba" {{ old('NorthEast') == "Taraba" ? 'selected' : '' }}>Taraba</option>
                     <option value="Rivers" {{ old('NorthEast') == "Rivers" ?  'selected' : '' }}>River</option>
                </select>


                 <select name="SouthSouth" required="required">
                    <option value="First class">Fourth choice of state</option>
                   <option value="Cross-Rivers" {{ old('SouthSouth') == "Cross-Rivers" ? 'selected' : '' }}>Cross-Rivers</option>
                   <option value="Bayelsa" {{ old('SouthSouth') == "Bayelsa" ? 'selected' : '' }}>Bayelsa</option>
                    <option value="Akwa-Ibom" {{ old('SouthSouth') == "Akwa-Ibom" ? 'selected' : '' }}>Akwa-Ibom</option>
                   <option value="Delta" {{ old('SouthSouth') == "Delta" ? 'selected' : '' }}>Delta</option>
                   <option value="Edo" {{ old('SouthSouth') == "Edo" ? 'selected' : '' }}>Edo</option>
                   <option value="Taraba" {{ old('SouthSouth') == "Taraba" ? 'selected' : '' }}>Taraba</option>
                </select>

               
                <input  id="box"  type="submit"  name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
           
           
        </form>
       
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
      Ezralaban project
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">&nbsp NYSC_Posting_System &nbsp</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="/js/app.js"></script>
</body>
</html>
