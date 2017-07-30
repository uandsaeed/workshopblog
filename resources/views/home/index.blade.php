
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