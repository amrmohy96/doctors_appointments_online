<!-- BEGIN: Body-->
@include('admin.layouts.header')
<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-sticky footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

<!-- BEGIN: Header-->
@include('admin.layouts.nav')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('admin.layouts.main')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <!-- Website Analytics Starts-->
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

@include('admin.layouts.footer')
@include('admin.layouts.session')
</body>
<!-- END: Body-->

</html>
