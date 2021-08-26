@extends('dashboard.master')
@section('content')
    
@csrf

<div class="form-group">
    <label for="title">Titulo</label>
    <input readonly class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
    @error('title')
        <small class="text-danger">{{ $message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="url_clean">Url limpiar</label>
    <input readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{ $post->url_clean }}">
    @error('url_clean')
        <small class="text-danger">{{ $message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="content">Contenido</label>
    <textarea readonly class="form-control" name="content" id="content" row="3">{{ $post->content }}</textarea>
    @error('content')
        <small class="text-danger">{{ $message}}</small>
    @enderror
</div>
@endsection