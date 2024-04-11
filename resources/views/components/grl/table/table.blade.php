
<div {{ $attributes->except('class') }} class="relative overflow-x-auto shadow-md sm:rounded-lg">
{{--       table component holder--}}
    <div>
        <table class="md:w-full text-sm text-left text-gray-500 dark:text-gray-700">
            <thead class="text-xs text-gray-100 uppercase bg-gray-800 dark:bg-gray-100 dark:text-gray-950">
            <tr>
               {{ $head }}
            </tr>
            </thead>
            <tbody>
            {{ $body }}
            </tbody>
        </table>
    </div>

</div>
