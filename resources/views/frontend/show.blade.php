@extends('frontend.app')

@section('content')
<main class="mb-5 pb-5">
    <!-- Title -->
    <h1 class="mt-4">{{ $article->title }}</h1>

    <!-- Author -->
    <div class="lead">By <span class="text-muted">{{ $article->author->name }}</span></div>

    <!-- Date/Time -->
    <div class="text-sm">{{ $article->createtime }}</div>
    <hr>

    <!-- Post Content -->
    <div class="text-justify px-3">{!! $article->description !!}</div>
    <hr>

    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('weblog.comment') }}">
                @csrf

                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="by" placeholder="Anonymous">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="text" placeholder="Your Comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    @foreach ($article->comments as $comment)
    <!-- Single Comment -->
    <div class="media mb-4">
        <div class="media-body px-5">
            <h5 class="mt-0">{{ $comment->by }}<span class="ml-2 text-sm text-muted">{{ $comment->lastupdate }}</span></h5> 
            {{ $comment->text }}
        </div>
    </div>
        
    @endforeach
</main>
@endsection
