<header id="header">
    <div class="container">
        <div class=""></div>
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('home/images/logo.svg')}}" alt="logo"> </a>
        </div>
        <div class="header-right">
            <nav id="nav">
            <a href="#" class="nav-opener" for="toggle"><i class="fa-solid fa-xmark"></i></a>
                <ul>
                    <li><a class="active" href="{{route('story')}}"><i class="fa fa-book nav-2"></i>Story</a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart nav-2"></i>Store</a></li>
                    <li><a href="#"><i class="fa fa-download nav-2"></i>Download App</a></li>
                    <li><a href="{{route('contactus')}}"><i class="fa fa-envelope nav-2"></i>Contact Us</a></li>
                </ul>
{{--                <div class="nav_btn">--}}
{{--                    <ul>--}}
{{--                        <li><a href="{{route('signin')}}"><i class="fa fa-sign-in nav-2"></i>Log In</a></li>--}}
{{--                        <li><a href="{{route('signup')}}"><i class="fa fa-user nav-2"></i>Sign Up</a></li>--}}
{{--                        <li class="toggle"><span class="bars"></span></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </nav>
            <div class="profile">
                <span><a href=""></a><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                <div class="dropdown">
                    <button id="dropdownMenuButton" data-toggle="dropdown">
                        <img src="{{\Illuminate\Support\Facades\Auth::user()->picture ?? asset('images/user1.png')}}"  alt="Profile Image">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <ul>
                            <li class="showdow">
                                <div class="p-icon"><a href="#"><img src="{{\Illuminate\Support\Facades\Auth::user()->picture ?? asset('images/user1.png')}}"  alt="Profile Image"></a>
                                <span>
                                        <p>{{Auth::user()->name}} <br> {{\Illuminate\Support\Facades\Auth::user()->username}}</p>
                                    </span>
                                </div>
                            </li>
                            <li><a href="{{route('manageaccount',\Illuminate\Support\Facades\Auth::user()->id)}}"><i class="fa fa-user" aria-hidden="true"></i> Manage
                                    Account</a></li>
                            <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> My Wallet</a>
                            </li>
                            <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="#" class="nav-opener" for="toggle"><i class="fa-solid fa-bars"></i></a>
        </div>
    </div>
</header>

<div class="clearfix"></div>

