<nav class="navbar navbar-dark navbar-theme-info px-4 col-12 d-md-none">
    <a class="navbar-brand mr-lg-5" href="../../index.html">
        <img class="navbar-brand-dark" src="../../assets/img/brand/light.svg" alt="Volt logo" /> <img
            class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-md-block bg-info text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="user-avatar lg-avatar mr-4">
                    <img src="../../assets/img/team/profile-picture-3.jpg"
                        class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h6">Hi, Jane</h2>
                    <a href="" class="btn btn-secondary text-dark btn-xs"><span
                            class="mr-2"><span class="fas fa-sign-out-alt"></span></span>Sign Out</a>
                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse" data-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
            </div>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item active ">
                <a class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                    <span>SIM BANDUNG</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-icon"><span class="fas fa-mail-bulk"></span></span>
                    <span>Persuratan</span>
                </a>
                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">
                    <a class="dropdown-item font-weight-bold text-info" href="{{ route('suratmasuk.create') }}"><span class="fas fa-envelope-open-text"></span>Surat Masuk</a>
                    <a class="dropdown-item font-weight-bold text-info" href="{{ route('home') }}"><span class="fas fa-envelope-open-text"></span>Surat Keluar</a>
                    <a class="dropdown-item font-weight-bold text-info" href=""><span class="fas fa-user-shield text-info"></span>Surat Konfirmasi Ijazah</a>
                    <a class="dropdown-item font-weight-bold text-info" href=""><span class="fas fa-user-shield text-info"></span>Surat Keterangan Aktif</a>
                    <a class="dropdown-item font-weight-bold text-info" href=""><span class="fas fa-cloud-upload-alt text-info"></span>Upload Files</a>
                    
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sidebar-icon"><span class="fas fa-hand-holding-usd"></span></span>
                    <span>Transactions</span>
                </a>
                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">
                    <a class="dropdown-item font-weight-bold text-info" href="/home"><span class="fas fa-tasks text-info"></span>Setting</a>
                    <a class="dropdown-item font-weight-bold text-info" href=""><span
                            class="fas fa-cloud-upload-alt text-info"></span>Upload Files</a>
                    <a class="dropdown-item font-weight-bold text-info" href=""><span class="fas fa-user-shield text-info"></span>Preview
                        Security</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item font-weight-bold text-info" href=""><span
                            class="fas fa-rocket text-info"></span>Upgrade to Pro</a>
                </div>
            </li>
            <li class="nav-item ">
                <a href="" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-cog"></span></span>
                    <span>Settings</span>
                </a>
            </li>
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-black"></li>
            <li class="nav-item">
                <a href="" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <img src="../../assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
                    </span>
                    <span class="mt-1">Volt Overview</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon"><span class="fas fa-book"></span></span>
                    <span>Quick Start</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <img src="../../assets/img/themesberg.svg" height="20" width="20" alt="Themesberg Logo">
                    </span>
                    <span>Themesberg</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}"
                    class="btn btn-warning d-flex align-items-center justify-content-center btn-upgrade-pro" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span class="sidebar-icon"><span class="fas fa-rocket mr-2"></span></span>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>