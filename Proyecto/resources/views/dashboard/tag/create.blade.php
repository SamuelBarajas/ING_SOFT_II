@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Creacion de un tag</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "tag.store" )}}" method="post">

            @include('dashboard.tag._form')
            
        </form>
    </div>
</div>

@endsection