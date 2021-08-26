@extends('dashboard.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Categoria: {{$category->title}}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "category.update",$category->id )}}" method="post">
            @method('put')
            @include('dashboard.category._form')
        </form>        
    </div>
</div>
@endsection