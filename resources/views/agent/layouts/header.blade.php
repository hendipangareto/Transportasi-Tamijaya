<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon bx bx-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                            data-toggle="dropdown"><i id="icon-notif" class="ficon bx bx-bell bx-flip-horizontal"></i><span
                                class="badge badge-pill badge-danger badge-up count-notification">
                                0
                            </span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header px-1 py-75 d-flex justify-content-between">
                                    <div class="d-flex"><span class="notification-title count-notification">0</span> <span> &nbsp;new
                                            Notification</span>
                                    </div><span class="text-bold-400 cursor-pointer">Mark all as read</span>
                                </div>
                            </li>
                            

                            <div id="notification-body">


                            </div>
                            
                            <li class="dropdown-menu-footer"><a
                                    class="dropdown-item p-50 text-primary justify-content-center" href="">Read all
                                    notifications</a></li>
                            {{-- {{ route('notification') }} --}}
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name">
                                   Agent</span><span
                                    class="user-status text-muted">Available</span></div><span><img
                                    class="round" src="{{ asset('images/logo-icon.png') }}" alt="avatar"
                                    height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item" href="#"><i
                                    class="bx bx-user mr-50"></i> Profile</a><a {{-- {{ route('inbox') }} --}}
                                class="dropdown-item" href=""><i class="bx bx-envelope mr-50"></i> My
                                Inbox</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off mr-50"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
