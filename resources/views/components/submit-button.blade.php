@props(['name'])
<button {{ $attributes->merge(['class' => 'w-full p-2 text-white transition-colors duration-300 bg-orange-500 rounded-md hover:bg-orange-800 focus:outline-none focus:bg-orange-500 focus:ring-2 focus:ring-offset-2 focus:ring-orange-300']) }}>
    {{ $name ?? $slot }}
</button>
