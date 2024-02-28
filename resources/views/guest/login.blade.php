<x-guest-layout>

    <div class="flex h-screen ">

        <!-- Left Pane -->
        <div class="items-center justify-center flex-1 hidden text-black bg-white lg:flex">
            <x-left-content />
        </div>

        <!-- Right Pane -->
        <div class="flex items-center justify-center w-full bg-gray-100 lg:w-1/2">
            <div class="w-full max-w-md p-6">
                <h1 class="mb-6 text-3xl font-semibold text-center text-black">Masukan Akun</h1>
                <h1 class="mb-6 text-sm font-semibold text-center text-gray-500">Timbang Tuntas, Kontrol Penuh: Selamat Datang di Dashboard Timbangan Digital Kami!
                </h1>
                <!-- FAILED LOGIN -->
                @if (session()->has('failedLogin'))
                <x-alert class="text-red-800 bg-red-100">
                    {{ session('failedLogin') }}
                    <x-slot:close class="text-red-500 bg-red-100 focus:ring-red-400 hover:bg-red-200 ">
                        </x-slot>
                </x-alert>
                @endif

                <!-- SUCCESSED REGISTER -->
                @if (session()->has('Registered'))
                <x-alert class="text-green-800 bg-green-100">
                    {{ session('Registered') }}
                    <x-slot:close class="text-green-500 bg-green-100 focus:ring-green-400 hover:bg-green-200 ">
                        </x-slot>
                </x-alert>
                @endif

                <form action="{{ route('login') }}" method="post" class="space-y-4">
                    @csrf

                    <!-- USERNAME -->
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" type="text" name="username" autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" />
                    </div>

                    <!-- PASSWORD -->
                    <div class="relative">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password" autocomplete="current-password" />
                        <x-svg-password />
                        <x-input-error :messages="$errors->get('password')" />
                    </div>

                    <div>
                        <x-submit-button type="submit" :name="__('Masuk')" />
                    </div>

                </form>


                <div class="mt-4 text-sm text-center text-gray-600">
                    <p>Belum punya akun ?
                        <a href="{{ route('register') }}" class="mx-1 text-black hover:underline">
                            {{ __('Daftar disini') }}
                        </a>
                    </p>
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
                $(this).html('<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />')
            } else {
                inputPassword.type = 'password'
                $(this).removeClass('text-black')
                $(this).addClass('text-gray-400')
                $(this).html('<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />')
            }

        })
    </script>

</x-guest-layout>
