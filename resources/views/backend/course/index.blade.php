@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Course', 'Index']" />
    <x-backend.ui.section-card name="All Courses">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0">Name</th>
                        <th class="border-0">Trainer</th>
                        <th class="border-0">Videos</th>
                        <th class="border-0">Owner</th>
                        <th class="border-0">Members</th>
                        <th class="border-0" style="width: 80px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <i data-feather="folder" class="icon-dual"></i>
                            <span class="ms-2 fw-medium"><a href="javascript: void(0);" class="text-reset">App Design &
                                    Development</a></span>
                        </td>
                        <td>
                            <p class="mb-0">Jan 03, 2020</p>
                            <span class="font-12">by Andrew</span>
                        </td>
                        <td>128 MB</td>
                        <td>
                            Danielle Thompson
                        </td>
                        <td id="tooltips-container">
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Mat Helme">
                                    <img src="assets/images/users/user-1.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Michael Zenaty">
                                    <img src="assets/images/users/user-2.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="James Anderson">
                                    <img src="assets/images/users/user-3.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Username">
                                    <img src="assets/images/users/user-5.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <a href="javascript: void(0);"
                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="mdi mdi-dots-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i data-feather="file" class="icon-dual"></i>
                            <span class="ms-2 fw-medium"><a href="javascript: void(0);"
                                    class="text-reset">Ubold-sketch-design.zip</a></span>
                        </td>
                        <td>
                            <p class="mb-0">Feb 13, 2020</p>
                            <span class="font-12">by Coderthemes</span>
                        </td>
                        <td>521 MB</td>
                        <td>
                            Coder Themes
                        </td>
                        <td id="tooltips-container1">
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Mat Helme">
                                    <img src="assets/images/users/user-4.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Michael Zenaty">
                                    <img src="assets/images/users/user-1.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0"
                                    data-bs-container="#tooltips-container1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="James Anderson">
                                    <img src="assets/images/users/user-6.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <a href="javascript: void(0);"
                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="mdi mdi-dots-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i data-feather="file-text" class="icon-dual"></i>
                            <span class="ms-2 fw-medium"><a href="javascript: void(0);"
                                    class="text-reset">Annualreport.pdf</a></span>
                        </td>
                        <td>
                            <p class="mb-0">Dec 18, 2019</p>
                            <span class="font-12">by Alejandro</span>
                        </td>
                        <td>7.2 MB</td>
                        <td>
                            Gary Coley
                        </td>
                        <td>
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Mat Helme">
                                    <img src="assets/images/users/user-9.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Michael Zenaty">
                                    <img src="assets/images/users/user-7.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="James Anderson">
                                    <img src="assets/images/users/user-3.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <a href="javascript: void(0);"
                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="mdi mdi-dots-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i data-feather="folder" class="icon-dual"></i>
                            <span class="ms-2 fw-medium"><a href="javascript: void(0);"
                                    class="text-reset">Wireframes</a></span>
                        </td>
                        <td>
                            <p class="mb-0">Nov 25, 2019</p>
                            <span class="font-12">by Dunkle</span>
                        </td>
                        <td>54.2 MB</td>
                        <td>
                            Jasper Rigg
                        </td>
                        <td>
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Mat Helme">
                                    <img src="assets/images/users/user-1.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Michael Zenaty">
                                    <img src="assets/images/users/user-8.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="James Anderson">
                                    <img src="assets/images/users/user-2.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Username">
                                    <img src="assets/images/users/user-5.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <a href="javascript: void(0);"
                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="mdi mdi-dots-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <i data-feather="file-text" class="icon-dual"></i>
                            <span class="ms-2 fw-medium"><a href="javascript: void(0);"
                                    class="text-reset">Documentation.docs</a></span>
                        </td>
                        <td>
                            <p class="mb-0">Feb 9, 2020</p>
                            <span class="font-12">by Justin</span>
                        </td>
                        <td>8.3 MB</td>
                        <td>
                            Cooper Sharwood
                        </td>
                        <td>
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Mat Helme">
                                    <img src="assets/images/users/user-3.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>

                                <a href="javascript: void(0);" class="avatar-group-item mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Michael Zenaty">
                                    <img src="assets/images/users/user-10.jpg" class="rounded-circle avatar-xs"
                                        alt="friend">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group dropdown">
                                <a href="javascript: void(0);"
                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="mdi mdi-dots-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-share-variant me-2 text-muted vertical-middle"></i>Share</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-link me-2 text-muted vertical-middle"></i>Get Sharable Link</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Rename</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-download me-2 text-muted vertical-middle"></i>Download</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </x-backend.ui.section-card>
@endsection
