<div>
    <!-- HEAD -->
    <div class="p-4 mb-5 bg-white block sm:flex items-center justify-between  border-gray-200 lg:mt-1.5 dark:bg-gray-800 shadow-md rounded-md dark:border-gray-700">
        <div class="w-full ">

            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Semua User</h1>

            <div class="sm:flex sm:items-center sm:justify-between ">
                <div class="items-center py-3 sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <!-- SEARCH -->
                    <form wire:model="search"">
                        <div class=" relative w-96 lg:mb-0">
                        <di class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </di>
                        <input type="text" wire:model.live="search" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autofocus placeholder="Cari User berdasarkan Nama">
                        @if ($search)
                        <span wire:click="resetSearch" class="absolute inset-y-0 inline-flex items-center -ml-px overflow-hidden text-sm font-medium leading-5 text-gray-500 cursor-pointer end-0 dark:text-gray-300 dark:bg-none me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>

                        </span>
                        @endif
                    </form>
                </div>
                <!-- -------------------------------------------------- -->
            </div>
            <!-- CREATE USER -->
            <div class="sm:divide-x sm:divide-gray-100 dark:divide-gray-700">
                <a href="{{ route('admin.create') }}" class="text-white bg-blue-700 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"">
                                <svg class=" w-3.5 h-3.5 me-3 text-white dark:text-white " aria-hidden=" true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                    Buat User Baru
                </a>
            </div>
            <!-- ------------------------------------------------------ -->
        </div>
    </div>
</div>
<!-- ------------------------------ -->

@if (session()->has('deleted'))
<x-alert-delete-user>
    {{ session('deleted') }}
</x-alert-delete-user>
@endif


@if (session()->has('stored'))
<x-alert-store-user>
    {{ session('stored') }}
</x-alert-store-user>
@endif

<!-- TABLE -->
@if ($users->count())
<div class="overflow-x-auto shadow-md">
    <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 rounded-md dark:divide-gray-700 dark:bg-gray-800">
        <thead class="text-left">
            <tr>
                <th class="px-5 py-5 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                    No
                </th>
                <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex items-center justify-between ">
                        <a wire:click="sort('created_at')" class="cursor-pointer">
                            Nama Lengkap
                        </a>
                        <a wire:click="sort('name')" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg></a>

                    </div>
                </th>
                <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex items-center justify-between ">
                        Pekerjaan
                        <a wire:click="sort('pekerjaan')" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </a>
                    </div>
                </th>
                <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex items-center justify-between ">
                        Jenis Kelamin
                        <a <a wire:click="sort('jeniskelamin')" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </a>
                    </div>
                </th>
                <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex items-center justify-between ">
                        Region
                        <a <a wire:click="sort('region_id')" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg>
                        </a>
                    </div>
                </th>
                <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Registrasi
                </th>
                <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($users as $key => $user )
            <tr wire:key="{{ $user->id }}">
                <td class="px-5 py-2 text-center text-gray-700 whitespace-nowrap dark:text-gray-200">
                    {{ $users->firstItem() + $key  }}
                </td>
                <td class="px-10 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span class="block text-sm">
                        {{ $user->name }}
                    </span>
                    <span class="text-xs text-slate-500 ">
                        {{ $user->type }}
                    </span>
                </td>

                <td class="px-10 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                    {{ $user->pekerjaan?: '-' }}
                </td>
                <td class="px-10 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                    {{ $user->jeniskelamin ?: '-' }}
                </td>
                <td class="px-10 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                    {{ $user->region->name ?: '-' }}
                </td>
                <td class="px-10 py-2 text-gray-700 whitespace-nowrap dark:text-gray-200">
                    {{ $user->created_at->format('l, j M H:i')  }}
                </td>

                <td class="px-10 py-2 whitespace-nowrap">
                    <span class="inline-flex -space-x-px overflow-hidden bg-white border rounded-md shadow-sm dark:border-gray-800 dark:bg-gray-900">
                        <a href="{{ route('admin.show', $user->username) }}" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-100 focus:relative dark:text-gray-200 dark:hover:bg-green-800">
                            Lihat
                        </a>
                        <button wire:click="delete({{ $user->id }})" href="{{ route('admin.user.delete', $user->username) }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-red-100 focus:relative dark:text-gray-200 dark:hover:bg-red-800">
                            Hapus
                        </button>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="flex items-center justify-center p-4 px-4 mb-6 md:p-8">
    <div class="flex items-center p-4 mb-4 text-sm text-red-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 inline w-7 h-7 me-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <h1 class="text-3xl font-medium text-red-800dark:text-red-400">
                Belum ada user yang mendaftar
            </h1>
        </div>
    </div>
</div>
@endif
<!-- ------------------------------- -->
<div class="p-5 text-white ">
    {{ $users->links('vendor.pagination.custom') }}
</div>

@script
<script>
    $wire.on("delete:confirm", (event) => {
        const words = event.userName.trim().split(' ');
        const firstTwoWords = words.slice(0, 2).join(' ');
        Swal.fire({
            title: `${firstTwoWords} akan di hapus`,
            text: "Kamu yakin ingin menghapus data ini ?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya , Hapus!",
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.deleteUser(event.userId)
                Swal.fire({
                    title: "User berhasil di hapus ! ",
                    icon: "success",
                    timer: 1000,
                    showConfirmButton: false,
                    allowEscapeKey: false
                });
            }
        })
    });
</script>
@endscript
</div>
