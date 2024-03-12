@extends('layouts.main')

@section('content')
@include('partials.navbar')

<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">

    <div class="px-2 pt-4 border-gray-200 rounded-lg mt-14">
        <a href="{{ route('admin.show', $user->username) }}" class="inline-flex items-center justify-center p-2 mb-5 text-base font-medium text-black rounded-lg shadow-md bg-white hover:bg-gray-100  transition duration-200">
            <svg class="w-6 h-6 me-3 hover:text-gray-900 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
            </svg>
            <span class="w-full">Kembali</span>
        </a>

        <div class="container max-w-screen-lg rounded-lg shadow-md">
            <div>
                <div class="p-4 px-4 mb-6 bg-white rounded-lg shadow-md md:p-8 ">
                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 md:gap-y-10 lg:grid-cols-3 ">
                        <div class="mb-5 text-gray-600 md:mb-0">
                            <p class="text-lg font-medium text-black">Data Orang Tua</p>
                            <p>Silahkan di isi dengan benar</p>
                        </div>

                        <form method="post" action="{{ route('admin.user.update', $user->username) }}" class="lg:col-span-2 ">
                            @method('put')
                            @csrf
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-5 ">

                                <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-x-5 md:col-span-5">
                                    <div class="mb-3">
                                        <label for="name" class="text-black">Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('name', $user->name) }}" required autofocus />
                                        @error('name')
                                        <small class="text-xs text-red-500 ">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="text-black">Tipe Orang Tua</label>
                                        <select id="type" name="type" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" required>
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
                                        <small class="text-xs text-red-500 ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="jeniskelamin" class="text-black">Jenis Kelamin</label>
                                        <select id="jeniskelamin" name="jeniskelamin" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" required>
                                            @if(old('jeniskelamin', $user->jeniskelamin) === $user->jeniskelamin)
                                            <option value="{{ old('jeniskelamin', $user->jeniskelamin) }}" selected>{{ old('jeniskelamin', $user->jeniskelamin) }}</option>
                                            @else
                                            <option selected disabled></option>
                                            @endif
                                            @foreach(['Laki - Laki', 'Wanita'] as $option)
                                            @if($option !== $user->jeniskelamin)
                                            <option value="{{ $option }}" {{ (old('jeniskelamin', $user->jeniskelamin) == $option) ? 'selected' : '' }}>{{ $option }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('jeniskelamin')
                                        <small class="text-xs text-red-500 ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 md:mb-0">
                                        <label for="nohp" class="block text-black">No Handphone</label>
                                        <input type="number" name="nohp" id="nohp" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('nohp', $user->nohp) }}" required placeholder="cth: 89123452124" />
                                        <small class="text-gray-500 ">
                                            cth: 085123456789
                                        </small>
                                        @error('nohp')
                                        <small class="text-xs text-red-500 ">{{$message}}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tgllahir" class="text-black">Tanggal Lahir</label>
                                        <input type="date" name="tgllahir" id="tgllahir" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('tgllahir', $user->tgllahir) }}" required />
                                        @error('tgllahir')
                                        <small class="text-xs text-red-500 ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="pekerjaan" class="text-black">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" id="pekerjaan" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('pekerjaan', $user->pekerjaan) }}" required />
                                        @error('pekerjaan')
                                        <small class="text-xs text-red-500 ">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="region" class="text-black">Region</label>
                                        <select id="region" name="region_id" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" required>
                                            @foreach ($regions as $region)
                                            @if(old('region_id', $user->region->id) == $region->id)
                                            <option value=" {{ $region->id }}" selected>{{ $region->name }}</option>
                                            @else
                                            <option value=" {{ $region->id }}">{{ $region->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('region')
                                        <small class="text-xs text-red-500 ">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="kecamatan" class="text-black">Kecamatan</label>
                                        <input type="text" name="kecamatan" id="kecamatan" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('kecamatan', $user->kecamatan) }}" required />
                                        @error('kecamatan')
                                        <small class="text-xs text-red-500 ">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelurahan" class="text-black">Kelurahan</label>
                                        <input type="text" name="kelurahan" id="kelurahan" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('kelurahan', $user->kelurahan) }}" required />
                                        @error('kelurahan')
                                        <small class="text-xs text-red-500 ">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="w-full grid col-span-1 md:col-span-5  -mt-3">
                                    <label for="alamat" class="text-black">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('alamat', $user->alamat) }}" required />
                                    @error('alamat')
                                    <small class="text-xs text-red-500 ">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="w-full shadow-md py-3 mt-3 mb-2 text-lg font-medium text-white bg-green-500 rounded-lg lg:text-sm lg:w-40 px-7 hover:bg-green-600 focus:ring-4 focus:ring-green-300 me-2 focus:outline-none  transition duration-200">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

@endsection