<style>
    .nav-second-level .mdi {
        font-size: 18px;
    }

    #side-menu>li>a .mdi {
        font-size: 22px !important;
    }
</style>
<div class="left-side-menu">

    <div class="h-100" data-simplebar>


        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class=" border-dark border-bottom">
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>

                </li>
                <li class="menu-title mt-2">Frontend Manage</li>
                <li>
                    <a href="#homepage" data-bs-toggle="collapse">
                        <i class="mdi mdi-home-outline"></i>
                        <span>Homepage</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="homepage">
                        <ul class="nav-second-level">
                            @canany(['manage banner'])
                                <li>
                                    <a href="#sidebarHeroSection" data-bs-toggle="collapse">
                                        <i class="mdi mdi-image-frame"></i>
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
                            @endcanany
                            @canany(['manage product'])
                                <li>
                                    <a href="#productSection" data-bs-toggle="collapse">
                                        <i class="mdi mdi-gift-outline"></i>
                                        <span> Products </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="productSection">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="{{ route('income-source.index') }}">Create Income Source</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('product.create') }}">Create Product</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('product.index') }}">View Products</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('product-sub-category.index') }}">Sub-Category</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcanany

                            @canany(['manage appointment section'])
                                <li>
                                    <a href="#appointmentSection" data-bs-toggle="collapse">
                                        <i class="mdi mdi-comment-edit-outline"></i>
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
                            @endcanany

                            @canany(['manage achievement'])
                                <li>
                                    <a href="#achievements" data-bs-toggle="collapse">
                                        <i class="mdi mdi-chart-box-outline"></i>
                                        <span>Achievements</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="achievements">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="{{ route('achievements.index') }}">
                                                    <span>View</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('achievements.create') }}">
                                                    <span>Create</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcanany

                            @canany(['manage info section'])
                                <li>
                                    <a href="#sidebarInfoSection" data-bs-toggle="collapse">
                                        <i class="mdi mdi-information-outline"></i>
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
                            @endcanany

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#services" data-bs-toggle="collapse">
                        <i class="mdi mdi-badge-account-horizontal-outline"></i>
                        <span>Service Page</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="services">
                        <ul class="nav-second-level">

                            <li>
                                <a href="#sidebarSerivces" data-bs-toggle="collapse">
                                    <i class="mdi mdi-badge-account-horizontal-outline"></i>
                                    <span>Services </span>
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
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#pageandsection" data-bs-toggle="collapse">
                        <i class="mdi mdi-newspaper-variant-outline"></i>
                        <span>Pages & Sections</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="pageandsection">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#bookSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-book-open-variant"></i>
                                    <span>Books</span>
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
                                <a href="{{ route('industry.index') }}">
                                    <i class="mdi mdi-factory"></i>
                                    <span>Industries</span>
                                </a>
                            </li>
                            <li>
                                <a href="#sidebarAboutPage" data-bs-toggle="collapse">
                                    <i class="mdi mdi-format-text-variant-outline"></i>
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
                                <a href="{{ route('social-handle.index') }}">
                                    <i class="mdi mdi-microsoft-edge-legacy"></i>
                                    <span>Social Media</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#training" data-bs-toggle="collapse">
                        <i class="mdi mdi-book-education-outline"></i>
                        <span>Training</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="training">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#courseSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-certificate-outline"></i>
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
                                <a href="#exams" data-bs-toggle="collapse">
                                    <i class="mdi mdi-human-capacity-increase"></i>
                                    <span>Exam's</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="exams">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('exams.index') }}">Exams</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('exams.results') }}">Results</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#caseStudySection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-file-chart-outline"></i>
                                    <span> Case Studies </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="caseStudySection">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('case.study.package.backend.index') }}">Create Package

                                            </a>
                                            <a href="{{ route('case.study.package.backend.show.all') }}">
                                                View Package
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#peoples" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span>Peoples</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="peoples">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('partner-section.index') }}">
                                    <i class="mdi mdi-vector-intersection"></i>
                                    <span>Partners</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="our-partners">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('partner-section.index') }}">Partners Section</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('partner-section.create') }}">Partner Request</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#clientStudio" data-bs-toggle="collapse">
                                    <i class="mdi mdi-electron-framework"></i>
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
                                <a href="#expertProfile" data-bs-toggle="collapse">
                                    <i class="mdi mdi-account-tie"></i>
                                    <span>Expert</span>
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
                                        <li>
                                            <a href="{{ route('consultancy.order.index') }}">Appoinment List</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-title mt-2">Control Panel</li>
                <li>
                    <a href="#project" data-bs-toggle="collapse">
                        <i class="mdi mdi-podium"></i>
                        <span>Project</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="project">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('project-discussion.index') }}">
                                    <i class="mdi mdi-account-group"></i>
                                    <span>Project Discussion</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('project.index') }}">
                                    <i class="mdi mdi-chart-line"></i>
                                    <span>Projects Progress</span>
                                </a>
                            </li>
                            <li>
                                <a href="#clientSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-account-heart-outline"></i>
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
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#user" data-bs-toggle="collapse">
                        <i class="mdi mdi-database-search-outline"></i>
                        <span>User's Data</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#user-appointmentSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-face-agent"></i>
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
                                <a href="#user-doc" data-bs-toggle="collapse">
                                    <i class="mdi mdi-file-document-multiple-outline"></i>
                                    <span>User Documents</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="user-doc">
                                    <ul class="nav-second-level">
                                        <li>

                                            <a href="{{ route('userDoc.backend.index') }}">View All</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#users" data-bs-toggle="collapse">
                                    <i class="mdi mdi-account-switch-outline"></i>
                                    <span>Users</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="users">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('users.create') }}">Create</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('users.index') }}">Show</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#accounting" data-bs-toggle="collapse">
                        <i class="mdi mdi-alarm-panel"></i>
                        <span>Accounting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="accounting">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#invoiceSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-printer-settings"></i>
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
                                <a href="#reportSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-printer-settings"></i>
                                    <span>Report</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="reportSection">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a
                                                href="{{ route('report.ledger') . '?fiscal_year=[eq]' . currentFiscalYear() }}">
                                                Ledger
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('report.index', ['type' => 'demand']) }}">
                                                Demand
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('report.index', ['type' => 'due']) }}">
                                                Arear
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('report.index', ['type' => 'paid']) }}">
                                                Paid
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#chalanSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-bank-check"></i>
                                    <span>Chalan</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="chalanSection">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('chalan.create') }}">Create</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('chalan.index') }}">View</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#return-formSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-file-sync-outline"></i>
                                    <span>Return</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="return-formSection">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('return-form.create') }}">Create</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('return-form.index') }}">View</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#withdralSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-bank-transfer-out"></i>
                                    <span>Withdrawal Requests</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="withdralSection">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('withdrawal.index') . '?status=0' }}">
                                                Pending
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('withdrawal.index') . '?status=1' }}">Approved</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="{{ str(url()->current())->contains('admin/order') ? 'menuitem-active' : '' }}">
                    <a href="#management" data-bs-toggle="collapse">
                        <i class="mdi mdi-manjaro"></i>
                        <span>Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="management">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#roleSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-badge-account-alert-outline"></i>
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
                                <a href="#promoCodeSection" data-bs-toggle="collapse">
                                    <i class="mdi mdi-sale"></i>
                                    <span> Promo Code </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="promoCodeSection">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('promo-code.create') }}">Create</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('promo-code.index') }}">View Promo</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#expenses" data-bs-toggle="collapse">
                                    <i class="mdi mdi-currency-usd-off"></i>
                                    <span>Expenses</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="expenses">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('expense.index') }}">View Expenses</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('expense.create') }}">Crete Expense</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#reviews" data-bs-toggle="collapse">
                                    <i class="mdi mdi-comment-quote-outline"></i>
                                    <span>Reviews</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="reviews">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('backend.review.index') }}">View Reviews</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('backend.review.create') }}">Crete Review</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('social-handle.index') }}">
                                    <i class="mdi mdi-microsoft-edge-legacy"></i>
                                    <span>Social Media</span>
                                </a>
                            </li>
                            <li class="{{ str(url()->current())->contains('admin/order') ? 'menuitem-active' : '' }}">
                                <a href="#payments" data-bs-toggle="collapse">
                                    <i class="mdi mdi-order-bool-descending-variant"></i>
                                    <span>Order</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="payments">
                                    <ul class="nav-second-level">
                                        <li
                                            class="{{ str(url()->current())->contains('admin/order') ? 'menuitem-active' : '' }}">
                                            <a href="{{ route('order.index') . '?status=' . 0 }}">Pending Orders</a>
                                            <a href="{{ route('order.index') . '?status=' . 1 }}">Approved Orders</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#timeTracking" data-bs-toggle="collapse">
                        <i class="mdi mdi-timeline-clock-outline"></i>
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
                    <a href="#taxCalculator" data-bs-toggle="collapse">
                        <i class="mdi mdi-calculator-variant-outline"></i>
                        <span>Tax Calculator</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="taxCalculator">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('tax-setting.create') }}">New Tax Setting</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse" id="taxCalculator">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('tax-setting.index') }}">View Tax Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse" id="taxCalculator">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('tax.results') }}">Results</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
