<header class="fixed left-0 top-0 w-full z-9999 py-7 lg:py-0"
            :class="{ 'bg-dark/40 backdrop-blur-lg shadow !py-4 lg:!py-0 transition duration-100 before:absolute before:w-full before:h-[1px] before:bottom-0 before:left-0 before:features-row-border': stickyMenu }"
            @scroll.window="stickyMenu = (window.scrollY > 0) ? true : false">
            <div class="max-w-[1170px] mx-auto px-4 sm:px-8 xl:px-0 lg:flex items-center justify-between relative">
                <div class="w-full lg:w-1/4 flex items-center justify-between">
                    @php
                        $company_profile=App\Models\About::select('logo')->first();
                    @endphp
                    <a href="{{ route('home') }}">
                        <img src="{{$company_profile ? Storage::url($company_profile->logo) : ' '}}" alt="Logo" />
                    </a>

                    <button class="lg:hidden block" @click="navigationOpen = !navigationOpen">
                        <span class="block relative cursor-pointer w-5.5 h-5.5">
                            <span class="du-block absolute right-0 w-full h-full">
                                <span
                                    class="block relative top-0 left-0 bg-white rounded-sm w-0 h-0.5 my-1 ease-in-out duration-200 delay-[0]"
                                    :class="{ '!w-full delay-300': !navigationOpen }"></span>
                                <span
                                    class="block relative top-0 left-0 bg-white rounded-sm w-0 h-0.5 my-1 ease-in-out duration-200 delay-150"
                                    :class="{ '!w-full delay-400': !navigationOpen }"></span>
                                <span
                                    class="block relative top-0 left-0 bg-white rounded-sm w-0 h-0.5 my-1 ease-in-out duration-200 delay-200"
                                    :class="{ '!w-full delay-500': !navigationOpen }"></span>
                            </span>
                            <span class="du-block absolute right-0 w-full h-full rotate-45">
                                <span
                                    class="block bg-white rounded-sm ease-in-out duration-200 delay-300 absolute left-2.5 top-0 w-0.5 h-full"
                                    :class="{ '!h-0 delay-[0]': !navigationOpen }"></span>
                                <span
                                    class="block bg-white rounded-sm ease-in-out duration-200 delay-400 absolute left-0 top-2.5 w-full h-0.5"
                                    :class="{ '!h-0 delay-200': !navigationOpen }"></span>
                            </span>
                        </span>
                    </button>
                </div>
                <!-- Navbar Menu Section -->
               {{$header}}
            </div>
        </header>