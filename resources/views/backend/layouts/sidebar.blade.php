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
                            {{-- <li>
                                <a href="{{ route('product-category.index') }}">Category</a>
                            </li>
                            <li>
                                <a href="{{ route('product-subcategory.index') }}">Sub-Category</a>
                            </li> --}}
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
                                <a href="{{ route('banner.create') }}">Create Hero

                                </a>
                                <a href="{{ route('banner.index') }}">
                                    View Hero
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#caseStudySection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Case Study Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="caseStudySection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('case.study.backend.index') }}">Create Hero

                                </a>
                                <a href="{{ route('case.study.backend.show.all') }}">
                                    View Hero
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('project-discussion.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Project Discussion</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('industry.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Industries</span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarAboutPage" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> About Page</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAboutPage">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('about.create') }}">Create

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarSerivces" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Services </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSerivces">
                        <ul class="nav-second-level">
                            @php
                                $categories = getRecords('service_categories');
                            @endphp
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('service.subs.view', $category->id) }}">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#user-doc" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>User Documents</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="user-doc">
                        <ul class="nav-second-level">
                            <li>

                                <a href="{{ route('user-doc.index') }}">Show</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#Section-manager" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Section Manager</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Section-manager">
                        <ul class="nav-second-level">
                            <li>

                                <a href="{{ route('partner-section.index') }}">About Us Partner Section</a>
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
                    <a href="#invoiceSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Invoice</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="invoiceSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('invoice.create') }}">
                                    Create
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('invoice.index') }}">
                                    View All
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#user-appointmentSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>User Appointments</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="user-appointmentSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('user-appointments.index') }}">
                                    Pending For Approval
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user-appointments.approved') }}">
                                    Approved
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user-appointments.completed') }}">
                                    Completed
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#clientStudio" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Client Studio</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="clientStudio">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('client-studio.index') }}">
                                    Create
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('client-studio.create') }}">
                                    View
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
                                <a href="{{ route('map.create') }}">Create</a>
                                <a href="{{ route('map.index') }}">
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
                    <a href="#timeTracking" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Time Tracking</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="timeTracking">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('calendar.create') }}">Calendar</a>
                            </li>
                            <li>
                                <a href="{{ route('calendar.index') }}">View Events</a>
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



                <li>
                    <a href="#clientSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Clients</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="clientSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('client.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('client.index') }}">View</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#bookSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Book</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="bookSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('book.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('book.index') }}">View</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#courseSection" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Courses</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="courseSection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('course.create') }}">Create Course</a>
                            </li>
                            <li>
                                <a href="{{ route('course.backend.index') }}">View Courses</a>
                            </li>
                            <li>
                                <a href="{{ route('video.create') . '?course_id=1' }}">Create Video</a>
                            </li>
                            <li>
                                <a href="{{ route('video.index') . '?course_id=1' }}">View Videos</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#expertProfile" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Expert Profile</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="expertProfile">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('expert-profile.create') }}">Create</a>
                            </li>
                            <li>
                                <a href="{{ route('expert-profile.index') }}">View</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#reviews" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Reviews</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="reviews">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('review.index', 'package') }}">Package Reviews</a>
                            </li>
                            <li>
                                <a href="{{ route('review.index', 'service') }}">Service Reviews</a>
                            </li>
                            <li>
                                <a href="{{ route('review.index', 'book') }}">Book Reviews</a>
                            </li>
                            <li>
                                <a href="{{ route('review.index', 'expert-profile') }}">Expert Reviews</a>
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
