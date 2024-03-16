@extends('layouts.main')

@section('content')
@include('partials.navbar')
<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen ">

    <div class="p-4 border-gray-200 rounded-lg  mt-14">
        <div class="px-6 py-5 mb-6 bg-white w-full rounded-lg shadow-md">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                {{ $region->name }}
            </h1>
        </div>

        @if ($anaks->count() > 0 )
        <div class="px-6 py-5 bg-white w-full rounded-lg shadow-md mb-6">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                {{ $anaks->count() }} Anak
            </h1>
            <span class="text-xs text-slate-500 ">
                Yang ada di {{ $region->name }}
            </span>
        </div>
        @else
        <div class="px-6 py-5 ">
            <h1 class="text-base font-medium text-red-800">
                Belum ada Anak yang di timbang
            </h1>
        </div>
        @endif

        <div class="gap-10 lg:grid lg:grid-cols-3">
            <!-- INDEKSS MASSA TUBUH -->
            <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                        Indeks massa tubuh Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Komposisi Persentase Menurut Kategori
                    </span>
                </div>
                @if ($jumlaTimbangIMT > 0)
                <div id="imtchart" class="mt-5"></div>
                @else
                <div class="flex items-center justify-center p-4 mb-4 text-sm text-red-800 " role="alert">
                    <div>
                        <span class="text-xl font-medium">Belum ada data timbangan
                    </div>
                </div>
                @endif
            </div>
            <!-- ---------------------------------------------- -->

            <!-- PANJANG BADAN -->
            <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                        Panjang Badan Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Komposisi Persentase Menurut Kategori
                    </span>
                </div>
                @if ($jumlaTimbangPB > 0)
                <div id="pbchart" class="mt-5"></div>
                @else
                <div class="flex items-center justify-center p-4 mb-4 text-sm text-red-800" role="alert">
                    <div>
                        <span class="text-xl font-medium">Belum ada data timbangan
                    </div>
                </div>
                @endif
            </div>
            <!-- ---------------------------------------------- -->

            <!-- BERAT BADAN -->
            <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                        Berat Badan Anak
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Komposisi Persentase Menurut Kategori
                    </span>
                </div>
                @if ($jumlaTimbangBB > 0)
                <div id="bbchart" class="mt-5"></div>
                @else
                <div class="flex items-center justify-center p-4 mb-4 text-sm text-red-800 " role="alert">
                    <div>
                        <span class="text-xl font-medium">
                            Belum ada data timbangan
                    </div>
                </div>
                @endif
            </div>
            <!-- ---------------------------------------------- -->
        </div>

        <!-- TABLE -->
        @if ($users->count() > 0 )
        <div class="px-6 py-5 bg-white w-full rounded-lg shadow-md">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                {{ $users->count() }} User
            </h1>
            <span class="text-xs text-slate-500 ">
                Yang ada di {{ $region->name }}
            </span>
        </div>
        @else
        <div class="px-6 py-5 ">
            <h1 class="text-base font-medium text-red-800">
                Belum ada user yang mendaftar
            </h1>
        </div>
        @endif
        <div class="relative bg-white mt-5 py-5 overflow-x-auto shadow-md sm:rounded-lg w-full">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Orang Tua
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Anak
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
                    <tr class="bg-white border-b ">
                        <td class="px-6 py-3">
                            {{ $i + 1 }}
                        </td>
                        <th scope="row" class="px-6 py-3 whitespace-nowrap ">
                            <span class="block text-sm font-medium text-gray-900 ">
                                {{ $user->name }}
                            </span>
                            <span class="text-xs text-slate-500 ">
                                {{ $user->type }}
                            </span>
                        </th>
                        <td class="px-6 py-3">
                            {{ $user->anaks->count() ?? '' }}
                        </td>
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
        <!-- ------------------------------------------------------- -->

    </div>

</div>

<script>
    // IMT
    var kategoriIMT = <?php echo json_encode($kategoriIMT); ?>;
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
        series: Object.values(kategoriIMT),
        labels: Object.keys(kategoriIMT),
    }
    var chart = new ApexCharts(document.querySelector("#imtchart"), options);
    chart.render();

    // PB
    var kategoriPB = <?php echo json_encode($kategoriPB); ?>;
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
        series: Object.values(kategoriPB),
        labels: Object.keys(kategoriPB),
    }
    var chart = new ApexCharts(document.querySelector("#pbchart"), options);
    chart.render();

    // BB
    var kategoriBB = <?php echo json_encode($kategoriBB); ?>;
    var options = {
        chart: {
            type: 'pie',
            height: 300,

        },
        colors: ['#DA0037', '#03C988', '#FFD523'],
        legend: {
            show: true,
            position: 'top'
        },
        dataLabels: {
            enabled: false,
        },
        series: Object.values(kategoriBB),
        labels: Object.keys(kategoriBB),
    }
    var chart = new ApexCharts(document.querySelector("#bbchart"), options);
    chart.render();
</script>

@endsection