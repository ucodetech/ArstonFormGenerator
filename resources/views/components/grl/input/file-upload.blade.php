@props(['buttonText', 'for'=>false, 'pxy' => false, 'width'=>false,'full'=>false])
{{-- full props allows us to display flex row --}}
<div class="mt-2 flex {{ $full? 'flex-row':'flex-col' }}  items-center gap-x-3 {{ $width }}">
    {{ $slot }}
    <div x-data="{ focused : false}"
        {{-- x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress" --}}
        >
        <input @focus="focused = true" @blur="focused = false" type="file" {{ $attributes }}>
        <label for="{{ $for }}" :class="{ 'bg-gray-500': focused }" class="cursor-pointer  {{ $pxy }} text-sm font-semibold  shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-cyan-950">{{ $buttonText }}</label>
    </div>
    {{-- <div x-show="uploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div> --}}
</div>
