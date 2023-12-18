@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">

        <main class="px-4 py-6">
            <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
                <!-- Main widget -->
                <h3>ini halaman dashboard admin</h3>
        </main>
    </div>
</div>
@endsection
