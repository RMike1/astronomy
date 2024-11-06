<section class="overflow-hidden py-17.5 lg:py-22.5 xl:py-27.5">
    <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">

        <div class="wow fadeInUp mb-17.5 text-center">
            <span
                class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                <span class="hero-subtitle-text"> {{$Team_section_header->sub_title}} </span>
            </span>
            <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                {{$Team_section_header->title}}
            </h2>
            <p class="max-w-[714px] mx-auto font-medium">
                {{$Team_section_header->description}}
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 lg:gap-17.5">
            @forelse ($team_members as $team_member)
                <div class="wow fadeInUp group text-center">
                    <div
                        class="team-img-gradient group-hover:before:gradient-9 max-w-50 mx-auto w-full h-50 rounded-full relative mb-7.5 overflow-hidden">
                        <img src="{{  Storage::url($team_member->image) }}" alt="{{ $team_member->first_name }}"
                            class="w-full h-full object-cover" />
                    </div>
                    <h4 class="text-white font-semibold text-heading-6 mb-2.5">
                        {{ $team_member->first_name }} {{ $team_member->last_name }}
                    </h4>
                    <p class="font-medium mb-6">{{ $team_member->position }}</p>
                    <div class="flex items-center justify-center gap-5">
                        @forelse ($SocialMedias as $SocialMedia)
                            @if ($team_member->id == $SocialMedia->team_id)
                                <a target="_blank" href="{{ $SocialMedia->url ?? '#' }}"
                                    class="hover:text-white ease-in duration-300">
                                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="25" height="25" viewBox="0,0,256,256" fill="none">
                                        <g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                            stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                            text-anchor="none" style="mix-blend-mode: normal">
                                            <g transform="scale(10.66667,10.66667)">
                                                {!! $SocialMedia->platform->iconPath() !!}
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
            @empty
            @endforelse



        </div>
    </div>
</section>
