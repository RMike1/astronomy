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
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">

            <div class="grid sm:grid-cols-12 gap-7.5" data-highlighter>
                <div class="sm:col-span-12 pt-32">
                    <div class="relative">
                        <div class="relative overflow-hidden p-10 xl:p-15">
                            <div
                                class="flex {{ $Homesection->text_position === 'left' ? 'justify-between' : 'justify-end' }} items-center relative z-20">
                                <div class="max-w-[477px] w-full">
                                    <span data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="200"
                                        data-aos-duration="200"
                                        class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5">
                                        <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                                        <span class="hero-subtitle-text">
                                            {{ $Homesection->sub_title }}
                                        </span>
                                    </span>
                                    <h3 class="text-white mb-4.5 font-bold text-heading-4" data-aos="fade-left"
                                        data-aos-anchor="#example-anchor" data-aos-offset="300" data-aos-duration="300">
                                        {{ $Homesection->title }}
                                    </h3>
                                    <p class="font-normal text-base mb-10" data-aos="fade-left"
                                        data-aos-anchor="#example-anchor" data-aos-offset="400" data-aos-duration="400">
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

    <section class="pt-20 lg:pt-25 pb-17.5 lg:pb-22.5 xl:pb-27.5">
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
            {{-- <img src="{{ asset('/' . $Homesection->image) }}" alt="blog" class="mb-10" /> --}}
            <div class="max-w-[870px] mx-auto">
                <h2 class="font-semibold text-white text-[34px] leading-[45px] max-w-[579px] mb-7.5">
                    Lorem ipsum dolor sit amet consectetur
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
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
</x-main-layout>
