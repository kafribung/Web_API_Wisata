<div class="position-relative form-group">
    <label for="img" class="">Foto</label>
    @empty(!$admin->img)
    <img src="{{ $admin->takeImg }}" alt="Error" width="100" for="img">
    @endempty
    <input name="img" id="img" placeholder="input your img" type="file" accept="image/*" class="form-control" autofocus>
    @error('img')
    <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>
<div class="position-relative form-group">
    <label for="nama" class="">Nama</label>
    <input name="name" id="nama" placeholder="nama pengguna" autocomplete="off" type="text" class="form-control" value="{{ old('name') ?? $admin->name }}">
    @if ($errors->has('name'))
        <small class="text-danger">{{ $errors->first('name') }}</small>
    @endif
</div>
<div class="position-relative form-group">
    <label for="email" class="">Email</label>
    <input name="email" id="email" placeholder="email pengguna" autocomplete="off" type="email" class="form-control" value="{{ old('email') ?? $admin->email }}">
    @error('email')
    <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>
<div class="position-relative form-group">
    <label for="password" class="">Password</label>
    <input name="password" id="password" placeholder="password pengguna" autocomplete="off" type="password" class="form-control">
    @error('password')
    <small class="text-danger">{{ $message }}</small> 
    @enderror
</div>
<div class="position-relative form-group">
    <label for="password_confirmation" class="">Konfirmasi Password</label>
    <input name="password_confirmation" id="password_confirmation" placeholder="password konfirmasi" autocomplete="off" type="password" class="form-control">
</div>