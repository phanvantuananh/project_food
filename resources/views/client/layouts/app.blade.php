<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('client.layouts.includes.head')
<body>
    <main class="main">
        @yield('content')
    </main>
@include('client.layouts.includes.header')
@stack('modal')
@include('client.layouts.includes.footer')
@include('client.layouts.includes.script')
</body>
</html>
