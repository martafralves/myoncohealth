<html>
    <head>
        <title>MyOncoHealth </title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" /> 

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel = "stylesheet" type = "text/css" href="assets/css/style.css">
    </head>
    <body>

    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="/"><img src="assets/images/logo.png" width="30" height="30" class = "d-inline-block align-top" alt="Myoncohealth logo - source icons8.com"> 
        <h4 class='brand-name d-inline-block align-top'>MyOncoHealth</h4></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/enquiries">Enquiries</a>
                </li>
            <?php if(session()->get('isLoggedIn')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                <ul class = "navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                </ul>
            <?php else: ?>
            
                <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/login">Patient</a>
                <a class="dropdown-item" href="/adminlogin">Professional</a>
                </div>
            </li>
            </ul>
            <?php endif; ?>
        </div>
        </div>
    </nav>