@extends('layouts.main')

@section('content')
@include('partials.navbar')

<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">

    <div class="p-4 mt-14">
        <div class="md:grid md:grid-cols-2 md:gap-5">
            <!-- DATA ORANG TUA -->
            <div class="container max-w-screen-lg md:col-span-2 lg:col-span-1">
                <div class="md:flex md:items-center md:justify-between mb-3 bg-white rounded-lg shadow-md p-4 lg:w-full lg">
                    <div class="grid text-gray-600  dark:text-white">
                        <p class="text-2xl font-bold ">
                            Data Orang Tua
                        </p>
                    </div>
                    <div class="mt-6 md:mt-0 pb-3 md:pb-0 lg:pb-0">
                        <a href="{{ route('user.edit' , $user->username) }}" class="text-white text-center bg-green-500 shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 transition duration-200">Ubah Data</a>
                    </div>
                </div>
                @if (is_null($user->alamat) && is_null($user->nohp) && is_null($user->tgllahir) && is_null($user->pekerjaan) && is_null($user->jeniskelamin))
                <div class="flex items-center  p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 w-full" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div>
                        <span class="font-medium">Data Orang Tua perlu di lengkapi
                    </div>
                </div>
                @endif

                <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800 md:p-8">
                    @if (session()->has('updatedParent'))
                    <div id="alert-3" class="flex items-center justify-start px-4 py-2 mb-4 text-green-800 bg-green-100 rounded-lg shadow-sm dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <small class="font-semibold ms-3">{{ session('updatedParent') }}</small>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    @endif
                    <div class="grid grid-cols-1  p-3 gap-8 text-sm gap-y-2 ">
                        <span class="text-gray-400">User Info</span>
                        <hr class="h-0.5 border-0 dark:bg-gray-500 bg-gray-200" />
                        <div class="md:grid md:grid-cols-2 lg:grid-cols-3">
                            <div class="my-3 mt-0 md:my-3">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Nama Lengkap</label>
                                <p class="{{ $user->name ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->name ?? '-' }}
                                </p>
                            </div>
                            <div class="my-3">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Orang Tua</label>
                                <p class="{{ $user->type ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->type ?? '-' }}
                                </p>
                            </div>
                            <div class="my-3">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Jenis Kelamin</label>
                                <p class="{{ $user->jeniskelamin ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->jeniskelamin ?? '-' }}
                                </p>
                            </div>
                            <div class="my-3 mb-0">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Pekerjaan</label>
                                <p class="{{ $user->pekerjaan ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->pekerjaan ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <span class="mt-5 text-gray-400">Personal Info</span>
                        <hr class="h-0.5 border-0 dark:bg-gray-500 bg-gray-200" />
                        <div class="md:grid md:grid-cols-2 lg:grid-cols-3">
                            <div class="my-3 mt-0 md:my-3">
                                <label class="font-bold text-gray-400 dark:text-gray-400">No Handphone</label>
                                <p class="{{ $user->nohp ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->nohp ?? '-' }}
                                </p>
                            </div>
                            <div class="my-3">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Tanggal Lahir</label>
                                <p class="{{ $user->tgllahir ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->tgllahir ?? '-' }}
                                </p>
                            </div>
                            <div class="my-3">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Asal Region</label>
                                <p class="{{ $user->region->name ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->region->name ?? '-' }}
                                </p>
                            </div>
                            <div class="my-3">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Kecamatan</label>
                                <p class="{{ $user->kecamatan ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->kecamatan ?? '-' }}
                                </p>
                            </div>
                            <div class="my-3">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Kelurahan</label>
                                <p class="{{ $user->kelurahan ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->kelurahan ?? '-' }}
                                </p>
                            </div>
                            <div class="my-3 ">
                                <label class="font-bold text-gray-400 dark:text-gray-400">Alamat</label>
                                <p class="{{ $user->alamat ? 'font-semibold text-gray-800' : 'font-semibold' }}">
                                    {{ $user->alamat ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ------------------------------------------- -->
        </div>

        <!-- DATA ANAK -->
        <div class="p-4 bg-white mb-6 rounded-lg shadow-md lg:w-1/2 w-full text-gray-600 ">
            <p class="text-2xl font-bold ">Data Anak</p>
        </div>
        <div class="relative p-4 overflow-x-auto bg-white rounded-lg shadow-md">
            @if (session()->has('updatedBaby'))
            <div id="alert-3" class="flex items-center justify-start px-4 py-2 mb-4 text-green-800 bg-green-100 rounded-lg shadow-sm dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <small class="font-semibold ms-3">{{ session('updatedBaby') }}</small>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif
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
                        <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">

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

                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                            <span class="inline-flex -space-x-px overflow-hidden bg-white border rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <a href="{{ route('anak.show', ['user' => $anak->user->username, 'anak' => $anak->id]) }}" role="button" id="ubahNama" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-100 focus:relative dark:text-gray-200 dark:hover:bg-green-800" type="button">
                                    Lihat
                                </a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="flex items-center lg:w-1/2 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 w-full" role="alert">
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

    </div>

</div>

@endsection