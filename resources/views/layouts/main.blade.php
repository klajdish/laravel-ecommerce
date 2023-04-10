<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="/css/custom.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar my-navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="https://imgur.com/sbUlQpy" alt="" />
            LOGO</a
          >
          <button
            class="navbar-toggler border-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span
              class="iconify bar-icon"
              data-icon="fa-solid:bars"
              data-inline="false"
            ></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            {{-- nav-active --}}
              <li class="nav-item">
                <a class="nav-link" href="/">
                    Home
                </a>
              </li>
              @if(Session::has('loginId'))
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
              @endif
              @if(!Session::has('loginId'))
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
    </nav>

    @yield('content')

</body>
</html>
