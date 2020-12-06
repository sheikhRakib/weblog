@extends('frontend.app')

@section('content')
<main class="mb-5 pb-5">
    {{-- Carousel --}}
    <x-frontend.carousel :featured='$featured' />

    @forelse ($articles as $article)
    <!-- Blog Post -->
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('weblog.show', $article->slug) }}" class="text-secondary">
                <h3 class="card-title text-dark">{{ $article->title }}</h3>
                <br><span class="pl-5 text-muted">&mdash;&nbsp;{{ $article->author->name }}</span>

                <p class="card-text">{{ $article->lead }}</p>
            </a>
        </div>
    </div>
    <!-- ./Blog Post -->

    @empty
    <div class="card p-2 text-center">
        <div class="display-1">No Data</div>
    </div>
    @endforelse

    <!-- Pagination -->
    {{ $articles->links('pagination.articles') }}
</main>
@endsection
