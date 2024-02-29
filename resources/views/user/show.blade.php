@extends('layouts.main')

@section('content')
@include('partials.navbar')
<div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6 ">
            <div class="md:grid md:grid-cols-2 md:gap-5">
                <!-- DATA ORANG TUA -->
                <div class="container max-w-screen-lg">
                    <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
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
                        <!-- DATA ORANG TUA -->
                        <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-1">
                            <div class="flex items-center justify-between mb-10">
                                <div class="grid text-gray-600 dark:text-white">
                                    <p class="text-2xl font-bold ">Data Orang Tua</p>
                                </div>
                                <div>
                                    <a href="{{ route('user.edit' , $user->username) }}" class="text-white text-center bg-green-500 shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Ubah Data</a>
                                </div>
                            </div>

                            <span class="text-gray-400">User Info</span>
                            <hr class="h-0.5 border-0 dark:bg-gray-500 bg-gray-200" />
                            <div class="grid grid-cols-2 my-2 gap-y-8 md:grid-cols-4">
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Nama Lengkap</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Orang Tua</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->type }}</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Jenis Kelamin</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->jeniskelamin }}</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Pekerjaan</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->pekerjaan }}</p>
                                </div>
                            </div>

                            <span class="mt-5 text-gray-400">Personal Info</span>
                            <hr class="h-0.5 border-0 dark:bg-gray-500 bg-gray-200" />
                            <div class="grid grid-cols-2 my-2 gap-y-8 md:grid-cols-4">
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">No Handphone</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">+62 {{ $user->nohp }}</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Tanggal Lahir</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->tgllahir }}</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Asal Region</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->region->name }}</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Kecamatan</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->kecamatan }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 my-2 gap-y-8 md:grid-cols-4">
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Kelurahan</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->kelurahan }}</p>
                                </div>
                                <div class="md:col-span-3">
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Alamat</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $user->alamat }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------- -->
            </div>

            <!-- DATA ANAK -->
            <div class="relative p-4 overflow-x-auto shadow-md sm:rounded-lg dark:bg-gray-800">
                <div class="grid p-4 text-gray-600 dark:text-white">
                    <p class="text-2xl font-bold ">Data Anak</p>
                </div>
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
        </main>
    </div>
</div>

@endsection
