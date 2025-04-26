@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center gap-4">
        @if(session('success'))
        <div class="box-body">
            <div class="alert alert-success alert-dismissible d-flex align-items-center justify-content-between">
                <p style="margin-bottom: 0;"><i class="icon fa fa-check"></i></i> {{ session('success') }}</p>
                <button type="button" class="close btn btn-danger" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="box-body">
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <div class="col-md-8 col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>List User</h5>
                    @can('users-create')
                    <div class="card-header-form">
                        <a href="{{ route('users.create') }}" class="btn btn-md btn-primary"id="modal_menu_level_1"><i class="fas fa-plus"></i> Add User</a>
                    </div>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles_name }}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="d-flex align-items-center gap-1">
                                        @canany(['users-edit', 'users-delete'])
                                            @can('users-edit')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                            @endcan
                                            @can('users-delete')
                                            <div class="bullet"></div>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post" id="form-{{ $user->id }}" onsubmit="return confirmDelete(event)">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" id="btn_delete">Hapus</button>
                                            </form>
                                            @endcan
                                        @else
                                            <span class="text-muted">-</span> {{-- Kasih tanda strip kalau tidak ada aksi --}}
                                        @endcanany
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    function confirmDelete(event) {
        if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            event.preventDefault(); // Stop submit form kalau user pilih Cancel
            return false;
        }
        return true;
    }
</script>
@endif

@endsection
