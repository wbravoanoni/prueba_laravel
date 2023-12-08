@extends('dashboard.post.layout')

@section('content')

@section('title','Mostrar Categoria')
@section('titlePage','Mostrar Categoria')


<a href="{{route('category.index')}}">Regresar</a>

<h1>Nombre: {{$category->title}}</h1>
<h1>Slug: {{$category->slug}}</h1>
    
@endsection