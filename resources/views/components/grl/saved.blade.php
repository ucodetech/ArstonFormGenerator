<div>
   <span
       x-data="{ open: false, message = ''}"
       x-on:saved.window="open=true; message=$event.detail; setTimeout(() => {open=false}, 5000)"
       x-show="open"
       x-transition.out.duration.1000ms="open"
       class="text-blue-400">
        <span x-text="message"></span>
    </span>

</div>
