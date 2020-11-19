<!-- Collapsible Card -->
<div class="card card-default  @if($collapse) collapsed-card @endif">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas @if($collapse) fa-plus @else fa-minus @endif"></i></button>
        </div>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>

    <div class="card-footer">
    </div>
</div>
<!-- Collapsible Card -->
