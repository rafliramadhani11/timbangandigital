@extends('layout.main')

@section('content')
@include('partials.navbar')

<div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6">
            <!-- HEAD -->
            <div class="p-4 mb-5 bg-white block sm:flex items-center justify-between  border-gray-200 lg:mt-1.5 dark:bg-gray-900 dark:border-gray-700">
                <div class="w-full ">
                    <div class="mb-4">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Semua User</h1>
                    </div>
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="items-center gap-5 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                            <!-- SEARCH -->
                            <form class="mt-3 w-96 lg:mb-0" method="get" action="">
                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" name="search" id="search" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari berdasarkan Nama" autofocus>
                                </div>
                            </form>
                            <!-- ------------------------------------------------------ -->
                        </div>
                        <div class="items-center gap-5 sm:flex sm:divide-x sm:divide-gray-100 dark:divide-gray-700">
                            <a href="{{ route('admin.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg mt-3 text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"">
                                <svg class=" w-3.5 h-3.5 me-3 text-white dark:text-white " aria-hidden=" true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                                Buat User Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ------------------------------ -->
            <!-- TABLE -->
            @if ($users->count())
            <div id="allUser" class="overflow-x-auto">
                @if (session()->has('deleted'))
                <div id="alert-3" class="flex items-center w-1/2 p-4 mb-4 text-green-800 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="text-sm font-medium ms-3">
                        {{ session('deleted') }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                @endif
                @if (session()->has('stored'))
                <div id="alert-3" class="flex items-center w-1/2 p-4 mb-4 text-green-800 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="text-sm font-medium ms-3">
                        {{ session('stored') }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                @endif
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
                        @foreach ($users as $key => $user )
                        <tr>
                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                                {{ $users->firstItem() + $key  }}
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

                                    <form method="post" action="{{ route('admin.user.delete', $user->username) }}">
                                        @method('delete')
                                        @csrf
                                        <button href="{{ route('admin.user.delete', $user->username) }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-red-100 focus:relative dark:text-gray-200 dark:hover:bg-red-800" onclick="return confirm('Anda Yakin ingin mneghapus data tersebut ?')">
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
            <div id="findUser" class="overflow-x-auto">
                <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 dark:divide-gray-700 dark:bg-gray-900"> </table>
            </div>
            @else
            <div class="p-4 text-center text-red-800 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="text-2xl font-medium">User Tidak Ditemukan !</span>
            </div>
            @endif
            <!-- ------------------------------- -->
            <div id="links" class="p-5 text-white">
                {{ $users->links('vendor.pagination.tailwind') }}
            </div>
        </main>
    </div>
</div>

<script type="text/javascript">
    // LIVE SEARCH
    $('#search').on('keyup', function() {
        $value = $(this).val()
        if ($value) {
            $('#allUser').hide();
            $('#links').hide();
            $('#findUser').show();
        } else {
            $('#allUser').show();
            $('#links').show();
            $('#findUser').hide();
        }
        $.ajax({
            type: 'get',
            url: '{{ URL::to("search") }}',
            data: {
                'search': $value
            },
            success: function(data) {
                $('#findUser').html(data)
            }
        })
    })
</script>


@endsection
