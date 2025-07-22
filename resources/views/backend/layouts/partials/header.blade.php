<header class="app-topbar">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-2">
            <a href="index.html" class="logo">
                <span class="logo-light">
                    <span class="logo-lg"><img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo"></span>
                    <span class="logo-sm"><img src="{{ asset('backend/assets/images/logo-sm-light.png') }}" alt="small logo"></span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg"><img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="dark logo"></span>
                    <span class="logo-sm"><img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="small logo"></span>
                </span>
            </a>
            <button class="sidenav-toggle-button px-2">
                <i class="mdi mdi-menu font-24"></i>
            </button>
            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="mdi mdi-menu font-22"></i>
            </button>
        </div>

        <div class="d-flex align-items-center gap-2">
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" id="light-dark-mode" type="button">
                    <i class="ti ti-moon font-22"></i>
                </button>
            </div>
            <div class="topbar-item nav-user">
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-lg-flex flex-column gap-1 d-none">
                            <h6 class="my-0">{{ Auth::user()->name ?? '' }}</h6>
                        </span>
                        <i class="mdi mdi-chevron-down d-none d-lg-block align-middle ms-2"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        
                        <a href="{{ route('profile_info') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-cog"></i>
                            <span>Settings</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <form method="POST" action="{{ route('admin-logout') }}" id="admin-logout-form" style="display: none;">
                                @csrf
                        </form>
                            
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                                <i class="mdi mdi-logout-variant"></i>
                            <span class="align-middle">Logout</span>
                        </a>
                        
                    </div>
                </div>
            </div>

            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" type="button">
                    <i class="mdi mdi-cog-outline font-22"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- Topbar End -->