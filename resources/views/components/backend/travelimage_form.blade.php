<div class="position-relative form-group">
    <label for="img" class="">Gambar</label>
    @empty(!$travel->img)
    <img src="{{ $travel->takeImg }}" alt="Error" width="100" for="img">
    @endempty
    <input name="img" id="img"  type="file" accept="image/*" class="form-control" autofocus>
    @error('img')
    <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>