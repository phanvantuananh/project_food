<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('client.layouts.includes.head')
<body>
@include('client.layouts.includes.header')
<div class="container">
    <main class="main">
        @yield('content')
    </main>
</div>
@stack('modal')
@include('client.layouts.includes.footer')
@include('client.layouts.includes.script')
</body>
</html>
