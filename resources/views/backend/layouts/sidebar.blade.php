<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- Update Profile -->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>
                    <!-- Change password-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-password me-1"></i>
                        <span>Change Password</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>

                </li>
                <li class="menu-title mt-2">Frontend Manage</li>
                <li>
                    <a href="#productSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="productSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('product.create') }}">Create Product</a>
                            </li>
                            <li>
                                <a href="{{ route('product.index') }}">View Products</a>
                            </li>
                            <li>
                                <a href="{{ route('product-category.index') }}">Category</a>
                            </li>
                            <li>
                                <a href="{{ route('product-subcategory.index') }}">Sub-Category</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarHeroSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Hero Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarHeroSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('banner.index') }}">
                                    View Hero
                                </a>
                                <a href="{{ route('banner.create') }}">Create Hero

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarInfoSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Info Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarInfoSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('info.index') }}">
                                    View Info
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('info.create') }}">Create Info
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#appointmentSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Appointment Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="appointmentSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('appointment.index') }}">
                                    View All
                                </a>
                                <a href="{{ route('appointment.create') }}">Create

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('social-handle.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Social Media</span>
                    </a>
                </li>
                <li>
                    <a href="#map-section" data-bs-toggle="collapse">
                        <i class="fe-map-pin"></i>
                        <span>Maps</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="map-section">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('map.index') }}">Create</a>
                                <a href="{{ route('map.create') }}">
                                    View All
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#testimonialSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Testimonial Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="testimonialSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('testimonial.index') }}">
                                    View All
                                </a>
                                <a href="{{ route('testimonial.create') }}">Create

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#promoCodeSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Promo Code </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="promoCodeSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('promo-code.create') }}">Create Promo Code</a>
                            </li>
                            <li>
                                <a href="{{ route('promo-code.index') }}">View Promo Code</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#roleSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Roles</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="roleSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('role.create') }}">Create Role</a>
                            </li>
                            <li>
                                <a href="{{ route('role.index') }}">Manage Roles</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
