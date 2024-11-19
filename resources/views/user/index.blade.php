<x-main-layout>
    <x-slot name="meta">
        <title>{{$general_setting->site_name ?? ''}}</title>
        <meta name="keyword" content="{{ $meta_data->meta_keyword }}">
        <meta name="description" content="{{ $meta_data->meta_description }}">
        @if (!empty($moreSeoMetadata))
        @foreach ($moreSeoMetadata as $meta)
<meta name="{{ htmlspecialchars($meta['data']['key']) }}"content="{{ htmlspecialchars($meta['data']['value']) }}" />
        @endforeach
    @endif
    @if(!empty($socialMediaSeoMetaData))
        @foreach ($socialMediaSeoMetaData as $social_meta)
            @if ($social_meta['type'] === 'other_social_media_seo_metadata')
<meta property="{{ htmlspecialchars($social_meta['data']['key']) }}" content="{{ htmlspecialchars($social_meta['data']['value']) }}" />
            @elseif ($social_meta['type'] === 'twitter_seo_metadata')
<meta name="{{ htmlspecialchars($social_meta['data']['key']) }}" content="{{ htmlspecialchars($social_meta['data']['value']) }}" />
            @endif
        @endforeach
    @endif
    @if ($meta_data->meta_image)
<meta property="og:image" content="{{ Storage::disk('images')->url($meta_data->meta_image) ?? '' }}" />
<meta name="twitter:image" content="{{ Storage::disk('images')->url($meta_data->meta_image) ?? '' }}" />
    @endif
    </x-slot>
    <x-slot name="header">
        <div class="w-full lg:w-3/4 h-0 lg:h-auto invisible lg:visible lg:flex items-center justify-end"
            :class="{ '!visible bg-dark shadow-lg relative !h-auto max-h-[400px] overflow-y-scroll rounded-md mt-4 p-7.5': navigationOpen }">
            <nav>
                <ul class="flex lg:items-center flex-col lg:flex-row gap-5 lg:gap-2">
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="#Home"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            :class="{ '!text-white nav-gradient': page === 'home' && activeSection === 'Home' }">
                            Home
                        </a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="#Observatories"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            :class="{ '!text-white nav-gradient': page === 'home' && activeSection === 'Observatories' }">
                            Observatories
                        </a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="#Services"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            :class="{ '!text-white nav-gradient': page === 'home' && activeSection === 'Services' }">
                            Services
                        </a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="{{ route('about') }}"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            :class="{ '!text-white nav-gradient': page === 'about' && !activeSection }">
                            About Us
                        </a>
                    </li>
                    <li class="nav__menu lg:py-7" :class="{ 'lg:!py-4': stickyMenu }">
                        <a href="#Contact"
                            class="relative text-white/80 text-sm py-1.5 px-4 border border-transparent hover:text-white hover:nav-gradient"
                            :class="{ '!text-white nav-gradient': page === 'home' && activeSection === 'Contact' }">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
            


        </div>
    </x-slot>


    @include('partials.hero-section')

    @include('partials.home-page-section')

    @include('partials.services')

    @include('partials.contact')

    @include('partials.subscribe-form')

</x-main-layout>
