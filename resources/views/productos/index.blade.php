@extends('layouts.plantilla')
@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Producto 1</td>
                        <td>$10.00</td>
                        <td>5</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Producto 2</td>
                        <td>$15.00</td>
                        <td>3</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <!-- Agrega aquí los demás registros de productos -->
                </tbody>
            </table>

            <div class="text-center">
                <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
            </div>
        </div>
    </div>
</div>


@stop
