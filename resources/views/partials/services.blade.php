<section id="Services" class="overflow-hidden py-17.5 lg:py-22.5 xl:py-27.5 min-h-screen">
    <div class="max-w-[1222px] mx-auto px-4 sm:px-8 xl:px-0">

        <div class="wow fadeInUp text-center" style="visibility: visible;">
            <span
                class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                <span class="hero-subtitle-text"> Some of Main Features </span>
            </span>
            <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                {{$Service_section_header->title}}
            </h2>
            <p class="max-w-[714px] mx-auto mb-5 font-medium">
                {{$Service_section_header->description}}
            </p>
        </div>
        <div class="relative">

            <div class="flex flex-wrap justify-center">

                @foreach ($Services as $Service)
                    <div class="w-full sm:w-1/2 lg:w-1/3">
                        <div
                            class="group relative overflow-hidden text-center py-8 sm:py-10 xl:py-15 px-4 lg:px-8 xl:px-13">
                            <span
                                class="group-hover:opacity-100 opacity-0 features-bg absolute w-full h-full left-0 top-0 -z-1"></span>
                            <span
                                class="icon-border relative max-w-[80px] w-full h-20 rounded-full inline-flex items-center justify-center mb-8 mx-auto">
                                <img src="{{ asset('user/images/icon-06.svg') }}" alt="icon">
                            </span>
                            <h4 class="font-semibold text-lg text-white mb-4">
                                {{$Service->title}}
                            </h4>
                            <p class="font-medium">
                                {{$Service->summary_description}}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
