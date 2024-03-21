@extends('layouts.main')

@section('content')
@include('partials.navbar')
<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">

    <div class="p-4 border-gray-200 rounded-lg  mt-14">
        <!-- USERS CHART -->
        @if (count($regionsUser) > 0)
        <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8">
            <div id="usersChart"></div>
        </div>
        @else
        <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8">
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 " role="alert">
                <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <h1 class="text-3xl font-medium text-red-800">
                        Belum ada user yang mendaftar
                    </h1>
                    <span class="text-xs text-slate-500 ">
                        Grafik tidak dapat di tampilkan
                    </span>
                </div>
            </div>
        </div>
        @endif

        <div class="gap-10 lg:grid lg:grid-cols-3">

            <!-- INDEKSS MASSA TUBUH -->
            @if ($totalAnak > 0)
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
                    <a class="focus:outline-none text-white bg-[#00A688]  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2   ">
                        NORMAL
                    </a>
                </div>
                <div>
                    <div id="imtchart" class="mt-5 "></div>
                </div>
            </div>
            @else
            <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 " role="alert">
                    <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <h1 class="text-xl font-medium text-red-800">
                            Belum ada anak yang di timbang
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik Indeks Massa Tubuh tidak dapat di tampilkan
                        </span>
                    </div>
                </div>
            </div>
            @endif

            <!-- PANJANG BADAN -->
            @if ($totalAnak > 0)
            <div class="p-4  mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="mb-3">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                            Panjang Badan Anak
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik perkembangan gizi anak
                        </span>
                    </div>
                    <a class="focus:outline-none text-white bg-[#00A688]  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  ">NORMAL</a>
                </div>
                <div>
                    <div id="pbchart" class="mt-5"></div>
                </div>
            </div>
            @else
            <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 " role="alert">
                    <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <h1 class="text-xl font-medium text-red-800">
                            Belum ada anak yang di timbang
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik Indeks Massa Tubuh tidak dapat di tampilkan
                        </span>
                    </div>
                </div>
            </div>
            @endif

            <!-- BERAT BADAN -->
            @if ($totalAnak > 0)
            <div class="p-4  mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="mb-3">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">
                            Berat Badan Anak
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik perkembangan gizi anak
                        </span>
                    </div>
                    <a class="focus:outline-none text-white bg-[#00A688]  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2   ">NORMAL</a>
                </div>
                <div>
                    <div id="bbchart" class="mt-5"></div>
                </div>
            </div>
            @else
            <div class="flex items-center justify-center p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8">
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 " role="alert">
                    <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <h1 class="text-xl font-medium text-red-800">
                            Belum ada anak yang di timbang
                        </h1>
                        <span class="text-xs text-slate-500 ">
                            Grafik Indeks Massa Tubuh tidak dapat di tampilkan
                        </span>
                    </div>
                </div>
            </div>
            @endif

        </div>

    </div>
</div>

<script>
    // USERS
    const usersChart = <?php echo json_encode($usersKategori); ?>;
    console.log(Object.values(usersChart));
    var options = {
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false
            }
        },
        series: [{
            name: 'Users',
            data: usersChart['usersByRegion']
        }, {
            name: 'Anak',
            data: usersChart['anakByRegion']
        }],
        xaxis: {
            categories: usersChart['regionNames'],
        },
        yaxis: {
            stepSize: 1
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '75%',
                borderRadius: 5
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 10,
            colors: ['transparent']
        },
    };
    var chart = new ApexCharts(document.querySelector("#usersChart"), options);
    chart.render();

    // IMT CHART
    const imtChart = <?php echo json_encode($imtchart); ?>;
    var options = {
        series: [{
            name: 'Normal',
            data: Object.values(imtChart),
            color: '#00e396'
        }],
        chart: {
            type: 'bar',
            height: 300,
            toolbar: {
                show: false
            }
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + "%"
                }
            },
        },
        plotOptions: {
            bar: {
                borderRadius: 5,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: Object.keys(imtChart),
            labels: {
                formatter: function(val) {
                    return val + "%"
                }
            },
            stepSize: 20
        }
    };
    var chart = new ApexCharts(document.querySelector("#imtchart"), options);
    chart.render();

    // PB CHART
    const pbChart = <?php echo json_encode($pbchart); ?>;
    var options = {
        series: [{
            name: 'Normal',
            data: Object.values(pbChart),
            color: '#00e396'
        }],
        chart: {
            type: 'bar',
            height: 300,
            toolbar: {
                show: false
            }
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + "%"
                }
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 5,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: Object.keys(pbChart),
            labels: {
                formatter: function(val) {
                    return val + "%"
                }
            },
            stepSize: 20
        }


    };
    var chart = new ApexCharts(document.querySelector("#pbchart"), options);
    chart.render();

    // BB CHART
    const bbChart = <?php echo json_encode($bbchart); ?>;
    var options = {
        series: [{
            name: 'Normal',
            data: Object.values(bbChart),
            color: '#00e396'
        }],
        chart: {
            type: 'bar',
            height: 300,
            toolbar: {
                show: false
            }
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + "%"
                }
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 5,
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: Object.keys(bbChart),
            labels: {
                formatter: function(val) {
                    return val + "%"
                }
            },
            stepSize: 20
        }
    };
    var chart = new ApexCharts(document.querySelector("#bbchart"), options);
    chart.render();
</script>

@endsection