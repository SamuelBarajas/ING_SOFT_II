@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Creacion de un usuario administrador</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "user.store" )}}" method="post">

            @include('dashboard.user._form',['pasw' => true])
            
        </form>
    </div>
</div>

@endsection