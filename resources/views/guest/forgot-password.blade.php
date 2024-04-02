<x-guest-layout>
    <div class="flex h-screen ">

        <div class="flex items-center justify-center w-full">

            <div class="w-full max-w-md ">
                <div class="flex justify-center mb-6">
                    <x-chart-logo />

                    <span class="self-center font-semibold text-black text-3xl whitespace-nowrap ">Timbangan
                        Digital</span>
                </div>
                <div class=" p-7 bg-white rounded-lg shadow-md">
                    @if (session()->has('userUndefined'))
                        <x-alert class="text-red-800 bg-red-100">
                            {{ session('userUndefined') }}
                            <x-slot:close class="text-red-500 bg-red-100 focus:ring-red-400 hover:bg-red-200 ">
                            </x-slot>
                        </x-alert>
                    @endif
                    <h1 class="font-semibold text-black text-xl">Lupa Password ?</h1>
                    <p class="text-gray-500 text-base my-4">Lupa password ? Kami siap membantu Anda memulihkan akses ke
                        akun Anda.
                    </p>
                    <form action="" method="post">
                        @csrf
                        <label for="username" class="text-black text-sm font-medium">Username</label>
                        <input type="text" name="username" id="username"
                            class="block w-full px-3 pt-2 mt-1 text-sm text-black bg-white border border-gray-400 rounded-md shadow-sm focus:ring-1 focus:ring-red-500 focus:border-red-500"
                            placeholder="johndee123" required autofocus />
                        <button type="submit"
                            class="text-white mt-3 w-full bg-orange-500 hover:bg-orange-600 focus:outline-none shadow-md focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition duration-200">
                            Submit
                        </button>
                    </form>
                    <div class="text-sm mt-3">
                        <a href="/" class="font-medium text-blue-600  hover:underline">Login</a> / <a
                            href="/register" class="font-medium text-blue-600  hover:underline">Daftar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
