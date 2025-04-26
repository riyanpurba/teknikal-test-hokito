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
                    <h5>Add Permission</h5>
                    <div class="card-header-form">
                        <a href="{{ URL::previous() }}" class="btn btn-md btn-info"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('permission.store') }}" method="post">
                        @csrf
                        @include('pages.permission.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
