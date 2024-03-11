@extends('layouts.main')

@section('content')
@include('partials.navbar')
<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">

    <div class="px-2 pt-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">

        <a href="{{ route('user.show', $user->username) }}" class="inline-flex items-center justify-center p-2 mb-5 text-black font-semibold  bg-white rounded-lg shadow-md hover:bg-gray-100 ">
            <svg class="w-6 h-6 text-gray-500 me-3 hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
            </svg>
            <span class="w-full">Kembali</span>
        </a>

        <div class="mb-5 bg-white px-8 py-4 rounded-lg shadow-md text-black">
            <p class="text-xl font-semibold ">Data Orang Tua</p>
            <p class="text-gray-400 text-sm">Silahkan di isi dengan benar</p>
        </div>
        <div class="p-8 mb-6 bg-white lg:w-1/2 rounded-lg shadow-md ">
            <div class="grid grid-cols-1 text-sm ">
                <form method="post" action="{{ route('user.update', $user->username) }}" class="lg:col-span-2 ">
                    @method('patch')
                    @csrf
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-5 ">
                        <div class="md:grid md:grid-cols-2 lg:grid-cols-3  md:gap-x-5">
                            <div class="mb-3">
                                <label for="name" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('name', $user->name) }}" required autofocus />
                                @error('name')
                                <small class="text-xs text-red-500 ">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type" class="block text-sm font-medium text-slate-700">Orang Tua</label>
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
                            <div class="mb-3">
                                <label for="jeniskelamin" class="block text-sm font-medium text-slate-700">Jenis Kelamin</label>
                                <select id="jeniskelamin" name="jeniskelamin" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" required>
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
                                <small class="text-xs text-red-500 ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nohp" class="block text-sm font-medium text-slate-700 ">No Handphone</label>
                                <input type="number" name="nohp" id="nohp" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('nohp', $user->nohp) }}" required placeholder="cth: 085895245344" />
                                @error('nohp')
                                <small class="text-xs text-red-500 ">{{$message}}
                                </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgllahir" class="block text-sm font-medium text-slate-700">Tanggal Lahir</label>
                                <input type="date" name="tgllahir" id="tgllahir" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('tgllahir', $user->tgllahir) }}" required />
                                @error('tgllahir')
                                <small class="text-xs text-red-500 ">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="block text-sm font-medium text-slate-700">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('pekerjaan', $user->pekerjaan) }}" required />
                                @error('pekerjaan')
                                <small class="text-xs text-red-500 ">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="region" class="block text-sm font-medium text-slate-700">Region</label>
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
                                <label for="kecamatan" class="block text-sm font-medium text-slate-700">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('kecamatan', $user->kecamatan) }}" required />
                                @error('kecamatan')
                                <small class="text-xs text-red-500 ">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kelurahan" class="block text-sm font-medium text-slate-700">Kelurahan</label>
                                <input type="text" name="kelurahan" id="kelurahan" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('kelurahan', $user->kelurahan) }}" required />
                                @error('kelurahan')
                                <small class="text-xs text-red-500 ">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-slate-700">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" value="{{ old('alamat', $user->alamat) }}" required />
                                @error('alamat')
                                <small class="text-xs text-red-500 ">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="text-white text-center bg-green-500 shadow-md hover:bg-green-600 w-full md:w-full focus:ring-4  focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection