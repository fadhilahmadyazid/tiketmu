<!DOCTYPE html>
<html lang="en">
    <head>

        @include('includes.frontsite.meta')

        <title>@yield('title') | EventQ</title>

        @stack('before-style')
            @include('includes.frontsite.style')
        @stack('after-style')

         {{-- sweetalert --}}
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    </head>
    <body>

        @include('sweetalert::alert')

        @yield('content')

        @stack('before-script')
            @include('includes.frontsite.script')
        @stack('after-script')

        {{-- modals --}}
        {{-- if you have a modal, create here --}}

    </body>
</html>
