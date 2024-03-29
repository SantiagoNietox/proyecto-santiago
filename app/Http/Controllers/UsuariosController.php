<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct ()
     {
        
        
        
       
        $this->middleware('can:usuarios.index')->only('index') ;
        $this->middleware('can:usuarios.edit')->only('edit', 'update') ;
        $this->middleware('can:usuarios.destroy')->only('destroy') ;
     }
 












    public function index()
    {
        $usuarios = User::all();

        

        $userRoles = [];
        foreach ($usuarios as $usuario) {
            $roleName = $usuario->roles()->pluck('name')->first();
            $userRoles[$usuario->id] = $roleName;
        }

        return view('usuarios.index', compact('usuarios', 'userRoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $usuario = User::find($id);
        $roles = Role::all();

        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $usuario = User::find($id);
        $usuario->delete();

        return redirect(route('usuarios.index'));

    }
}
