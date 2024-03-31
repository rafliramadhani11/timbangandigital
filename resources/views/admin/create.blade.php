@extends('layouts.main')

@section('content')
@include('partials.navbar')

<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">

    <div class="px-2 pt-4 border-gray-200 rounded-lg mt-14">

        <a href="{{ route('admin.users') }}" class="inline-flex items-center justify-center p-2 mb-5 text-base font-medium text-gray-500 rounded-lg shadow-md bg-white hover:bg-gray-100  transition duration-200">
            <svg class="w-6 h-6 text-gray-500 me-3 hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"></path>
            </svg>
            <span class="w-full">Kembali</span>
        </a>

        <livewire:admin.create-user />

    </div>

</div>

@endsection