		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                {{ $titletxt}}
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span class="text-black">Hello, <strong>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</strong></span>
										<p class="fs-12 mb-0">{{ $role->type }}</p>
									</div>
                                    <img src="images/profile/pic1.jpg" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('profile.view') }}" class="dropdown-item ai-icon">
                                        <i class="flaticon-381-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    @if ($role->type != 'Administrator')
                                        <a href="{{ route('user.verify') }}" class="dropdown-item ai-icon">
                                            <i class="flaticon-381-fingerprint"></i>
                                            <span class="ml-2">Verify Account </span>
                                        </a>
                                    @endif

                                    <a href="./email-inbox.html" class="dropdown-item ai-icon">
                                        <i class="flaticon-381-send-1"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="#" class="dropdown-item ai-icon" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="flaticon-381-multiply"></i>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                    </form>
                                    @if ($role->type != 'Administrator')
                                        <a href="./admin.html" class="dropdown-item ai-icon">
                                            <i class="flaticon-381-padlock-1"></i>
                                            <span class="ml-2">Admin Experience </span>
                                        </a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
