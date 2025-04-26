<div class="form-group mb-4">
    <label for="name" class="control-label">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama" value="{{ old('name') ?? $permission->name }}">
</div>
@error('name')
    <div class="invalid-feedback">Nama tidak boleh kosong !</div>
@enderror
<div class="form-group text-left">
	<button type="submit" class="btn btn-primary">Simpan</button>
</div>