<!doctype html>
<html lang="en">
<head>
    <title>{{ $title ?? 'Dashboard' }}</title>
    @include('includes.meta_dash')
    @include('includes.css_dash')
    @stack('css_select_two')
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        {{-- Berpikiri kritis, Menyimak, membaca, menulis, mengajar, menjadi teladan --}}
        {{-- Header --}}
        @include('layouts.master_header')
        <div class="app-main">
            {{-- Sidebar --}}
            @include('layouts.master_sidebar')
            <div class="app-main__outer">
            {{-- Content --}}
            @yield('content')
            {{-- Footer --}}
            @include('layouts.master_footer')
            </div>
        </div>
    </div>
    @include('includes.script_dash')
    @stack('script_select_two')
    @stack('script_vue_js_axios_sweet')
</body>

</html>
