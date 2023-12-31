@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex pt-16 min-h-screen overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full  h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6 ">
            <a href="{{ route('admin.users') }}" class="inline-flex items-center justify-center p-2 mb-5 text-base font-medium text-gray-500 rounded-lg shadow-sm bg-gray-50 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-6 h-6 text-gray-500 me-3 hover:text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
                </svg>
                <span class="w-full">Kembali</span>
            </a>

            <div class="md:grid md:grid-cols-2 md:gap-5">
                <!-- DATA ORANG TUA -->
                <div class="container max-w-screen-lg">
                    <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                        @if (session()->has('updatedParent'))
                        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400 w-1/2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('updatedParent') }}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                        @endif
                        <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-1">
                            <div class="flex items-center justify-between mb-6">
                                <div class="grid text-gray-600 dark:text-white">
                                    <p class="text-2xl font-bold ">Data Orang Tua</p>
                                </div>
                                <div>
                                    <a href="{{ route('admin.edit' , $user->username) }}" class="text-white text-center bg-green-500 shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Ubah Data</a>
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


                <!-- CREATE ANAK -->
                <div class="container max-w-screen-lg">
                    <div class="p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8">
                        <form method="post" action="{{ route('anak.store', $user->username) }}">
                            @csrf
                            <div class="grid text-gray-600 dark:text-white">
                                <p class="text-2xl font-bold ">Tambah Data Anak</p>
                            </div>
                            @if (session()->has('storedAnak'))
                            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400 w-1/2" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">
                                    {{ session('storedAnak') }}
                                </div>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                            @endif
                            <div class="grid gap-4 mt-6 lg:grid-cols-2">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('name')
                                    <small class="text-red-500 text-start ">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " required>
                                        <option selected disabled></option>
                                        @if(old('gender'))
                                        <option>{{ old('gender') }}</option>
                                        @endif
                                        <option>Laki Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur Bayi</label>
                                    <input type="number" id="umur" name="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                    @error('umur')
                                    <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="tb" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi / Panjang Badan (cm)</label>
                                    <input type="number" id="tb" name="tb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                    @error('tb')
                                    <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="bb" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat Badan (gram)</label>
                                    <input type="number" id="bb" name="bb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                    @error('bb')
                                    <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-8 space-x-4">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buat Baru</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ------------------------------------------- -->
            </div>

            <!-- DATA ANAK -->
            <div class="relative p-4 overflow-x-auto shadow-md sm:rounded-lg dark:bg-gray-800">
                <div class="grid p-4 text-gray-600 dark:text-white ">
                    <p class="text-2xl font-bold ">Data Anak</p>
                </div>
                @if (session()->has('updatedName'))
                <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400 w-1/2" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('updatedName') }}
                    </div>
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
                                Nama Lengkap
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Jenis Kelamin
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Umur
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Tinggi/Panjang Badan
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Berat Badan
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Indeks Massa Tubuh
                            </th>
                            <th class="px-4 py-2 ">

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
                                {{ $anak->gender }}
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $anak->umur }} Bulan
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $anak->tb }} cm
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $anak->bb }} g
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $anak->imt? '$anak->imt' : '-' }}
                            </td>
                            <td class="flex px-4 py-2 text-gray-700 gap-x-2 whitespace-nowrap dark:text-gray-200">
                                <span class="inline-flex -space-x-px overflow-hidden bg-white border rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-800">

                                    <a role="button" id="ubahNama" data-modal-target="ubah-nama-{{ $anak->id }}" data-modal-toggle="ubah-nama-{{ $anak->id }}" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-100 focus:relative dark:text-gray-200 dark:hover:bg-green-800" type="button">
                                        Edit
                                    </a>
                                    <a data-modal-target="modal-hapus-{{ $anak->id }}" data-modal-toggle="modal-hapus-{{ $anak->id }}" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-red-100 focus:relative dark:text-gray-200 dark:hover:bg-red-800" role="button">
                                        Hapus
                                    </a>
                                </span>
                                <div id="modal-hapus-{{ $anak->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full p-4">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-hapus-{{ $anak->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <!-- MODAL -->
                                            <div class="p-4 text-center md:p-5">
                                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Kamu yakin ingin menghapus data tersebut ?</h3>
                                                <div class="flex justify-center">
                                                    <form method="post" action="{{ route('anak.delete', $anak->id) }}" class="block">
                                                        @method('delete')
                                                        @csrf
                                                        <button data-modal-hide="modal-hapus-{{ $anak->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Hapus
                                                        </button>
                                                    </form>

                                                    <button data-modal-hide="modal-hapus-{{ $anak->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Kembali
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- ----------------------------------- -->
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @foreach ($anaks as $anak)
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
                            <form method="POST" action="{{ route('anak.update', $anak->id) }}">
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
                @endforeach

                @else
                <div class="p-4 mb-3 text-center text-red-800  rounded-lg bg-red-300 dark:bg-red-400 dark:text-red-800" role="alert">
                    <span class="text-2xl font-medium">Data Anak belum ada</span>
                </div>
                @endif
            </div>
            <!-- ------------------------ -->
        </main>
    </div>
</div>





@endsection
