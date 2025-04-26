@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center gap-4">
        <div class="col-md-8 col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Update User</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="post" class="needs-validation" novalidate="" id="formBrand" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        @include('pages.users.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
