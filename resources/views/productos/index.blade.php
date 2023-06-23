@extends('layouts.plantilla')




@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Productos

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-12 text-center">
                            @role ('admin')
                            <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
                            @endrole
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($registros as $registro)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ $registro->imagen }}" class="card-img-top img-fluid" alt="Imagen del producto">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $registro->name }}</h5>
                                    <p class="card-text">Precio: {{ $registro->price }}</p>
                                    <p class="card-text">Cantidad: {{ $registro->amount }}</p>
                                    <p class="card-text">Categoría: {{ $registro->cname }}</p>
                                    <p class="card-text">Subcategoría: {{ $registro->subname }}</p>
                                    @role ('admin')
                                    <div class="text-center">
                                        <a href="{{ route('productos.edit', $registro->id) }}" class="btn btn-primary">Editar</a>
                                        <form action="{{ route('productos.destroy', $registro->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete_confirm" id="delete-btn-{{ $registro->id }}">Eliminar</button>
                                        </form>
                                    </div>
                                    @endrole
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')



<script>
   $(document).on('click', '.delete_confirm', function(event) {


    setInterval(() => {

    }, );
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: "Seguro?",
        text: "Una vez eliminado, no podrás recuperar este registro!",
        icon: "warning",
        buttons: {
            cancel: "Cancelar",
            confirm: {
                text: "Aceptar",
                value: true,
                className: "swal-button--danger",
            },
        },
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
    swal("Eliminado correctamente", {
      icon: "success",
    });
  } else {
    swal("Operación cancelada!");
  }
    });
});

 </script>

@endsection


