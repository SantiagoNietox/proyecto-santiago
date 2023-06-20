@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($usuarios as $usuario)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{$usuario -> file}}" class="card-img-top" alt="Profile Picture"  width = '200px'   height= '200px'>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $usuario->name }}</h5>
                                    <p class="card-text">ID: {{ $usuario->id }}</p>
                                    <p class="card-text">Rol: {{ $userRoles[$usuario->id] }}</p>
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
