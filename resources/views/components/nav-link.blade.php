@props(['active'])

@php
$classes = ($active ?? false)
? 'block px-4 py-2 mx-3 my-1 rounded-md bg-gray-100 dark:bg-gray-600 dark:text-white'
: 'block px-4 py-2 mx-3 my-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white'
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>