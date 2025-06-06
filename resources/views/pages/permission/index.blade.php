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
                    <h5>List Permission</h5>
                    @can('permission-create')
                    <div class="card-header-form">
                        <a href="{{ route('permission.create') }}" class="btn btn-md btn-primary"id="modal_menu_level_1"><i class="fas fa-plus"></i> Add Permission</a>
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
                                    <th width="280px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($permission as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td class="d-flex align-items-center gap-1">
                                        @canany(['permission-edit', 'permission-delete'])
                                            @can('permission-edit')
                                            <a href="{{ route('permission.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                            @endcan
                                            @can('permission-delete')
                                            <div class="bullet"></div>
                                            <form action="{{ route('permission.destroy', $row->id) }}" method="post" id="form-{{ $row->id }}" onsubmit="return confirmDelete(event)">
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
