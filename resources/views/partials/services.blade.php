<section id="Services" class="overflow-hidden py-10 lg:py-14 xl:py-16 min-h-screen"> 
    <div class="max-w-[1222px] mx-auto px-4 sm:px-6 xl:px-8">

        <div class="wow fadeInUp text-center" style="visibility: visible;">
            <span class="hero-subtitle-gradient relative mb-3 font-medium text-sm inline-flex items-center gap-2 py-1 px-4 rounded-full"> 
                <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                <span class="hero-subtitle-text"> {{$Service_section_header->sub_title}} </span>
            </span>
            <h2 class="text-white mb-3 text-xl font-extrabold sm:text-3xl xl:text-heading-2"> 
                {{$Service_section_header->title}}
            </h2>
            <p class="max-w-[600px] mx-auto mb-4 font-medium">
                {{$Service_section_header->description}}
            </p>
        </div>
        <div class="relative">
            <div class="flex flex-wrap justify-center">
                @foreach ($Services as $Service)
                    <div class="w-full sm:w-1/2 lg:w-1/3"> 
                        <div class="group relative overflow-hidden text-center py-6 sm:py-8 xl:py-12 px-4 lg:px-6 xl:px-8">
                            <span class="group-hover:opacity-100 opacity-0 features-bg absolute w-full h-full left-0 top-0 -z-1"></span>
                            <span class="icon-border relative max-w-[60px] w-full h-16 rounded-full inline-flex items-center justify-center mb-6 mx-auto"> 
                                <img src="{{ asset('user/images/icon-06.svg') }}" alt="icon">
                            </span>
                            <h4 class="font-semibold text-lg text-white mb-3">
                                {{$Service->title}}
                            </h4>
                            <p class="font-medium text-sm"> 
                                {{$Service->summary_description}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

