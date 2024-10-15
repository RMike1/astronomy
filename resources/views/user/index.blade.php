<x-main-layout>

    <!--Hero Section-->

    <section class="relative overflow-hidden z-10 min-h-screen pt-35 md:pt-40 xl:pt-45">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
        <div class="max-w-7xl mx-auto">
            <div class="absolute inset-0 -z-10 pointer-events-none overflow-hidden">
                <div class="absolute inset-0 top-0 left-0 w-full h-full">
                    <video class="video-bg absolute inset-0 w-full h-full object-cover" autoplay muted loop>
                        <source src="{{ asset('user/video/hero-video.mp4') }}" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-[900px] px-4 sm:px-8 xl:px-0 py-8 relative z-1 flex flex-col justify-center h-full">
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

    <!--Services Section-->

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

    <!--Contact Section-->

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

    <!--Subscr.. Section-->

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
                                <input id="email" type="email" name="email" placeholder="Enter your Email"
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
</x-main-layout>
