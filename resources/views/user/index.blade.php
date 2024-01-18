@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6">
            <!-- Main widget -->
            @if(
            is_null($user->alamat) && is_null($user->nohp) && is_null($user->tgllahir) && is_null($user->pekerjaan) && is_null($user->jeniskelamin)
            )
            <div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg shadow-sm bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
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
            @if ($anaks->count() > 0 )
            <h1 class="text-2xl font-medium text-gray-700 dark:text-gray-300">
                Grafik perkembangan gizi anak
            </h1>
            <span class="text-sm text-slate-500 ">
                Berdasarkan dari {{ $anaks->count() }} anak yang ada
            </span>
            <div class="gap-10 mb-6 bg-white rounded shadow-md lg:grid lg:grid-cols-3 dark:bg-gray-800 md:p-8">
                <!-- PB -->
                <div class="p-4 px-4 mb-6 ">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Indeks Massa Tubuh
                    </h1>
                    <div class="mt-5">
                        {!! $imtchart->container() !!}
                    </div>
                </div>
                <!-- ------------------- -->
                <!-- Panjang Badan -->
                <div class="p-4 px-4 mb-6 ">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Panjang Badan
                    </h1>
                    <div class="mt-5">
                        {!! $pbchart->container() !!}
                    </div>
                </div>
                <!-- ------------------- -->
                <!-- Berat Badan -->
                <div class="p-4 px-4 mb-6 ">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Berat Badan
                    </h1>
                    <div class="mt-5">
                        {!! $bbchart->container() !!}
                    </div>
                </div>
                <!-- ------------------- -->
            </div>
            @else
            <div class="flex items-center justify-center p-4 px-4 mb-6 md:p-8">
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <h1 class="text-3xl font-medium text-red-800dark:text-red-400">
                            Belum ada anak yang di timbang
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik tidak dapat di tampilkan
                        </span>
                    </div>
                </div>
            </div>
            @endif
            <!-- DATA ANAK -->
            <div class="relative p-4 overflow-x-auto shadow-md sm:rounded-lg dark:bg-gray-800">
                <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                    <thead class="text-left">
                        <tr>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nama Lengkap Bayi
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Jenis Kelamin
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Umur
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Panjang Badan
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Berat Badan
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Indeks Massa Tubuh (IMT)
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @if ($anaks->count())
                        @foreach ($anaks as $anak)
                        <tr>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $anak->name }}
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $anak->jeniskelamin }}
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ optional($anak->timbangans->first())->umur }} Bulan
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ optional($anak->timbangans->first())->pb ?? '-' }} cm
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ optional($anak->timbangans->first())->bb ?? '-' }} kg
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ optional($anak->timbangans->first())->imt }}
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="flex items-center w-1/2 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Data anak belum ada !
                </div>
            </div>
            @endif
            <!-- ------------------------ -->
            @endif
        </main>
    </div>
</div>
<script src="{{ $imtchart->cdn() }}"></script>
<script src="{{ $pbchart->cdn() }}"></script>
<script src="{{ $bbchart->cdn() }}"></script>

{{ $bbchart->script() }}
{{ $pbchart->script() }}
{{ $imtchart->script() }}
@endsection
