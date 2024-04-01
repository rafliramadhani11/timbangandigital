@props(['name'])
<button {{ $attributes->merge(['class' => 'text-white w-full bg-orange-500 hover:bg-orange-600 focus:outline-none shadow-md focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition duration-200']) }}>
    {{ $name ?? $slot }}
</button>