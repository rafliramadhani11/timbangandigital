@extends('layouts.main')

@section('content')
@include('partials.navbar')
<div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6">
            <!-- BAR CHART -->
            @if (count($regionsUser) > 0)
            <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                {!! $userschart->container() !!}
            </div>
            @else
            <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <h1 class="text-3xl font-medium text-red-800dark:text-red-400">
                            Belum ada user yang mendaftar
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik tidak dapat di tampilkan
                        </span>
                    </div>
                </div>
            </div>
            @endif
            <!-- ------------------------------------------ -->
            <!-- PIE CHART -->
            <div class="gap-10 lg:grid lg:grid-cols-3">
                <!-- IMT -->
                @if ($totalAnak > 0)
                <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                                Indeks Massa Tubuh Anak
                            </h1>
                            <span class="text-xs text-slate-500 ">
                                Grafik perkembangan gizi anak
                            </span>
                        </div>
                        <a class="focus:outline-none text-white bg-[#00A688]  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600  dark:focus:ring-green-800">NORMAL</a>
                    </div>
                    <div>
                        {!! $imtchart->container() !!}
                    </div>
                </div>
                @else
                <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <h1 class="text-xl font-medium text-red-800dark:text-red-400">
                                Belum ada anak yang di timbang
                            </h1>
                            <span class="text-xs text-slate-500 ">
                                Grafik Indeks Massa Tubuh tidak dapat di tampilkan
                            </span>
                        </div>
                    </div>
                </div>
                @endif
                <!-- ------------------------------------------------- -->
                <!-- PANJANG BADAN -->
                @if ($totalAnak > 0)
                <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                                Panjang Badan Anak
                            </h1>
                            <span class="text-xs text-slate-500 ">
                                Grafik perkembangan gizi anak
                            </span>
                        </div>
                        <a class="focus:outline-none text-white bg-[#00A688]  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600  dark:focus:ring-green-800">NORMAL</a>
                    </div>
                    <div>
                        {!! $pbchart->container() !!}
                    </div>
                </div>
                @else
                <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <h1 class="text-xl font-medium text-red-800dark:text-red-400">
                                Belum ada anak yang di timbang
                            </h1>
                            <span class="text-xs text-slate-500 ">
                                Grafik Panjang Badan tidak dapat di tampilkan
                            </span>
                        </div>
                    </div>
                </div>
                @endif
                <!-- ------------------------------------------------ -->
                <!-- BERAT BADAN -->
                @if ($totalAnak > 0)
                <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                                Berat Badan Anak
                            </h1>
                            <span class="text-xs text-slate-500 ">
                                Grafik perkembangan gizi anak
                            </span>
                        </div>
                        <a class="focus:outline-none text-white bg-[#00A688]  focus:ring-4 focus:ring-green-300 font-medium rounded text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 shadow-xl dark:focus:ring-green-800">NORMAL</a>
                    </div>
                    <div>
                        {!! $bbchart->container() !!}
                    </div>
                </div>
                @else
                <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <h1 class="text-xl font-medium text-red-800dark:text-red-400">
                                Belum ada anak yang di timbang
                            </h1>
                            <span class="text-xs text-slate-500 ">
                                Grafik Berat Badan tidak dapat di tampilkan
                            </span>
                        </div>
                    </div>
                </div>
                @endif
                <!-- ------------------------------------------------- -->
            </div>
        </main>
    </div>
</div>

<script src=" {{ $userschart->cdn() }}"></script>

<script src=" {{ $imtchart->cdn() }}"></script>
<script src=" {{ $imtchart->cdn() }}"></script>
<script src=" {{ $bbchart->cdn() }}"></script>

{{ $userschart->script() }}

{{ $imtchart->script() }}
{{ $pbchart->script() }}
{{ $bbchart->script() }}
@endsection