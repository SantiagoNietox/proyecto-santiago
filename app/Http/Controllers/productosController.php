<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Subcategoria;
use Illuminate\Support\Facades\Session;


class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $registros = Producto::select('c.name as cname', 'sub.name as subname', 'productos.*')
            ->join('categoria as c', 'productos.categoria_id', 'c.id')
            ->join('Subcategorias as sub', 'productos.subcategorias_id', 'sub.id')
            ->where('productos.state', 1)->get();
        return view('productos.index', compact('registros'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategoria = Subcategoria::where('state', 1)->get();
        $categoria = Categoria::where('categoria.state', 1)->get();
        return view('productos.create', compact('categoria', 'subcategoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'imagen' => 'required|image',
        ]);
        $name = $request['imagen'] ->getClientOriginalName();
        $destino = 'images/productos';
        $imageName = $request['imagen']-> move($destino, $name);

        $Productos = new Producto();
        $Productos->name = $request->name;
        $Productos->price = $request->price;
        $Productos->amount = $request->amount;
        $Productos->subcategorias_id = $request->subcategoria_id;
        $Productos->categoria_id = $request->categoria_id;
        $Productos->state = 1;
        $Productos->imagen = $imageName;
        $Productos->save();

        return redirect(route('productos.index'))->with('success', 'El registro se ha creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {   $categoria = Categoria::Where ('state', 1)->get();
        $subcategoria = Subcategoria::Where ('state', 1)->get();
        return view('productos.edit', ['producto' => Producto::findOrFail($id)], compact('categoria', 'subcategoria'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registros = Producto::findOrFail($id);
        $registros->name = $request->name;
        $registros->price = $request->price;
        $registros->amount = $request->amount;

        $registros->update();

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registros = Producto::find($id);


        if ($registros) {
            $registros->state = 0;
            $registros->save();

            return redirect()->route('productos.index');
        }

        return redirect()->route('products.index');
    }
}
