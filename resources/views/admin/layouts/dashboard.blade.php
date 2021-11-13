<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layouts.includes.head')
<body>
@include('admin.layouts.includes.header')
<div class="container">
    <main class="main">
        @yield('content')
    </main>
</div>
@stack('modal')
@include('admin.layouts.includes.footer')
@include('admin.layouts.includes.script')
</body>
</html>
