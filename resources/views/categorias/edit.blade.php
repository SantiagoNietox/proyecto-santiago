@extends('layouts.plantilla')
@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Editar producto</div>
                    <div class="card-body">
                        <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="id">ID:</label>
                                <input type="text" class="form-control" name="id" value="{{ $categoria->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" name="name" value="{{ $categoria->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="precio">Descripcion</label>
                                <input type="text" class="form-control" name="description" value="{{ $categoria->description }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
