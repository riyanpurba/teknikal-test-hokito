@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center gap-4">
        <div class="col-md-8 col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="mb-0">Welcome, {{ Auth::user()->name }}!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
