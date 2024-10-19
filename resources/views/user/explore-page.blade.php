<x-main-layout>
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
                        <a href="{{ route('home') }}/#Services"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Services</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{ route('about') }}"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">About
                            Us</a>
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

    <section class="relative overflow-hidden z-10 pt-12.5 min-h-screen bg-cover bg-center"
        style="background-image: url({{ asset('storage/' . $Homesection->image) }});">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-gray"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">

            <div class="grid sm:grid-cols-12 gap-7.5" data-highlighter>
                <div class="sm:col-span-12 pt-32">
                    <div class="relative">
                        <div class="relative overflow-hidden p-10 xl:p-15" data-aos="fade-up">
                            <div
                                class="flex {{ $Homesection->text_position === 'left' ? 'justify-between' : 'justify-end' }} items-center relative z-20">
                                <div class="max-w-[477px] w-full">
                                    <span
                                        class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5">
                                        <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                                        <span class="hero-subtitle-text">
                                            {{ $Homesection->sub_title }}
                                        </span>
                                    </span>
                                    <h3 class="text-white mb-4.5 font-bold text-heading-4">
                                        {{ $Homesection->title }}
                                    </h3>
                                    <p class="font-normal text-base mb-10">
                                        {{ $Homesection->summary_description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="overflow-hidden">
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0 py-20 lg:py-25 relative">
            <div class="absolute bottom-0 left-0 w-full h-[1px] about-divider-gradient"></div>
            <div class="flex gap-11 flex-wrap justify-between grid sm:grid-cols-2">
                <div class="wow fadeInLeft max-w-[570px] w-full">
                    <span class="hero-subtitle-text font-semibold block mb-5">{{ $Homesection->sub_title }}</span>
                    <h2 class="text-white mb-5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                        {{ $Homesection->title }}
                    </h2>
                    <p class="mb-9 font-medium">
                        {{ $Homesection->summary_description }}
                    </p>
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
                <div class="wow fadeInRight xl:block">
                    <img src="{{ asset('user/images/video.png') }}" alt="about" />
                </div>
            </div>
        </div>
    </section>

    <!----------About us----------->

    <section>
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
            <div class="relative rounded-3xl z-999">
                <a href="https://www.youtube.com/watch?v=xcJtL7QggTI" data-fslightbox
                    class="absolute z-10 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-27.5 h-27.5 rounded-full flex items-center justify-center bg-gradient-to-b from-[#A073EE] to-[#6E25ED] shadow-video">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg')}}">
                        <path
                            d="M25.1688 16.8077L7.26999 27.1727C5.73764 28.0601 3.75 27.0394 3.75 25.3651V4.63517C3.75 2.96091 5.73764 1.94018 7.26997 2.82754L25.1688 13.1925C26.6104 14.0274 26.6104 15.9729 25.1688 16.8077Z"
                            fill="white" />
                    </svg>
                </a>
                <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-1 block w-32 h-32 rounded-full backdrop-blur-[5px] bg-white/[0.04]"></span>
                <img class="rounded-xl" src="{{ asset('storage/'. $Homesection->image) }}" alt="video" />
            </div>
        </div>
    </section>

    <section class="pt-20 lg:pt-25 pb-17.5 lg:pb-22.5 xl:pb-27.5">
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
            {{-- <img src="{{ asset('/' . $Homesection->image) }}" alt="blog" class="mb-10" /> --}}
            <div class="max-w-[870px] mx-auto">
                <h2 class="font-semibold text-white text-[34px] leading-[45px] max-w-[579px] mb-7.5">
                    Revolution in Content Creation and Communication
                </h2>
                <p class="font-medium mb-6">
                    {{ $Homesection->full_description }}
                </p>
                <p class="font-medium mb-6">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates aperiam est repellat eos cumque
                    harum molestiae. Modi aperiam quam dolores quis possimus voluptatem nemo ipsam. Doloribus,
                    reprehenderit? Quia, aliquam dolor!
                </p>
                <h3 class="font-extrabold text-2xl text-white mb-6">
                    how I churn out 2000 words in 20 minutes
                </h3>
                <p class="font-medium mb-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit fugiat est, praesentium magnam hic
                    deserunt iure animi provident eveniet aut! In laborum dolorem ad velit delectus quo consectetur at
                    et.
                </p>
                <p class="font-medium mb-12.5">
                    Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt
                    qui esse pariatur duis deserunt mollit dolore cillum minim tempor
                    enim. Elit aute irure tempor cupidatat incididunt.
                </p>
            </div>
        </div>
    </section>
g
    <!----------Subscribe form----------->

    @include('partials.subscribe-form')

</x-main-layout>
