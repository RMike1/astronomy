<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Astronomy APP</title>
    <link rel="icon" href="{{ asset('user/favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>

<body x-data="{ page: 'home', 'loaded': true, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }">

    <header class="fixed left-0 top-0 w-full z-9999 py-7 lg:py-0"
        :class="{ 'bg-dark/40 backdrop-blur-lg shadow !py-4 lg:!py-0 transition duration-100 before:absolute before:w-full before:h-[1px] before:bottom-0 before:left-0 before:features-row-border': stickyMenu }"
        @scroll.window="stickyMenu = (window.scrollY > 0) ? true : false">
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0 lg:flex items-center justify-between relative">
            <div class="w-full lg:w-1/4 flex items-center justify-between">
                <a href="index.html">
                    <h1 class="text-2xl font-bold">APOLLO</h1>
                </a>

                <button class="lg:hidden block" @click="navigationOpen = !navigationOpen">
                    <span class="block relative cursor-pointer w-5.5 h-5.5">
                        <span class="du-block absolute right-0 w-full h-full">
                            <span
                                class="block relative top-0 left-0 bg-white rounded-sm w-0 h-0.5 my-1 ease-in-out duration-200 delay-[0]"
                                :class="{ '!w-full delay-300': !navigationOpen }"></span>
                            <span
                                class="block relative top-0 left-0 bg-white rounded-sm w-0 h-0.5 my-1 ease-in-out duration-200 delay-150"
                                :class="{ '!w-full delay-400': !navigationOpen }"></span>
                            <span
                                class="block relative top-0 left-0 bg-white rounded-sm w-0 h-0.5 my-1 ease-in-out duration-200 delay-200"
                                :class="{ '!w-full delay-500': !navigationOpen }"></span>
                        </span>
                        <span class="du-block absolute right-0 w-full h-full rotate-45">
                            <span
                                class="block bg-white rounded-sm ease-in-out duration-200 delay-300 absolute left-2.5 top-0 w-0.5 h-full"
                                :class="{ '!h-0 delay-[0]': !navigationOpen }"></span>
                            <span
                                class="block bg-white rounded-sm ease-in-out duration-200 delay-400 absolute left-0 top-2.5 w-full h-0.5"
                                :class="{ '!h-0 delay-200': !navigationOpen }"></span>
                        </span>
                    </span>
                </button>
            </div>

            <!-- Navbar Menu Section -->
            <div class="w-full lg:w-3/4 h-0 lg:h-auto invisible lg:visible lg:flex items-center justify-end"
                :class="{ '!visible bg-dark shadow-lg relative !h-auto max-h-[400px] overflow-y-scroll rounded-md mt-4 p-7.5': navigationOpen }">
                <nav>
                    <ul class="flex lg:items-center flex-col lg:flex-row gap-5 lg:gap-2">
                        <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                            <a href="#home"
                                class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                                :class="{ '!text-white nav-gradient': page === 'home' }">Home</a>
                        </li>
                        <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                            <a href="#Observatories"
                                class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Observatories</a>
                        </li>
                        <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                            <a href="#Services"
                                class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Services</a>
                        </li>
                        <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                            <a href="#Contact"
                                class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Contact
                                Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>


    <main>

        <!-- Hero section -->

        <section class="relative overflow-hidden z-10 min-h-screen pt-35 md:pt-40 xl:pt-45">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
            <div class="max-w-7xl mx-auto">
                <div class="absolute inset-0 -z-10 pointer-events-none overflow-hidden">
                    <!-- Video container -->
                    <div class="absolute inset-0 top-0 left-0 w-full h-full">
                        <video class="video-bg absolute inset-0 w-full h-full object-cover" autoplay muted loop>
                            <source src="{{ asset('user/video/hero-video.mp4') }}" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                        <!-- Gradient overlay -->
                    </div>
                </div>
            </div>

            <div
                class="mx-auto max-w-[900px] px-4 sm:px-8 xl:px-0 py-8 relative z-1 flex flex-col justify-center h-full">
                <div class="text-center wow fadeInRight">
                    <a href="index.html#"
                        class="hero-subtitle-gradient hover:hero-subtitle-hover relative mb-5 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                        <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                        <span class="hero-subtitle-text text-white">
                            Explore the Wonders of the Universe!
                        </span>
                    </a>
                    <h1 class="text-white mb-6 text-3xl font-extrabold sm:text-5xl xl:text-heading-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit saepe aperiam distinctio.
                    </h1>
                    <p class="max-w-[500px] mx-auto mb-16 text-slate-400 md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit saepe aperiam distinctio.
                    </p>
                </div>
            </div>
        </section>

        <!-- second section images -->
        <section id="Observatories" class="relative overflow-hidden z-10 pt-12.5 min-h-screen bg-cover bg-center"
            style="background-image: url({{ asset('user/images/bc/image1.jpg') }});">
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
            <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay for better text visibility -->

            <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">

                <div class="grid sm:grid-cols-12 gap-7.5" data-highlighter>
                    <div class="sm:col-span-12 pt-32">
                        <div class="relative">
                            <div class="relative overflow-hidden p-10 xl:p-15" data-aos="fade-up">
                                <div class="flex justify-between items-center relative z-20">
                                    <div class="max-w-[477px] w-full">
                                        <span
                                            class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5">
                                            <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                                            <span class="hero-subtitle-text">
                                                AI-Powered Writing Tool
                                            </span>
                                        </span>
                                        <h3 class="text-white mb-4.5 font-bold text-heading-4">
                                            Intelligent Writing Assistance
                                        </h3>
                                        <p class="font-medium mb-10">
                                            Our AI writing tool is designed to empower you with
                                            exceptional writing capabilities, making the writing
                                            process...
                                        </p>
                                        <a href="index.html#"
                                            class="features-button-gradient relative inline-flex items-center gap-1.5 rounded-full py-3 px-6 text-white text-sm ease-in duration-300 hover:shadow-button">
                                            Learn more
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.3992 5.60002L8.22422 0.350024C7.99922 0.125024 7.64922 0.125024 7.42422 0.350024C7.19922 0.575024 7.19922 0.925025 7.42422 1.15002L11.6242 5.42503H0.999219C0.699219 5.42503 0.449219 5.67502 0.449219 5.97502C0.449219 6.27502 0.699219 6.55003 0.999219 6.55003H11.6742L7.42422 10.875C7.19922 11.1 7.19922 11.45 7.42422 11.675C7.52422 11.775 7.67422 11.825 7.82422 11.825C7.97422 11.825 8.12422 11.775 8.22422 11.65L13.3992 6.40002C13.6242 6.17502 13.6242 5.82502 13.3992 5.60002Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="Observatories" class="relative overflow-hidden z-10 pt-12.5 min-h-screen bg-cover bg-center"
            style="background-image: url({{ asset('user/images/bc/image2.jpg') }});">
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
            <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay for better text visibility -->

            <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
                <div class="grid sm:grid-cols-12 gap-7.5" data-highlighter>
                    <div class="sm:col-span-12 pt-32">
                        <div class="relative">
                            <div class="relative overflow-hidden p-10 xl:p-15" data-aos="fade-up">
                                <div class="flex justify-end items-center relative z-20">
                                    <div class="max-w-[477px] w-full">
                                        <span
                                            class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5">
                                            <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                                            <span class="hero-subtitle-text">
                                                AI-Powered Writing Tool
                                            </span>
                                        </span>
                                        <h3 class="text-white mb-4.5 font-bold text-heading-4">
                                            Intelligent Writing Assistance
                                        </h3>
                                        <p class="font-medium mb-10">
                                            Our AI writing tool is designed to empower you with
                                            exceptional writing capabilities, making the writing
                                            process...
                                        </p>
                                        <a href="index.html#"
                                            class="features-button-gradient relative inline-flex items-center gap-1.5 rounded-full py-3 px-6 text-white text-sm ease-in duration-300 hover:shadow-button">
                                            Learn more
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.3992 5.60002L8.22422 0.350024C7.99922 0.125024 7.64922 0.125024 7.42422 0.350024C7.19922 0.575024 7.19922 0.925025 7.42422 1.15002L11.6242 5.42503H0.999219C0.699219 5.42503 0.449219 5.67502 0.449219 5.97502C0.449219 6.27502 0.699219 6.55003 0.999219 6.55003H11.6742L7.42422 10.875C7.19922 11.1 7.19922 11.45 7.42422 11.675C7.52422 11.775 7.67422 11.825 7.82422 11.825C7.97422 11.825 8.12422 11.775 8.22422 11.65L13.3992 6.40002C13.6242 6.17502 13.6242 5.82502 13.3992 5.60002Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="Services" class="overflow-hidden py-17.5 lg:py-22.5 xl:py-27.5 min-h-screen">
            <div class="max-w-[1222px] mx-auto px-4 sm:px-8 xl:px-0">

                <div class="wow fadeInUp text-center" style="visibility: visible;">
                    <span
                        class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                        <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                        <span class="hero-subtitle-text"> Some of Main Features </span>
                    </span>
                    <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                        Key Features of Our Tool
                    </h2>
                    <p class="max-w-[714px] mx-auto mb-5 font-medium">
                        Our AI writing tool is designed to empower you with exceptional
                        writing capabilities, making the writing process more efficient,
                        accurate, and enjoyable.
                    </p>
                </div>
                <div class="relative">
                    <div
                        class="features-row-border rotate-90 w-1/2 h-[1px] absolute top-1/2 left-1/2 -translate-y-1/2 lg:-translate-x-1/3 lg:left-1/4 hidden lg:block">
                    </div>
                    <div
                        class="features-row-border rotate-90 w-1/2 h-[1px] absolute top-1/2 right-1/2 -translate-y-1/2 lg:right-[8.3%] hidden lg:block">
                    </div>

                    <div class="flex flex-wrap justify-center">

                        <div class="w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="group relative overflow-hidden text-center py-8 sm:py-10 xl:py-15 px-4 lg:px-8 xl:px-13">
                                <span
                                    class="group-hover:opacity-100 opacity-0 features-bg absolute w-full h-full left-0 top-0 -z-1"></span>
                                <span
                                    class="icon-border relative max-w-[80px] w-full h-20 rounded-full inline-flex items-center justify-center mb-8 mx-auto">
                                    <img src="{{ asset('user/images/icon-01.svg') }}" alt="icon">
                                </span>
                                <h4 class="font-semibold text-lg text-white mb-4">
                                    Intelligent Writing Assistance
                                </h4>
                                <p class="font-medium">
                                    Our AI writing tool analyzes your content, suggests
                                    improvements,
                                </p>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="group relative overflow-hidden text-center py-8 sm:py-10 xl:py-15 px-4 lg:px-8 xl:px-13">
                                <span
                                    class="group-hover:opacity-100 opacity-0 features-bg absolute w-full h-full left-0 top-0 -z-1"></span>
                                <span
                                    class="icon-border relative max-w-[80px] w-full h-20 rounded-full inline-flex items-center justify-center mb-8 mx-auto">
                                    <img src="{{ asset('user/images/icon-02.svg') }}" alt="icon">
                                </span>
                                <h4 class="font-semibold text-lg text-white mb-4">
                                    Grammar and Spell Check
                                </h4>
                                <p class="font-medium">
                                    Say goodbye to embarrassing typos and grammar mistakes
                                </p>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="group relative overflow-hidden text-center py-8 sm:py-10 xl:py-15 px-4 lg:px-8 xl:px-13">
                                <span
                                    class="group-hover:opacity-100 opacity-0 features-bg absolute w-full h-full left-0 top-0 -z-1"></span>
                                <span
                                    class="icon-border relative max-w-[80px] w-full h-20 rounded-full inline-flex items-center justify-center mb-8 mx-auto">
                                    <img src="{{ asset('user/images/icon-03.svg') }}" alt="icon">
                                </span>
                                <h4 class="font-semibold text-lg text-white mb-4">
                                    Plagiarism Detection
                                </h4>
                                <p class="font-medium">
                                    Originality is key, and our AI writing tool helps you
                                    maintain it
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="features-row-border w-full h-[1px]"></div>

                    <div class="flex flex-wrap justify-center">

                        <div class="w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="group relative overflow-hidden text-center py-8 sm:py-10 xl:py-15 px-4 lg:px-8 xl:px-13">
                                <span
                                    class="group-hover:opacity-100 opacity-0 features-bg absolute w-full h-full left-0 top-0 -z-1 rotate-180"></span>
                                <span
                                    class="icon-border relative max-w-[80px] w-full h-20 rounded-full inline-flex items-center justify-center mb-8 mx-auto">
                                    <img src="{{ asset('user/images/icon-04.svg') }}" alt="icon">
                                </span>
                                <h4 class="font-semibold text-lg text-white mb-4">
                                    Voice to Text Conversion
                                </h4>
                                <p class="font-medium">
                                    Transform your spoken words into written text easily &amp;
                                    effortlessly
                                </p>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="group relative overflow-hidden text-center py-8 sm:py-10 xl:py-15 px-4 lg:px-8 xl:px-13">
                                <span
                                    class="group-hover:opacity-100 opacity-0 features-bg absolute w-full h-full left-0 top-0 -z-1 rotate-180"></span>
                                <span
                                    class="icon-border relative max-w-[80px] w-full h-20 rounded-full inline-flex items-center justify-center mb-8 mx-auto">
                                    <img src="{{ asset('user/images/icon-05.svg') }}" alt="icon">
                                </span>
                                <h4 class="font-semibold text-lg text-white mb-4">
                                    Style and Tone Adaptation
                                </h4>
                                <p class="font-medium">
                                    Whether you need a professional, or positive tone it has
                                    everyone
                                </p>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/3">
                            <div
                                class="group relative overflow-hidden text-center py-8 sm:py-10 xl:py-15 px-4 lg:px-8 xl:px-13">
                                <span
                                    class="group-hover:opacity-100 opacity-0 features-bg absolute w-full h-full left-0 top-0 -z-1 rotate-180"></span>
                                <span
                                    class="icon-border relative max-w-[80px] w-full h-20 rounded-full inline-flex items-center justify-center mb-8 mx-auto">
                                    <img src="{{ asset('user/images/icon-06.svg') }}" alt="icon">
                                </span>
                                <h4 class="font-semibold text-lg text-white mb-4">
                                    Content Generation
                                </h4>
                                <p class="font-medium">
                                    Need inspiration or assistance with generating content?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="Contact" class="overflow-hidden scroll-mt-17 lg:py-22.5 xl:py-27.5 min-h-screen">
            <div class="max-w-[1104px] mx-auto px-4 sm:px-8 xl:px-0">
                <div class="relative z-999 overflow-hidden bg-dark px-4 sm:px-20 lg:px-27.5">
                    <div class="wow fadeInUp mb-16 text-center relative z-999">
                        <span
                            class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                            <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                            <span class="hero-subtitle-text"> Need Any Help? </span>
                        </span>
                        <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                            Contact With Us
                        </h2>
                        <p class="max-w-[714px] mx-auto font-medium">
                            Our AI writing tool is designed to empower you with exceptional
                            writing capabilities, making the writing process more efficient,
                            accurate, and enjoyable.
                        </p>
                    </div>

                    <div class="form-box-gradient relative overflow-hidden rounded-[25px] bg-dark p-6 sm:p-8 xl:p-15">
                        <form class="relative z-10">
                            <div class="-mx-4 xl:-mx-10 flex flex-wrap">
                                <div class="w-full px-4 xl:px-5 md:w-1/2">
                                    <div class="mb-9.5">
                                        <label for="name" class="text-white mb-2.5 block font-medium">
                                            Name
                                        </label>
                                        <input id="name" type="text" name="name"
                                            placeholder="Enter your Name"
                                            class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 outline-none" />
                                    </div>
                                </div>
                                <div class="w-full px-4 xl:px-5 md:w-1/2">
                                    <div class="mb-9.5">
                                        <label for="email" class="text-white mb-2.5 block font-medium">
                                            Email
                                        </label>
                                        <input id="email" type="email" name="email"
                                            placeholder="Enter your Email"
                                            class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 outline-none" />
                                    </div>
                                </div>
                                <div class="w-full px-4 xl:px-5">
                                    <div class="mb-10">
                                        <label for="message" class="text-white mb-2.5 block font-medium">
                                            Message
                                        </label>
                                        <textarea id="message" name="message" placeholder="Type your message" rows="6"
                                            class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-5 px-6 outline-none"></textarea>
                                    </div>
                                </div>
                                <div class="w-full px-4 xl:px-5">
                                    <div class="text-center">
                                        <a href="index.html#"
                                            class="button-border-gradient relative rounded-lg text-white text-sm inline-flex items-center py-3.5 px-7 shadow-button hover:button-gradient-hover hover:shadow-none">
                                            Send Message
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-17.5 sm:pt-22.5 xl:pt-27.5 pb-11">
            <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
                <div class="flex flex-wrap items-center justify-between gap-10">
                    <div class="max-w-[352px] w-full">
                        <h3 class="font-semibold text-heading-5 text-white mb-2">
                            News & Update
                        </h3>
                        <p class="font-medium">
                            Keep up to date with everything about our tool
                        </p>
                    </div>
                    <div class="max-w-[534px] w-full">
                        <form>
                            <div class="flex items-center gap-4">
                                <div class="max-w-[395px] w-full">
                                    <input id="email" type="email" name="email"
                                        placeholder="Enter your Email"
                                        class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 outline-none" />
                                </div>
                                <a href="index.html#"
                                    class="button-border-gradient relative rounded-lg text-white text-sm flex items-center gap-1.5 py-3.5 px-7 shadow-button hover:button-gradient-hover hover:shadow-none">
                                    Subscribe
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <footer class="relative z-10 pb-17.5 lg:pb-22.5 xl:pb-27.5">

        <div class="absolute bottom-0 left-0 w-full flex flex-col gap-3 -z-1 opacity-50">
            <div class="w-full h-[1.24px] footer-bg-gradient"></div>
            <div class="w-full h-[2.47px] footer-bg-gradient"></div>
            <div class="w-full h-[3.71px] footer-bg-gradient"></div>
            <div class="w-full h-[4.99px] footer-bg-gradient"></div>
            <div class="w-full h-[6.19px] footer-bg-gradient"></div>
            <div class="w-full h-[7.42px] footer-bg-gradient"></div>
            <div class="w-full h-[8.66px] footer-bg-gradient"></div>
            <div class="w-full h-[9.90px] footer-bg-gradient"></div>
            <div class="w-full h-[13px] footer-bg-gradient"></div>
        </div>
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0 relative pt-17.5">
            <div class="w-full h-[1px] footer-divider-gradient absolute top-0 left-0"></div>
            <div class="flex flex-wrap justify-between">
                <div class="mb-10 max-w-[571px] w-full">
                    <a class="mb-8.5 inline-block" href="index.html">
                        <h1 class="text-2xl font-bold">APOLLO</h2>
                    </a>
                    <p class="mb-12 xl:w-4/5">
                        AI writing tool is designed to empower you with exceptional writing
                        capabilities.
                    </p>
                    <div class="flex items-center gap-5">
                        <a href="index.html#" class="hover:text-white ease-in duration-300">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 21.9506C18.0533 21.4489 22 17.1853 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 16.8379 5.43552 20.8734 10 21.8V16H7V13H10V9.79586C10 7.47449 11.9695 5.64064 14.285 5.80603L17 5.99996V8.99996H15C13.8954 8.99996 13 9.89539 13 11V13H17L16 16H13V21.9506Z"
                                    fill />
                            </svg>
                        </a>
                        <a href="index.html#" class="hover:text-white ease-in duration-300">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.6125 21.5251C16.4625 21.5251 21.2625 14.2126 21.2625 7.87509C21.2625 7.72509 21.2625 7.46259 21.225 7.23759C22.1625 6.56259 22.9875 5.70009 23.625 4.76259C22.725 5.17509 21.825 5.40009 20.8875 5.51259C21.9 4.91259 22.65 3.97509 22.9875 2.8501C22.05 3.3751 21.075 3.78759 19.9125 4.01259C19.0125 3.0751 17.8125 2.4751 16.425 2.4751C13.7625 2.4751 11.5875 4.65009 11.5875 7.31259C11.5875 7.68759 11.625 8.06259 11.7 8.43759C7.8375 8.17509 4.3125 6.26259 1.9125 3.3751C1.5 4.12509 1.275 4.91259 1.275 5.77509C1.275 7.46259 2.1375 8.88759 3.45 9.75009C2.6625 9.71259 1.9125 9.48759 1.275 9.15009C1.275 9.18759 1.275 9.18759 1.275 9.18759C1.275 11.4751 2.925 13.4626 5.1 13.9126C4.6875 14.0251 4.2375 14.0626 3.9 14.0626C3.6 14.0626 3.2625 14.0251 3 13.9501C3.6375 15.8626 5.4 17.2501 7.5 17.2876C5.85 18.5626 3.7875 19.3501 1.575 19.3501C1.125 19.4251 0.75 19.3501 0.375 19.3126C2.4 20.7376 4.9125 21.5251 7.6125 21.5251Z"
                                    fill />
                            </svg>
                        </a>
                        <a href="index.html#" class="hover:text-white ease-in duration-300">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_368_11839)">
                                    <path
                                        d="M12 0.674805C5.625 0.674805 0.375 5.8498 0.375 12.2998C0.375 17.3998 3.7125 21.7498 8.3625 23.3248C8.9625 23.4373 9.15 23.0623 9.15 22.7998C9.15 22.5373 9.15 21.7873 9.1125 20.7748C5.8875 21.5248 5.2125 19.1998 5.2125 19.1998C4.6875 17.8873 3.9 17.5123 3.9 17.5123C2.85 16.7623 3.9375 16.7623 3.9375 16.7623C5.1 16.7998 5.7375 17.9623 5.7375 17.9623C6.75 19.7623 8.475 19.2373 9.1125 18.8998C9.225 18.1498 9.525 17.6248 9.8625 17.3248C7.3125 17.0623 4.575 16.0498 4.575 11.6248C4.575 10.3498 5.0625 9.3373 5.775 8.5498C5.6625 8.2873 5.25 7.0873 5.8875 5.4748C5.8875 5.4748 6.9 5.1748 9.1125 6.6748C10.05 6.4123 11.025 6.2623 12.0375 6.2623C13.05 6.2623 14.0625 6.3748 14.9625 6.6748C17.175 5.2123 18.15 5.4748 18.15 5.4748C18.7875 7.0498 18.4125 8.2873 18.2625 8.5498C19.0125 9.3373 19.4625 10.3873 19.4625 11.6248C19.4625 16.0498 16.725 17.0623 14.175 17.3248C14.5875 17.6998 14.9625 18.4498 14.9625 19.4998C14.9625 21.0748 14.925 22.3123 14.925 22.6873C14.925 22.9873 15.15 23.3248 15.7125 23.2123C20.2875 21.6748 23.625 17.3623 23.625 12.2248C23.5875 5.8498 18.375 0.674805 12 0.674805Z"
                                        fill />
                                </g>
                                <defs>
                                    <clipPath id="clip0_368_11839">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <p class="font-medium mt-5.5">
                        AI Tool, LLC. All rights reserved.
                    </p>
                </div>
                <div class="max-w-[571px] w-full">
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-10">
                        <div>
                            <h5 class="font-semibold text-white mb-5">Products</h5>
                            <ul class="flex flex-col gap-3.5">
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Features</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Integrations</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Pricing</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Changelog</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Roadmap</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="font-semibold text-white mb-5">Company</h5>
                            <ul class="flex flex-col gap-3.5">
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Support</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Community</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="font-semibold text-white mb-5">Support</h5>
                            <ul class="flex flex-col gap-3.5">
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Features</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Integrations</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Pricing</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Changelog</a>
                                </li>
                                <li>
                                    <a href="index.html#"
                                        class="font-medium ease-in duration-300 hover:text-white">Roadmap</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <button
        class="hidden items-center justify-center w-10 h-10 rounded-[4px] shadow-solid-5 bg-purple hover:opacity-70 fixed bottom-8 right-8 z-999"
        @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        @scroll.window="scrollTop = (window.pageYOffset > 50) ? true : false" :class="{ '!flex': scrollTop }">
        <svg class="fill-white w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path
                d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
        </svg>
    </button>

    <script defer src="{{ asset('user/js/bundle.js') }}"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            mirror: true,
        });
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollPercent = Math.min(scrollTop / 300,
                1);
            navbar.style.backgroundColor =
                `rgba(0, 0, 0, ${scrollPercent * 0.7})`;

            if (scrollTop > lastScrollTop) {
                navbar.style.top = "-80px";
            } else {
                navbar.style.top = "0";
            }
            lastScrollTop = scrollTop;
        });
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'8d2962fbcaaf18dd',t:'MTcyODkyNzk2My4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
</body>

</html>
