@extends('layout.main')

@section('content')
<div class="flex h-screen ">

    <!-- Left Pane -->
    <div class="items-center justify-center flex-1 hidden text-black bg-white  lg:flex">
        <div class="max-w-3xl text-center ">
            <img src="{{ asset('img/login.jpg') }}" alt="" class="object-contain">

        </div>
    </div>
    <!-- Right Pane -->
    <div class="flex items-center justify-center w-full bg-gray-100 lg:w-1/2">
        <div class="w-full max-w-md p-6">
            <h1 class="mb-6 text-3xl font-semibold text-center text-black">Masukan Akun</h1>
            <h1 class="mb-6 text-sm font-semibold text-center text-gray-500">Timbang Tuntas, Kontrol Penuh: Selamat Datang di Dashboard Timbangan Digital Kami!</h1>

            <!-- FAILED LOGIN -->
            @if (session()->has('failedLogin'))
            <div id="alert-2" class="flex items-center justify-start px-4 py-2 text-red-800 rounded-lg bg-red-100 " role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <small class="ms-3 font-semibold">
                    {{ session('failedLogin') }}
                </small>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif

            <!-- SUCCESSED REGISTER -->
            @if (session()->has('Registered'))
            <div id="alert-3" class="flex items-center w-1/2 p-3 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('Registered') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif


            <!-- FORM -->
            <form action="{{ route('authlogin') }}" method="post" class="space-y-4">
                @csrf
                <div>
                    <span class="block text-sm font-medium text-slate-700">Username</span>
                    <input type="text" name="username" class="block w-full px-3 pt-2 mt-1 text-sm bg-white border rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:border-orange-400 focus:ring-1 focus:ring-orange-400 text-black" placeholder="johndee1234" value="{{ old('username') }}" autofocus required />
                </div>
                <div class="relative">
                    <span class="block text-sm font-medium text-slate-700 ">Password</span>
                    <input type="password" id="password" name="password" class="block w-full p-2 mt-1 text-sm bg-white border rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:border-orange-400 focus:ring-1 focus:ring-orange-400 text-black" required>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute right-3 top-[2.1rem] cursor-pointer text-gray-400" id="notShow">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </div>
                <div>
                    <button type="submit" class="w-full p-2 text-white transition-colors duration-300 bg-orange-500 rounded-md hover:bg-orange-800 focus:outline-none focus:bg-orange-500 focus:ring-2 focus:ring-offset-2 focus:ring-orange-300">Masuk</button>
                </div>
            </form>
            <!-- END FORM -->
            <div class="mt-4 text-sm text-center text-gray-600">
                <p>Belum punya akun ?<a href="{{ route('register') }}" class="mx-1 text-black hover:underline">Daftar disini</a>
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
@endsection
