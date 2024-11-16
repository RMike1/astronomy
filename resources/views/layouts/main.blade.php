<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@if (isset($meta))
    @php
        $setting = App\Models\About::select('favicon')->first();
    @endphp
    <head>
        <link rel="icon" href="{{ $setting ? Storage::disk('images')->url($setting->favicon) : ' '}}">
        {{ $meta }}
        <meta charset="UTF-8" />
        <meta name="robots" content="index, follow"/>
        <link rel="canonical" href="{{request()->url()}}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        @livewireStyles
    </head>
@endif

<body x-data="{ page: '{{ Route::currentRouteName() }}', activeSection: 'home', 'loaded': true, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }" x-init="const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            activeSection = entry.target.id;
        }
    });
}, { threshold: 0.6 });

document.querySelectorAll('section').forEach(section => {
    observer.observe(section);
});">

    @if (isset($header))
        @include('partials.header')
    @endif

    <main>

        {{ $slot }}

    </main>

    @include('partials.footer')

    @livewireScripts
    <script src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>
        $(document).ready(function() {
            if ($('.text-slider').length) {
                var sentence = $('.text-slider-items').text();

                var typed = new Typed('.text-slider', {
                    strings: [sentence],
                    typeSpeed: 60,
                    backSpeed: 0,
                    loop: false,
                    showCursor: true,
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                mirror: true,
            });

            let lastScrollTop = 0;
            const navbar = document.querySelector('.navbar');

            if (navbar) {
                window.addEventListener('scroll', function() {
                    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    const scrollPercent = Math.min(scrollTop / 300, 1);
                    navbar.style.backgroundColor = `rgba(0, 0, 0, ${scrollPercent * 0.7})`;

                    if (scrollTop > lastScrollTop) {
                        navbar.style.top = "-80px";
                    } else {
                        navbar.style.top = "0";
                    }
                    lastScrollTop = scrollTop;
                });
            }
        });
    </script>
    <script>
        document.querySelectorAll('.custom-editor-content a').forEach(link => {
            const img = link.querySelector('img');
            if (img) {
                link.removeAttribute('href');
            }
            link.addEventListener('click', (event) => {
                event.preventDefault();
            });
        });
    </script>
</body>

</html>
