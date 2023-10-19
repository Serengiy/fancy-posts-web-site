<div class="header-area">
<div class="original-nav-area" id="stickyNav">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between">

                <!-- Subscribe btn -->
                @if(auth()->user()->role == 1)
                    <div class="subscribe-btn">
                        <a href="{{url('/create')}}" class="btn subscribe-btn">New Post</a>
                    </div>
                @else
                    <div class="subscribe-btn">
                        <a href="{{url('/')}}" class="btn subscribe-btn">Home</a>
                    </div>
                @endif

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu" id="originalNav">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Sort by</a>
                                <ul class="dropdown">
                                    <li><a href="#">Date</a>
                                        <ul class="dropdown">
                                            <li><a href="/?new-first=true">New first</a></li>
                                            <li><a href="/?old-first=true">Old first</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/?by-likes=true">likes</a></li>
                                    <li><a href="/?by-comments=true">comments</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Authors</a>
                                <ul class="dropdown">
                                    @foreach($authors as $author)
                                    <li><a href="/?author={{$author->id}}">{{$author['first_name']}}</a></li>
{{--                                        <li>{{$author}}</li>--}}
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{url('/about')}}">About Us</a></li>
                        </ul>

                        <!-- Search Form  -->
                        <div id="search-wrapper">
                            <form action="/">
                                <input type="text" id="search" name="search" placeholder="Search something...">
                                <div id="close-icon"></div>
                                <input class="d-none" type="submit">
                            </form>
                        </div>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
</div>
