<x-main-layout>
    <x-slot name="meta">
        <title>410 - {{$meta_data->meta_title}}</title>
        <meta name="description" content="{{ $meta_data->meta_description ?? '' }}">
    </x-slot>
    <x-slot name="header">
        <div class="w-full lg:w-3/4 h-0 lg:h-auto invisible lg:visible lg:flex items-center justify-end"
            :class="{ '!visible bg-dark shadow-lg relative !h-auto max-h-[400px] overflow-y-scroll rounded-md mt-4 p-7.5': navigationOpen }">
            <nav>
                <ul class="flex lg:items-center flex-col lg:flex-row gap-5 lg:gap-2">
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{route('home')}}"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            :class="{ '!text-white nav-gradient': page === 'home' }">Home</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{route('home')}}/#Observatories"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Observatories</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{route('home')}}/#Services"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Services</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{route('about')}}"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">About
                            Us</a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{route('home')}}/#Contact"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Contact
                            Us</a>
                    </li>
                </ul>
            </nav>
        </div>
    </x-slot>
    <section class="relative z-10 pt-30 lg:pt-35 xl:pt-40 pb-2">
    </section>
    <section class=" pt-20 lg:pt-22.5 xl:pt-27.5 pb-20 lg:pb-25 xl:pb-30 2xl:pb-[150px]">
        <div class="wow fadeInUp mx-auto w-full max-w-[597px] text-center px-4 sm:px-8 lg:px-0" data-wow-delay="0.1s">
            <img src="{{ asset('user/images/errors/410.svg') }}" alt="410" class="mx-auto mb-12.5" />
            <h2 class="mb-5.5 text-heading-3 font-bold text-white">
                Oops! Something went wrong.
            </h2>
            <p class="font-medium mb-9">
                Why not try refreshing your page? or you can contact
            </p>
            <a href="{{ route('home') }}"
                class="button-border-gradient relative rounded-lg text-white text-sm inline-flex items-center py-3.5 px-7 shadow-button hover:button-gradient-hover hover:shadow-none">
                Return Home
            </a>
        </div>
    </section>
</x-main-layout>
