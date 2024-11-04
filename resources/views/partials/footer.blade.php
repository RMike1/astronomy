<footer class="relative z-10 pb-17.5 lg:pb-22.5 xl:pb-27.5">

    <div class="absolute bottom-0 left-0 w-full flex flex-col gap-3 -z-1 opacity-50">
        <div class="w-full h-[1.24px] footer-bg-gradient"></div>
        <div class="w-full h-[2.47px] footer-bg-gradient"></div>
        <div class="w-full h-[3.71px] footer-bg-gradient"></div>
        <div class="w-full h-[4.99px] footer-bg-gradient"></div>
        <div class="w-full h-[6.19px] footer-bg-gradient"></div>
        <div class="w-full h-[7.42px] footer-bg-gradient"></div>
        <div class="w-full h-[8.66px] footer-bg-gradient"></div>
        <div class="w-full h-[9.90px] footer-bg-gradient"></div>
        <div class="w-full h-[13px] footer-bg-gradient"></div>
    </div>
    <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0 relative pt-17.5">
        <div class="w-full h-[1px] footer-divider-gradient absolute top-0 left-0"></div>
        <div class="flex flex-wrap justify-between">
            <div class="mb-10 max-w-[571px] w-full">
                <a class="mb-8.5 inline-block" href="{{route('home')}}">
                    <h1 class="text-2xl font-bold">APOLLO</h2>
                </a>
                @php
                    $companyInfo = App\Models\About::select('about_summary_description')->first();
                @endphp
                <p class="mb-12 xl:w-4/5">
                    {{$companyInfo->about_summary_description}}
                </p>
                <div class="flex items-center gap-5">
                    @php
                        $companySocialmedias=App\Models\CompanySocialMedia::where('is_active','1')->select(['platform','url'])->get();
                    @endphp
                    @forelse ($companySocialmedias as $companySocialmedia)
                    <a target="_blank" href="{{$companySocialmedia->url ?? "#" }}" class="hover:text-white ease-in duration-300">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256" fill="none">
                            <g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(10.66667,10.66667)">
                                    {!!$companySocialmedia->platform->iconPath()!!}
                                </g>
                            </g>
                        </svg>
                    </a>                        
                    @empty
                    @endforelse
                </div>
                <p class="font-medium mt-5.5">
                    © {{now()->year}} Apollo.
                </p>
            </div>
            <div class="max-w-[571px] w-full">
                <div class="flex flex-col sm:flex-row sm:justify-between gap-10">
                    <div>
                        <h5 class="font-semibold text-white mb-5">Links</h5>
                        <ul class="flex flex-col gap-3.5">
                            <li>
                                <a href="{{route('privacy-policy')}}" class="font-medium ease-in duration-300 hover:text-white">Privacy
                                    Policy</a>
                            </li>
                            <li>
                                <a href="{{route('terms-of-use')}}"
                                    class="font-medium ease-in duration-300 hover:text-white">Terms</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-semibold text-white mb-5">Support</h5>
                        <ul class="flex flex-col gap-3.5">
                            <li>
                                <a href="{{route('home')}}/#Contact"
                                    class="font-medium ease-in duration-300 hover:text-white">Contact us</a>
                            </li>
                            <li>
                                <a href="{{route('home')}}"
                                    class="font-medium ease-in duration-300 hover:text-white">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<button
    class="hidden items-center justify-center w-10 h-10 rounded-[4px] shadow-solid-5 bg-purple hover:opacity-70 fixed bottom-8 right-8 z-999"
    @click="window.scrollTo({top: 0, behavior: 'smooth'})"
    @scroll.window="scrollTop = (window.pageYOffset > 50) ? true : false" :class="{ '!flex': scrollTop }">
    <svg class="fill-white w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path
            d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
    </svg>
</button>
