@extends('dashboard.master')
@section('content')
    
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Usuario: {{$user->name}}</h4>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input readonly class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
            @error('name')
                <small class="text-danger">{{ $message}}</small>
            @enderror
        </div>
    </div>
</div>
@endsection