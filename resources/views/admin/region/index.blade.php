@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6">
            <!-- GRAFIK -->
            @if ($jumlaTimbangIMT > 0)
            <div class="px-6 py-5 ">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    {{ $anaks->count() }} Anak
                </h1>
                <span class="text-xs text-slate-500 ">
                    Di {{ $region->name }} yang sudah di timbang
                </span>
            </div>
            <div class="gap-10 mb-6 lg:grid lg:grid-cols-3 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                <!-- IMT -->
                <div class="p-4 px-4 mb-6  ">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Indeks Massa Tubuh Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                    <div class="mt-5">
                        {!! $imtchart->container() !!}
                    </div>
                </div>
                <!-- ---------------------------------------------- -->
                <!-- PANJANG BADAN -->
                <div class="p-4 px-4 mb-6 ">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Panjang Badan Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                    <div class="mt-5">
                        @if ($jumlaTimbangPB > 0)
                        {!! $pbchart->container() !!}
                        @else
                        <div class="flex items-center justify-center p-4 mb-4 text-sm text-red-800 dark:text-red-400 " role="alert">
                            <div>
                                <span class="text-xl font-medium">Belum ada data timbangan
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- ---------------------------------------------- -->
                <!-- BERAT BADAN -->
                <div class="p-4 px-4 mb-6 ">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Berat Badan Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                    <div class="mt-5">
                        @if ($jumlaTimbangBB > 0)
                        {!! $bbchart->container() !!}
                        @else
                        <div class="flex items-center justify-center p-4 mb-4 text-sm text-red-800 dark:text-red-400 " role="alert">
                            <div>
                                <span class="text-xl font-medium">Belum ada data timbangan
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                <!-- ---------------------------------------------- -->
            </div>
            @else
            <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                <div class="flex items-center p-4 mb-4 text-sm text-red-800  dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <h1 class="font-medium text-3xl text-red-800dark:text-red-400">
                            Belum ada anak yang di timbang
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik tidak dapat di tampilkan
                        </span>
                    </div>
                </div>
            </div>
            @endif
            <!-- ---------------------------- -->
            <!-- TABLE -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    @if ($users->count() > 0 )
                    <div class="px-6 py-5 ">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            {{ $users->count() }} User
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Yang ada di {{ $region->name }}
                        </span>
                    </div>
                    @else
                    <div class="px-6 py-5 ">
                        <h1 class="font-medium text-base text-red-800 dark:text-red-400">
                            Belum ada user yang mendaftar
                        </h1>
                    </div>
                    @endif

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Orang Tua
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kecamatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelurahan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-3">
                                {{ $i + 1 }}
                            </td>
                            <th scope="row" class="px-6 py-3 whitespace-nowrap ">
                                <span class="block text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $user->name }}
                                </span>
                                <span class="text-xs text-slate-500 ">
                                    {{ $user->type }}
                                </span>
                            </th>
                            <td class="px-6 py-3">
                                {{ $user->kecamatan }}
                            </td>
                            <td class="px-6 py-3">
                                {{ $user->kelurahan }}
                            </td>
                            <td class="px-6 py-3">
                                {{ $user->alamat }}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- ------------------------------------------------------------ -->
        </main>
    </div>
</div>

<script src="{{ $imtchart->cdn() }}"></script>
<script src="{{ $pbchart->cdn() }}"></script>
<script src="{{ $bbchart->cdn() }}"></script>

{{ $imtchart->script() }}
{{ $pbchart->script() }}
{{ $bbchart->script() }}
@endsection
