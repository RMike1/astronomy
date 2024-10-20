<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Astronomy') }}</title>
    <link rel="icon" href="{{ asset('user/favicon.ico') }}">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

    <style>
        .video-bg {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        .bg-gradient-to-b {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
        }

        .scroll-fade {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .scroll-fade.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .text-left {
            text-align: left;
        }

    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body x-data="{ page: 'home', 'loaded': true, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }">

    @if (isset($header))
        @include('partials.header')
    @endif

    <main>

        {{ $slot }}

    </main>

    @include('partials.footer')

    @livewireScripts
    
    <script src="{{asset('user/js/jquery-3.5.1.min.js')}}"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>

        $(document).ready(function () {
            var sentence = $('.text-slider-items').text(); 

            var typed = new Typed('.text-slider', {
                strings: [sentence], 
                typeSpeed: 60,      
                backSpeed: 0,       
                loop: false,        
                showCursor: true,   
            });
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
        var video = document.getElementById("Background-Video");
        video.addEventListener('play', function() {
          video.currentTime = 0; 
        });
        video.addEventListener('timeupdate', function() {
          if (video.currentTime >= 35) { 
            video.pause(); 
            video.currentTime = 0;
            video.play();  
          }
        });
      </script>
</body>

</html>
