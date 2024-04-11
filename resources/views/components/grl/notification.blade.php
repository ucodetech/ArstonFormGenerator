<div>
{{--  success--}}
    <div id="toast-success"
         x-data="{ show: false, message:'' }"
         x-on:notify.window="show = true; message=$event.detail; setTimeout(() => {show = false},5000)"
         x-on:mouse.hover.window="show = true"
         x-show="show"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none"
         class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-green-500 bg-green-200 rounded-lg shadow top-20 right-5 dark:text-green-700 dark:bg-green-200 bg-opacity-75" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-700 rounded-lg dark:bg-green-800 dark:text-green-200">
            <x-svg.icon-check/>
            <span class="sr-only">Success icon</span>
        </div>
        <div x-text="message" class="ml-3 text-sm font-normal"></div>
        <button @click="show = false" type="button" class="ml-auto -mx-1.5 -my-1.5 text-red-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-green-100 inline-flex items-center justify-center h-8 w-8 dark:text-green-300 dark:hover:text-green dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    {{--    error--}}
    <div id="toast-error"
         x-data="{ show: false, message:'' }"
         x-on:notify-error.window="show = true; message=$event.detail; setTimeout(() => {show = false},5000)"
         x-on:mouse.hover.window="show = true"
         x-show="show"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none"
         class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-red-800  bg-red-200 rounded-lg shadow top-20 right-5 dark:text-red-800 dark:bg-red-300 bg-opacity-75" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-800 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-300">
            <x-svg.icon-error/>
            <span class="sr-only">Error icon</span>
        </div>
        <div x-text="message" class="ml-3 text-sm font-normal"></div>
        <button @click="show = false" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-red-400 hover:text-red-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-red-300 dark:hover:text-white dark:bg-red-800 dark:hover:bg-red-700" data-dismiss-target="#toast-error" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    {{--    warning --}}
    <div id="toast-warning"
         x-data="{ show: false, message:'' }"
         x-on:notify-warning.window="show = true; message=$event.detail; setTimeout(() => {show = false},5000)"
         x-on:mouse.hover.window="show = true"
         x-show="show"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none"
         class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-yellow-600 rounded-lg shadow top-20 right-5 dark:text-yellow-800 dark:bg-yellow-300 bg-yellow-200 bg-opacity-75" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-yellow-800 bg-yellow-100 rounded-lg dark:bg-yellow-800 dark:text-yellow-300">
            <x-svg.icon-warning/>
            <span class="sr-only">Warning icon</span>
        </div>
        <div x-text="message" class="ml-3 text-sm font-normal"></div>
        <button @click="show = false" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-yellow-400 hover:text-yellow-900 rounded-lg focus:ring-2 focus:ring-yellow-300 p-1.5 hover:bg-yellow-100 inline-flex items-center justify-center h-8 w-8 dark:text-yellow-300 dark:hover:text-white dark:bg-yellow-800 dark:hover:bg-yellow-700" data-dismiss-target="#toast-warning" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    {{--    info --}}
    <div id="toast-info"
         x-data="{ show: false, message:'' }"
         x-on:notify-info.window="show = true; message=$event.detail; setTimeout(() => {show = false},5000)"
         x-on:mouse.hover.window="show = true"
         x-show="show"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none"
         class="fixed flex items-center w-full max-w-xs p-4 mb-4 text-blue-600 rounded-lg shadow top-20 right-5 dark:text-blue-800 dark:bg-blue-300 bg-blue-200 bg-opacity-75" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-800 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-300">
            <x-svg.icon-warning/>
            <span class="sr-only">Info icon</span>
        </div>
        <div x-text="message" class="ml-3 text-sm font-normal"></div>
        <button @click="show = false" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-blue-400 hover:text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-300 p-1.5 hover:bg-blue-100 inline-flex items-center justify-center h-8 w-8 dark:text-blue-300 dark:hover:text-white dark:bg-blue-800 dark:hover:bg-blue-700" data-dismiss-target="#toast-info" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</div>
