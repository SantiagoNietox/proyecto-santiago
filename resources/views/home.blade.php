@extends('layouts.plantilla')

@section('contenido')


@extends('plantilla')

@section('contenido')
    <div class="container">
        <h1>Bienvenidos</h1>

        <h2>Productos</h2>

        <div class="row">
            @foreach($productos as $producto)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="ruta/imagen.jpg" class="card-img-top" alt="Imagen del producto">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ $producto->descripcion }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection



@endsection
