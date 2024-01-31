<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>


    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <ul class="navbar-nav flex-row align-items-center">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link btn btn-sm btn-primary text-white">Home</a>
        </li>
    </ul>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class='ti ti-layout-grid-add ti-md'></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0">
                    <div class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                            <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="ti ti-sm ti-apps"></i></a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- Quick links -->


            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="d-flex flex-wrap">
                        <div class="avatar avatar-online me-2">
                            <img src="{{ asset('img/avatars/1.png') }}" class="h-auto rounded-circle">
                        </div>
                        <div class="ms-1">
                            <h6 class="mb-0">{{ ucfirst(Auth::user()->name) }}</h6>
                            <span>{{ ucfirst(Auth::user()->role->name) }}</span>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.setting') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('img/avatars/1.png') }}" class="h-auto rounded-circle">
                                    </div>
                                </div>


                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block">{{ ucfirst(Auth::user()->name) }}</span>
                                    <small class="text-muted">{{ ucfirst(Auth::user()->role->name) }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.setting') }}">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
</nav>