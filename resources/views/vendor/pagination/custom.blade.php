@if ($paginator->hasPages())
<nav class="md:flex md:items-center md:justify-between">

    <div>
        <p class="text-sm leading-5 mt-3 md:mt-0 pt-3 text-black ">
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

    <div class="mt-3  ">
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
                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-300 bg-white border border-gray-300 rounded-md cursor-default ">{{ $page }}</span>
            </span>
            @else
            <span class="page-item"><button wire:click="gotoPage({{$page}})" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-md  focus:z-10 focus:outline-none ">{{$page}}</button></span>
            @endif

            @endforeach
        </div>

        @endif
        @endforeach
    </div>

</nav>
@endif