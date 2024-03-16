<div>
    <div class="px-4 md:pt-1 pt-1 pb-4 mb-5 bg-white   shadow-md rounded-lg ">
        <h1 class="text-xl pt-1 font-semibold text-gray-900 sm:text-2xl ">
            Semua User
        </h1>
        <div class="lg:flex md:items-center md:justify-between">
            <div class="mt-5 md:w-96 w-full sm:w-full">
                <form wire:model="search" class="md:flex items-center relative">
                    <input type="text" wire:model.live="search" class="block  text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 w-full focus:border-blue-500 " autofocus placeholder="Cari User berdasarkan Nama">
                    @if ($search)
                    <svg wire:click="resetSearch" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer absolute md:right-3 top-2.5 right-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    @endif
                    <svg class="w-4 h-4 absolute md:left-3 top-2.5 left-3 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </form>
            </div>

            <div class="mt-5">
                <a href="{{ route('admin.create') }}" class="text-white bg-blue-700 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg shadow-md text-sm px-5 py-2.5 text-center inline-flex items-center  transition duration-200">
                    <svg class=" w-3.5 h-3.5 me-3 text-white " aria-hidden=" true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                    Buat User Baru
                </a>

            </div>
        </div>
    </div>

    <!-- TABLE -->
    @if ($users->count())
    <div class="overflow-x-auto p-3 shadow-md bg-white rounded-lg ">
        <table class="min-w-full text-sm  divide-y-2 divide-gray-200 rounded-md ">
            <thead class="text-left">
                <tr>
                    <th class="px-5 py-5 font-medium text-center text-gray-900 whitespace-nowrap ">
                        No
                    </th>
                    <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap ">
                        <div class="flex items-center justify-between ">
                            <a wire:click="sort('created_at')" class="cursor-pointer">
                                Nama Lengkap
                            </a>
                            <a wire:click="sort('name')" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>

                        </div>
                    </th>
                    <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap ">
                        <div class="flex items-center justify-between ">
                            Pekerjaan
                            <a wire:click="sort('pekerjaan')" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap ">
                        <div class="flex items-center justify-between ">
                            Jenis Kelamin
                            <a <a wire:click="sort('jeniskelamin')" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap ">
                        <div class="flex items-center justify-between ">
                            Region
                            <a <a wire:click="sort('region_id')" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap ">
                        Registrasi
                    </th>
                    <th class="px-10 py-5 font-medium text-gray-900 whitespace-nowrap ">
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 ">
                @foreach ($users as $key => $user )
                <tr wire:key="{{ $user->id }}">
                    <td class="px-5 py-2 text-center text-gray-700 whitespace-nowrap ">
                        {{ $users->firstItem() + $key  }}
                    </td>
                    <td class="px-10 py-2 font-medium text-gray-900 whitespace-nowrap ">
                        <span class="block text-sm">
                            {{ $user->name }}
                        </span>
                        <span class="text-xs text-slate-500 ">
                            {{ $user->type }}
                        </span>
                    </td>

                    <td class="px-10 py-2 text-gray-700 whitespace-nowrap ">
                        {{ $user->pekerjaan?: '-' }}
                    </td>
                    <td class="px-10 py-2 text-gray-700 whitespace-nowrap ">
                        {{ $user->jeniskelamin ?: '-' }}
                    </td>
                    <td class="px-10 py-2 text-gray-700 whitespace-nowrap ">
                        {{ $user->region->name ?: '-' }}
                    </td>
                    <td class="px-10 py-2 text-gray-700 whitespace-nowrap ">
                        {{ $user->created_at->format('l, j M H:i')  }}
                    </td>

                    <td class="px-10 py-2 whitespace-nowrap">
                        <span class="inline-flex -space-x-px overflow-hidden bg-white border rounded-md shadow-sm ">
                            <a href="{{ route('admin.show', $user->username) }}" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-100 focus:relative  ">
                                Lihat
                            </a>
                            <button wire:click="delete({{ $user->id }})" href="{{ route('admin.user.delete', $user->username) }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-red-100 focus:relative  ">
                                Hapus
                            </button>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-5 pb-3 mt-5 ">
        {{ $users->links('vendor.pagination.custom') }}
    </div>

    @else
    <div class="flex items-center  justify-center p-4 px-4 mb-6 md:p-8">
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 " role="alert">
            <div>
                <h1 class="text-3xl font-medium text-red-800">
                    Tidak ada User
                </h1>
            </div>
        </div>
    </div>
    @endif
    <!-- ---------------------- -->


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