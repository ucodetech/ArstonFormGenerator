@props(['initValue' => '', 'textareaName', 'setName'])
<div class="mt-2"
     wire:ignore
    >
    <textarea

        x-data
        x-init="$('{{ $textareaName }}').summernote({
            height: 200,
            placeholder: 'Whats on your mind',
                 callbacks: {
                    onChange: function (contents, $editable) {
                        @this.set('{{$setName}}', contents);
                    }
                }
            });
        "
        input="{{$textareaName}}"
        {{ $attributes }}
        class="summer block w-full bg-gray-800 text-gray-100 rounded-md  py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-200 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 border-0">{{ $initValue }}</textarea>

</div>

@push("styles")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .note-editable{
            background-color: #d4d1d1c4;
        }
    </style>
@endpush

@push("scripts")
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush
