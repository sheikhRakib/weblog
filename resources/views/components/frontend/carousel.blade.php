<!-- Carousel -->
<div id="featured" class="carousel slide my-3" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#featured" data-slide-to="0" class="active"></li>
        <li data-target="#featured" data-slide-to="1" class=""></li>
        <li data-target="#featured" data-slide-to="2" class=""></li>
        <li data-target="#featured" data-slide-to="3" class=""></li>
        <li data-target="#featured" data-slide-to="4" class=""></li>
    </ol>
    <div class="carousel-inner">
        @forelse ($featured as $item)
        <div class="carousel-item p-5 @if($loop->first) active @endif" style="background-color: #44AEEB; height:25rem">
            <a class="d-block p-5 text-dark" href="{{ route('weblog.show', $item->slug) }}">
                <h4>{{ $item->title }}</h4>
                <p>{{ $item->lead }}</p>
            </a>
        </div>
        @empty
        <div class="carousel-item p-5 active" style="background-color: #44AEEB; height:25rem">
            <a class="d-block p-5 text-dark" href="#">
                <h4>Nothing to Show</h4>
                <p>- weblog team</p>
            </a>
        </div>
        @endforelse
    </div>

    <a class="carousel-control-prev" href="#featured" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#featured" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- ./Carousel -->
