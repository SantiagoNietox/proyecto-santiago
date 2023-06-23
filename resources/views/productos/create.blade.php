@extends('layouts.plantilla')
@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Crear Producto</div>
                <div class="card-body">
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <select class="form-control" name="categoria_id" required>
                                <option value="">Seleccione una categoría</option>
                                @foreach ($categoria as $categorias)
                                    <option value="{{ $categorias->id }}"> {{ $categorias->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subcategoria">Subcategoría:</label>
                            <select class="form-control" name="subcategoria_id" required>
                                <option value="">Seleccione una categoría</option>
                                @foreach ($subcategoria as $subcategorias)
                                    <option value="{{ $subcategorias->id }}"> {{ $subcategorias->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control" name="imagen" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



