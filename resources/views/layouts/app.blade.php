<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.includes.head')
<body>
    <main class="main">
        @yield('content')
    </main>
@include('layouts.includes.header')
@stack('modal')
@include('layouts.includes.footer')
@include('layouts.includes.script')
</body>
</html>
