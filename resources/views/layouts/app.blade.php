<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials._head')
    </head>
    <body class="d-flex flex-column min-vh-100" >
        @include('partials._nav')

        @yield('body')

        @include('partials._alert')

        @include('partials._footer')

        @stack('before-script')
        @include('partials._script')
        @stack('after-script')
    </body>
</html>
