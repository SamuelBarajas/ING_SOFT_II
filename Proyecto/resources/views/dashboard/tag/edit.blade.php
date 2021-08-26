@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tag: {{$tag->title}}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "tag.update",$tag->id )}}" method="post">
            @method('put')
            @include('dashboard.tag._form')
        </form>        
    </div>
</div>
@endsection