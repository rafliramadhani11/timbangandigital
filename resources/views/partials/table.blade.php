<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/css/app.css','resources/js/app.js'])


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
                        <button href="{{ route('admin.user.delete', $user->username) }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-red-100 focus:relative dark:text-gray-200 dark:hover:bg-red-800" onclick="return confirm('Kamu Yakin ingin menghapus data ? ')">
                            Hapus
                        </button>
                    </form>
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
