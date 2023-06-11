@extends('home')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('productos.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" required >
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>

@endsection
