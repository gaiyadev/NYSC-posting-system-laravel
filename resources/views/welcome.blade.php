<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NYSC Posting System</title>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                 background-image: url("images/NYSC-members.jpg");
                 background-repeat: repeat-x;
                 background-attachment: fixed;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            label {
                font-size: 16px;
            }

            #links {
                padding: 6px 20px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" >Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success text-white" id="links">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-success text-white" id="links">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-4"></div>
                    <div class="col-md-4">
                                    @include('include/message')

                            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                    <h5 class="card-header bg-success text-white">Check Senate List</h5>
                                    <div class="card-body">
                <form action=" {{ route('checkList')}} " method="post">
                    @csrf
                        <div class="form-group">
                            <label for="surname" class="text-success font-weight-bold">Surname</label>
                            <input name="surname" type="text" class="form-control" id="surname" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                                <label for="dob" class="text-success font-weight-bold">Date of Birth</label>
                                <input name="dob" type="date" class="form-control" id="dob">
                            </div>
                        <div class="form-group">
                            <label for="matric" class="text-success font-weight-bold">Matric Number</label>
                            <input type="text" name="matric" class="form-control" id="matric">
                        </div>                       
                      
                        <button type="submit" class="btn btn-success bg-lg">Search</button>
                    </form>
              </div>
            </div>
          </div>                 
        <div class="col-md-4"></div>
     <p class="text-center text-white text-bold shadow-lg">
        <strong style="margin-left: 420px;" class="text-center text-white text-bold shadow-lg">Copyright &copy; <?php echo date("Y"); ?>&nbsp NYSC_Posting_System &nbsp.</strong> All rights reserved.
      </p>
                </div>            
            </div> 
        </div>
    </body>
</html>
