@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex pt-16 overflow-hidden min-h-screen bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6">
            <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
                <!-- Main widget -->
                @if(
                is_null($user->alamat) && is_null($user->nohp) && is_null($user->tgllahir) && is_null($user->pekerjaan) && is_null($user->jeniskelamin)
                )
                <div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 shadow-sm" role="alert">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Peringatan</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Silahkan mengisi biodata lalu timbang anak anda untuk melihat grafik perkembangan gizi anak anda
                    </div>
                    <div class="flex">
                        <a href="{{ route('user.edit', $user->username) }}" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Isi Biodata sekarang
                        </a>

                    </div>
                </div>
                @else
                <h1 class="dark:text-white">Biodata sudah di isi</h1>
                @endif


        </main>
    </div>
</div>
@endsection
