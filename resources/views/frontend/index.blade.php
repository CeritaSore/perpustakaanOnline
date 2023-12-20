<!DOCTYPE html>
<html lang="en">

<head>
    <title>BookSaw - Free Book Store HTML CSS Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="frontend/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="frontend/icomoon/icomoon.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="frontend/style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    <div id="header-wrap">
        <header id="header">
            <div class="container-fluid">
                <div class="row">
                    <!-- logo -->
                    <div class="col-md-2">
                        <div class="main-logo">
                            <a href="index.html"><img src="images/main-logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <!-- navbar -->
                    <div class="col-md-10">
                        <nav id="navbar">
                            <div class="main-menu stellarnav">
                                <ul class="menu-list">
                                    <li class="menu-item {{$title === 'home'?'active':''}}"><a href="/">Home</a></li>

                                    <li class="menu-item {{$title === 'feature'?'active':''}}"><a href="/feature" class="nav-link">Featured</a>
                                    </li>
                                    <li class="menu-item {{$title === 'popular'?'active':''}}"><a href="/popular" class="nav-link">Popular</a></li>
                                    <li class="menu-item {{$title === 'about'?'active':''}}"><a href="/about" class="nav-link">About</a></li>
                                    
                                    <li class="menu-item"><a
                                            href="/dashboard"
                                            class="nav-link btn btn-outline-dark rounded-pill m-0">Login</a></li>
                                </ul>

                                <div class="hamburger">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </div>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div><!--header-wrap-->
    @yield('container')
    
    
    
    @include('frontend.footer')
    <script src="frontend/js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="frontend/js/plugins.js"></script>
    <script src="frontend/js/script.js"></script>

</body>

</html>
