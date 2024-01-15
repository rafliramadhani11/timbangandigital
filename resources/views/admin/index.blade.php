@extends('layout.main')

@section('content')
@include('partials.navbar')
<div class="flex pt-16 overflow-hidden min-h-screen bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">

        <main class="px-4 py-6">
            <div class=" p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8 ">
                {!! $userschart->container() !!}
            </div>
            <div class="lg:grid lg:grid-cols-3">
                <!-- <div class=" p-4 px-4 mb-6 bg-white rounded shadow-md dark:bg-gray-800 md:p-8 ">
                    {!! $imtchart->container() !!}
                </div> -->
            </div>
        </main>
    </div>
</div>

<script src=" {{ $userschart->cdn() }}"></script>
<!-- <script src=" {{ $imtchart->cdn() }}"></script> -->

{{ $userschart->script() }}
<!-- {{ $imtchart->script() }} -->
@endsection
