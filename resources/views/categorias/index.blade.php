@extends('layouts.plantilla')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categorías</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <th scope="row">{{ $categoria->id }}</th>
                                        <td>{{ $categoria->name }}</td>
                                        <td>{{ $categoria->description }}</td>
                                        <td>
                                            <a href="{{ route('categorias.edit', $categoria->id) }}"
                                                class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear Categoría</a>
            </div>
        </div>
    </div>
@endsection


