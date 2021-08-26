@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Creacion de un post</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "post.store" )}}" method="post">

            @include('dashboard.post._form')
        
        </form>
    </div>
</div>

@endsection