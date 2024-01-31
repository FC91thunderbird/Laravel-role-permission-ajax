<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold">E-Commerce</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-mail"></i>
                <div data-i18n="Email">Dashboard</div>
            </a>
        </li>
       
        <li class="menu-item {{ Route::is('users.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Route::is('roles.*') || Route::is('permissions.*')  ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-settings'></i>
                <div data-i18n="Roles & Permissions">Roles & Permissions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('roles.*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('permissions.*')  ? 'active' : '' }}">
                    <a href="{{ route('permissions.index') }}" class="menu-link">
                        <div data-i18n="Permission">Permission</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item {{ Route::is('category.*') || Route::is('subcategory.*') || Route::is('product.*')  ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-shopping-cart'></i>
                <div data-i18n="Roles & Permissions">E-commerce</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('category.*') ? 'active' : '' }}">
                    <a href="{{ route('category.index') }}" class="menu-link">
                        <div data-i18n="Roles">Category</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('subcategory.*') ? 'active' : '' }}">
                    <a href="{{ route('subcategory.index') }}" class="menu-link">
                        <div data-i18n="Permission">Sub-Category</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('product.*') ? 'active' : '' }}">
                    <a href="{{ route('product.index') }}" class="menu-link">
                        <div data-i18n="Permission">Products</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item {{ Route::is('banner.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-settings'></i>
                <div data-i18n="Roles & Permissions">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('banner.*') ? 'active' : '' }}">
                    <a href="{{ route('banner.index') }}" class="menu-link">
                        <div data-i18n="Roles">Banners</div>
                    </a>
                </li>
            </ul>
        </li>


           

     
    </ul>
</aside>