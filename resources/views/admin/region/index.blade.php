@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">

        <main class="px-4 py-6">
            <!-- GRAFIK -->
            <div class="lg:grid lg:grid-cols-3 gap-10 ">
                <!-- IMT -->
                <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8 ">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Indeks Massa Tubuh Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                    <div class="mt-5">
                        @if (!$timbangans->count())
                        <h1>Belum ada data timbangan</h1>
                        @endif
                        {!! $imtchart->container() !!}
                    </div>
                </div>
                <!-- ---------------------------------------------- -->
                <!-- PANJANG BADAN -->
                <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Panjang Badan Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                    <div class="mt-5">
                        @if (!$timbangans->count())
                        <h1>Belum ada data timbangan</h1>
                        @endif
                        {!! $pbchart->container() !!}

                    </div>
                </div>
                <!-- ---------------------------------------------- -->
                <!-- BERAT BADAN -->
                <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        Berat Badan Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                    <div class="mt-5">
                        @if (!$timbangans->count())
                        <h1>Belum ada data timbangan</h1>
                        @endif
                        {!! $bbchart->container() !!}
                    </div>
                </div>
                <!-- ---------------------------------------------- -->
            </div>

            <!-- ---------------------------- -->



            <!-- TABLE -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <div class="px-6 py-8">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            {{ $anaks->count() }} Anak
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Berdasarkan data terakhir yang ada
                        </span>
                    </div>
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
                            <th scope="row" class="px-6 py-3  whitespace-nowrap ">
                                <span class="block text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $user->name }}
                                </span>
                                <span class="text-xs text-slate-500 ">
                                    {{ $user->type }} {{ $user->anaks->count() }}
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
