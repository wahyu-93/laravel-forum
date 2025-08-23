<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials._head')
    </head>
    <body class="antialiased">
        @include('partials._nav')

        @yield('body')

        @stack('before-script')
        @include('partials._script')
        @stack('after-script')
    </body>
</html>
