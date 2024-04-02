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
                    @if ($errors->any())
                        <div>
                            <ul>
                                <li>
                                    @foreach ($errors->all() as $error)
                                        <x-alert class="text-red-800 bg-red-100">
                                            {{ $error }}
                                            <x-slot:close
                                                class="text-red-500 bg-red-100 focus:ring-red-400 hover:bg-red-200 ">
                                            </x-slot>
                                        </x-alert>
                                </li>
                    @endforeach
                    </ul>
                </div>
                @endif
                <h1 class="font-semibold text-black text-xl">
                    Hello {{ $user->name }}
                </h1>
                <p class="text-gray-500 text-base my-4">
                    Masukkan password baru Anda di bawah ini. Pastikan untuk mengingatnya dengan baik
                </p>
                <form action="" method="post">
                    @csrf
                    <div class="relative">
                        <label for="password" class="text-black text-sm font-medium">Password</label>
                        <input type="password" name="password" id="password"
                            class="block w-full px-3 pt-2 mt-1 text-sm text-black bg-white border border-gray-400 rounded-md shadow-sm focus:ring-1 focus:ring-red-500 focus:border-red-500"
                            required autofocus />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" id="notShow"
                            class="w-5 h-5 absolute right-3 top-[2.3rem] cursor-pointer text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>

                    </div>

                    <div class="mt-3 relative">
                        <label for="password_confirmation" class="text-black text-sm font-medium">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="block w-full px-3 pt-2 mt-1 text-sm text-black bg-white border border-gray-400 rounded-md shadow-sm focus:ring-1 focus:ring-red-500 focus:border-red-500"
                            required />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" id="notShow2"
                            class="w-5 h-5 absolute right-3 top-[2.3rem] cursor-pointer text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </div>
                    <button type="submit"
                        class="text-white mt-3 w-full bg-orange-500 hover:bg-orange-600 focus:outline-none shadow-md focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition duration-200">
                        Reset Password
                    </button>
                </form>
                <div class="text-sm mt-3">
                    <a href="/" class="font-medium text-blue-600  hover:underline">Login</a> / <a href="/register"
                        class="font-medium text-blue-600  hover:underline">Daftar</a>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script type="text/javascript">
        $('#notShow').on('click', function() {
            var inputPassword = document.getElementById('password')
            var icon = document.getElementById('notShow')
            if (inputPassword.type === 'password') {
                inputPassword.type = 'text'
                $(this).removeClass('text-gray-400')
                $(this).addClass('text-black')
                $(this).html(
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />'
                    )
            } else {
                inputPassword.type = 'password'
                $(this).removeClass('text-black')
                $(this).addClass('text-gray-400')
                $(this).html(
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />'
                    )
            }

        })

        $('#notShow2').on('click', function() {
            var inputPassword = document.getElementById('password_confirmation')
            var icon = document.getElementById('notShow2')
            if (inputPassword.type === 'password') {
                inputPassword.type = 'text'
                $(this).removeClass('text-gray-400')
                $(this).addClass('text-black')
                $(this).html(
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />'
                    )
            } else {
                inputPassword.type = 'password'
                $(this).removeClass('text-black')
                $(this).addClass('text-gray-400')
                $(this).html(
                    '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />'
                    )
            }

        })
    </script>
</x-guest-layout>
