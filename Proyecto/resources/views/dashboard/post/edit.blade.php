@extends('dashboard.master')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Post: {{$post->title}}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "post.update",$post->id )}}" method="post">
            @method('put')
            @include('dashboard.post._form')
        </form>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Imagen del post</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "post.image",$post->id )}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Subir">
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-3">
                <img class="w-100" src="/images/{{$post->image->image}}">
            </div>
        </div>
    </div>
</div>
@endsection