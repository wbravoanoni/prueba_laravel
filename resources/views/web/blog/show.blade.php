@extends('web.blog.layout')

@section('content')
    <h1 class="px-2 py-2 text-center">Pagina principal web</h1>

    <x-web.blog.post.show :post="$post"/>
    

@endsection