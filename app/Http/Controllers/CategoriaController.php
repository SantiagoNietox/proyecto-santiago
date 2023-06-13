<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Faker\Provider\ar_EG\Company;
use Faker\Provider\ar_JO\Company as Ar_JOCompany;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::where('state',1)->get();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $categoria = new Categoria();
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->state = 1;
        $categoria->save();

        return redirect(route('categorias.index'))->with('success', 'El registro se ha creado exitosamente.');
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
     return view ('categorias.edit', ['categoria' => Categoria::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->update();

        return redirect()->route('categorias.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        if ($categoria){
        $categoria->state = 0;
        $categoria->save();
        return redirect()->route('categorias.index');
        }
        return redirect()->route('categorias.index');
    }
}
