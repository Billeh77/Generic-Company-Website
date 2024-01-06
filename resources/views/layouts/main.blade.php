<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <title>  Company Webpage Template</title>

    </head>

    <body>
    <div class="fixed-top">
        <div class="container-fluid row">
            <nav class="navbar navbar-expand-sm bg-white navbar-white">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img src="{{ asset('Images/logo.png') }}" alt="Company Logo" style="width: 140px;" class="rounded-pill"> 
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Services</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Service 1</a></li>
                              <li><a class="dropdown-item" href="#">Service 2</a></li>
                              @auth
                              @php
                                    $user = \Auth::user();
                              @endphp
                              <li><a class="dropdown-item" href="{{ route('todolist') }}">To do list
                                 <span class="badge bg-danger">{{ $user->tasks->count() }}</span></a></li>
                              @else
                              <li><a class="dropdown-item" href="{{ route('login') }}">To do list </a></li>
                              @endauth

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Awards</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Award 1</a></li>
                              <li><a class="dropdown-item" href="#">Award 2</a></li>
                              <li><a class="dropdown-item" href="#">Award 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Upcoming Events</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Event 1</a></li>
                              <li><a class="dropdown-item" href="#">Event 2</a></li>
                              <li><a class="dropdown-item" href="#">Event 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">More</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">More 1</a></li>
                              <li><a class="dropdown-item" href="#">More 2</a></li>
                              <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" placeholder="Search" aria-label="Search" value="">
                        <a class="btn btn-outline-success" onclick="searchPage()" id="search">Search</a>
                    </form>
                </div>
            </nav>
        </div>
        <div class="container-fluid row">
            <nav class="navbar navbar-expand-sm bg-primary navbar-primary">
                <div class="container-fluid">
                    <ul class="navbar-nav mr-auto"> 
                        <li class="nav-item">
                            <a class="nav-link active text-white me-3" href="{{ route('home') }}" role="button">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-3" href="{{ route('about') }}" role="button">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-3" href="{{ route('clients') }}" role="button">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-3" href="{{ route('news') }}" role="button">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-3" href="{{ route('contact') }}" role="button">Contact</a>
                        </li>
                        @auth
                        @if (\Auth::user()->isAdmin)
                        <li class="nav-item">
                            <a class="nav-link text-white me-3" href="{{ route('edit') }}" role="button">Edit</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                    
                    <ul class="navbar-nav ml-auto"> 
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-white me-3" href="{{ route('register') }}" role="button">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white me-1" href="{{ route('login') }}" role="button">Log In</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item">
                            <a class="nav-link text-white me-2 mt-2" href="\profile" role="button">Hello, {{ $user->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="\profile" role="button"><img class="rounded-circle" src="{{ asset('Images/profileiconsmall.png') }}" style="width: 36px;"></a>
                        </li>
                        @endauth
                    </ul>
                    
                </div>
            </nav>
        </div>
    </div>

    <div> 
        <div class="tab-content container-fluid">
            @yield('content')
        </div>
    </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}"></script>

        <script> 

        if( window.location.hash){
          console.log("wrked")
          document.querySelectorAll(".tab-pane").forEach(pane => {
                //if(! pane) continue;
                    pane.classList.remove("active");
                });
                // console.log($("#signup"))
                document.querySelector("#signup").classList.add("active");
                // ("#signup").addClass('active')
        }

        function addToList() {
      
        var inputValue = document.getElementsByClassName("form-control")[8].value;
        document.getElementsByClassName("form-control")[8].value = "";
    
        if (inputValue == "") {
            return;
        }
    
        var alertElement = document.createElement("div");
        alertElement.classList.add("alert", "alert-success", "alert-dismissible", "show");
        alertElement.innerHTML = '<button type="button" class="btn-close" data-bs-dismiss="alert" onclick="removeFromList()"></button>' + inputValue;
    
        var container = document.getElementById("taskContainer");
        container.appendChild(alertElement);

        var allTasks = document.getElementsByClassName("alert alert-success alert-dismissible show");
        var size = allTasks.length;

        var oldBadge = document.getElementsByClassName("badge")
        for (let i = 0; i < 2; i++) {
          oldBadge[i].innerHTML = size;
        }
        }
        function removeFromList() {
          var allTasks = document.getElementsByClassName("alert alert-success alert-dismissible show");
          var size = allTasks.length;

          var oldBadge = document.getElementsByClassName("badge")
          for (let i = 0; i < 2; i++) {
            oldBadge[i].innerHTML = size;
          }
        }
        </script>
        
    </body>
</html>