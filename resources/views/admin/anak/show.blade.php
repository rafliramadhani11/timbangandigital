@extends('layouts.main')

@section('content')
@include('partials.navbar')

<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">

    <div class="px-2 pt-4 mt-14">
        <a href="{{ route('admin.show', $username->username) }}" class="inline-flex items-center justify-center p-2 mb-5 text-base font-medium text-black rounded-lg shadow-md bg-gray-50 hover:bg-gray-100 ">
            <svg class="w-6 h-6 text-gray-500 me-3 hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
            </svg>
            <span class="w-full">Kembali</span>
        </a>

        <div class="md:grid md:grid-cols-2  md:gap-5">
            <!-- DATA ANAK -->
            <div class="container max-w-screen-lg col-span-1 md:col-span-2 lg:col-span-1">
                <div class="p-4 px-4 md:px-8 mb-10 md:mb-0 bg-white rounded-lg shadow-md ">
                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-1">
                        <div class="flex items-center justify-between mb-3">

                            <p class="text-2xl font-bold text-black ">
                                Data Anak
                            </p>

                            <!-- TOMBOL EDIT NAMA -->
                            <div class="mt-2">
                                <a role="button" id="ubahNama" data-modal-target="ubah-nama-{{ $anak->id }}" data-modal-toggle="ubah-nama-{{ $anak->id }}" class="text-white text-center bg-green-500 shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none " type="button">
                                    Ubah Nama
                                </a>
                                <!-- MODAL UBAH -->
                                <div id="ubah-nama-{{ $anak->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full p-2">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow ">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between px-2 border-b rounded-t md:p-5 ">
                                                <h3 class="text-xl font-semibold text-gray-900 ">
                                                    Edit Data
                                                </h3>
                                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto " data-modal-toggle="ubah-nama-{{ $anak->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form method="POST" action="{{ route('admin.anak.update', $anak->id) }}">
                                                @method('put')
                                                @csrf
                                                <div class="grid grid-cols-2 gap-4 ">
                                                    <div class="col-span-2 p-4">
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap</label>
                                                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ $anak->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="p-4">
                                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                        Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- ------------------------------- -->
                            </div>
                            <!-- -------------------------------- -->
                        </div>
                        <div class="grid grid-cols-2 my-2 gap-y-8 lg:grid-cols-3 ">
                            <div>
                                <label class="font-bold text-gray-400 ">Nama Lengkap Bayi</label>
                                <p class="font-semibold text-gray-800 ">{{ $anak->name }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Jenis Kelamin</label>
                                <p class="font-semibold text-gray-800 ">{{ $anak->jeniskelamin }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Umur</label>
                                <p class="font-semibold text-gray-800 ">{{ optional($anak->timbangans->first())->umur }} Bulan</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Panjang Badan</label>
                                <p class="font-semibold text-gray-800 ">{{ optional($anak->timbangans->first())->pb }} cm</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Berat Badan</label>
                                <p class="font-semibold text-gray-800 ">{{ optional($anak->timbangans->first())->bb }} Kg</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Indeks Massa Tubuh (IMT)</label>
                                <p class="font-semibold text-gray-800 ">{{ optional($anak->timbangans->first())->imt }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAMBAH DATA TIMBANGAN -->
            <div class="container max-w-screen-lg col-span-1 md:col-span-2 lg:col-span-1">
                <div class="p-4 px-4 md:px-8 mb-10  md:mb-0 bg-white rounded-lg shadow-md ">
                    <form method="POST" action="{{ route('admin.update.timbang', $anak->id) }}">
                        @method('put')
                        @csrf
                        <div class="grid text-gray-600 ">
                            <p class="text-2xl font-bold text-black ">
                                Tambah Data Timbangan
                            </p>
                        </div>
                        @if (session()->has('updatedTimbang'))
                        <div id="alert-3" class="flex items-center px-4 py-2 mt-4 text-green-800 bg-green-100 rounded-lg " role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="text-sm font-medium ms-3">
                                {{ session('updatedTimbang') }}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                        @endif
                        <div class="grid gap-4 mt-6 grid-cols-1 md:grid-cols-3 ">
                            <!-- UMUR -->
                            <div>
                                <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 ">Umur Bayi ( Bulan )</label>
                                <input type="number" id="umur" name="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ $timbangan->umur ?? '' }}" required />
                                @error('umur')
                                <small class="text-xs text-red-500 d">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- ------------------- -->
                            <!-- PANJANG -->
                            <div>
                                <label for="pb" class="block mb-2 text-sm font-medium text-gray-900 ">Panjang Badan (cm)</label>
                                <input type="number" id="pb" name="pb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ $timbangan->pb ?? '0' }}" min="1" max="10000" step="0.001" required />
                                @error('pb')
                                <small class="text-xs text-red-500 ">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- ---------------------- -->
                            <!-- BERAT -->
                            <div>
                                <label for="bb" class="block mb-2 text-sm font-medium text-gray-900 ">Berat Badan (Kg)</label>
                                <input type="number" id="bb" name="bb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{  $timbangan->bb ?? '0'  }}" required />
                                @error('bb')
                                <small class="text-xs text-red-500 ">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- ------------------------ -->

                        </div>
                        <div class="flex items-end justify-start w-full mt-5 lg:mt-[1.9rem]">
                            <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  focus:outline-none ">Buat Baru</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- GRAFIK -->
        <div class="lg:mt-7">
            <!-- INDEKS MASSA TUBUH -->
            <div class="p-4 px-4 mb-6 md:col-span-2  bg-white rounded-lg shadow-md  md:p-8 ">
                <div>
                    <span class="block text-2xl font-bold text-black ">
                        Indeks Massa Tubuh
                    </span>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                </div>
                <div id="imtchart" class="mt-5"></div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-7 py-3">
                                    Umur
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Indeks Massa Tubuh
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anak->timbangans as $i => $timbangan)
                            <tr class="bg-white text-xs border-b ">
                                <td class="px-6 py-4">
                                    {{ $timbangan->created_at->format('j M') }}
                                </td>
                                <td class="px-6 py-4 text-center lg:text-start">
                                    {{ $timbangan->umur }} Bulan
                                </td>
                                <td class="px-6 py-4">
                                    {{ $timbangan->imt }}
                                </td>
                                <td class="px-6 py-4 ">
                                    @if ($timbangan->imt_status == 'WASTED')
                                    <span class="bg-red-100 text-red-800  px-2.5 py-0.5 rounded ">{{ $timbangan->imt_status }}</span>
                                    @elseif($timbangan->imt_status == 'NORMAL')
                                    <span class="bg-green-100 text-green-800  px-2.5 py-0.5 rounded ">{{ $timbangan->imt_status }}</span>
                                    @else
                                    <button class="bg-yellow-100 cursor-default text-yellow-800  px-2.5 py-0.5 rounded ">{{ $timbangan->imt_status }}</button>
                                    @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PANJANG BADAN -->
            <div class="p-4 px-4 mb-6 md:col-span-2  bg-white rounded shadow-md  md:p-8 ">
                <div>
                    <span class="block text-2xl font-bold text-black ">
                        Panjang Badan
                    </span>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                </div>
                <div id="pbChart" class="mt-5"></div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-7 py-3">
                                    Umur
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Panjang Badan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anak->timbangans as $i => $timbangan)
                            <tr class="bg-white text-xs border-b ">
                                <td class="px-6 py-4">
                                    {{ $timbangan->created_at->format('j M') }}
                                </td>
                                <td class="px-6 py-4 text-center lg:text-start">
                                    {{ $timbangan->umur }} Bulan
                                </td>
                                <td class="px-6 py-4">
                                    {{ $timbangan->pb }} cm
                                </td>
                                <td class="px-6 py-4 ">
                                    @if ($timbangan->pb_status == 'STUNTED')
                                    <span class="bg-red-100 text-red-800  px-2.5 py-0.5 rounded ">{{ $timbangan->pb_status }}</span>
                                    @elseif($timbangan->pb_status == 'NORMAL')
                                    <span class="bg-green-100 text-green-800  px-2.5 py-0.5 rounded ">{{ $timbangan->pb_status }}</span>
                                    @else
                                    <button class="bg-yellow-100 cursor-default text-yellow-800  px-2.5 py-0.5 rounded ">{{ $timbangan->pb_status }}</button>
                                    @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- BERAT BADAN -->
            <div class="p-4 px-4 mb-6 md:col-span-2  bg-white rounded shadow-md  md:p-8 ">
                <div>
                    <span class="block text-2xl font-bold text-black ">
                        Berat Badan
                    </span>
                    <span class="text-xs text-slate-500 ">
                        Grafik perkembangan gizi anak
                    </span>
                </div>
                <div id="bbChart" class="mt-5"></div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-7 py-3">
                                    Umur
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Berat Badan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anak->timbangans as $i => $timbangan)
                            <tr class="bg-white text-xs border-b ">
                                <td class="px-6 py-4">
                                    {{ $timbangan->created_at->format('j M') }}
                                </td>
                                <td class="px-6 py-4 text-center lg:text-start">
                                    {{ $timbangan->umur }} Bulan
                                </td>
                                <td class="px-6 py-4">
                                    {{ $timbangan->bb }}
                                </td>
                                <td class="px-6 py-4 ">
                                    @if ($timbangan->bb_status == 'UNDERWEIGHT')
                                    <span class="bg-red-100 text-red-800  px-2.5 py-0.5 rounded ">{{ $timbangan->bb_status }}</span>
                                    @elseif($timbangan->bb_status == 'NORMAL')
                                    <span class="bg-green-100 text-green-800  px-2.5 py-0.5 rounded ">{{ $timbangan->bb_status }}</span>
                                    @else
                                    <button class="bg-yellow-100 cursor-default text-yellow-800  px-2.5 py-0.5 rounded ">{{ $timbangan->bb_status }}</button>
                                    @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</div>

<script>
    // IMT
    const imtChart = <?php echo json_encode($imtChart); ?>;
    var options = {
        series: [{
            name: 'Indeks Massa Tubuh',
            data: Object.values(imtChart)
        }],
        chart: {
            height: 250,
            type: 'area',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false,
            }
        },
        markers: {
            size: 6,
        },
        grid: {
            show: false,
            position: 'back',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: Object.keys(imtChart)
        },
    };
    var chart = new ApexCharts(document.querySelector("#imtchart"), options);
    chart.render();

    // PB
    const pbChart = <?php echo json_encode($pbChart); ?>;
    var options = {
        series: [{
            name: 'Panjang Badan',
            data: Object.values(pbChart)
        }],
        chart: {
            height: 250,
            type: 'area',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false,
            }
        },
        markers: {
            size: 6,
        },
        grid: {
            show: false,
            position: 'back',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: Object.keys(pbChart)
        },
    };
    var chart = new ApexCharts(document.querySelector("#pbChart"), options);
    chart.render();

    // BB
    const bbChart = <?php echo json_encode($bbChart); ?>;
    var options = {
        series: [{
            name: 'Berat Badan',
            data: Object.values(bbChart)
        }],
        chart: {
            height: 250,
            type: 'area',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false,
            }
        },
        markers: {
            size: 6,
        },
        grid: {
            show: false,
            position: 'back',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: Object.keys(bbChart)
        },
    };
    var chart = new ApexCharts(document.querySelector("#bbChart"), options);
    chart.render();
</script>
@endsection