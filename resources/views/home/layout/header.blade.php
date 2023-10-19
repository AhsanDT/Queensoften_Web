<header id="header">
    <div class="container">
        <div class=""></div>
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('home/images/logo.svg')}}" alt="logo"> </a>
        </div>
        <div class="header-right">
            <nav id="nav" class="nav-1">
            <a href="#" class="nav-opener" for="toggle"><i class="fa-solid fa-xmark"></i></a>
                <ul>
                    <li><a class="active" href="{{route('story')}}">Story</a></li>
                    <li><a href="#">Store</a></li>
                    <li><a href="#">Download App</a></li>
                    <li><a href="{{route('contactus')}}">Contact Us</a></li>
                </ul>
                <div class="nav_btn">
                    <ul>
                        <li><a href="{{route('signin')}}">Log In</a></li>
                        <li><a href="{{route('signup')}}">Sign Up</a></li>
                        <li class="toggle"><span class="bars"></span></li>
                    </ul>
                </div>
            </nav>

            <!-- for small devices  -->
            <nav id="nav" class="nav-2">
            <a href="#" class="nav-opener float-end" for="toggle"><i class="fa-solid fa-xmark"></i></a>
                <div class="clearfix"></div>
                <ul>
                    <li><i class="fa fa-book"></i><a class="active" href="#">Story</a></li>
                    <li><i class="fa fa-shopping-cart"></i><a href="#">Store</a></li>
                    <li><i class="fa fa-download"></i><a href="#">Download App</a></li>
                    <li><i class="fa fa-envelope"></i><a href="../Queenoftens/contactus.php">Contact Us</a></li>
                </ul>
                <div class="nav_btn">
                    <ul>
                        <li><i class="fa fa-sign-in" aria-hidden="true"></i><a href="../Queenoftens/signin.php">Log In</a></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="../Queenoftens/signup.php">Sign Up</a></li>
                        <li class="toggle"><span class="bars"></span></li>
                    </ul>
                </div>
            </nav>
            <a href="#" class="nav-opener" for="toggle"><i class="fa-solid fa-bars"></i></a>
        </div>
    </div>
</header>

<div class="clearfix"></div>

