<button {{ $attributes->merge(['class'=>"flex items-center justify-center text-center text-sm font-medium text-white focus:outline-none focus:ring-4 focus:ring-blue-300"]) }}>
    {{ $slot  }}
</button>
