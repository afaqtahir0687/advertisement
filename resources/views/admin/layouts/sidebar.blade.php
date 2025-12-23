  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Content Management
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Sliders</span></a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.services.index') }}">
                    <i class="fas fa-fw fa-concierge-bell"></i>
                    <span>Services</span></a>
            </li> -->

            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.banners.index') }}">
                    <i class="fas fa-fw fa-ad"></i>
                    <span>Banners</span></a>
            </li> -->

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Shop Management
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Categories</span></a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Products</span></a>
            </li> -->

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                User Management
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>

            <!-- <hr class="sidebar-divider">

             <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Settings</span></a>
            </li> -->

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <!-- <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a> -->
            </div>

        </ul>