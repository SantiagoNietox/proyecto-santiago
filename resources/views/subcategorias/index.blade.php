@extends('layouts.plantilla')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Subcategorías</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    @role ('admin')
                                    <th scope="col">ID</th>
                                    @endrole
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategorias as $subcategoria)
                                    <tr>
                                     @role ('admin')   
                                    <th scope="row">{{ $subcategoria->id }}</th>
                                    @endrole
                                        <td>{{ $subcategoria->name }}</td>
                                        <td>{{ $subcategoria->description }}</td>
                                        <td>{{$subcategoria->categoria->name}}</td>

                                        <td>
                                            @role ('admin')
                                            <a href="{{ route('subcategorias.edit', $subcategoria->id) }}"
                                                class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('subcategorias.destroy', $subcategoria->id) }}" method="POST"
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
                <a href="{{ route('subcategorias.create') }}" class="btn btn-primary">Crear Subcategoría</a>
            </div>
        </div>
        @endrole

@endsection


