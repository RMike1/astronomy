<x-main-layout>
    <x-slot name="meta">
        <title>{{ $policies->meta_title }} - {{$general_setting->site_name}}</title>
        <meta name="keyword" content="{{ $policies->meta_keyword }}">
        <meta name="description" content="{{ $policies->meta_description }}">
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
        style="background-image: url({{ Storage::disk('images')->url($policies->background_image) }});">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">

            <div class="grid sm:grid-cols-12 gap-7.5" data-highlighter>
                <div class="sm:col-span-12 pt-32">
                    <div class="relative">
                        <div class="relative overflow-hidden p-10 xl:p-15">
                            <div class="flex justify-end items-center relative z-20">
                                <div class="max-w-[477px] w-full">
                                    <span data-aos="fade-down" data-aos-anchor="#example-anchor" data-aos-offset="200"
                                        data-aos-duration="1000"
                                        class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5">
                                        <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                                        <span class="hero-subtitle-text">
                                            {{ $policies->sub_title }}
                                        </span>
                                    </span>
                                    <h3 class="text-white mb-4.5 font-bold text-heading-2" data-aos="fade-down"
                                        data-aos-anchor="#example-anchor" data-aos-offset="300"
                                        data-aos-duration="2000">
                                        {{ $policies->title }}
                                    </h3>
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
            <div class="max-w-[870px] mx-auto">
                <div class="custom-editor-content">
                    {!! str($policies->description)->sanitizeHtml() !!}
                </div>
            </div>
        </div>
    </section>
</x-main-layout>
