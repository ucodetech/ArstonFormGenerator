<div class="m-2 bg-gray-500 md:px-4 md:py-3.5 md:rounded-lg rounded-md p-1 shadow-lg shadow-cyan-500 ">
    <div class="md:flex md:items-center md:justify-between pb-0 mt-2 ">
        {{-- advance search button trigger--}}
        <div class="space-y-2 md:flex md:space-x-2 md:space-y-0 md:w-2/4">
            <!-- filter dropdown -->
            <x-grl.table.table-search wire:model.live.debounce.500ms="filters.search" type="search" placeholder="Search faq..." class="w-full md:2/4"/>
            <x-grl.button.button-icon-primary wire:click="toggleShowFilters" class="w-full md:w-2/4  flex justify-center items-center"> @if($showFilters) Hide @endif Advanced Search...</x-grl.button.button-icon-primary>
        </div>
        {{--    per page button trigger--}}
        <div class="space-y-2 w-full ml-0 mt-2 md:ml-3 md:mt-0 md:w-1/4">
            <x-grl.input.group-black for="perPage" >

                <x-grl.input.select wire:model.live="perPage" id="perPage" class="md:w-40 w-full">
                    @foreach($pageNums as $key => $value)
                        <option value="{{ $key }}" {{ $key === session('perPage') ? ' selected' : '' }}>Per page
                            {{ $value }}</option>
                    @endforeach
                </x-grl.input.select>
            </x-grl.input.group-black>
        </div>
        {{--    bulk action button trigger--}}
        <div class="mb-3 md:mb-0 md:flex md:space-x-2 justify-end md:space-y-0 md:w-1/4">
            <x-grl.dropdown.dropdown>
                <x-slot:trigger>
                    <x-grl.button.secondary class="w-full py-2.5 px-5 mr-2 mt-2">Bulk Action</x-grl.button.secondary>
                </x-slot:trigger>
                @if($selected != [])
                <x-grl.dropdown.dropdown-item  wire:click="$toggle('showDeleteModal')" type="button" class="cursor-pointer">
                    <x-svg.icon-trash class="w-5 h-5 mr-1" fill="currentColor" />
                    Delete
                </x-grl.dropdown.dropdown-item>
                <x-grl.dropdown.dropdown-item wire:click="exportSelected" type="button" class="cursor-pointer">
                    <x-grl.button.icon-download class="w-5 h-5 mr-1" fill="currentColor"/>
                    Export
                </x-grl.dropdown.dropdown-item>
                 @else
                <span class="text-center p-2">Select request before applying bulk action</span>
                @endif
            </x-grl.dropdown.dropdown>
            {{--new transactions button trigger--}}
           <div>
               <x-grl.button.button-icon-primary wire:click="addpayments" type="button" class="mt-2 w-full md:mt-2.5 md:flex justify-center items-center md:px-6 md:py-2.5">
                   <x-svg.plus class="w-3.5 h-3.5 mr-1"/> New
               </x-grl.button.button-icon-primary>
           </div>
        </div>
    </div>
</div>
{{--advance search--}}
<div class="m-2">
    @if($showFilters)
        <x-grl.grid-box.grid class="grid grid-cols-2">
            <x-grl.grid-box.grid-child class="h-auto">
                    <div class="w-full px-2 py-2  pr-2 md:space-y-4 md:py-5 md:px-3">
                        <x-grl.input.group-black for="filter-date-start" label="Filter Date Start">
                            <x-grl.input.input-date-dark wire:model.blur="filters.filter-date-start" id="filter-date-start" placeholder="MM/DD/YYYY">
                                <x-svg.calendar fill="currentColor"/>
                            </x-grl.input.input-date-dark>
                        </x-grl.input.group-black>
                </div>
            </x-grl.grid-box.grid-child>
            <x-grl.grid-box.grid-child class="h-auto">
                <div class="w-full px-2 py-2 pr-2 md:relative">
                        <x-grl.input.group-black for="filter-date-end" label="Filter Date End">
                            <x-grl.input.input-date-dark wire:model.blur="filters.filter-date-end" id="filter-date-end" placeholder="MM/DD/YYYY">
                                <x-svg.calendar fill="currentColor"/>
                            </x-grl.input.input-date-dark>
                        </x-grl.input.group-black>
                    
                </div>
            </x-grl.grid-box.grid-child>
        </x-grl.grid-box.grid>
    @endif
</div>
