<x-main-layout>
    <x-slot name="header">
        <div class="w-full lg:w-3/4 h-0 lg:h-auto invisible lg:visible lg:flex items-center justify-end"
        :class="{ '!visible bg-dark shadow-lg relative !h-auto max-h-[400px] overflow-y-scroll rounded-md mt-4 p-7.5': navigationOpen }">
        <nav>
            <ul class="flex lg:items-center flex-col lg:flex-row gap-5 lg:gap-2">
                <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                    <a href="#Home"
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
                    <a wire:navigate href="{{route('about')}}"
                        class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">About
                        Us</a>
                </li>
                <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                    <a href="#Contact"
                        class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">Contact
                        Us</a>
                </li>
            </ul>
        </nav>
        </div>
    </x-slot>

    <!--Hero Section-->

    @include('partials.hero-section')

    <!-- second section images -->
    @include('partials.home-page-section')

    <!--Services Section-->

    @include('partials.services')

    <!--Contact Section-->

    @include('partials.contact')

    <!--Subscr.. Section-->

    @include('partials.subscribe-form')

</x-main-layout>
