<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.partials.head')
    </head>
    <body class="sb-nav-fixed">
       @include('backend.partials.nav')
        <div id="layoutSidenav">
        @include('backend.partials.sidebar')
            <div id="layoutSidenav_content">
                <main>
                   @yield('content')
                </main>
               @include('backend.partials.footer')
            </div>
        </div>
       @include('backend.partials.script')
    </body>
</html>
