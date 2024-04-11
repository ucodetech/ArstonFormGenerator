<div>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <x-svg.arston class="w-32 h-32" />
        </div>
        <div class="text-center">
            <h2 class="text-gray-800 dark:text-gray-200 text-lg font-bold transform-cpu uppercase">Arston Forms Generator</h2>

        </div>
        <div class="mt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                <div  class="scale-100 p-6 bg-white dark:bg-red-900/50 dark:bg-gradient-to-bl from-blue-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <div class="h-16 w-16 bg-red-50 dark:bg-blue-800/20 flex items-center justify-center rounded-full">
                            <x-svg.arston class="w-12 h-12 stroke-blue-600 stroke-2" />
                        </div>

                       
                       @auth
                       <div class="inline-flex space-x-0 mt-10">
                        <div>
                            <a href="{{ route('dashboard') }}" class="bg-sky-900 border border-pink-500 w-40 h-40 px-3 py-2 rounded-s-full" wire:navigate>
                                Dashboard
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('logout') }}" class="bg-yellow-800 border border-orange-500 w-40 h-40 px-3 py-2 rounded-e-full" wire:navigate>
                                Logout account
                            </a>
                        </div>
                       </div>
                       @else
                       <div class="inline-flex space-x-0 mt-10">
                        <div>
                            <a href="{{ route('login') }}" class="bg-sky-800 border border-pink-500 w-40 h-40 px-3 py-2 rounded-s-full" wire:navigate>
                                Login account
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('register') }}" class="bg-red-800 border border-orange-500 w-40 h-40 px-3 py-2 rounded-e-full" wire:navigate>
                                Create account
                            </a>
                        </div>
                       </div>
                       @endauth
                       
                    </div>

                    
                </div>
                @auth
                <a href="{{ route('arston.form', 1) }}" class="scale-100 p-6 bg-white dark:bg-red-900/50 dark:bg-gradient-to-bl from-blue-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" wire:navigate>
                    <div>
                        <div class="h-16 w-16 bg-red-50 dark:bg-blue-800/20 flex items-center justify-center rounded-full">
                            <x-svg.arston class="w-12 h-12 stroke-blue-600 stroke-2" />
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Arston Estate Form (Design 1)</h2>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Generate forms from Arston Estate directly
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>

                <a href="{{ route('arston.form.2') }}" class="scale-100 p-6 bg-white dark:bg-sky-800/50 dark:bg-gradient-to-bl from-blue-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-red-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" wire:navigate>
                    <div>
                        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/50 flex items-center justify-center rounded-full">
                            <x-svg.arston class="w-12 h-12 stroke-sky-600 stroke-2" />
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Arston Estate Form (Design 2)</h2>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Generate form from Arston Estate with Annex design
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>
                <a href="{{ route('arston.form.buy.sell') }}" class="scale-100 p-6 bg-white dark:bg-sky-800/50 dark:bg-gradient-to-bl from-green-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-cyan-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" wire:navigate>
                    <div>
                        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/50 flex items-center justify-center rounded-full">
                            <x-svg.arston class="w-12 h-12 stroke-sky-600 stroke-2" />
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Arston Estate Form (Buy back schema)</h2>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Generate form from Arston Estate with buy back schema design
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>
               @endauth
            </div>
        </div>

       
    </div>
</div>
