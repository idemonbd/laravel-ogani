<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('front.home') }}">
                    <span class="brand-logo">

                    </span>
                    <h2 class="brand-text">ESHOP</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->is('*account') ? 'open':'' }}">
                <a class="d-flex align-items-center" href="{{ route('account.dashboard') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item {{ request()->is('*categories*') ? 'open':'' }}">
                <a class="d-flex align-items-center" href="{{ route('account.categories.index') }}">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate">Categories</span>
                </a>
            </li>
            
           <li class="nav-item {{ request()->is('*products*') ? 'open':'' }}">
                <a class="d-flex align-items-center" href="{{ route('account.products.index') }}">
                    <i data-feather="shopping-bag"></i>
                    <span class="menu-title text-truncate">Products</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('*menus*') ? 'open':'' }}">
                <a class="d-flex align-items-center" href="{{ route('account.menus.index') }}">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate">Menu</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('*settings*') ? 'open':'' }}">
                <a class="d-flex align-items-center" href="{{ route('account.settings.index') }}">
                    <i data-feather="settings"></i>
                    <span class="menu-title text-truncate">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
