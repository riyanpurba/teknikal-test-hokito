<div class="form-group mb-4 d-flex flex-column align-items-start">
    <label for="name" class="control-label">Nama</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') ?? $user->name }}">
</div>
@error('name')
    <div class="invalid-feedback">Nama tidak boleh kosong !</div>
@enderror
<div class="form-group mb-4 d-flex flex-column align-items-start">
    <label for="email" class="control-label">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') ?? $user->email }}">
</div>
@error('status')
    <div class="invalid-feedback">Email tidak boleh kosong !</div>
@enderror
<div class="form-group mb-4 d-flex flex-column align-items-start">
    <label for="role" class="control-label">Role</label>
    {!! Form::select('roles', $roles,[], array('class' => 'form-control')) !!}
</div>
@error('status')
    <div class="invalid-feedback">Pilih Group User !</div>
@enderror
<div class="form-group mb-4 d-flex flex-column align-items-start">
	<label class="control-label">Status</label>
	<div class="selectgroup selectgroup-pills d-flex align-items-center gap-4">
		<label class="selectgroup-item">
			<input type="radio" name="status" value="1" class="selectgroup-input" {{ $user->status == 1 ? 'checked' : '' }}>
			<span class="selectgroup-button selectgroup-button-icon">Active</span>
		</label>
		<label class="selectgroup-item">
			<input type="radio" name="status" value="0" class="selectgroup-input" {{ $user->status == 0 ? 'checked' : '' }}>
			<span class="selectgroup-button selectgroup-button-icon">Not Active</span>
		</label>
	</div>
	@error('status')
    	<div class="invalid-feedback">Pilih Status Users !</div>
  	@enderror
</div>
<div class="form-group text-left">
	<button type="submit" class="btn btn-primary">Simpan</button>
</div>