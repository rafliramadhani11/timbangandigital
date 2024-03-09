@extends('layouts.main')

@section('content')
@include('partials.navbar')
<div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">
    <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
        <livewire:admin.user-table />
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