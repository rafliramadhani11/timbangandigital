@extends('layout.main')

@section('content')
<div class="flex h-screen">
    <!-- Left Pane -->
    <div class="items-center justify-center flex-1 hidden text-black bg-white lg:flex">
        <div class="max-w-3xl text-center">
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
            <div id="alert-2" class="flex items-center justify-start px-4 py-2 text-red-800 rounded-lg bg-red-50 " role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <small class="ms-3 ">
                    {{ session('failedLogin') }}
                </small>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif

            <!-- SUCCESSED REGISTER -->
            @if (session()->has('Registered'))
            <div id="alert-3" class="flex items-center justify-start px-4 py-2 mb-4 text-green-800 bg-green-100 rounded-lg shadow-sm " role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <small class="font-semibold ms-3">{{ session('Registered') }}</small>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert-3" aria-label="Close">
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
                    <input type="text" name="username" class="block w-full px-3 pt-2 mt-1 text-sm bg-white border rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:border-orange-400 focus:ring-1 focus:ring-orange-400 " placeholder="johndee1234" value="{{ old('username') }}" autofocus required />
                </div>
                <div>
                    <span class="block text-sm font-medium text-slate-700 ">Password</span>

                    <input type="password" id="password" name="password" class="block w-full p-2 mt-1 text-sm bg-white border rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:border-orange-400 focus:ring-1 focus:ring-orange-400 " required>
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
@endsection
