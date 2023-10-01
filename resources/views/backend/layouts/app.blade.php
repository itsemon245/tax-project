<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.head')

<!-- body start -->

<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed"
    data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>
    <style>
        @media print {
            .container-fluid {
                padding: 0 !important;
            }
            .content-page {
                padding: 0 !important;
                margin: 0 !important;
            }
        }
    </style>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        @include('backend.layouts.header')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('backend.layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page px-md-2 px-0">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid px-md-4 px-0">
                    @yield('content')

                </div> <!-- container -->
            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                          Develop by <a href="">....</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('backend.layouts.script')

</body>

</html>
