@extends('backend.app')

@section('content')

<div class="card">
    <div class="card-header">Manage Articles</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <h3>Search:</h3>
            </div>
            <div class="col-md-10">
                <select class="select2 w-100" name="article" id="article">
                    <option value="-1" selected disabled>Search by Title</option>
                    @foreach ($articles as $article)
                    <option value="{{ $article->slug }}">{{ $article->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer text-danger">Note: You can only search by Title of Articles.</div>
</div>

<div class="card">
    <div class="card-header text-lg">Article List

        @can('delete articles')
        <div id="delButton" class="float-right"></div>
        @endcan
    </div>
    
    

    <div class="card-body">
        <dl>
            <div class="row">
                <dt class="col-sm-1 text-right">Title</dt>
                <dd class="col-sm-11" id="title">--</dd>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <dt class="col-sm-2 text-right">Author</dt>
                        <dd class="col-sm-10" id="author">--</dd>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <dt class="col-sm-2 text-right">Status</dt>
                        <dd class="col-sm-10" id="status">--</dd>
                    </div>
                </div>
            </div>
            <dt>Description</dt>
            <dd id="description" class="card-body"></dd>
        </dl>
    </div>
</div>
@endsection


@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    dt::after {
        content: " :";
    }

</style>
@endsection


@section('js')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Page script -->
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

</script>

<!-- Ajax -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        // show user data
        $('#article').on('change', function (e) {
            var slug = e.target.value;

            $.ajax({
                url: "{{ route('ajax.getArticle') }}",
                type: "POST",
                data: {
                    slug: slug
                },

                success: function (data) {
                    $('#title').html(data.article.title)
                    $('#author').html(data.article.name)
                    let status = data.article.is_published ? "published" : "drafted";
                    $('#status').html(status)
                    $('#description').html(data.article.description)

                    if(data) {
                        console.log("hi");
                        $("#delButton").html("<a id='delLink' class='btn btn-danger' href='#'><i class='fas fa-trash'></i></a>"+
                        "<form id='delArticle' method='POST' action='http://localhost:8000/article/"+data.article.slug+ "'> <input type='hidden' name='_token' value='{{ csrf_token() }}''> <input type='hidden' name='_method' value='DELETE'>  </form>")

                        $('#delLink').on('click', function (e) { 
                            e.preventDefault();
                            $('#delArticle').submit();
                         })
                    }

                    console.log(data.article);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            })
        });


    });

</script>

@endsection
