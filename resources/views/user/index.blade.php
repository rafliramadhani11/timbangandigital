@extends('layouts.main')

@section('content')
@include('partials.navbar')

<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">

    <div class="p-4 border-gray-200 h-screen rounded-lg  mt-14">
        @if(
        is_null($user->alamat) && is_null($user->nohp) && is_null($user->tgllahir) && is_null($user->pekerjaan) && is_null($user->jeniskelamin)
        )
        <div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg shadow-sm bg-red-50 " role="alert">
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
                <a href="{{ route('user.edit', $user->username) }}" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center ">
                    Isi Biodata sekarang
                </a>

            </div>
        </div>
        @else
        @if ($anaks->count() > 0 )
        <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md ">
            <h1 class="text-xl font-medium text-gray-700 ">
                Grafik perkembangan gizi anak
            </h1>
            <span class="text-sm text-slate-500 ">
                Berdasarkan dari {{ $anaks->count() }} anak yang ada
            </span>
        </div>
        <div class="gap-10 lg:grid lg:grid-cols-3">
            <!-- IMT -->
            <div class="p-4  mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="mb-3">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                            Indeks Massa Tubuh Anak
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik perkembangan gizi anak
                        </span>
                    </div>
                </div>
                <div>
                    <div id="imtChart" class="mt-5"></div>
                </div>
            </div>
            <!-- ------------------- -->
            <!-- Panjang Badan -->
            <div class="p-4  mb-6 bg-white rounded-lg shadow-md ">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="mb-3">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                            Panjang Badan Anak
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik perkembangan gizi anak
                        </span>
                    </div>
                </div>
                <div>
                    <div id="pbChart" class="mt-5"></div>
                </div>
            </div>
            <!-- ------------------- -->
            <!-- Berat Badan -->
            <div class="p-4  mb-6 bg-white rounded-lg shadow-md ">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="mb-3">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                            Berat Badan Anak
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik perkembangan gizi anak
                        </span>
                    </div>
                </div>
                <div>
                    <div id="bbChart" class="mt-5"></div>
                </div>
            </div>
            <!-- ------------------- -->
        </div>
        @else
        <div class="flex bg-white rounded-lg shadow-md items-center justify-center px-4 mb-6 md:p-4 ">
            <div class="flex items-center p-4 text-sm text-red-800 " role="alert">
                <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <h1 class="text-sm md:text-lg lg:text-2xl font-medium text-red-800">
                        Belum ada anak yang di timbang
                    </h1>
                    <span class="text-xs md:text-md lg:text-lg font-semibold text-gray-500 ">
                        Grafik tidak dapat di tampilkan
                    </span>
                </div>
            </div>
        </div>
        @endif
        <!-- DATA ANAK -->
        <div class="relative p-4 overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm  divide-y-2 divide-gray-200 ">
                <thead class="text-left">
                    <tr>
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            No
                        </th>
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            Nama Lengkap Bayi
                        </th>
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            Jenis Kelamin
                        </th>
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            Umur
                        </th>
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            Panjang Badan
                        </th>
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            Berat Badan
                        </th>
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                            Indeks Massa Tubuh (IMT)
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 ">
                    @if ($anaks->count())
                    @foreach ($anaks as $anak)
                    <tr>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            {{ $anak->name }}
                        </td>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            {{ $anak->jeniskelamin }}
                        </td>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            {{ optional($anak->timbangans->first())->umur }} Bulan
                        </td>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            {{ optional($anak->timbangans->first())->pb ?? '-' }} cm
                        </td>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            {{ optional($anak->timbangans->first())->bb ?? '-' }} kg
                        </td>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            {{ optional($anak->timbangans->first())->imt }}
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="flex items-center w-full p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
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

    </div>

</div>
<script>
    // IMT
    const imtChart = <?php echo json_encode($imtChart); ?>;
    var options = {
        chart: {
            type: 'pie',
            height: 300
        },
        colors: ['#DA0037', '#03C988', '#FFD523'],
        legend: {
            show: true,
            position: 'top'
        },
        dataLabels: {
            enabled: false,
        },

        series: Object.values(imtChart),
        labels: Object.keys(imtChart),
    }
    var chart = new ApexCharts(document.querySelector("#imtChart"), options);
    chart.render();

    // PB
    const pbChart = <?php echo json_encode($pbChart); ?>;
    var options = {
        chart: {
            type: 'pie',
            height: 300
        },
        colors: ['#DA0037', '#03C988', '#FFD523'],
        legend: {
            show: true,
            position: 'top'
        },
        dataLabels: {
            enabled: false,
        },

        series: Object.values(imtChart),
        labels: Object.keys(imtChart),
    }
    var chart = new ApexCharts(document.querySelector("#pbChart"), options);
    chart.render();

    // BB
    const bbChart = <?php echo json_encode($bbChart); ?>;
    var options = {
        chart: {
            type: 'pie',
            height: 300
        },
        colors: ['#DA0037', '#03C988', '#FFD523'],
        legend: {
            show: true,
            position: 'top'
        },
        dataLabels: {
            enabled: false,
        },

        series: Object.values(bbChart),
        labels: Object.keys(bbChart),
    }
    var chart = new ApexCharts(document.querySelector("#bbChart"), options);
    chart.render();
</script>

@endsection