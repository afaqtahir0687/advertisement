<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Crelogics</title>

    <!-- Custom fonts -->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body id="page-top">

<div id="wrapper">

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- End Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <!-- Topbar -->
            @include('admin.layouts.navbar')
            <!-- End Topbar -->

            <!-- Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

        <!-- Footer -->
        @include('admin.layouts.footer')
        <!-- End Footer -->

    </div>
</div>

<!-- Scroll to Top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Core JS -->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JS -->
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts -->
<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

@stack('scripts')

<!-- Charts -->
<script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>

</body>
</html>
