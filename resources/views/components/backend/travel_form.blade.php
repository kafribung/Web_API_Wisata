<div class="position-relative form-group">
    <label for="bg" class="">BG</label>
    @empty(!$travel->bg)
    <img src="{{ $travel->takeImg }}" alt="Error" width="100" for="img">
    @endempty
    <input name="bg" id="bg"  type="file" accept="image/*" class="form-control" autofocus>
    @error('bg')
    <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>
<div class="position-relative form-group">
    <label for="nama" class="">Nama</label>
    <input name="name" id="nama" placeholder="nama wisata" autocomplete="off" type="text" class="form-control" value="{{ old('name') ?? $travel->name }}">
    @if ($errors->has('name'))
        <small class="text-danger">{{ $errors->first('name') }}</small>
    @endif
</div>
<div class="position-relative form-group">
    <label for="description" class="">Deskripsi</label>
    <textarea name="description" id="description" placeholder="deskripsi wisata" class="form-control" >{{ old('description') ?? $travel->description }}</textarea>
    @error('description')
    <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>
<div class="position-relative form-group">
    <label for="location" class="">Lokasi</label>
    <input name="location" id="location" placeholder="lokasi wisata" autocomplete="off" type="text" class="form-control" value="{{ old('location') ?? $travel->location }}">
    @error('location')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>