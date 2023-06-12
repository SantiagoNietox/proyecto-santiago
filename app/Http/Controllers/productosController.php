<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $registros = Producto::where('state',1)->get();
        return view('productos.index',compact('registros'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
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
    ]);


        $Productos=new Producto();
        $Productos ->name=$request->name;
        $Productos->price=$request->price;
        $Productos->amount=$request->amount;
        $Productos->state=1;
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
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
