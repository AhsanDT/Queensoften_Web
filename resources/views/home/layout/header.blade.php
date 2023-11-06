<header id="header">
    <div class="container">
        <div class=""></div>
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('home/images/logo.svg')}}" alt="logo"> </a>
        </div>
        <div class="header-right">
            <nav id="nav">
                <div class="d-flex align-items-center justify-content-between mb-4 d-lg-none d-block">
                    <div class="logo d-lg-none d-block">
                        <a href="{{route('home')}}"><img src="{{asset('home/images/logo.svg')}}" alt="logo"> </a>
                    </div>
                    <a href="#" class="nav-opener" for="toggle"><i class="fa-solid fa-xmark"></i></a>
                </div>

                <ul>
                    <li><a class="active" href="{{route('story')}}"><i class="fa fa-book nav-2"></i>Story</a></li>
                    <li><a href="{{route('product')}}"><i class="fa fa-shopping-cart nav-2"></i>Store</a></li>
                    <li><a href="#"><i class="fa fa-download nav-2"></i>Download App</a></li>
                    <li><a href="{{route('contactus')}}"><i class="fa fa-envelope nav-2"></i>Contact Us</a></li>
                </ul>
                <div class="nav_btn">
                    <ul>
                        <li><a href="{{route('signin')}}"><i class="fa fa-sign-in nav-2"></i>Log In</a></li>
                        <li><a href="{{route('signup')}}"><i class="fa fa-user nav-2"></i>Sign Up</a></li>
                        <li class="toggle"><span class="bars"></span></li>
                    </ul>
                </div>
            </nav>
            <a href="#" class="nav-opener" for="toggle"><i class="fa-solid fa-bars"></i></a>
        </div>
    </div>
</header>

<div class="clearfix"></div>

