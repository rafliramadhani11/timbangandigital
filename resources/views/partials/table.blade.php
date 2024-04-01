<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/css/app.css','resources/js/app.js'])


<table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200 ">
    <thead class="text-left">
        <tr>
            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                No
            </th>
            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                Nama Lengkap
            </th>

            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                Pekerjaan
            </th>
            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                Jenis Kelamin
            </th>
            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                Region
            </th>
            <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
            </th>
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-200 ">
        @foreach ($users as $key => $user )
        <tr>
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                {{ $users->firstItem() + $key  }}
            </td>
            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                <span class="block text-sm">
                    {{ $user->name }}
                </span>
                <span class="text-xs text-slate-500 ">
                    {{ $user->type }}
                </span>
            </td>

            <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                {{ $user->pekerjaan }}
            </td>
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                {{ $user->jeniskelamin ?: '-' }}
            </td>
            <td class="px-4 py-2 text-gray-700 whitespace-nowrap ">
                {{ $user->region->name ?: '-' }}
            </td>

            <td class="px-4 py-2 whitespace-nowrap">
                <span class="inline-flex -space-x-px overflow-hidden bg-white border rounded-md shadow-sm ">
                    <a href="{{ route('admin.show', $user->username) }}" class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-green-100 focus:relative  ">
                        Lihat
                    </a>
                    <form method="post" action="{{ route('admin.user.delete', $user->username) }}">
                        @method('delete')
                        @csrf
                        <button href="{{ route('admin.user.delete', $user->username) }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-red-100 focus:relative " onclick="return confirm('Kamu Yakin ingin menghapus data ? ')">
                            Hapus
                        </button>
                    </form>
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>