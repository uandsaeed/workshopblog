@extends('layouts.master')

@section('title') Posts Form @stop

@section('headAssets')
    <style>

    </style>
@stop

@section('pageContent')
    @include('post.includes.form')
@stop


@section('footerAssets')@stop
@section('scripts')
    <script>

        //    tinymce.init({
        //        selector : "textarea",
        //        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
        //        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        //    });
        //
        //    var description = document.getElementById("description");
        //    CKEDITOR.replace(description,{
        //        language:'en-gb'
        //    });
    </script>
@stop