<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layouts.includes.head')
<body>
    <main class="main">
        @yield('content')
    </main>
@include('admin.layouts.includes.header')
@stack('modal')
@include('admin.layouts.includes.footer')
@include('admin.layouts.includes.script')
</body>
</html>
