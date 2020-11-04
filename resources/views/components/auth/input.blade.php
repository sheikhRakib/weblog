<!-- {{ $id }} -->
<div class="input-group mb-3">
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" class="form-control @error($id) is-invalid @enderror"
        value="{{ old($id) }}" placeholder="{{ ucfirst($id) }}" required autofocus>
    <div class="input-group-append">
        <div class="input-group-text">
            <i class="fas {{ $icon }}"></i>
        </div>
    </div>
    @error($id)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<!-- ./{{ $id }} -->
