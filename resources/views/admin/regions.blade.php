@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6">

            <!-- HEADER -->
            <div class="p-4 mb-5 bg-white block sm:flex items-center justify-between  border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                <div class="w-full mb-1 ">
                    <div class="mb-4">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">{{ $region->name }}</h1>
                    </div>
                    <div class="sm:flex">
                        <div class="items-center gap-5 mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                            <!-- Dropdown menu Regions -->
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Cari Berdasarkan Kota<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    @foreach ($regions as $region)
                                    <li>
                                        <a href="/dashboard/admin/users/regions/{{ $region->slug }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $region->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- ------------------------------------- -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- ------------------------------------- -->
            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                    <thead class="text-left">
                        <tr>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nama Lengkap
                            </th>

                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Pekerjaan
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Jenis Kelamin
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Region
                            </th>
                            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($regions[0]->users as $user)
                        <tr>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $loop->iteration  }}
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <span class="block text-sm">
                                    {{ $user->name }}
                                </span>
                                <span class="text-xs text-slate-500 ">
                                    {{ $user->type }}
                                </span>
                            </td>

                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $user->pekerjaan }}
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $user->jeniskelamin ?: '-' }}
                            </td>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $user->region->name ?: '-' }}
                            </td>

                            <td class="px-4 py-2 whitespace-nowrap">
                                <span class="inline-flex -space-x-px overflow-hidden bg-white border rounded-md shadow-sm dark:border-gray-800 dark:bg-gray-900">
                                    <a href="{{ route('admin.show', $user->username) }}" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-100 focus:relative dark:text-gray-200 dark:hover:bg-green-800">
                                        Lihat
                                    </a>
                                    <form action="{{ route('admin.user.delete', $user->username) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-red-100 focus:relative dark:text-gray-200 dark:hover:bg-red-800" onclick="return confirm('Kamu yakin ingin menghapus data tersebut ?')">
                                            Hapus
                                        </button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- ------------------------------------- -->

        </main>
    </div>
</div>
@endsection
