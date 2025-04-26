<div class="form-group mb-4">
    <label for="name" class="control-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') ?? $role->name }}">
</div>
@error('name')
    <div class="invalid-feedback">Name tidak boleh kosong !</div>
@enderror
<div class="form-group mb-4">
    <label for="permision" class="control-label">Permission</label>
    <div class="col-4">
        @foreach($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
            {{ $value->name }}</label>
        <br/>
        @endforeach
    </div>
</div>
@error('permision')
    <div class="invalid-feedback">Select Permission !</div>
@enderror
<div class="form-group text-left">
	<button type="submit" class="btn btn-primary">Simpan</button>
</div>