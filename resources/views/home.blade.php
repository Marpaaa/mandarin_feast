@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') ?? 'You are logged in!' }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endsection
