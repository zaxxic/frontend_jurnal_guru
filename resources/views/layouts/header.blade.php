<header class="app-header">
    <style>
        .linknav.active a,
        .linknav a:focus {

            border-bottom: 2px solid #5d87ff;
        }



        @media (max-width: 991px) {
            .logomischool {
                display: none;
            }
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">

            <img class="logomischool" src="{{ asset('assets/dist/images/mi-logo.png') }}" width="50px" alt="">

        </ul>
        <ul class="navbar-nav quick-links d-none d-lg-flex ">

            <li class="linknav nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="dashboard"><span class="judul">Dashboard</span> </a>
            </li>
            <li class="linknav nav-item {{ request()->is('profile') ? 'active' : '' }}">
                <a class="nav-link" href="profile">Profile</a>
            </li>
        </ul>
        <div class="d-block d-lg-none">
            <img src="{{ asset('assets/dist/images/logo.png') }}" class="dark-logo" width="180" alt="" />

        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">

                <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>

                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ asset('assets/dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="35" height="35" alt="" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">Admin Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ asset('assets/dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="80" height="80" alt="" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">Admin pratama</h5>
                                        <span class="mb-1 d-block text-dark">Admin</span>
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> adminpratama@gmail.com
                                        </p>
                                    </div>
                                </div>

                                <div class="d-grid py-4 px-7 pt-8">
                                    <div
                                        class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">

                                        <div class="d-grid py-4 px-7 pt-8">
                                            <button class="btn btn-outline-primary" id="logoutBtn">Log Out</button>
                                        </div>
                                    </div>
                                </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
