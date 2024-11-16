<x-main-layout>
    <x-slot name="meta">
        <title>About Us - {{ $meta_data->meta_title }}</title>
        <meta name="keyword" content="{{ $meta_data->meta_keyword }}">
        <meta name="description" content="{{ $meta_data->meta_description }}">
    </x-slot>
    <x-slot name="header">
        <div class="w-full lg:w-3/4 h-0 lg:h-auto invisible lg:visible lg:flex items-center justify-end"
            :class="{ '!visible bg-dark shadow-lg relative !h-auto max-h-[400px] overflow-y-scroll rounded-md mt-4 p-7.5': navigationOpen }">
            <nav>
                <ul class="flex lg:items-center flex-col lg:flex-row gap-5 lg:gap-2">
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{ route('home') }}"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            :class="{ '!text-white nav-gradient': page === 'home' }">Home</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{ route('home') }}/#Observatories"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Observatories</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="#Services"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            >Services</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{ route('about') }}"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            :class="{ '!text-white nav-gradient': page === 'about' }">About Us</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{ route('home') }}/#Contact"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Contact
                            Us</a>
                    </li>
                </ul>
            </nav>
        </div>
    </x-slot>

    <section class="relative overflow-hidden z-10 min-h-screen pt-35 md:pt-40 xl:pt-45">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
        <div class="max-w-7xl mx-auto">
            <div class="absolute inset-0 -z-10 pointer-events-none overflow-hidden">
                <div class="absolute inset-0 top-0 left-0 w-full h-full">
                    <video class="video-bg absolute inset-0 w-full h-full object-cover" autoplay muted loop>
                        <source src="{{Storage::disk('images')->url($about_data->about_hero_video) }}" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-[900px] px-4 sm:px-8 xl:px-0 py-32 relative z-1 flex flex-col justify-start h-full">
            <div class="text-left wow fadeInRight">
                <span data-aos="fade-left" data-aos-duration="1000"
                    class="hero-subtitle-gradient hover:hero-subtitle-hover relative mb-5 font-medium text-sm inline-flex items-center gap-4 py-2 px-4.5 rounded-full">
                    <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                    <span class="hero-subtitle-text text-white">
                        {{ $about_data->about_hero_sub_title }}
                    </span>
                </span>
                <h1 class="text-white mb-6 text-5xl font-extrabold sm:text-5xl xl:text-heading-1" data-aos="fade-left">
                    <span class="text-slider-items hidden">{{ $about_data->about_hero_title }}</span>
                    <span class="text-slider text-3xl"></span>
                </h1>
            </div>
        </div>
    </section>


    <!----------About us----------->

    <section class="overflow-hidden">
        <div class="max-w-[1170px] mx-auto px-6 sm:px-12 xl:px-16 py-28 lg:py-32 relative">
            <div class="absolute bottom-0 left-0 w-full h-[1px] about-divider-gradient"></div>
            <div class="flex gap-11 flex-wrap justify-between">
                <div class="wow fadeInLeft m-auto w-full">
                    <span class="hero-subtitle-text font-semibold block mb-5">{{ $about_data->about_sub_title }}</span>
                    <h2 class="text-white mb-5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                        {{ $about_data->about_title }}
                    </h2>
                    <div class="custom-editor-content font-medium mb-6">
                        {!! str($about_data->about_description)->sanitizeHtml() !!}
                    </div>
    
                    <a href="{{ route('home') }}/#Contact"
                        class="features-button-gradient relative inline-flex items-center gap-1.5 rounded-full py-3 px-6 text-white text-sm ease-in duration-300 hover:shadow-button">
                        Get in Touch!
                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg')}}">
                            <path
                                d="M13.3992 5.60002L8.22422 0.350024C7.99922 0.125024 7.64922 0.125024 7.42422 0.350024C7.19922 0.575024 7.19922 0.925025 7.42422 1.15002L11.6242 5.42503H0.999219C0.699219 5.42503 0.449219 5.67502 0.449219 5.97502C0.449219 6.27502 0.699219 6.55003 0.999219 6.55003H11.6742L7.42422 10.875C7.19922 11.1 7.19922 11.45 7.42422 11.675C7.52422 11.775 7.67422 11.825 7.82422 11.825C7.97422 11.825 8.12422 11.775 8.22422 11.65L13.3992 6.40002C13.6242 6.17502 13.6242 5.82502 13.3992 5.60002Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!----------Team Members----------->

    @include('partials.team')

    <!----------Services----------->

    @include('partials.services')

    <!----------Video----------->

    <section>
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
            {{-- <div class="relative rounded-3xl z-999">
                <a href="#" data-fslightbox
                    class="absolute z-10 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-27.5 h-27.5 rounded-full flex items-center justify-center bg-gradient-to-b from-[#A073EE] to-[#6E25ED] shadow-video">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg')}}">
                        <path
                            d="M25.1688 16.8077L7.26999 27.1727C5.73764 28.0601 3.75 27.0394 3.75 25.3651V4.63517C3.75 2.96091 5.73764 1.94018 7.26997 2.82754L25.1688 13.1925C26.6104 14.0274 26.6104 15.9729 25.1688 16.8077Z"
                            fill="white" />
                    </svg>
                </a> --}}
                {{-- <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-1 block w-32 h-32 rounded-full backdrop-blur-[5px] bg-white/[0.04]"></span> --}}
                <img src="{{ Storage::disk('images')->url($about_data->about_image) }}" alt="video" />
            </div>
        </div>
    </section>

    <section>
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
            <div class="bg-dark rounded-[30px] relative overflow-hidden px-4 py-20 lg:py-25 z-999">

                <span class="absolute bottom-0 left-0 -z-1"><img src="{{ asset('user/images/grid.svg') }}"
                        alt="grid" /></span>
                <div class="wow fadeInUp text-center">
                    {{-- <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                        What are you waiting for?
                    </h2>
                    <p class="max-w-[714px] mx-auto font-medium mb-9">
                        
                    </p> --}}
                    <a href="{{ route('home') }}/#Contact"
                        class="features-button-gradient relative inline-flex items-center gap-1.5 rounded-full py-3 px-6 text-white text-sm ease-in duration-300 hover:shadow-button">
                        Get in Touch!
                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg')}}">
                            <path
                                d="M13.3992 5.60002L8.22422 0.350024C7.99922 0.125024 7.64922 0.125024 7.42422 0.350024C7.19922 0.575024 7.19922 0.925025 7.42422 1.15002L11.6242 5.42503H0.999219C0.699219 5.42503 0.449219 5.67502 0.449219 5.97502C0.449219 6.27502 0.699219 6.55003 0.999219 6.55003H11.6742L7.42422 10.875C7.19922 11.1 7.19922 11.45 7.42422 11.675C7.52422 11.775 7.67422 11.825 7.82422 11.825C7.97422 11.825 8.12422 11.775 8.22422 11.65L13.3992 6.40002C13.6242 6.17502 13.6242 5.82502 13.3992 5.60002Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!----------Subscribe form----------->

    @include('partials.subscribe-form')

</x-main-layout>
