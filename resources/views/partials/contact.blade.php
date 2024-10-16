<section id="Contact" class="overflow-hidden scroll-mt-17 lg:py-22.5 xl:py-27.5 min-h-screen">
    <div class="max-w-[1104px] mx-auto px-4 sm:px-8 xl:px-0">
        <div class="relative z-999 overflow-hidden bg-dark px-4 sm:px-20 lg:px-27.5">
            <div class="wow fadeInUp mb-16 text-center relative z-999">
                <span
                    class="hero-subtitle-gradient relative mb-4 font-medium text-sm inline-flex items-center gap-2 py-2 px-4.5 rounded-full">
                    <img src="{{ asset('user/images/icon-title.svg') }}" alt="icon">
                    <span class="hero-subtitle-text"> Need Any Help? </span>
                </span>
                <h2 class="text-white mb-4.5 text-2xl font-extrabold sm:text-4xl xl:text-heading-2">
                    Contact Us
                    {{-- {{$Contact_section_header->title}} --}}
                </h2>
                <p class="max-w-[714px] mx-auto font-medium">
                    {{$Contact_section_header->description}}
                </p>
            </div>

            <div class="form-box-gradient relative overflow-hidden rounded-[25px] bg-dark p-6 sm:p-8 xl:p-15">
                <form class="relative z-10">
                    <div class="-mx-4 xl:-mx-10 flex flex-wrap">
                        <div class="w-full px-4 xl:px-5 md:w-1/2">
                            <div class="mb-9.5">
                                <label for="name" class="text-white mb-2.5 block font-medium">
                                    Name
                                </label>
                                <input id="name" type="text" name="name" placeholder="Enter your Name"
                                    class="rounded-lg border-white/[0.12] bg-white/[0.05] focus:border-purple focus:outline-none focus:border-gray-600 focus:ring-gray-600 w-full py-3 px-6" />
                            </div>
                        </div>
                        <div class="w-full px-4 xl:px-5 md:w-1/2">
                            <div class="mb-9.5">
                                <label for="email" class="text-white mb-2.5 block font-medium">
                                    Email
                                </label>
                                <input id="email" type="email" name="email" placeholder="Enter your Email"
                                    class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 focus:outline-none focus:border-gray-600 focus:ring-gray-600" />
                            </div>
                        </div>
                        <div class="w-full px-4 xl:px-5">
                            <div class="mb-10">
                                <label for="message" class="text-white mb-2.5 block font-medium">
                                    Message
                                </label>
                                <textarea id="message" name="message" placeholder="Type your message" rows="6"
                                    class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-5 px-6 focus:outline-none focus:border-gray-600 focus:ring-gray-600"></textarea>
                            </div>
                        </div>
                        <div class="w-full px-4 xl:px-5">
                            <div class="text-center">
                                <a href="index.html#"
                                    class="button-border-gradient relative rounded-lg text-white text-sm inline-flex items-center py-3.5 px-7 shadow-button hover:button-gradient-hover hover:shadow-none">
                                    Send Message
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>