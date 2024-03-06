<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.client.head')
    <title>@yield('title')</title>
    @yield('custom_styles')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        @include('layouts.client.navbar')
        <!-- Navbar & Hero End -->


       @yield('content')

        <!-- Footer Start -->
        @include('layouts.client.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
   @include('layouts.client.scripts')

   @yield('custom_scripts')
</body>

</html>
