<!DOCTYPE html>
<html lang="en">
    <head>
        @include('landing.includes.header')
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('landing.includes.menu')
        <!-- Page Content-->
        @yield('content')
        <!-- Footer-->
        <footer class="py-2 bg-dark">
        @include('landing.includes.footer')
        </footer>
        @include('landing.includes.script')
    </body>
</html>
