
@extends('layouts.master')
@section('pageContent')
    <!-- Blog Entries Column -->



    <div class="col-md-8">

    <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>
        @foreach($posts as $post)
            <article class="post" data-postid="{{ $post->id }}">
    <!-- First Blog Post -->
    <h2>
        <a href="#">{{ $post->title }}{{ $post->category }}</a>
    </h2>
    <p class="lead">
        by <a href="#"> {{ $post->user->name }}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
    <hr>
    <img class="img-responsive" src='assets/images/{{ $post->photo }}' alt="">
    <hr>
    <p>{{ $post->description }}</p>
    {{--<a class="btn btn-primary" href="post">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>--}}

    <hr>
     </article>
  @endforeach
     <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>

</div>
@stop