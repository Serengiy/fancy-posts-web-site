<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Original - Lifestyle Blog Template</title>

    <!-- Favicon -->

{{--    AJAX--}}
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{--    <link rel="icon" href="img/core-img/favicon.ico">--}}

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{url('style.css')}}">

</head>


<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <!-- Breaking News Area -->
                <div class="col-12 col-sm-6">
                    <div class="breaking-news-area">
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <li><a href="#">Hello World!</a></li>
                                <li><a href="#">Hello Universe!</a></li>
                                <li><a href="#">Hello Original!</a></li>
                                <li><a href="#">Hello Earth!</a></li>
                                <li><a href="#">Hello Colorlib!</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Top Social Area -->
                <div class="col-12 col-sm-6">
                    <div class="my-social-area justify-content-end">
                    @auth
                        <a href="/user/liked-posts" id="my-nav-links">
                            <i class="like-icon">
                            </i><p>Liked posts</p></a
                        >

                        @if(auth()->user()->role == 0)
                                <a href="/admin" id="my-nav-links">
                                 <p>Admin panel</p></a
                                >
                        @endif

                        @if(auth()->user()->role ==1)
                            <a href="/user/manage" id="my-nav-links">
                                <i class="manage-icon">
                                </i><p>Welcome {{auth()->user()->first_name}}</p></a
                            >
                        @endif


                        <form action="/logout" method="post">
                        @csrf
                            <button class="my-btn-social-area" id="my-nav-links">
                                <i class="logout-icon">
                                </i><p>Logout</p> </button
                            >
                        </form>
                    @else
                            <a href="/register" id="my-nav-links">
                                <i class="register-icon">
                                </i><p>Register</p></a
                            >
                            <a href="/login" class="hover:text-laravel" id="my-nav-links">
                                <i class="login-icon">
                                </i><p>Login</p> </a
                            >
                    @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
</header>
<x-flash-message/>


<body>




{{$slot}}



<footer class="footer-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Footer Nav Area -->
                <div class="classy-nav-container breakpoint-off">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-center">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/about')}}">About Us</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">travel</a></li>
                                    <li><a href="#">Music</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>

                <!-- Footer Social Area -->
                <div class="footer-social-area mt-30">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>


</footer>


<script src="{{url('js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{url('js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{url('js/plugins.js')}}"></script>
<!-- Active js -->
<script src="{{url('js/active.js')}}"></script>
{{--Extra func--}}
<script src="{{url('js/extra.js')}}"></script>
{{--Extra func--}}
<script src="//unpkg.com/alpinejs" defer></script>
{{--Modal window--}}
<script src="{{url('js/my-modal.js')}}"></script>
{{--Likes--}}
<script src="{{url('js/like-system.min.js')}}"></script>
{{--Comment script--}}
<script src="{{url('js/my-comment-script.js')}}"></script>

</body>

</html>
