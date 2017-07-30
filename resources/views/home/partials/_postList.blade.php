@if($posts)
    @if($posts->count())
        @foreach($posts as $post)
            <article class="post" data-postid="{{ $post->id }}">
                <!-- First Blog Post -->
                <h2>
                    <a href="{{ route('show', ['post_id' => $post->id]) }}">{{ $post->title }}
                        {{$post->getPostCategoriesName()}}
                    </a>
                </h2>
                <p class="lead">
                    by <a href="#"> {{ $post->user->name }}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
                <hr>
                <img class="img-responsive" src='assets/images/{{ $post->photo }}' alt="">
                <hr>
                <p>{{ $post->description }}</p>
                <a class="btn btn-primary" href="{{ route('show', ['post_id' => $post->id]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            </article>
        @endforeach
    @else
        <article class="post">
            <h4>There is no post found!</h4>
        </article>
    @endif
@else
    <article class="post">
        <h1>There is no post found!</h1>
    </article>
@endif
<!-- Pager -->
{!! $posts->links() !!}