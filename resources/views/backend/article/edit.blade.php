@extends('backend.app')

@section('content')
<div class="card">
    <div class="card-header text-center m-0 py-2">
        <h4 class="text-dark">Edit Article</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('article.update', $article->slug) }}">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="title" class="col-md-1 col-form-label text-md-right">Title</label>
                <div class="col-md-11">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title of the Article"
                        value="{{ $article->title }}">
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="summernote" id="description" name="description" rows="10"
                    style="resize:none;">{{ $article->description }}</textarea>

                <p class="text-sm mb-0 float-right">
                    <span>Editor: </span>
                    <a href="https://github.com/summernote/summernote">Summernote</a>
                </p>
            </div>

            <input type="submit" name='publish' class="btn btn-success" value="Publish" />            
            <input type="submit" name='save' class="btn btn-default" value="Save Draft" />
        </form>
    </div>
</div>
@endsection


@section('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('js')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Summernote -->
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: '25rem',
            disableResizeEditor: true,
            codemirror: {
                theme: 'monokai',
            },
        });
    });

</script>
@endsection
