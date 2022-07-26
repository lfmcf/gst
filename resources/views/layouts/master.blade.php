<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href={{ asset('app.css') }} />
    <!-- <link rel="stylesheet" href={{ asset('bootstrap-datepicker.min.css') }} /> -->
    <link rel="stylesheet" href={{ asset('bootstrap-datepicker.standalone.min.css') }} />
    <link rel="stylesheet" href={{ asset('bootstrap-datepicker3.min.css') }} />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- <script src="https://malsup.github.io/jquery.form.js"></script>  -->
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
</head>

<body>
   @include('layouts.sidebar')
    <div class="main">
        <div class="top_bar navbar-custom">
            <ul class="list-unstyled topbar-menu float-end mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0">
                        <span class="account-user-avatar">
                            <img src="/download.png" alt="user-image" class="rounded-circle" />
                        </span>
                        <span>
                            <span>Moncef</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>
                        <a class="dropdown-item notify-item">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Log out</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            <!-- <div class="" ></div> -->
            @yield('content')
        </div>
        
    </div>
    
    
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
    <script src={{ asset('app.js') }}></script>
    <script src={{ asset('bootstrap-datepicker.min.js') }}></script>
   
</body>

</html>