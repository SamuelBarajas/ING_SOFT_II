@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Usuario: {{$user->name}}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "user.update",$user->id )}}" method="post">
            @method('put')
            @include('dashboard.user._form',['pasw' => false])
        </form>
    </div>
</div>

@endsection