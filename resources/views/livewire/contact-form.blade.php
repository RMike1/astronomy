<div class="form-box-gradient relative overflow-hidden rounded-[25px] bg-dark p-6 sm:p-8 xl:p-15">
    @if (session()->has('success'))
        <div x-data="{ showToast: true }" x-init="setTimeout(() => showToast = false, 10000)" class="flex flex-col items-center">
            <div x-show="showToast" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-900 dark:border-neutral-700"
                role="alert" tabindex="-1" aria-labelledby="hs-toast-success-example-label">
                <div class="flex p-4">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-8 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                            </path>
                        </svg>
                    </div>
                    <div class="ms-3">
                        <p id="hs-toast-success-example-label" class="text-sm text-gray-700 dark:text-neutral-400">
                            {{ Session('success') }}
                        </p>
                    </div>
                </div>
            </div>
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
                    <textarea wire:model.live.debounce.350ms='message' placeholder="your message.." rows="6"
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
</div>
