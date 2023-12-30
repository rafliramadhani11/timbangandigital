@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex pt-16 overflow-hidden min-h-screen bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6 ">

            <a href="{{ route('admin.users') }}" class="inline-flex items-center justify-center p-2 mb-5 text-base font-medium text-gray-500 rounded-lg shadow-sm bg-gray-50 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-6 h-6 text-gray-500 me-3 hover:text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
                </svg>
                <span class="w-full">Kembali</span>
            </a>


            <div class="p-5 bg-white rounded-md shadow-md dark:bg-gray-800 lg:w-1/2 md:w-full">

                <div class="p-5 lg:px-10 ">
                    <h6 class="mb-10 text-3xl font-bold dark:text-white">
                        Buat User Baru
                    </h6>
                    <form method="post" action="{{ route('admin.store') }}">
                        @csrf
                        <div class="gap-4 md:grid md:grid-cols-2">
                            <!-- USERNAME -->
                            <div class="mb-5">
                                <label for="username" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="johndee123" value="{{ old('username') }}" required>
                                @error('username')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- ----------------- -->
                            <!-- PASSWORD -->
                            <div class="mb-5">
                                <label for="password" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <!-- ------------------- -->
                        </div>
                        <!-- NAMA LENGKAP -->
                        <div class="mb-5">
                            <label for="name" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Dee" value="{{ old('name') }}" required>
                            @error('name')
                            <span class="text-xs text-red-500">Salah menginput nama</span>
                            @enderror
                        </div>
                        <!-- ---------------------------- -->
                        <div class="gap-4 md:grid md:grid-cols-3">
                            <!-- TIPE ORANG TUA -->
                            <div class="mb-5">
                                <label for="type" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Orang Tua</label>
                                <select id="type" name="type" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " required>
                                    @if(old('type'))
                                    <option value="{{ old('type') }}" selected>{{ old('type') }}</option>
                                    @else
                                    <option selected disabled></option>
                                    @endif
                                    @foreach(['Ayah', 'Ibu', 'Wali'] as $option)
                                    @if($option)
                                    <option value="{{ $option }}" {{ (old('type' ) == $option) ? 'selected' : '' }}>{{ $option }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('type')
                                <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- ------------------------------------- -->
                            <!-- JENIS KELAMIN -->
                            <div class="mb-5">
                                <label for="jeniskelamin" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                <select id="jeniskelamin" name="jeniskelamin" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " required>
                                    @if(old('jeniskelamin'))
                                    <option value="{{ old('jeniskelamin') }}" selected>{{ old('jeniskelamin') }}</option>
                                    @else
                                    <option selected disabled></option>
                                    @endif
                                    @foreach(['Laki Laki', 'Wanita'] as $option)
                                    @if($option)
                                    <option value="{{ $option }}" {{ (old('jeniskelamin' ) == $option) ? 'selected' : '' }}>{{ $option }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('jeniskelamin')
                                <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- ---------------------------------------- -->
                            <!-- REGION -->
                            <div class="mb-5">
                                <label for="region" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Region</label>
                                <select id="region" name="region_id" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " required>
                                    @if(old('region_id'))
                                    <option value="{{ old('region_id') }}" selected>{{ old('region') }}</option>
                                    @else
                                    <option selected disabled></option>
                                    @endif
                                    @foreach($regions as $region)
                                    @if($region)
                                    <option value="{{ $region->id }}" {{ (old('region_id' ) == $region->id) ? 'selected' : '' }}>{{ $region->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('region')
                                <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- ------------------------------------- -->
                        </div>

                        <div class="gap-4 md:grid md:grid-cols-3">
                            <!-- NO HANDPHONE -->
                            <div class="mb-5">
                                <label for="nohp" class="block dark:text-white">No Handphone</label>
                                <input type="number" name="nohp" id="nohp" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="cth 085123456789" value="{{ old('nohp') }}" required />
                                @error('nohp')
                                <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}
                                </small>
                                @enderror
                                </select>
                                @error('nohp')
                                <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- -------------------------------- -->
                            <!-- PEKERJAAN -->
                            <div class="mb-5">
                                <label for="pekerjaan" class="dark:text-white">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buruh" value="{{ old('pekerjaan') }}" required />
                                @error('pekerjaan')
                                <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- -------------------------- -->
                            <!-- TANGGAL LAHIR -->
                            <div class="mb-5">
                                <label for="tgllahir" class="dark:text-white">Tanggal Lahir</label>
                                <input type="date" name="tgllahir" id="tgllahir" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('tgllahir') }}" required />
                                @error('tgllahir')
                                <small class="text-xs text-red-500 dark:text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- ------------------------ -->
                        </div>

                        <div class="gap-4 md:grid md:grid-cols-2">
                            <!-- KECAMATAN -->
                            <div class="mb-5">
                                <label for="kecamatan" class="dark:text-white">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('kecamatan', $user->kecamatan) }}" placeholder="Dukuh Pakis" required />
                                @error('kecamatan')
                                <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- ----------------------------------- -->
                            <!-- KELURAHAN -->
                            <div class="mb-5">
                                <label for="kelurahan" class="dark:text-white">Kelurahan</label>
                                <input type="text" name="kelurahan" id="kelurahan" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Dukuh Pakis" value="{{ old('kelurahan', $user->kelurahan) }}" required />
                                @error('kelurahan')
                                <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- --------------------------------- -->
                        </div>

                        <!-- ALAMAT -->
                        <div class="mb-3">
                            <label for="alamat" class="dark:text-white">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Jl. Dukuh Pakis no.4 RT.1 RW.2" value="{{ old('alamat', $user->alamat) }}" required />
                            @error('alamat')
                            <small class="text-xs text-red-500 dark:text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- -------------------------------------- -->


                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg mt-3 text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"">
                                <svg class=" w-3.5 h-3.5 me-3 text-white dark:text-white " aria-hidden=" true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                            Buat User
                        </button>


                    </form>
                </div>
            </div>

            </section>


        </main>

    </div>

    @endsection
