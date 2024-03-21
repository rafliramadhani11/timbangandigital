@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full px-3 pt-2 mt-1 text-sm text-black bg-white border border-gray-400 rounded-md shadow-sm focus:ring-1 focus:ring-red-500 focus:border-red-500']) !!}>