@props(['active'])

@php
$classes = ($active ?? false)
? ' block px-4 py-2 my-1 text-gray-900 rounded-md bg-gray-100 font-semibold dark:bg-gray-700 dark:text-gray-200 transition duration-200 '
: 'block px-4 py-2 my-1 text-black rounded-md font-normal hover:bg-gray-100 transition duration-200 dark:hover:bg-gray-600 dark:hover:text-white dark:text-white' ;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>