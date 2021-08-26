@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Creacion de una categoria</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "category.store" )}}" method="post">

            @include('dashboard.category._form')
            
        </form>
    </div>
</div>

@endsection