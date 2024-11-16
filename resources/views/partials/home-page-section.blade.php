@foreach ($Homesections as $Homesection)
    <section  id="Observatories" class="relative overflow-hidden pt-12.5 min-h-screen bg-cover bg-center section-block" data-aos="fade-up"
        style="background-image: url({{ Storage::disk('images')->url($Homesection->image) }});">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div> 
        <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">
            <div class="grid sm:grid-cols-12 gap-7.5" data-highlighter>
                <div class="sm:col-span-12 pt-32">
                    <div class="relative">
                        <div class="relative overflow-hidden p-10 xl:p-15" data-aos="zoom-out">
                            <div class="flex {{$Homesection->text_position==='left' ? 'justify-between' : 'justify-end'}} items-center relative z-20">
                                <div class="max-w-[477px] w-full">
                                    <span
                                        class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5">
                                        <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                                        <span class="hero-subtitle-text">
                                            {{$Homesection->sub_title}}
                                        </span>
                                    </span>
                                    <h3 class="text-white mb-4.5 font-bold text-heading-4">
                                        {{$Homesection->title}}
                                    </h3>
                                    <p class="font-medium mb-10">
                                        {{$Homesection->summary_description}}
                                    </p>
                                    <a href="{{route('explore',$Homesection->slug)}}"
                                        class="features-button-gradient relative inline-flex items-center gap-1.5 rounded-full py-3 px-6 text-white text-sm ease-in duration-300 hover:shadow-button">
                                        Learn more
                                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.3992 5.60002L8.22422 0.350024C7.99922 0.125024 7.64922 0.125024 7.42422 0.350024C7.19922 0.575024 7.19922 0.925025 7.42422 1.15002L11.6242 5.42503H0.999219C0.699219 5.42503 0.449219 5.67502 0.449219 5.97502C0.449219 6.27502 0.699219 6.55003 0.999219 6.55003H11.6742L7.42422 10.875C7.19922 11.1 7.19922 11.45 7.42422 11.675C7.52422 11.775 7.67422 11.825 7.82422 11.825C7.97422 11.825 8.12422 11.775 8.22422 11.65L13.3992 6.40002C13.6242 6.17502 13.6242 5.82502 13.3992 5.60002Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach
