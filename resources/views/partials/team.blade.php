<section class="overflow-hidden py-10 lg:py-12 xl:py-14">
    <div class="max-w-[1170px] mx-auto px-4 sm:px-6 xl:px-8">

        <div class="wow fadeInUp mb-10 text-center">
            <span
                class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4 rounded-full">
                <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                <span class="hero-subtitle-text"> {{ $Team_section_header->sub_title }} </span>
            </span>
            <h2 class="text-white mb-4 text-xl font-extrabold sm:text-3xl xl:text-heading-2">
                {{ $Team_section_header->title }}
            </h2>
            <p class="max-w-[600px] mx-auto font-medium mb-4">
                {{ $Team_section_header->description }}
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
            @forelse ($team_members as $team_member)
                <div class="wow fadeInUp group text-center">
                    <div
                        class="team-img-gradient group-hover:before:gradient-9 max-w-40 mx-auto w-full h-40 rounded-full relative mb-5 overflow-hidden">
                        <img src="{{ Storage::url($team_member->image) }}" alt="{{ $team_member->first_name }}"
                            class="w-full h-full object-cover" />
                    </div>
                    <h4 class="text-white font-semibold text-heading-6 mb-2">
                        {{ $team_member->first_name }} {{ $team_member->last_name }}
                    </h4>
                    <p class="font-medium mb-4">{{ $team_member->position }}</p>
                    <div class="flex items-center justify-center gap-4">
                        @forelse ($SocialMedias as $SocialMedia)
                            @if ($team_member->id == $SocialMedia->team_id)
                                <a target="_blank" href="{{ $SocialMedia->url ?? '#' }}"
                                    class="hover:text-white ease-in duration-300">
                                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                        width="20" height="20" viewBox="0,0,256,256" fill="none">
                                        <g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                            stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                            text-anchor="none" style="mix-blend-mode: normal">
                                            <g transform="scale(8.66667,8.66667)">
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
