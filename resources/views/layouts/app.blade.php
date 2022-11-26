<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


    {{-- Create a navbar as burger sidebar but do not show it in login page--}}
    @if (Route::currentRouteName() != 'login')
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a>
        
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
        
            <div style="background-color: #333" id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a style="color:white" class="navbar-item" href="/phrases">
                        Phrases
                    </a>
        
                    <a style="color:white" class="navbar-item" href="/words">
                        Words
                    </a>
        
                    <a style="color:white" class="navbar-item" href="/dashboard">
                        Questions
                    </a>

                    <a style="color:white" class="navbar-item" href="/random">
                        Randomizer  
                    </a>

                    {{-- If user has administrator permission show this link --}}
                    @if (Auth::user()->hasPermissionTo('admin'))
                        <a style="color:white" class="navbar-item" href="/admin">
                            Admin
                        </a>
                    @endif

                    {{-- Logout form --}}
                    <form action="/logout" method="POST" enctype="multipart/form-data">
                        @csrf
                        <a id="logout" class="navbar-item"><button type="submit" class="button is-danger">Logout</button></a>
                    </form>
                </div>
            </div>
        </nav>
    @else
        <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a>
            </div>
        </nav>
    @endif


    {{-- Make navbar work --}}
    <script>
        $(document).ready(function() {
            $('.navbar-burger').click(function() {
                $('.navbar-burger').toggleClass('is-active');
                $('.navbar-menu').toggleClass('is-active');
            });
        });
    </script>



    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="dashboard">Questions <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="words">Words</a>
                <a class="nav-item nav-link" href="phrases">Phrases</a>
            </div>
        </div>
    </nav> --}}
    @yield('content')
</body>
</html>