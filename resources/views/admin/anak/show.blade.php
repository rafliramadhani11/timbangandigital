@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="w-full h-full overflow-hidden bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6 dark:bg-gray-900">
            <!-- TOMBOL KEMBALI -->
            <a href="{{ route('admin.show', $username->username) }}" class="inline-flex items-center justify-center p-2 mb-5 text-base font-medium text-gray-500 rounded-lg shadow-sm bg-gray-50 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-6 h-6 text-gray-500 me-3 hover:text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
                </svg>
                <span class="w-full">Kembali Admin</span>
            </a>
            <!-- --------------------------------- -->
            <div class="md:grid md:grid-cols-2 md:gap-5">
                <!-- DATA ANAK -->
                <div class="container max-w-screen-lg">
                    <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                        <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-1">
                            <div class="flex items-center justify-between mb-6">
                                <div class="grid text-gray-600 dark:text-white">
                                    <p class="text-2xl font-bold ">Data Anak</p>
                                </div>
                                <div>
                                    <!-- TOMBOL EDIT NAMA -->
                                    <a role="button" id="ubahNama" data-modal-target="ubah-nama-{{ $anak->id }}" data-modal-toggle="ubah-nama-{{ $anak->id }}" class="text-white text-center bg-green-500 shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800" type="button">
                                        Ubah Nama
                                    </a>
                                    <!-- -------------------------------- -->

                                    <!-- MODAL UBAH -->
                                    <div id="ubah-nama-{{ $anak->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full p-2">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between px-2 border-b rounded-t md:p-5 dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Edit Data
                                                    </h3>
                                                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="ubah-nama-{{ $anak->id }}">
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
                                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $anak->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="p-4">
                                                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ------------------------------- -->
                                </div>
                            </div>
                            <div class="grid grid-cols-2 my-2 gap-y-8 md:grid-cols-3">
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Nama Lengkap Bayi</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $anak->name }}</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Jenis Kelamin</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $anak->gender }}</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Umur</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $anak->umur }} Bulan</p>
                                </div>

                            </div>
                            <div class="grid grid-cols-2 my-2 gap-y-8 md:grid-cols-3">
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Panjang Badan</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $anak->tb }} cm</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Berat Badan</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $anak->bb }} Kg</p>
                                </div>
                                <div>
                                    <label class="font-bold text-gray-400 dark:text-gray-400">Indeks Massa Tubuh (IMT)</label>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ $anak->imt }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------- -->
        </main>
    </div>
</div>

@endsection
