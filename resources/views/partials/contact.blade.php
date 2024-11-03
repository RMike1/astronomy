<section id="Contact" class="overflow-hidden scroll-mt-17 lg:py-22.5 xl:py-27.5 min-h-screen">
    <div class="max-w-[1104px] mx-auto px-4 sm:px-8 xl:px-0">
        <div class="relative z-999 overflow-hidden px-4 sm:px-20 lg:px-27.5">
            <div class="wow fadeInUp mb-16 text-center relative z-999">
                <span
                    class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                    <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                    <span class="hero-subtitle-text"> {{$Contact_section_header->sub_title}} </span>
                </span>
                <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                    {{$Contact_section_header->title}}
                </h2>
                <p class="max-w-[714px] mx-auto font-medium">
                    {{$Contact_section_header->description}}
                </p>
            </div>
              <livewire:contact-form>
        </div>
    </div>
</section>