 <style>
 </style>
<div class="sidenav-menu">
    <a href="{{ route('dashboard') }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo"></span>
            <span class="logo-sm"><img src="{{ asset('backend/assets/images/logo-sm-light.png') }}" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="dark logo"></span>
            {{-- <img src="{{ asset('backend/assets/images/logo.svg') }}" height="80" alt="dark logo"> --}}
            <span class="logo-sm"><img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="small logo"></span>
        </span>
    </a>
    <button class="button-sm-hover">
        <i class="ti ti-circle align-middle"></i>
    </button>
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>
        <ul class="side-nav">
            <li class="side-nav-item {{ (Route::is('dashboard')) ? 'active' : ''}}">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-view-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                    <span class="badge bg-success rounded-pill"></span>
                </a>
            </li>
            <li class="side-nav-item {{ (Route::is('users.index') || Route::is('users.show') || Route::is('users.create') || Route::is('users.edit')) ? 'active' : ''}}">
                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-lock-outline"></i></span>
                    <span class="menu-text"> User Management </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ (Route::is('users.index') || Route::is('users.show') || Route::is('users.create') || Route::is('users.edit')) ? 'show' : ''}}" id="sidebarPagesAuth">
                    <ul class="sub-menu">
                        <li class="side-nav-item {{ (Route::is('users.index') || Route::is('users.edit') || Route::is('users.create')) ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class="side-nav-link {{ (Route::is('users.index') || Route::is('users.edit') || Route::is('users.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">User</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item {{ 
                (Route::is('roles.index') || 
                Route::is('roles.show') || 
                Route::is('roles.create') ||
                Route::is('permissions.index') || 
                Route::is('permissions.show') || 
                Route::is('permissions.create') || 
                Route::is('permissions.edit') ||
                Route::is('roles.edit')) ? 'active' : ''
            }}">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-file-document-outline"></i></span>
                    <span class="menu-text"> Role Manage </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ 
                    (Route::is('roles.index') || 
                    Route::is('roles.show') || 
                    Route::is('roles.create') || 
                    Route::is('roles.edit') || 
                    Route::is('permissions.index') || 
                    Route::is('permissions.show') || 
                    Route::is('permissions.create') || 
                    Route::is('permissions.edit')) ? 'show' : ''
                }}" id="sidebarPages">
                    <ul class="sub-menu">
                        <li class="side-nav-item {{ (Route::is('roles.index') || Route::is('roles.edit') || Route::is('roles.create')) ? 'active' : '' }}">
                            <a href="{{ route('roles.index') }}" class="side-nav-link {{ (Route::is('roles.index') || Route::is('roles.edit') || Route::is('roles.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Role</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('permissions.index') }}" class="side-nav-link {{ (Route::is('permissions.index') || Route::is('permissions.edit') || Route::is('permissions.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Permission</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item {{ 
                (Route::is('announcements.index') || 
                Route::is('announcements.show') || 
                Route::is('announcements.create') ||
                Route::is('announcements.edit')) ? 'active' : ''
            }}">
                <a data-bs-toggle="collapse" href="#sidebarAnnouncePages" aria-expanded="false" aria-controls="sidebarAnnouncePages" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-file-document-outline"></i></span>
                    <span class="menu-text"> Announcement</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ 
                    (Route::is('announcements.index') || 
                    Route::is('announcements.show') || 
                    Route::is('announcements.create') || 
                    Route::is('announcements.edit')) ? 'show' : ''
                }}" id="sidebarAnnouncePages">
                    <ul class="sub-menu">
                        <li class="side-nav-item {{ (Route::is('announcements.index') || Route::is('announcements.edit') || Route::is('announcements.create')) ? 'active' : '' }}">
                            <a href="{{ route('announcements.index') }}" class="side-nav-link {{ (Route::is('announcements.index') || Route::is('announcements.edit') || Route::is('announcements.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Announcement</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item {{ 
                (Route::is('category.index') || 
                Route::is('category.show') || 
                Route::is('category.create') ||
                Route::is('category.edit')) ? 'active' : ''
            }}">
                <a data-bs-toggle="collapse" href="#sidebarCategoryPages" aria-expanded="false" aria-controls="sidebarCategoryPages" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-file-document-outline"></i></span>
                    <span class="menu-text"> Category manage</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ 
                    (Route::is('category.index') || 
                    Route::is('category.show') || 
                    Route::is('category.create') || 
                    Route::is('category.edit')) ? 'show' : ''
                }}" id="sidebarCategoryPages">
                    <ul class="sub-menu">
                        <li class="side-nav-item {{ (Route::is('category.index') || Route::is('category.edit') || Route::is('category.create')) ? 'active' : '' }}">
                            <a href="{{ route('category.index') }}" class="side-nav-link {{ (Route::is('category.index') || Route::is('category.edit') || Route::is('category.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item {{ 
                (Route::is('widget.index') || 
                Route::is('widget.show') || 
                Route::is('widget.create') ||
                Route::is('widget.edit')) ? 'active' : ''
            }}">
                <a data-bs-toggle="collapse" href="#sidebarWidgetPages" aria-expanded="false" aria-controls="sidebarWidgetPages" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-file-document-outline"></i></span>
                    <span class="menu-text"> Widget manage</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ 
                    (Route::is('widget.index') || 
                    Route::is('widget.show') || 
                    Route::is('widget.create') || 
                    Route::is('widget.edit')) ? 'show' : ''
                }}" id="sidebarWidgetPages">
                    <ul class="sub-menu">
                        <li class="side-nav-item {{ (Route::is('widget.index') || Route::is('widget.edit') || Route::is('widget.create')) ? 'active' : '' }}">
                            <a href="{{ route('widget.index') }}" class="side-nav-link {{ (Route::is('widget.index') || Route::is('widget.edit') || Route::is('widget.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Widget</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item {{ 
                (Route::is('page.index') || 
                Route::is('page.show') || 
                Route::is('page.create') ||
                Route::is('page.edit')) ? 'active' : ''
            }}">
                <a data-bs-toggle="collapse" href="#sidebarPagePages" aria-expanded="false" aria-controls="sidebarPagePages" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-file-document-outline"></i></span>
                    <span class="menu-text"> Page manage</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ 
                    (Route::is('page.index') || 
                    Route::is('page.show') || 
                    Route::is('page.create') || 
                    Route::is('page.edit')) ? 'show' : ''
                }}" id="sidebarPagePages">
                    <ul class="sub-menu">
                        <li class="side-nav-item {{ (Route::is('page.index') || Route::is('page.edit') || Route::is('page.create')) ? 'active' : '' }}">
                            <a href="{{ route('page.index') }}" class="side-nav-link {{ (Route::is('page.index') || Route::is('page.edit') || Route::is('page.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Page</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item {{ 
                (Route::is('menu.index') || 
                Route::is('menu.show') || 
                Route::is('menu.create') ||
                Route::is('menu.edit')) ? 'active' : ''
            }}">
                <a data-bs-toggle="collapse" href="#sidebarMenuPages" aria-expanded="false" aria-controls="sidebarMenuPages" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-file-document-outline"></i></span>
                    <span class="menu-text"> Menu manage</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ 
                    (Route::is('menu.index') || 
                    Route::is('menu.show') || 
                    Route::is('menu.create') || 
                    Route::is('menu.edit')) ? 'show' : ''
                }}" id="sidebarMenuPages">
                    <ul class="sub-menu">
                        <li class="side-nav-item {{ (Route::is('menu.index') || Route::is('menu.edit') || Route::is('menu.create')) ? 'active' : '' }}">
                            <a href="{{ route('menu.index') }}" class="side-nav-link {{ (Route::is('menu.index') || Route::is('menu.edit') || Route::is('menu.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Menu</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item {{ 
                (Route::is('notice.index') || 
                Route::is('notice.show') || 
                Route::is('notice.create') ||
                Route::is('notice.edit')) ? 'active' : ''
            }}">
                <a data-bs-toggle="collapse" href="#sidebarNoticePages" aria-expanded="false" aria-controls="sidebarNoticePages" class="side-nav-link">
                    <span class="menu-icon"><i class="mdi mdi-file-document-outline"></i></span>
                    <span class="menu-text">Site Setting</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse {{ 
                    (Route::is('notice.index') || 
                    Route::is('notice.show') || 
                    Route::is('notice.create') || 
                    Route::is('notice.edit')) ? 'show' : ''
                }}" id="sidebarNoticePages">
                    <ul class="sub-menu">
                        <li class="side-nav-item {{ (Route::is('notice.index') || Route::is('notice.edit') || Route::is('notice.create')) ? 'active' : '' }}">
                            <a href="{{ route('notice.index') }}" class="side-nav-link {{ (Route::is('notice.index') || Route::is('notice.edit') || Route::is('notice.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Notice</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ (Route::is('gallery.index') || Route::is('gallery.edit') || Route::is('gallery.create')) ? 'active' : '' }}">
                            <a href="{{ route('gallery.index') }}" class="side-nav-link {{ (Route::is('gallery.index') || Route::is('gallery.edit') || Route::is('gallery.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Gallery</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ (Route::is('banner.index') || Route::is('banner.edit') || Route::is('banner.create')) ? 'active' : '' }}">
                            <a href="{{ route('banner.index') }}" class="side-nav-link {{ (Route::is('banner.index') || Route::is('banner.edit') || Route::is('gallery.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Banner</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ (Route::is('party.index') || Route::is('party.edit') || Route::is('party.create')) ? 'active' : '' }}">
                            <a href="{{ route('party.index') }}" class="side-nav-link {{ (Route::is('party.index') || Route::is('party.edit') || Route::is('gallery.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Party</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ (Route::is('video.index') || Route::is('video.edit') || Route::is('video.create')) ? 'active' : '' }}">
                            <a href="{{ route('video.index') }}" class="side-nav-link {{ (Route::is('video.index') || Route::is('video.edit') || Route::is('video.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Video</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ (Route::is('link.index') || Route::is('link.edit') || Route::is('link.create')) ? 'active' : '' }}">
                            <a href="{{ route('link.index') }}" class="side-nav-link {{ (Route::is('link.index') || Route::is('link.edit') || Route::is('link.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Use Full Link</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ (Route::is('archive.index') || Route::is('archive.edit') || Route::is('archive.create')) ? 'active' : '' }}">
                            <a href="{{ route('archive.index') }}" class="side-nav-link {{ (Route::is('archive.index') || Route::is('archive.edit') || Route::is('archive.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Archive</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ (Route::is('global.create')) ? 'active' : '' }}">
                            <a href="{{ route('global.create') }}" class="side-nav-link {{ (Route::is('global.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Global Setting</span>
                            </a>
                        </li>
                        <li class="side-nav-item {{ (Route::is('directory.index') || Route::is('directory.edit') || Route::is('directory.create')) ? 'active' : '' }}">
                            <a href="{{ route('directory.index') }}" class="side-nav-link {{ (Route::is('directory.index') || Route::is('directory.edit') || Route::is('directory.create')) ? 'active' : '' }}">
                                <i class="fas fa-arrow-right"></i>
                                <span class="menu-text">Directory Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>