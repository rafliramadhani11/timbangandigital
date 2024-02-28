@extends('layouts.main')

@section('content')
@include('partials.navbar')

<div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
    @include('partials.sidebar')
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <main class="px-4 py-6">
            <livewire:admin.user-table />
        </main>
    </div>
</div>

<script type="text/javascript">
    // LIVE SEARCH
    $('#search').on('keyup', function() {
        $value = $(this).val()
        if ($value) {
            $('#allUser').hide();
            $('#links').hide();
            $('#findUser').show();
        } else {
            $('#allUser').show();
            $('#links').show();
            $('#findUser').hide();
        }
        $.ajax({
            type: 'get',
            url: '{{ URL::to("search") }}',
            data: {
                'search': $value
            },
            success: function(data) {
                $('#findUser').html(data)
            }
        })
    })
</script>


@endsection
