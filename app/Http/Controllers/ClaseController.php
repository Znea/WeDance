<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clases = Clase::all();
        return view('clases.index', compact('clases'));
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
    public function show(Clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clase $clase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clase $clase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {
        try {
            $clase->delete();
            return redirect()->route('users.index')->with('msg', 'La clase se ha eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('clases.index')->with('msg', 'La clase  no se ha podido eliminar');
        }
    }

    public function eliminarProfesor(string $id){
        try {
            $clase = Clase::find($id);
            $idUser = $clase->user_id;
            $clase->user_id = null;
            $clase->save();
            return redirect()->route('clases.index', ['user' => $idUser])->with('msg', 'Se ha podido quitar la clase a este profesor correctamente');
        } catch (QueryException $e) {
            return redirect()->route('clases.index', ['user' => $idUser])->with('msg', 'No se ha podido quitar la clase a este profesor');
        }
    }

    public function abrirModal(string $id, string $sitio)
    {
        if ($sitio == 'clases')
            return redirect()->route('clases.index')->with('id', $id);
        elseif ($sitio == 'profesor'){
            $clase = Clase::find($id);
            $idUser = $clase->user_id;
            return redirect()->route('users.show', ['user' => $idUser])->with('id', $id);
        }
    }
}
