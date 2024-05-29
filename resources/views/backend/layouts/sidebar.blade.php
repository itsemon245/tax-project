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
                @php
                    $homepagePermissions = \Spatie\Permission\Models\Permission::where('group', 'homepage')
                        ->get(['name'])
                        ->pluck('name');
                @endphp
                {{-- Home Page Section --}}
                @canany($homepagePermissions)
                    <li>
                        <a href="#homepage" data-bs-toggle="collapse">
                            <i class="mdi mdi-home-outline"></i>
                            <span>Homepage</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="homepage">
                            <ul class="nav-second-level">
                                @canany(['manage banner', 'read banner'])
                                    <li>
                                        <a href="#sidebarHeroSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-image-frame"></i>
                                            <span> Hero Section </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarHeroSection">
                                            <ul class="nav-second-level">
                                                <li>
                                                    @can('manage banner')
                                                        <a href="{{ route('banner.create') }}">Create Hero
                                                        </a>
                                                    @endcan
                                                    @canany(['read banner', 'manage banner'])
                                                        <a href="{{ route('banner.index') }}">
                                                            View Hero
                                                        </a>
                                                    @endcanany
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage product', 'read product'])
                                    <li>
                                        <a href="#productSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-gift-outline"></i>
                                            <span> Products </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="productSection">
                                            <ul class="nav-second-level">
                                                @can('manage product')
                                                    <li>
                                                        <a href="{{ route('income-source.index') }}">Create Income Source</a>
                                                    </li>
                                                @endcan
                                                @can('manage product')
                                                    <li>
                                                        <a href="{{ route('product.create') }}">Create Product</a>
                                                    </li>
                                                @endcan
                                                @can('read product', 'manage product')
                                                    <li>
                                                        <a href="{{ route('product.index') }}">View Products</a>
                                                    </li>
                                                @endcan
                                                @can('read product', 'manage product')
                                                    <li>
                                                        <a href="{{ route('product-sub-category.index') }}">Sub-Category</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage appointment section', 'read appointment section'])
                                    <li>
                                        <a href="#appointmentSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-comment-edit-outline"></i>
                                            <span> Appointment Section </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="appointmentSection">
                                            <ul class="nav-second-level">
                                                <li>
                                                    @can('manage appointment section')
                                                        <a href="{{ route('appointment.create') }}">Create
                                                        </a>
                                                    @endcan
                                                    @can('read appointment section')
                                                        <a href="{{ route('appointment.index') }}">
                                                            View
                                                        </a>
                                                    @endcan
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany

                                @canany(['manage achievement', 'read achievement'])
                                    <li>
                                        <a href="#achievements" data-bs-toggle="collapse">
                                            <i class="mdi mdi-chart-box-outline"></i>
                                            <span>Achievements</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="achievements">
                                            <ul class="nav-second-level">
                                                @can('manage achievement')
                                                    <li>
                                                        <a href="{{ route('achievements.create') }}">
                                                            <span>Create</span>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('read achievement')
                                                    <li>
                                                        <a href="{{ route('achievements.index') }}">
                                                            <span>View</span>
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany

                                @canany(['manage info section', 'read info section'])
                                    <li>
                                        <a href="#sidebarInfoSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-information-outline"></i>
                                            <span> Info Section </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarInfoSection">
                                            <ul class="nav-second-level">
                                                @can('manage info section')
                                                    <li>
                                                        <a href="{{ route('info.create') }}">Create
                                                        </a>
                                                    </li>
                                                @endcan
                                                @canany(['read info section', 'manage info section'])
                                                    <li>
                                                        <a href="{{ route('info.index') }}">
                                                            View
                                                        </a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany

                            </ul>
                        </div>
                    </li>
                @endcanany
                {{-- Service page Section --}}
                @canany(['manage service', 'read service'])
                    <li>
                        <a href="#services" data-bs-toggle="collapse">
                            <i class="mdi mdi-badge-account-horizontal-outline"></i>
                            <span>Service Page</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="services">
                            <ul class="nav-second-level">

                                @canany(['manage service', 'read service'])
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
                                @endcanany

                                <li>
                                    <a href="#custom-service" data-bs-toggle="collapse">
                                        <i class="mdi mdi-book-open-variant"></i>
                                        <span>Custom Services</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="custom-service">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="{{ route('custom-service.create') }}">Create</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('custom-service.index') }}">View </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcanany
                @php
                    $pagesAndSectionPermissions = \Spatie\Permission\Models\Permission::where(
                        'group',
                        'pages & sections',
                    )
                        ->get(['name'])
                        ->pluck('name');
                @endphp
                @canany($pagesAndSectionPermissions)
                    <li>
                        <a href="#pageandsection" data-bs-toggle="collapse">
                            <i class="mdi mdi-newspaper-variant-outline"></i>
                            <span>Pages & Sections</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="pageandsection">
                            <ul class="nav-second-level">
                                @canany(['manage book', 'read book'])
                                    <li>
                                        <a href="#bookSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-book-open-variant"></i>
                                            <span>Books</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="bookSection">
                                            <ul class="nav-second-level">
                                                @can('manage book')
                                                    <li>
                                                        <a href="{{ route('book.create') }}">Create Book</a>
                                                    </li>
                                                @endcan
                                                @can('read book')
                                                    <li>
                                                        <a href="{{ route('book.index') }}">View Books</a>
                                                    </li>
                                                @endcan
                                                @can('manage book')
                                                    <li>
                                                        <a href="{{ route('book-category.index') }}">View Categories</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage industry', 'read industry'])
                                    <li>
                                        <a href="#industryPage" data-bs-toggle="collapse">
                                            <i class="mdi mdi-factory"></i>
                                            <span> Industries </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="industryPage">
                                            <ul class="nav-second-level">
                                                @can('manage industry')
                                                    <li>
                                                        <a href="{{ route('industry.create') }}">Create

                                                        </a>
                                                    </li>
                                                @endcan
                                                @canany(['read industry', 'manage industry'])
                                                    <li>
                                                        <a href="{{ route('industry.index') }}">View
                                                        </a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage social media', 'read social media'])
                                    <li>
                                        <a href="{{ route('social-handle.index') }}">
                                            <i class="mdi mdi-microsoft-edge-legacy"></i>
                                            <span>Social Media</span>
                                        </a>
                                    </li>
                                @endcanany
                                @canany(['manage about'])
                                    <li>
                                        <a href="{{ route('about.create') }}">
                                            <i class="mdi mdi-format-text-variant-outline"></i>
                                            <span>About Page</span>
                                        </a>
                                    </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
                @php
                    $branchPermissions = \Spatie\Permission\Models\Permission::where('group', 'branch')
                        ->get(['name'])
                        ->pluck('name');
                @endphp
                @canany($branchPermissions)
                    <li>
                        <a href="#branch" data-bs-toggle="collapse">
                            <i class="mdi mdi-source-branch"></i>
                            <span>Branch</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="branch">
                            <ul class="nav-second-level">
                                @canany(['read map', 'create map'])
                                    <li>
                                        <a href="#map-section" data-bs-toggle="collapse">
                                            <i class="fe-map-pin"></i>
                                            <span>Locations</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="map-section">
                                            <ul class="nav-second-level">
                                                <li>
                                                    @can('create map')
                                                        <a href="{{ route('map.create') }}">Create</a>
                                                    @endcan
                                                    @canany(['read map', 'create map', 'update map', 'delete map'])
                                                        <a href="{{ route('map.index') }}">
                                                            View
                                                        </a>
                                                    @endcanany
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
                @php
                    $trainingPermissions = \Spatie\Permission\Models\Permission::where('group', 'training')
                        ->get(['name'])
                        ->pluck('name');
                @endphp
                @canany($trainingPermissions)
                    <li>
                        <a href="#training" data-bs-toggle="collapse">
                            <i class="mdi mdi-book-education-outline"></i>
                            <span>Training</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="training">
                            <ul class="nav-second-level">
                                @canany(['manage course', 'manage video', 'read course', 'read video'])
                                    <li>
                                        <a href="#courseSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-certificate-outline"></i>
                                            <span>Courses</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="courseSection">
                                            <ul class="nav-second-level">
                                                @can('manage course')
                                                    <li>
                                                        <a href="{{ route('course.create') }}">Create Course</a>
                                                    </li>
                                                @endcan
                                                @canany(['read course', 'manage course'])
                                                    <li>
                                                        <a href="{{ route('course.backend.index') }}">View Courses</a>
                                                    </li>
                                                @endcanany
                                                @can('manage video')
                                                    <li>
                                                        <a href="{{ route('video.create') . '?course_id=1' }}">Create Video</a>
                                                    </li>
                                                @endcan
                                                @canany(['read video', 'manage video'])
                                                    <li>
                                                        <a href="{{ route('video.index') . '?course_id=1' }}">View Videos</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage exam', 'read exam'])
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
                                @endcanany
                                @canany(['manage case study', 'read case study'])
                                    <li>
                                        <a href="#caseStudies1" data-bs-toggle="collapse">
                                            <i class="mdi mdi-badge-account-horizontal-outline"></i>
                                            <span>Case Study </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="caseStudies1">
                                            <ul class="nav-second-level">
                                                <li>
                                                    <a href="{{ route('case-study-category.create') }}">
                                                        <span>Create Category</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('case-study-category.index') }}">
                                                        <span>View Categories</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('case.study.package.backend.index') }}">
                                                        <span>Create Package</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('case.study.package.backend.show.all') }}">
                                                        <span>View Packages</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('case-study.create') }}">
                                                        <span>Create Case Study</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('case-study.index') }}">
                                                        <span>View Case Studies</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
                <li class="menu-title mt-2">Control Panel</li>

                @canany(['manage client studio', 'read client studio', 'read client', 'manage client', 'read chalan',
                    'read return'])
                    <li>
                        <a href="#peoples" data-bs-toggle="collapse">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span>Clients</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="peoples">
                            <ul class="nav-second-level">

                                @canany(['manage client studio', 'read client studio'])
                                    <li>
                                        <a href="#clientStudio" data-bs-toggle="collapse">
                                            <i class="mdi mdi-electron-framework"></i>
                                            <span>Client Studio</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="clientStudio">
                                            <ul class="nav-second-level">
                                                @can('manage client studio')
                                                    <li>
                                                        <a href="{{ route('client-studio.index') }}">
                                                            Create
                                                        </a>
                                                    </li>
                                                @endcan
                                                @canany(['read client studio', 'manage client studio'])
                                                    <li>
                                                        <a href="{{ route('client-studio.create') }}">
                                                            View
                                                        </a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany

                                @canany(['manage client', 'read client'])
                                    <li>
                                        <a href="#clientSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-account-heart-outline"></i>
                                            <span>Client List</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="clientSection">
                                            <ul class="nav-second-level">
                                                @can('manage client')
                                                    <li>
                                                        <a href="{{ route('client.create') }}">Create</a>
                                                    </li>
                                                @endcan
                                                @can('read client')
                                                    <li>
                                                        <a href="{{ route('client.index') }}">View</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany

                                @canany(['manage chalan', 'read chalan'])
                                    <li>
                                        <a href="#chalanSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-bank-check"></i>
                                            <span>Chalan</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="chalanSection">
                                            <ul class="nav-second-level">
                                                @can('manage chalan')
                                                    <li>
                                                        <a href="{{ route('chalan.create') }}">Create</a>
                                                    </li>
                                                @endcan
                                                @canany(['manage chalan', 'read chalan'])
                                                    <li>
                                                        <a href="{{ route('chalan.index') }}">View</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage return', 'read return'])
                                    <li>
                                        <a href="#return-formSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-file-sync-outline"></i>
                                            <span>Return</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="return-formSection">
                                            <ul class="nav-second-level">
                                                @can('manage return')
                                                    <li>
                                                        <a href="{{ route('return-form.create') }}">Create</a>
                                                    </li>
                                                @endcan
                                                @can('manage return', 'read return')
                                                    <li>
                                                        <a href="{{ route('return-form.index') }}">View</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
                @canany([
                    'manage discussion',
                    'read discussion',
                    'create progress',
                    'update progress',
                    'delete
                    progress',
                    'update task progress',
                    'read task progress',
                    'assign client',
                    ])
                    <li>
                        <a href="#project" data-bs-toggle="collapse">
                            <i class="mdi mdi-podium"></i>
                            <span>Project</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="project">
                            <ul class="nav-second-level">
                                @canany(['manage discussion', 'read discussion'])
                                    <li>
                                        <a href="{{ route('project-discussion.index') }}">
                                            <i class="mdi mdi-account-group"></i>
                                            <span>Project Discussion</span>
                                        </a>
                                    </li>
                                @endcanany
                                @canany([
                                    'create progress',
                                    'update progress',
                                    'read progress',
                                    'delete progress',
                                    'update
                                    task progress',
                                    'read task progress',
                                    ])
                                    <li>
                                        <a href="{{ route('project.index') }}">
                                            <i class="mdi mdi-chart-line"></i>
                                            <span>Projects Progress</span>
                                        </a>
                                    </li>
                                @endcanany

                            </ul>
                        </div>
                    </li>
                @endcanany
                @canany([
                    'update document',
                    'approve document',
                    'delete document',
                    'read document',
                    'update
                    appointment',
                    'arrpove appointment',
                    'delete appointment',
                    'read appointment',
                    'create user',
                    'update
                    user',
                    'delete user',
                    'read user',
                    ])
                    <li>
                        <a href="#user" data-bs-toggle="collapse">
                            <i class="mdi mdi-database-search-outline"></i>
                            <span>User's Data</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="user">
                            <ul class="nav-second-level">
                                @canany([
                                    'update appointment',
                                    'delete appointment',
                                    'approve appointment',
                                    'read
                                    appointment',
                                    ])
                                    <li>
                                        <a href="#user-appointmentSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-face-agent"></i>
                                            <span>User Appointments</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="user-appointmentSection">
                                            <ul class="nav-second-level">
                                                @canany(['update appointment', 'approve appointment', 'read appointment'])
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
                                                @endcanany
                                                @canany(['delete appointment', 'read appointment'])
                                                    <li>
                                                        <a href="{{ route('user-appointments.completed') }}">
                                                            Completed
                                                        </a>
                                                    </li>
                                                @endcanany

                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['read document'])
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
                                @endcanany
                                @canany(['create user', 'update user', 'delete user', 'read user'])
                                    <li>
                                        <a href="#users" data-bs-toggle="collapse">
                                            <i class="mdi mdi-account-switch-outline"></i>
                                            <span>Users</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="users">
                                            <ul class="nav-second-level">
                                                {{-- @can('create user')
                                                    <li>
                                                        <a href="{{ route('users.create') }}">Create</a>
                                                    </li>
                                                @endcan --}}
                                                @canany(['update user', 'delete user', 'read user'])
                                                    <li>
                                                        <a href="{{ route('users.index') }}">Show</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
                @php
                    $accountingPermissions = \Spatie\Permission\Models\Permission::where('group', 'accounting')
                        ->get(['name'])
                        ->pluck('name');
                @endphp
                @canany([$accountingPermissions, 'create expense', 'update expense', 'delete expense', 'print expense',
                    'read expense', 'create invoice', 'update invoice', 'delete invoice', 'send invoice', 'read invoice',
                    'read report', 'read withdraw request'])
                    <li>
                        <a href="#accounting" data-bs-toggle="collapse">
                            <i class="mdi mdi-alarm-panel"></i>
                            <span>Accounting</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="accounting">
                            <ul class="nav-second-level">
                                @canany([
                                    'create invoice',
                                    'update invoice',
                                    'delete invoice',
                                    'send invoice',
                                    'read
                                    invoice',
                                    ])
                                    <li>
                                        <a href="#invoiceSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-printer-settings"></i>
                                            <span>Invoice</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="invoiceSection">
                                            <ul class="nav-second-level">
                                                @can('create invoice')
                                                    <li>
                                                        <a href="{{ route('invoice.create') }}">
                                                            Create
                                                        </a>
                                                    </li>
                                                @endcan
                                                @canany(['create invoice', 'update invoice', 'delete invoice', 'send invoice',
                                                    'read invoice'])
                                                    <li>
                                                        <a href="{{ route('invoice.index') }}">
                                                            View
                                                        </a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage report', 'read report'])
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
                                @endcanany

                                @canany([
                                    'update expense',
                                    'update expense',
                                    'delete expense',
                                    'print expense',
                                    'read
                                    expense',
                                    ])
                                    <li>
                                        <a href="#expenses" data-bs-toggle="collapse">
                                            <i class="mdi mdi-currency-usd-off"></i>
                                            <span>Expenses</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="expenses">
                                            <ul class="nav-second-level">
                                                @can('create expense')
                                                    <li>
                                                        <a href="{{ route('expense.create') }}">Create</a>
                                                    </li>
                                                @endcan
                                                @canany(['update expense', 'update expense', 'delete expense', 'print expense',
                                                    'read expense'])
                                                    <li>
                                                        <a href="{{ route('expense.index') }}">View</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['approve withdraw request', 'read withdraw request'])
                                    <li>
                                        <a href="#withdralSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-bank-transfer-out"></i>
                                            <span>Withdrawal Requests</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="withdralSection">
                                            <ul class="nav-second-level">
                                                @canany(['approve withdraw request', 'read withdraw request'])
                                                    <li>
                                                        <a href="{{ route('withdrawal.index') . '?status=0' }}">
                                                            Pending
                                                        </a>
                                                    </li>
                                                @endcanany
                                                @canany(['approve withdraw request', 'read withdraw request'])
                                                    <li>
                                                        <a href="{{ route('withdrawal.index') . '?status=1' }}">Approved</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                    @canany(['read withdraw request'])
                                        <li>
                                            <a href="{{ route('referees') }}">
                                                Referee List
                                            </a>
                                        </li>
                                    @endcanany
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
                @php
                    $managementPermissions = \Spatie\Permission\Models\Permission::where('group', 'management')
                        ->get(['name'])
                        ->pluck('name');
                @endphp
                @canany($managementPermissions,
                    'create expert',
                    'update expert',
                    'delete
                    expert',
                    'read expert',
                    'manage partner',
                    'read partner',
                    'manage partner request',
                    'read partner request',
                    'read role',
                    'read promo code',
                    'read reviews')
                    <li class="">
                        <a href="#management" data-bs-toggle="collapse">
                            <i class="mdi mdi-manjaro"></i>
                            <span>Management</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="management">
                            <ul class="nav-second-level">
                                @canany([
                                    'manage partner',
                                    'manage partner request',
                                    'read partner',
                                    'read partner
                                    request',
                                    ])
                                    <li>
                                        <a href="#partnersSections" data-bs-toggle="collapse">
                                            <i class="mdi mdi-vector-intersection"></i>
                                            <span>Partners</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="partnersSections">
                                            <ul class="nav-second-level">
                                                @canany(['manage partner', 'read partner'])
                                                    <li>
                                                        <a href="{{ route('partner-section.index') }}">Partners Section</a>
                                                    </li>
                                                @endcanany
                                                @canany(['manage partner request', 'read partner request'])
                                                    <li>
                                                        <a href="{{ route('partner-section.create') }}">Partner Request</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany([
                                    'create expert',
                                    'update expert',
                                    'delete expert',
                                    'read expert',
                                    'approved
                                    consultation',
                                    'update consultation',
                                    'delete consultation',
                                    'read consultation',
                                    ])
                                    <li>
                                        <a href="#expertProfile" data-bs-toggle="collapse">
                                            <i class="mdi mdi-account-tie"></i>
                                            <span>Expert</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="expertProfile">
                                            <ul class="nav-second-level">
                                                @can('create expert')
                                                    <li>
                                                        <a href="{{ route('expert-profile.create') }}">Create</a>
                                                    </li>
                                                @endcan
                                                @canany(['read expert', 'update expert', 'delete expert'])
                                                    <li>
                                                        <a href="{{ route('expert-profile.index') }}">View</a>
                                                    </li>
                                                @endcanany
                                                @canany(['approved consultation', 'update consultation', 'delete consultation',
                                                    'read consultation'])
                                                    <li>
                                                        <a href="{{ route('consultancy.order.index') }}">Appoinment List</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['create user', 'update user', 'delete user', 'read user'])
                                    <li>
                                        <a href="#users-internal" data-bs-toggle="collapse">
                                            <i class="mdi mdi-account-switch-outline"></i>
                                            <span>Internal Users</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="users-internal">
                                            <ul class="nav-second-level">
                                                @can('create user')
                                                    <li>
                                                        <a href="{{ route('users.create') }}">Create</a>
                                                    </li>
                                                @endcan
                                                @canany(['update user', 'delete user', 'read user'])
                                                    <li>
                                                        <a href="{{ route('users.internal') }}">View </a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['create role', 'update role', 'delete role', 'read role'])
                                    <li>
                                        <a href="#roleSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-badge-account-alert-outline"></i>
                                            <span>Roles</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="roleSection">
                                            <ul class="nav-second-level">
                                                @can('create role')
                                                    <li>
                                                        <a href="{{ route('role.create') }}">Create Role</a>
                                                    </li>
                                                @endcan
                                                @canany(['create role', 'update role', 'delete role', 'read role'])
                                                    <li>
                                                        <a href="{{ route('role.index') }}">Manage Roles</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage promo code', 'read promo code'])
                                    <li>
                                        <a href="#promoCodeSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-sale"></i>
                                            <span> Promo Code </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="promoCodeSection">
                                            <ul class="nav-second-level">
                                                @can('manage promo code')
                                                    <li>
                                                        <a href="{{ route('promo-code.create') }}">Create</a>
                                                    </li>
                                                @endcan
                                                @canany(['manage promo code', 'read promo code'])
                                                    <li>
                                                        <a href="{{ route('promo-code.index') }}">View Promo</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                                @canany(['manage promo code', 'read promo code'])
                                    <li>
                                        <a href="#notificationSection" data-bs-toggle="collapse">
                                            <i class="mdi mdi-bell"></i>
                                            <span>Notification System</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="notificationSection">
                                            <ul class="nav-second-level">
                                                @can('manage promo code')
                                                    <li>
                                                        <a href="{{ route('notification.create') }}">Create</a>
                                                    </li>
                                                @endcan
                                                @canany(['manage promo code', 'read promo code'])
                                                    <li>
                                                        <a href="{{ route('notification.index') }}">View Notifications</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany

                                @canany(['manage reviews', 'read reviews'])
                                    <li>
                                        <a href="#reviews" data-bs-toggle="collapse">
                                            <i class="mdi mdi-comment-quote-outline"></i>
                                            <span>Reviews</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="reviews">
                                            <ul class="nav-second-level">
                                                @can('manage reviews')
                                                    <li>
                                                        <a href="{{ route('backend.review.create') }}">Create Review</a>
                                                    </li>
                                                @endcan
                                                @canany(['manage reviews', 'read reviews'])
                                                    <li>
                                                        <a href="{{ route('backend.review.index') }}">View Reviews</a>
                                                    </li>
                                                @endcanany
                                            </ul>
                                        </div>
                                    </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
                @canany(['manage order', 'read order'])
                    <li class="{{ str(url()->current())->contains('admin/order') ? 'menuitem-active' : '' }}">
                        <a href="#payments" data-bs-toggle="collapse">
                            <i class="mdi mdi-order-bool-descending-variant"></i>
                            <span>Order</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="{{ str(url()->current())->contains('admin/order') ? 'show' : 'collapse' }}"
                            id="payments">
                            <ul class="nav-second-level">
                                <li
                                    class="{{ str(url()->current())->contains('admin/order?status=0') ? 'menuitem-active' : '' }}">
                                    @canany(['manage order', 'read order'])
                                        <a href="{{ route('order.index') . '?status=' . 0 }}">Pending Orders</a>
                                    @endcanany
                                </li>
                                <li
                                    class="{{ str(url()->current())->contains('admin/order?status=1') ? 'menuitem-active' : '' }}">
                                    @canany(['manage order', 'read order'])
                                        <a href="{{ route('order.index') . '?status=' . 1 }}">Approved Orders</a>
                                    @endcanany
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcanany
                @php
                    $timeTrackingPermission = \Spatie\Permission\Models\Permission::where('group', 'time tracking')
                        ->get(['name'])
                        ->pluck('name');
                @endphp
                @canany($timeTrackingPermission, 'read event')
                    <li>
                        <a href="#timeTracking" data-bs-toggle="collapse">
                            <i class="mdi mdi-timeline-clock-outline"></i>
                            <span>Time Tracking</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="timeTracking">
                            <ul class="nav-second-level">
                                @canany(['create event', 'read event', 'delete event', 'update event'])
                                    <li>
                                        <a href="{{ route('calendar.create') }}">Calendar</a>
                                    </li>
                                @endcanany
                                @canany(['update event', 'read event', 'delete event', 'create event'])
                                    <li class="{{ url()->current() == route('calendar.index') ? 'menuitem-active' : ''}}">
                                        <a href="{{ route('calendar.index') }}">View All</a>
                                    </li>
                                    <li class="{{ url()->current() == route('calendar.index', ['status' => 'completed']) ? 'menuitem-active' : ''}}">
                                        <a href="{{ route('calendar.index', ['status' => 'completed']) }}">View Completed</a>
                                    </li>
                                    <li class="{{ url()->current() == route('calendar.index', ['status' => 'rejected']) ? 'menuitem-active' : ''}}">
                                        <a href="{{ route('calendar.index', ['status' => 'rejected']) }}">View Rejected</a>
                                    </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
                @php
                    $taxCalculatorPermissions = \Spatie\Permission\Models\Permission::where('group', 'tax calculator')
                        ->get(['name'])
                        ->pluck('name');
                @endphp
                @canany($taxCalculatorPermissions, 'read tax setting', 'manage result', 'read result')
                    <li>
                        <a href="#taxCalculator" data-bs-toggle="collapse">
                            <i class="mdi mdi-calculator-variant-outline"></i>
                            <span>Tax Calculator</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="taxCalculator">
                            <ul class="nav-second-level">
                                @can('create tax setting')
                                    <li>
                                        <a href="{{ route('tax-setting.create') }}">Create Tax Setting</a>
                                    </li>
                                @endcan
                                @canany([
                                    'create tax setting',
                                    'update tax setting',
                                    'delete tax setting',
                                    'read tax
                                    setting',
                                    ])
                                    <li>
                                        <a href="{{ route('tax-setting.index') }}">View Tax Settings</a>
                                    </li>
                                @endcanany
                                @canany(['manage result', 'read result'])
                                    <li>
                                        <a href="{{ route('tax.results') }}">Results</a>
                                    </li>
                                @endcanany
                            </ul>
                        </div>
                    </li>
                @endcanany
            </ul>
        </div>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
