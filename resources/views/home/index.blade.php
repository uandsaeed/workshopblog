
@extends('layouts.master')
@section('pageContent')
    <!-- Blog Entries Column -->

    <div  class="col-md-8">

        <h1 class="page-header">
            Welcome to Home,
            <small>Laravel Blog helpful for beginners</small>
        </h1>
        <div id="postDataContainer">
            {!! $postList !!}
        </div>
    </div>

@stop

@section('rightBar')
    @include('layouts.side-widgets')
@stop

@section('footerAssets')
    <script>
        $('form').submit(function (e) {
            e.preventDefault();
            var urlVal = $(this).attr('action');
            var frmData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: urlVal,
                data: frmData,
                success: function (response) {
                    $('#postDataContainer').html(response);
                }

            })
        })
    </script>
@stop