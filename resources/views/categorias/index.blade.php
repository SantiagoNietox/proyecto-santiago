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
                                    @role ('admin')
                                    <th scope="col">ID</th>
                                    @endrole
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    @role ('admin')
                                    <th scope="col">Acciones</th>
                                    @endrole
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        @role ('admin')
                                        <th scope="row">{{ $categoria->id }}</th>
                                        @endrole
                                        <td>{{ $categoria->name }}</td>
                                        <td>{{ $categoria->description }}</td>
                                        <td>
                                            @role ('admin')
                                            <a href="{{ route('categorias.edit', $categoria->id) }}"
                                                class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                            @endrole
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @role ('admin')
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear Categoría</a>
            </div>
        </div>
        @endrole
    </div>
@endsection


