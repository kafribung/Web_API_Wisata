<div class="position-relative form-group">
    <label for="email" class="">Img</label>
    @empty(!$band->img)
    <img src="{{ $band->takeImg }}" alt="Error" width="100">
    @endempty
    <input name="img" id="email" placeholder="input your img" type="file" accept="image/*" class="form-control" autofocus>
    @error('img')
        <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>
<div class="position-relative form-group">
    <label for="band" class="">Name</label>
    <input name="name" id="band" placeholder="band name" autocomplete="off" type="text" class="form-control" value="{{ old('name') ?? $band->name }}">
    @if ($errors->has('name'))
        <small class="text-danger">{{ $errors->first('name') }}</small>
    @endif
</div>
<div class="position-relative form-group">
    <label for="genre" class="">Genre</label>
    <select multiple  name="genre[]" id="genre" class="form-control genre">
        <optgroup label="Genre Old">
            @foreach ($band->genres as $genre)
                <option  disabled value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </optgroup>
        <optgroup label="Select Genre">
        @foreach ($genres as $genre)
            <option  value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
        </optgroup>
    </select>
    @error('genre')
        <small class="alert alert-danger">{{ $message }}</small>
    @enderror
</div>