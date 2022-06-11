<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">

        <style>
            article {
                background: linear-gradient(
                    to right,
                    hsl(98 100% 62%),
                    hsl(204 100% 59%)
                );
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                text-align: center;
            }

            h1 {
                font-size: 10vmin;
                line-height: 1.1;
            }


            h1, p, body {
                margin: 0;
            }


        </style>


        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <article>
                    <h3 class="brand-text" style="animation: ease-in-out;padding-top: 6px;padding-left: 5px; font-size: 25px;font-weight: bold;">SUB CAS</h3>

                </article>
            </ul>

        </div>

        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item d-lg-block" style="padding-right: 15px;"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

            <li class="nav-item d-lg-block" style="padding-right: 15px;"><a id="goFS" onclick="toggleFullScreen()"><i class="ficon" data-feather="move"></i></a></li>



            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::guard('admin')->user()->name }}</span><span class="user-status">CAS</span></div><span class="avatar"><img class="round" src="{{url('/img/logo.png')}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="me-50" data-feather="user"></i> Profile</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i class="me-50" data-feather="settings"></i> Settings</a>

                    <form method="POST" action="{{ route('dashboard.logout.submit') }}">
                        @csrf
                        <a href="{{ route('dashboard.logout.submit') }}" class="dropdown-item" onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="me-50" data-feather="power"></i> Logout</a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
