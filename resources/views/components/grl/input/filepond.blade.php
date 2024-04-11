<div
    wire:ignore
    x-data
    x-init="
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginImageCrop);
            FilePond.registerPlugin(FilePondPluginImageTransform);
            FilePond.registerPlugin(FilePondPluginImageExifOrientation);
            FilePond.setOptions({
            allowMultiple : {{ isset($attributes['multiple']) ? 'true':'false' }},
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options)=>
                    {
                       @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                    },
                    revert: (filename, load) => {
                            @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                    },
                },
            });

            @this.on('clearFilePond', () => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                });

             FilePond.create($refs.input);


    "

>
    <input type="file" x-ref="input"  data-max-file-size="3MB"
>
</div>

@push('styles')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />

@endpush

@push('scripts')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

@endpush
