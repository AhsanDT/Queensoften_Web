<header id="header">
    <div class="container">


        <div class="userDropDown">

            <a href="#" class="d-block link-dark text-decoration-none userSidebarOpener">
                <img src="{{auth('admin')->user()->picture}}" alt="mdo" class="rounded-circle" width="32" height="32">
            </a>
            <div class="userSidebar">
                <div class="profileDetail">

                    <div class="sidebar-header">
                        <a href="#" class="userSidebarOpener"><i class="far fa-long-arrow-left"></i> </a>
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <a href="#" class="UserImg">
                        <img src="{{auth('admin')->user()->picture}}" alt="mdo" class="rounded-circle">
                    </a>
                    <form class="infoForm" autocomplete="off">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" value="{{auth('admin')->user()->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{auth('admin')->user()->email}}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" value="****************">
                            <i class="fa-eye"></i>
                        </div>
                    </form>
                    <a href="#" class="btn editButton">Edit Details</a>
                </div>

                <div class="profileEidt">
                    <div class="sidebar-header">
                        <a href="#" class="backBtn"><i class="far fa-long-arrow-left"></i> </a>
                        <h5 class="mb-0">Edit Information</h5>
                    </div>
                    <form class="eidtForm ajax-form" enctype="multipart/form-data" method="POST"
                          data-action="{{route('profile.update',['id'=>auth('admin')->user()->id])}}"
                          autocomplete="off">
                        @csrf()
                        <div class="UserImg">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="picture" accept=".png, .jpg, .jpeg"/>
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                     style="background-image: url({{auth('admin')->user()->picture}});">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{auth('admin')->user()->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"
                                   value="{{auth('admin')->user()->email}}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Reset Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <button type="submit" class="btn saveButton">Save Changes</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="notify-DropDown">
            <a href="#" class="notify-btn">
                <svg width="25" height="25" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M29.6195 13.9274C29.6195 15.9159 30.1451 17.088 31.3017 18.4387C32.1782 19.4338 32.4583 20.7111 32.4583 22.0969C32.4583 23.481 32.0035 24.7951 31.0924 25.8619C29.8996 27.1408 28.2174 27.9573 26.5006 28.0992C24.0127 28.3113 21.5233 28.4899 19.0007 28.4899C16.4767 28.4899 13.9888 28.3831 11.5009 28.0992C9.78252 27.9573 8.10032 27.1408 6.9091 25.8619C5.99797 24.7951 5.54163 23.481 5.54163 22.0969C5.54163 20.7111 5.8233 19.4338 6.69823 18.4387C7.89103 17.088 8.382 15.9159 8.382 13.9274V13.2528C8.382 10.5897 9.04606 8.84833 10.4135 7.14362C12.4466 4.65752 15.7056 3.1665 18.9299 3.1665H19.0716C22.3651 3.1665 25.7295 4.72928 27.728 7.32222C29.0247 8.99185 29.6195 10.6599 29.6195 13.2528V13.9274ZM14.3666 31.7628C14.3666 30.9655 15.0983 30.6003 15.775 30.444C16.5665 30.2766 21.3897 30.2766 22.1812 30.444C22.8578 30.6003 23.5896 30.9655 23.5896 31.7628C23.5502 32.5219 23.1049 33.1948 22.4896 33.6222C21.6918 34.2441 20.7555 34.638 19.7767 34.7799C19.2354 34.8501 18.7035 34.8517 18.1811 34.7799C17.2007 34.638 16.2644 34.2441 15.4681 33.6206C14.8513 33.1948 14.4059 32.5219 14.3666 31.7628Z"
                          fill="#C6C6C6"/>
                </svg>

                @php $supportTicket = \App\Models\SupportTicket::where('read',0)->where('reply','!=',1)->get(); @endphp
                @php
                    if(count($supportTicket)>0){
                @endphp
                <span class="counter"></span>
                @php
                    }
                @endphp
            </a>
            <div class="dropdown">
                <ul>
                    <li>
                        <h4 class="p-3">Recent Notifications</h4>
                    </li>
                    @php
                        $notifications = \App\Models\Notification::limit(7)->orderBy('id','DESC')->get();
                    @endphp
                    <li>
                        @foreach($notifications as $notification)
                            @if($notification->user && $notification->notificationType)
                                <a href="{{($notification->notificationType->slug == 'message') ? route('support.index') : '#'}}">
                                    <div class="imgBox">
                                        <img src="{{$notification->user->picture}}" width="40" height="40">
                                        <i class="{{$notification->notificationType->icon}}"></i>
                                    </div>
                                    <div class="description">
                                        <h6 class="mb-0 font-13">{{ucwords($notification->user->name)}}</h6>
                                        <p>{{$notification->notificationType->message}}</p>
                                        <time>{{changeTimeFormat($notification->created_at->diffForHumans())}}</time>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
        <a href="#" class="nav-opener"><i class="fal fa-bars"></i> </a>

        <nav id="nav">
            <div class="logo >
                <a href="{{route('index')}}">
            <img src="{{asset('images/Queens_of_ten.png')}}">
            </a>
    </div>
    <ul>
        <li class="{{ request()->routeIs('index') ? "active" : ""}}">
            <a href="{{route('index')}}">
                <i class="icon-qDashboardIcon"></i>
                Dashboard
            </a>
        </li>
        <li class="{{ request()->routeIs('users.index') ? "active" : ""}}">
            <a href="{{route('users.index')}}">
                <i class="icon-qUser"></i>
                Users
            </a>
        </li>
        <li class="{{ request()->routeIs('challenges.index') ? "active" : ""}}">
            <a href="{{route('challenges.index')}}">
                <i class="fas fa-star"></i>
                Challenges
            </a>
        </li>
        <li class="{{ request()->routeIs('support.index') ? "active" : ""}}">
            <a href="{{route('support.index')}}">
                <i class="fas fa-envelope"></i>
                Support
            </a>
        </li>
        <li class="{{ request()->routeIs('guidelines.index') ? "active" : ""}}">
            <a href="{{route('guidelines.index')}}">
                <i class="fas fa-question-circle"></i>
                Guidelines
            </a>
        </li>
        <li class="{{ request()->routeIs('setting.index') ? "active" : ""}}">
            <a href="{{route('setting.index')}}">
                <i class="fas fa-gear"></i>
                Settings
            </a>
        </li>
        <li>
            <a href="{{route('logout')}}">
                <i class="icon-qLogoutIcon"></i>
                Log out
            </a>
        </li>
    </ul>
    </nav>
    </div>
</header>
