<section id="Home" class="relative overflow-hidden z-10 min-h-screen pt-35 md:pt-40 xl:pt-45">
    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
    <div class="max-w-7xl mx-auto">
        <div class="absolute inset-0 -z-10 pointer-events-none overflow-hidden">
            <div class="absolute inset-0 top-0 left-0 w-full h-full">
                <video id="Background-Video"  class="video-bg absolute inset-0 w-full h-full object-cover" autoplay muted loop>
                    <source src="{{ asset('storage/'.$herosection->video) }}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-[900px] px-4 sm:px-8 xl:px-0 py-32 relative z-1 flex flex-col justify-center h-full">
        <div class="text-center wow fadeInRight">
            <span class="hero-subtitle-gradient hover:hero-subtitle-hover relative mb-5 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                <span class="hero-subtitle-text text-white">
                    {{$herosection->sub_title}}
                </span>
        </span>
            <h1 class="text-white mb-6 text-3xl font-extrabold sm:text-5xl xl:text-heading-1" data-aos="fade-right"
            data-aos-anchor="#example-anchor"
            data-aos-offset="500"
            data-aos-duration="500">
                {{$herosection->title}}
            </h1>
            <p class="max-w-[500px] mx-auto mb-6 text-slate-400 md:text-lg" data-aos="fade-left"
            data-aos-anchor="#example-anchor"
            data-aos-offset="500"
            data-aos-duration="500">
                {{$herosection->description}}
            </p>
        </div>
    </div>
</section>