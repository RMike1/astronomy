<section class="overflow-hidden py-17.5 lg:py-22.5 xl:py-27.5">
    <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0">

        <div class="wow fadeInUp mb-17.5 text-center">
            <span
                class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                <span class="hero-subtitle-text"> Meet Out Team </span>
            </span>
            <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                Our Dynamic Team
            </h2>
            <p class="max-w-[714px] mx-auto font-medium">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam perferendis quos aperiam ut,
                reprehenderit magnam itaque fugit ea quasi rerum labore tenetur. Neque et expedita eius sunt,
                repellendus ducimus ratione!
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 lg:gap-17.5">
            @forelse ($team_members as $team_member)
                <div class="wow fadeInUp group text-center">
                    <div
                        class="team-img-gradient group-hover:before:gradient-3 max-w-50 mx-auto w-full h-50 rounded-full relative mb-7.5">
                        <img src="{{ asset('storage/' . $team_member->image) }}" alt="team" />
                    </div>
                    <h4 class="text-white font-semibold text-heading-6 mb-2.5">
                        {{ $team_member->first_name }} {{ $team_member->last_name }}
                    </h4>
                    <p class="font-medium mb-6">{{ $team_member->position }}</p>
                    <div class="flex items-center justify-center gap-5">
                        <a href="{{ route('about') }}" class="hover:text-white ease-in duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(10.66667,10.66667)">
                                        <path d="M11.666,2.005c-5.046,0.165 -9.292,4.246 -9.641,9.283c-0.369,5.329 3.442,9.832 8.481,10.589v-7.227h-1.614c-0.726,0 -1.314,-0.588 -1.314,-1.314v0c0,-0.726 0.588,-1.314 1.314,-1.314h1.613v-1.749c0,-2.896 1.411,-4.167 3.818,-4.167c0.357,0 0.662,0.008 0.921,0.021c0.636,0.031 1.129,0.561 1.129,1.198v0c0,0.663 -0.537,1.2 -1.2,1.2h-0.442c-1.022,0 -1.379,0.969 -1.379,2.061v1.437h1.87c0.591,0 1.043,0.527 0.953,1.111l-0.108,0.701c-0.073,0.47 -0.477,0.817 -0.953,0.817h-1.762v7.247c4.883,-0.663 8.648,-4.837 8.648,-9.899c0,-5.634 -4.659,-10.179 -10.334,-9.995z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="{{ route('about') }}" class="hover:text-white ease-in duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(10.66667,10.66667)">
                                        <path d="M8,3c-2.75241,0 -5,2.24759 -5,5v8c0,2.75241 2.24759,5 5,5h8c2.75241,0 5,-2.24759 5,-5v-8c0,-2.75241 -2.24759,-5 -5,-5zM8,4.5h8c1.94159,0 3.5,1.55841 3.5,3.5v8c0,1.94159 -1.55841,3.5 -3.5,3.5h-8c-1.94159,0 -3.5,-1.55841 -3.5,-3.5v-8c0,-1.94159 1.55841,-3.5 3.5,-3.5zM17.25,6c-0.41421,0 -0.75,0.33579 -0.75,0.75c0,0.41421 0.33579,0.75 0.75,0.75c0.41421,0 0.75,-0.33579 0.75,-0.75c0,-0.41421 -0.33579,-0.75 -0.75,-0.75zM12,7c-1.60417,0 -2.90226,0.62857 -3.74805,1.58008c-0.84579,0.95151 -1.25195,2.19075 -1.25195,3.41992c0,1.22917 0.40617,2.46841 1.25195,3.41992c0.84579,0.95151 2.14388,1.58008 3.74805,1.58008c1.60417,0 2.90226,-0.62857 3.74805,-1.58008c0.84579,-0.95151 1.25195,-2.19075 1.25195,-3.41992c0,-1.22917 -0.40617,-2.46841 -1.25195,-3.41992c-0.84579,-0.95151 -2.14388,-1.58008 -3.74805,-1.58008zM12,8.5c1.22917,0 2.05608,0.43393 2.62695,1.07617c0.57088,0.64224 0.87305,1.528 0.87305,2.42383c0,0.89583 -0.30217,1.78159 -0.87305,2.42383c-0.57088,0.64224 -1.39779,1.07617 -2.62695,1.07617c-1.22917,0 -2.05607,-0.43393 -2.62695,-1.07617c-0.57088,-0.64224 -0.87305,-1.528 -0.87305,-2.42383c0,-0.89583 0.30217,-1.78159 0.87305,-2.42383c0.57088,-0.64224 1.39779,-1.07617 2.62695,-1.07617z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="{{ route('about') }}" class="hover:text-white ease-in duration-300">

                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(10.66667,10.66667)">
                                        <path d="M4.4043,3c-0.647,0 -1.02625,0.72877 -0.65625,1.25977l5.98828,8.55859l-6.01172,7.02734c-0.389,0.454 -0.06675,1.1543 0.53125,1.1543h0.66406c0.293,0 0.57172,-0.12856 0.76172,-0.35156l5.23828,-6.13672l3.94336,5.63477c0.375,0.534 0.98667,0.85352 1.63867,0.85352h3.33398c0.647,0 1.02625,-0.72781 0.65625,-1.25781l-6.31836,-9.04297l5.72656,-6.70898c0.332,-0.39 0.05497,-0.99023 -0.45703,-0.99023h-0.8457c-0.292,0 -0.56977,0.12761 -0.75977,0.34961l-4.8418,5.66016l-3.60156,-5.1543c-0.374,-0.536 -0.98467,-0.85547 -1.63867,-0.85547z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="{{ route('about') }}" class="hover:text-white ease-in duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(10.66667,10.66667)">
                                        <path d="M5,3c-1.105,0 -2,0.895 -2,2v14c0,1.105 0.895,2 2,2h14c1.105,0 2,-0.895 2,-2v-14c0,-1.105 -0.895,-2 -2,-2zM5,5h14v14h-14zM7.7793,6.31641c-0.857,0 -1.37109,0.51517 -1.37109,1.20117c0,0.686 0.51416,1.19922 1.28516,1.19922c0.857,0 1.37109,-0.51322 1.37109,-1.19922c0,-0.686 -0.51416,-1.20117 -1.28516,-1.20117zM6.47656,10v7h2.52344v-7zM11.08203,10v7h2.52344v-3.82617c0,-1.139 0.81264,-1.30273 1.05664,-1.30273c0.244,0 0.89649,0.24473 0.89649,1.30273v3.82617h2.44141v-3.82617c0,-2.197 -0.97627,-3.17383 -2.19727,-3.17383c-1.221,0 -1.87226,0.40656 -2.19726,0.97656v-0.97656z">
                                        </path>
                                    </g>
                                </g>
                            </svg>  
                        </a>
                        <a href="{{ route('about') }}" class="hover:text-white ease-in duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(10.66667,10.66667)">
                                        <path d="M6,3c-1.64497,0 -3,1.35503 -3,3v12c0,1.64497 1.35503,3 3,3h12c1.64497,0 3,-1.35503 3,-3v-12c0,-1.64497 -1.35503,-3 -3,-3zM6,5h12c0.56503,0 1,0.43497 1,1v12c0,0.56503 -0.43497,1 -1,1h-12c-0.56503,0 -1,-0.43497 -1,-1v-12c0,-0.56503 0.43497,-1 1,-1zM12,7v7c0,0.56503 -0.43497,1 -1,1c-0.56503,0 -1,-0.43497 -1,-1c0,-0.56503 0.43497,-1 1,-1v-2c-1.64497,0 -3,1.35503 -3,3c0,1.64497 1.35503,3 3,3c1.64497,0 3,-1.35503 3,-3v-3.76758c0.61615,0.43892 1.25912,0.76758 2,0.76758v-2c-0.04733,0 -0.73733,-0.21906 -1.21875,-0.63867c-0.48142,-0.41961 -0.78125,-0.94634 -0.78125,-1.36133z">
                                        </path>
                                    </g>
                                </g>
                            </svg>  
                        </a>
                    </div>
                </div>
            @empty
            @endforelse



        </div>
    </div>
</section>