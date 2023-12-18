@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full min-h-screen overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6 ">
            <a href="{{ route('user.show', $user->username) }}" class="inline-flex items-center justify-center p-2 text-base font-medium text-gray-500 rounded-lg bg-gray-50  hover:bg-gray-100 shadow-sm dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white mb-5">
                <svg class="w-6 h-6 me-3 text-gray-500 hover:text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
                </svg>
                <span class="w-full">Kembali</span>
            </a>

            <div class="container max-w-screen-lg ">
                <div>
                    <div class="p-4 px-4 mb-6 bg-white rounded shadow-md md:p-8 dark:bg-gray-800">
                        <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3 ">
                            <div class="mb-5 text-gray-600 md:mb-0">
                                <p class="text-lg font-medium dark:text-white">Data Orang Tua</p>
                                <p class="dark:text-gray-400">Silahkan di isi dengan benar</p>
                            </div>

                            <form method="post" action="{{ route('user.update', $user->username) }}" class="lg:col-span-2 ">
                                @method('patch')
                                @csrf
                                <div class="grid grid-cols-1 gap-4 md:grid-cols-5 ">
                                    <div class="md:grid md:grid-cols-3 md:gap-x-5 md:col-span-5">
                                        <div class="mb-3">
                                            <label for="name" class="dark:text-white">Nama Lengkap</label>
                                            <input type="text" name="name" id="name" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="{{ old('name', $user->name) }}" required autofocus />
                                            @error('name')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="type" class="dark:text-white">Orang Tua</label>
                                            <select id="type" name="type" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " required>
                                                @if(old('type', $user->type) === $user->type)
                                                <option value="{{ old('type', $user->type) }}" selected>{{ old('type', $user->type) }}</option>
                                                @else
                                                <option selected disabled></option>
                                                @endif
                                                @foreach(['Ayah', 'Ibu', 'Wali'] as $option)
                                                @if($option !== $user->type)
                                                <option value="{{ $option }}" {{ (old('type', $user->type) == $option) ? 'selected' : '' }}>{{ $option }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('type')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="jeniskelamin" class="dark:text-white">Jenis Kelamin</label>
                                            <select id="jeniskelamin" name="jeniskelamin" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " required>
                                                @if(old('jeniskelamin', $user->jeniskelamin) === $user->jeniskelamin)
                                                <option value="{{ old('jeniskelamin', $user->jeniskelamin) }}" selected>{{ old('jeniskelamin', $user->jeniskelamin) }}</option>
                                                @else
                                                <option selected disabled></option>
                                                @endif
                                                @foreach(['Laki Laki', 'Wanita'] as $option)
                                                @if($option !== $user->jeniskelamin)
                                                <option value="{{ $option }}" {{ (old('jeniskelamin', $user->jeniskelamin) == $option) ? 'selected' : '' }}>{{ $option }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('jeniskelamin')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="md:grid md:grid-cols-3 md:gap-x-5 md:col-span-5">
                                        <div class="mb-3 md:mb-0">
                                            <label for="nohp" class="block dark:text-white">No Handphone</label>
                                            <input type="number" name="nohp" id="nohp" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('nohp', $user->nohp) }}" required placeholder="cth: 89123452124" />
                                            <small class="dark:text-gray-400 text-gray-500">
                                                cth: 85895245344
                                            </small>
                                            @error('nohp')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="tgllahir" class="dark:text-white">Tanggal Lahir</label>
                                            <input type="date" name="tgllahir" id="tgllahir" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('tgllahir', $user->tgllahir) }}" required />
                                            @error('tgllahir')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pekerjaan" class="dark:text-white">Pekerjaan</label>
                                            <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('pekerjaan', $user->pekerjaan) }}" required />
                                            @error('pekerjaan')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="md:grid md:grid-cols-3 md:gap-x-5 md:col-span-5">
                                        <div class="mb-3">
                                            <label for="region" class="dark:text-white">Region</label>
                                            <select id="region" name="region_id" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " required>
                                                @foreach ($regions as $region)
                                                @if(old('region_id', $user->region->id) == $region->id)
                                                <option value=" {{ $region->id }}" selected>{{ $region->name }}</option>
                                                @else
                                                <option value=" {{ $region->id }}">{{ $region->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('region')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="kecamatan" class="dark:text-white">Kecamatan</label>
                                            <input type="text" name="kecamatan" id="kecamatan" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('kecamatan', $user->kecamatan) }}" required />
                                            @error('kecamatan')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="kelurahan" class="dark:text-white">Kelurahan</label>
                                            <input type="text" name="kelurahan" id="kelurahan" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="{{ old('kelurahan', $user->kelurahan) }}" required />
                                            @error('kelurahan')
                                            <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="md:col-span-3 class=" mb-3"">
                                        <label for="alamat" class="dark:text-white">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="{{ old('alamat', $user->alamat) }}" required />
                                        @error('alamat')
                                        <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="text-right md:col-span-5">
                                        <div class="inline-flex items-end gap-x-2">
                                            <button type="submit" class="text-white text-center bg-green-500 shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

@endsection
