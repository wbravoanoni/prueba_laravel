@extends('dashboard.post.layout')

@section('content')

@section('title','Listar Categorias')
@section('titlePage','Listar Categoria')

<a href="{{route('category.create')}}">Crear Categoria</a>

<br><br>    

    <table border=1>
        <tbody>
            <tr>
                <td>Categorias</td>
                <td>Acciones</td>
            </tr>
        
        @foreach ($categories as $item)
            <tr><td>{{$item->title}}</td>
                <td>
                    <a href="{{route('category.show',$item->id)}}">Ver</a>
                    <form action="{{route('category.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">Eliminar</button>
                    </form>
                    <a href="{{route('category.edit',$item->id)}}">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$categories->links()}}


@endsection