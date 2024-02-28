@if ($paginator->hasPages())
<nav class="flex items-center justify-between">

    <div>
        <p class="text-sm leading-5 text-gray-400 dark:text-gray-500">
            Menampilkan
            @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            @else
            {{ $paginator->count() }}
            @endif
            dari
            <span class="font-medium">{{ $paginator->total() }}</span>
            user
        </p>
    </div>

    <div>
        {{-- Pagination Element Here --}}
        @foreach ($elements as $element)
        {{-- Make dots here --}}
        @if (is_string($element))
        <span class="page-item disabled"><a class="page-link"><span>{{ $element }}</span></a></span>
        @endif
        {{-- Links array Here --}}
        @if (is_array($element))

        <div>
            @foreach ($element as $page=>$url)

            @if ($page == $paginator->currentPage())
            <span aria-current="page">
                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-300 bg-white border border-gray-300 rounded-md cursor-default dark:text-gray-500 dark:border-gray-700 dark:bg-gray-800">{{ $page }}</span>
            </span>
            @else
            <span class="page-item"><button wire:click="gotoPage({{$page}})" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-md dark:text-gray-300 focus:z-10 focus:outline-none dark:border-gray-700 dark:bg-gray-800">{{$page}}</button></span>
            @endif

            @endforeach
        </div>

        @endif
        @endforeach
    </div>



</nav>
@endif
