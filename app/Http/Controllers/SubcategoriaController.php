<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategorias = Subcategoria::select('c.name as cname', 'subcategorias.*')
        ->join('categoria as c', function ($join) {
            $join->on('subcategorias.categoria_id', '=', 'c.id')
                ->where('c.state', 1);
        })
        ->where('subcategorias.state', 1)
        ->get();

    return view('subcategorias.index', compact('subcategorias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::where('state',1)->get();
        return view('subcategorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subcategoria = new Subcategoria();
        $subcategoria->name = $request->name;
        $subcategoria ->description = $request->description;
        $subcategoria->categoria_id = $request->categoria_id;
        $subcategoria->state = 1;
        $subcategoria->save();

        return redirect()->route('subcategorias.index', compact('subcategoria'));




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
        $subcategoria = Subcategoria::findOrFail($id);
        $categoria = Categoria::where('state',1)->get();

        return view('subcategoria.edit', compact('subcategoria', 'categoria'));

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
        $subcategoria = Subcategoria::find($id);

        if ($subcategoria) {
            $subcategoria->state = 0;
            $subcategoria->save();
            return redirect()->route('subcategorias.index');

        }
        return redirect()->route('subcategorias.index');
    }
}
