<div class="form-box-gradient relative overflow-hidden rounded-[25px] bg-dark p-6 sm:p-8 xl:p-15">
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-2 mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form class="relative z-10" wire:submit.prevent="ContactUs">
        <div class="-mx-4 xl:-mx-10 flex flex-wrap">
            <div class="w-full px-4 xl:px-5 md:w-1/2">
                <div class="mb-9.5">
                    <label for="name" class="text-white mb-2.5 block font-medium">
                        Name
                    </label>
                    <input type="text" wire:model.live.debounce.350ms='name' placeholder="Enter your Name"
                        class="rounded-lg border-white/[0.12] bg-white/[0.05] focus:border-purple focus:outline-none focus:border-gray-600 focus:ring-gray-600 w-full py-3 px-6" />

                    <div>
                        @error('name')
                            <span class="error text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full px-4 xl:px-5 md:w-1/2">
                <div class="mb-9.5">
                    <label for="email" class="text-white mb-2.5 block font-medium">
                        Email
                    </label>
                    <input type="email" wire:model.live.debounce.350ms='email' placeholder="Enter your Email"
                        class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-3 px-6 focus:outline-none focus:border-gray-600 focus:ring-gray-600" />
                    <div>
                        @error('email')
                            <span class="error text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full px-4 xl:px-5">
                <div class="mb-10">
                    <label for="message" class="text-white mb-2.5 block font-medium">
                        Message
                    </label>
                    <textarea wire:model.live.debounce.350ms='message' placeholder="Type your message" rows="6"
                        class="rounded-lg border border-white/[0.12] bg-white/[0.05] focus:border-purple w-full py-5 px-6 focus:outline-none focus:border-gray-600 focus:ring-gray-600"></textarea>
                    <div>
                        @error('message')
                            <span class="error text-red-600 ">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full px-4 xl:px-5">
                <div class="text-center">
                    <button type="submit"
                        class="button-border-gradient relative rounded-lg text-white text-sm inline-flex items-center py-3.5 px-7 shadow-button hover:button-gradient-hover hover:shadow-none">
                        <span wire:loading.remove wire:target='ContactUs'>Send Message</span>
                        <span wire:loading wire:target="ContactUs">Sending...</span>
                    </button>

                </div>
            </div>
        </div>
    </form>
</div>
