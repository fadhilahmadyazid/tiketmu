<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.frontsite.meta')
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>@yield('title') | EVENTQ</title>

    @stack('before-style')
        @include('includes.frontsite.style')
    @stack('after-style')


</head>
<body>
    @include('components.frontsite.header')
         @yield('content')

    @include('components.frontsite.footer')

    @stack('before-script')
         @include('includes.frontsite.script')
    @stack('after-script')


</body>
</html>
