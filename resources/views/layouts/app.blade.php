<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
<div id="app">
    @include('layouts.navbar')
    <main class="py-4">
        <div class="container">
            @include('layouts.flash')
        </div>
        <div class="container">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
