@extends('dashboard.master')
@section('content')
    
<div class="form-group">
    <label for="title">Titulo</label>
    <input readonly class="form-control" type="text" name="title" id="title" value="{{ $tag->title }}">
    @error('title')
        <small class="text-danger">{{ $message}}</small>
    @enderror
</div>
@endsection