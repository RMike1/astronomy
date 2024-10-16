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
                    <a href="#Contact"
                        class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient">About
                        Us
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
                                    class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 focus:outline-none focus:border-gray-600 focus:ring-gray-600" />
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
