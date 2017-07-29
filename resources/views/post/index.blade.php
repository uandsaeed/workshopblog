@extends('layouts.master')

@section('title') Posts Form @stop

@section('headAssets')
    <style>

    </style>
@stop
@section('pageContent')
    {{--@if($message)--}}
        {{--<h1>{{$message}}</h1>--}}
    {{--@endif--}}
    {{--All posts will be here {{ dd($posts)}}--}}
<div class="col-md-8">
    @if($post)
        {{--@foreach($posts as $post)--}}
            <article class="post" data-postid="{{ $post->id }}">
                <!-- First Blog Post -->
                <h2>
                    <a href="#">{{ $post->title }}
                    <?php
                        $categories = $post->categories()->get();
                        ?>
                        @if($categories)
                            @if($categories->count())
                                @foreach($categories as $c)
                                    {{ $c->name }},
                                @endforeach
                            @endif
                        @endif
                        <a class="btn btn-primary" href="{{ route('edit', ['post_id' => $post->id]) }}" style="float:right">Edit</a>
                        <a class="btn btn-danger" href="{{ route('delete', ['post_id' => $post->id]) }}" style="float:right">Delete</a>
                    </a>
                </h2>
                <p class="lead">
                    by <a href="#"> {{ $post->user->name }}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
                <hr>
                <img class="img-responsive" src='../assets/images/{{ $post->photo }}' alt="">
                <hr>
                <p>{{ $post->description }}</p>

                <hr>
            </article>
        {{--@endforeach--}}
    @endif
</div>
@stop


@section('footerAssets')@stop