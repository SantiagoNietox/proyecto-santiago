@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Productos</div>
                <div class="card-body">
                    <table id="productos-table" class="table mt-3">
                        <thead>
                            <tr>
                                @role ('admin')
                                <th scope="col">ID</th>
                                @endrole
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Subcategoria</th>
                                @role ('admin')
                                <th scope="col">Acciones</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros as $registro)
                            <tr>
                                @role ('admin')
                                <td>{{ $registro->id }}</td>
                                @endrole
                                <td>{{ $registro->name }}</td>
                                <td>{{ $registro->price }}</td>
                                <td>{{ $registro->amount }}</td>
                                <td>{{ $registro->cname }}</td>
                                <td>{{ $registro->subname }}</td>

                                <td>
                                    @role ('admin')
                                    <a href="{{ route('productos.edit', $registro->id) }}" class="btn btn-sm btn-primary">Editar</a>

                                    <form action="{{ route('productos.destroy', $registro->id) }}" method="POST" class="d-inline">
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
            <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
        </div>
    </div>
    @endrole
</div>
@endsection
