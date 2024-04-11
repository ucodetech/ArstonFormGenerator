@props(['id' => null, 'maxWidth' => null])

<x-grl.modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
     <div class="flex px-6 py-2 w-full text-lg font-medium text-gray-900 dark:text-gray-100 
     border-b border-b-gray-500">
            {{ $title }}
        </div>
    <div class="px-2.5 py-2">
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row gap-4 justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right border-t border-t-gray-700">
        {{ $footer }}
    </div>
</x-grl.modal>
