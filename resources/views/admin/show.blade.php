@extends('layouts.main')

@section('content')
@include('partials.navbar')

<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">

    <div class="px-2 pt-4 mt-14">

        <a href="{{ route('admin.users') }}" class="inline-flex items-center justify-center p-2 mb-5 text-base font-medium text-black rounded-lg shadow-md bg-gray-50 hover:bg-gray-100 ">
            <svg class="w-6 h-6 text-gray-500 me-3 hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
            </svg>
            <span class="w-full">Kembali</span>
        </a>

        <div class="md:grid md:grid-cols-2 md:gap-5">

            <!-- DATA ORANG TUA -->
            <div class="container max-w-screen-lg md:col-span-2 lg:col-span-1">
                <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md md:p-8">
                    @if (session()->has('updatedParent'))
                    <div id="alert-3" class="flex items-center w-full p-4 mb-4 text-green-800 bg-green-100 rounded-lg" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="text-sm font-medium ms-3">
                            {{ session('updatedParent') }}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2">
                        <div class="md:flex md:items-center md:justify-between mb-5">
                            <div class="grid text-gray-600 ">
                                <p class="text-2xl font-bold ">
                                    Data Orang Tua
                                </p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a href="{{ route('admin.edit' , $user->username) }}" class="text-white text-center bg-green-500 shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 focus:outline-none ">Ubah Data</a>
                            </div>
                        </div>

                        <!-- USER ACCOUNT -->
                        <span class="text-gray-400">User Account</span>
                        <hr class="h-0.5 border-0 bg-gray-200" />

                        <div class="grid grid-cols-2 my-2 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                            <div>
                                <label class="font-bold text-gray-400 ">Username</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->username }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Password</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->password }}</p>
                            </div>
                        </div>

                        <!-- USER INF0 -->
                        <span class="text-gray-400">User Info</span>
                        <hr class="h-0.5 border-0 bg-gray-200" />

                        <div class="grid grid-cols-2 my-2 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                            <div>
                                <label class="font-bold text-gray-400 ">Nama Lengkap</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->name }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Orang Tua</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->type }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Jenis Kelamin</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->jeniskelamin }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Pekerjaan</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->pekerjaan }}</p>
                            </div>
                        </div>

                        <!-- PERSONAL INFO -->
                        <span class="mt-5 text-gray-400">Personal Info</span>
                        <hr class="h-0.5 border-0  bg-gray-200" />
                        <div class="grid grid-cols-2 my-2 gap-y-8 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label class="font-bold text-gray-400 ">No Handphone</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->nohp }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Tanggal Lahir</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->tgllahir }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Asal Region</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->region->name }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Kecamatan</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->kecamatan }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Kelurahan</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->kelurahan }}</p>
                            </div>
                            <div>
                                <label class="font-bold text-gray-400 ">Alamat</label>
                                <p class="font-semibold text-gray-800 ">{{ $user->alamat }}</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- ------------------------------------------- -->

            <!-- CREATE ANAK -->
            <div class='container max-w-screen-lg md:col-span-2 lg:col-span-1'>
                <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md  md:p-8 lg:h-[25.5rem] ">

                    <form method="post" action="{{ route('admin.anak.store', $user->username) }}">
                        @csrf
                        <div class="grid text-gray-600">
                            <p class="text-2xl font-bold ">Tambah Data Anak</p>
                        </div>
                        @if (session()->has('storedAnak'))
                        <div id="alert-3" class="flex items-center w-full p-4 mb-4 text-green-800 bg-green-100 rounded-lg " role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="text-sm font-medium ms-3">
                                {{ session('storedAnak') }}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                        @endif
                        <div class="grid gap-4 mt-6 lg:grid-cols-3">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap Bayi</label>
                                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ old('name') }}">
                                @error('name')
                                <small class="text-red-500 text-start ">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="jeniskelamin" class="block mb-2 text-sm font-medium text-gray-900 ">Jenis Kelamin</label>
                                <select id="jeniskelamin" name="jeniskelamin" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('jeniskelamin') }}">
                                    <option selected disabled></option>
                                    @if(old('jeniskelamin'))
                                    <option>{{ old('jeniskelamin') }}</option>
                                    @endif
                                    <option>Laki Laki</option>
                                    <option>Perempuan</option>
                                </select>
                                @error('jeniskelamin')
                                <small class="text-xs text-red-500 ">{{$message}}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 ">Umur Bayi ( Bulan )</label>
                                <input type="number" id="umur" name="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="{{ old('umur') }}" />
                                @error('umur')
                                <small class="text-xs text-red-500 ">{{$message}}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="pb" class="block mb-2 text-sm font-medium text-gray-900 ">Panjang Badan (cm)</label>
                                <input type="number" id="pb" name="pb" class="bg-gray-100 border border-gray-200 focus:border-gray-200 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-default" readonly value="{{ $timbangan->pb ?? '' }}" min="1" max="10000" step="0.001" />
                                @error('pb')
                                <small class="text-xs text-red-500 ">{{$message}}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="bb" class="block mb-2 text-sm font-medium text-gray-900 ">Berat Badan (Kg)</label>
                                <input type="number" id="bb" name="bb" class="bg-gray-100 border border-gray-200 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-default" readonly value="{{  $timbangan->bb ?? ''  }}" />
                                @error('bb')
                                <small class="text-xs text-red-500 ">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mt-4 w-full lg:w-1/4 focus:ring-blue-300 font-medium rounded-lg shadow-md text-sm px-5 py-2.5 focus:outline-none transition duration-200">
                            Buat Baru
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- ------------------------------------------- -->

        <!-- TABLE ANAK -->
        <div class=" p-4 overflow-x-auto shadow-md rounded-lg bg-white">
            <div class="grid p-4 text-gray-600 ">
                <p class="text-2xl font-bold ">Data Anak</p>
            </div>
            <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 ">
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
                            Indeks Massa Tubuh
                        </th>
                        <th class="px-4 py-2 ">

                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 ">
                    @if (session()->has('deletedAnak'))
                    <div id="alert-3" class="flex items-center w-full p-4 mb-4 text-green-800 bg-green-100 rounded-lg " role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="text-sm font-medium ms-3">
                            {{ session('deletedAnak') }}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    @endif
                    @if ($anaks->count())
                    @foreach ($anaks as $anak)
                    <tr>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                            <span class="block text-sm">
                                {{ $anak->name }}
                            </span>
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
                        <td class="flex px-4 py-2 text-gray-700 gap-x-2 whitespace-nowrap ">
                            <span class="inline-flex -space-x-px overflow-hidden bg-white border rounded-md shadow-sm ">

                                <a href="{{ route('admin.anak.show', ['username' => $anak->user->username, 'anak' => $anak->id]) }}" role="button" id="ubahNama" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-100 focus:relative" type="button">
                                    Lihat
                                </a>
                                <form action="{{ route('admin.anak.delete', $anak->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-red-100 focus:relative  " role="button" onclick="return confirm('Anda Yakin ingin mneghapus data tersebut ?')">
                                        Hapus
                                    </button>
                                </form>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="flex items-center w-full lg:w-1/2 md:w-full p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Data anak belum ada !
                </div>
            </div>
            @endif
        </div>
        <!-- ------------------------ -->

    </div>


</div>

@endsection