@props([
'close',
])

<div id="alert" {{ $attributes->merge([
    'class' => 'flex items-center py-3 px-4 mb-4 rounded-md',
    'role' => 'alert'
    ]) }}>

    <small class="font-semibold">
        {{ $slot }}
    </small>

    <button {{ $close->attributes->merge([
        'class' => 'ms-auto -mx-1.5 -my-1.5   rounded-lg focus:ring-2  p-1 inline-flex items-center justify-center h-7 w-7  font-bold',
        'data-dismiss-target' => '#alert',
        'aria-label' => 'close'
        ]) }}>

        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>

    </button>

</div>
