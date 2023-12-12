@extends('dashboard.post.layout')

@section('content')

@section('title','Listar Categorias')
@section('titlePage','Listar Categoria')

<a href="{{route('category.create')}}">Crear Categoria</a>

<br><br>    

    <table class="table mb-3">
        <tbody>
            <tr>
                <td>Categorias</td>
                <td>Acciones</td>
            </tr>
        
        @foreach ($categories as $item)
            <tr><td>{{$item->title}}</td>
                <td>
                    <a class="mt-2 btn btn-primary" href="{{route('category.show',$item->id)}}">Ver</a>
                    <form action="{{route('category.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="mt-2 btn btn-danger" type="submit">Eliminar</button>
                    </form>
                    <a class="mt-2 btn btn-success" href="{{route('category.edit',$item->id)}}">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$categories->links()}}


@endsection