@extends('layouts.plantilla')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table id="productos-table" class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registros as $registro)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $registro->name }}</td>
                                <td>{{ $registro->price }}</td>
                                <td>{{ $registro->amount }}</td>
                                <td> </td>
                                <td>
                                    <a href="{{route('productos.edit', $registro ->id)}}" class="btn btn-sm btn-primary">Editar</a>




                                    <form action="{{ route('productos.destroy', $registro->id) }}" method="POST"
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
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
            </div>
        </div>
    </div>
@stop
