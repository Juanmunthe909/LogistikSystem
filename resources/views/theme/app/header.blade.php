<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo mx-5">
                    <a class="logo">
                        <span>
                            {{-- <img src="{{ asset('assets/images/ks/logobg.png') }}" alt=""
                                class="rounded-circle bg-roun" height="80" width="100"> --}}
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    {{-- <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        @if (Auth::user()->role == 'operator')
                            <a type="button" href="javascript:;" onclick="tombol_notif();"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-bell fs-22"></i>
                                <span
                                    class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"
                                    id="top-notification-number"></span>
                            </a>
                        @endif
                        <div class="dropdown-menu dropdown-menu-end p-0 " style="width: 25rem"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="dropdown-head bg-success bg-pattern rounded-top">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold text-white">Notifications</h6>
                                        </div>
                                        <div class="col-auto dropdown-tabs">
                                            <span class="badge badge-soft-light fs-13"><span id="jmlh-notif"></span>
                                                New!</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-content" id="notificationItemsTabContent">
                                <div class="tab-pane fade show active" id="all-noti-tab" role="tabpanel">
                                    <div data-simplebar style="max-height: 300px" class="">
                                        <div class="text-reset text-wrap dropdown-item position-relative"
                                            style="margin-left: -10px" id="notification_items">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="top-cart">

                        <button type="button" class="btn btn-ghost-warning rounded-circle"
                            id="page-header-user-dropdown" data-bs-auto-close="outside" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <span class="text-start ms-xl-2">
                                    <i class="bx bx-user text-white fs-22 align-middle me-1"></i>
                                    <span
                                        class="d-none d-xl-inline-block ms-1 fw-medium user-name-text text-white text-capitalize">{{ Auth::User()->fullname }}</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <h6 class="dropdown-header">Welcome {{ Auth::User()->fullname }}!</h6>
                            @auth
                                @if (Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle" data-key="t-logout">Logout</span>
                                    </a>
                                @elseif (Auth::user()->role == 'operator')
                                    <a class="dropdown-item" href="{{ route('operator.logout') }}">
                                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle" data-key="t-logout">Logout</span>
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('web.logout') }}">
                                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                        <span class="align-middle" data-key="t-logout">Logout</span>
                                    </a>
                            </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
