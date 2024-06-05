<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $teachers = \App\Models\User::where('rol', 'profesor')->get();
        return view('clases.create')->with('profesores', $teachers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $clase = new Clase();
            $clase->code = $this->createCode($request->name).$clase->id;
            $clase->name = $request->name;
            $clase->schedule = $request->schedule;
            $clase->description = $request->description;
            $clase->user_id = $request->teacher;
            $clase->save();
            return redirect()->route('clases.index')->with('msg', 'La clase se ha creado correctamente');

        } catch (QueryException $e) {
            return redirect()->route('clases.index')->with('msg', 'La clase no se ha creado correctamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Clase $clase)
    {
        $teachers = \App\Models\User::where('rol', 'profesor')->get();
        return view('clases.show')->with('clase', $clase)->with('profesores', $teachers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clase $clase)
    {
        $teachers = \App\Models\User::where('rol', 'profesor')->get();
        return view('clases.edit')->with('clase', $clase)->with('profesores', $teachers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clase $clase)
    {
        try {
            $clase->code = $this->createCode($request->name).$clase->id;
            $clase->name = $request->name;
            $clase->schedule = $request->schedule;
            $clase->description = $request->description;
            $clase->user_id = $request->teacher;

            if(is_uploaded_file($request->file('image'))){

                if($clase->image != "default.png"){
                    Storage::delete('public/img_clases/'.$clase->image); // Borramos la foto antigua, ya que la vamos a sustituir
                    $nombreFoto = time()."-".$request->file('image')->getClientOriginalName(); // Creamos un nombre para la foto
                    $clase->image = $nombreFoto;
                    $request->file('image')->storeAs('public/img_clases/', $nombreFoto); // La subimos a la carpeta concreta

                }
                else{
                    $nombreFoto = time()."-".$request->file('image')->getClientOriginalName(); // Creamos un nombre para la foto
                    $clase->image = $nombreFoto;
                    $request->file('image')->storeAs('public/img_clases/', $nombreFoto); // La subimos a la carpeta concreta
                }
            }

            $clase->save();
            return redirect()->route('clases.index')->with('msg', 'La clase se ha actualizado correctamente');

        } catch (QueryException $e) {
            return redirect()->route('clases.index')->with('msg', 'La clase no se ha actualizado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {
        try {
            $clase->delete();
            return redirect()->route('clases.index')->with('msg', 'La clase se ha eliminado correctamente');
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

    private function createCode($nombre){
        // Toma las dos primeras letras de la cadena
        $code = substr($nombre, 0, 2);
        // Convierte las dos letras a mayúsculas
        $code = strtoupper($code);
        return $code;
    }

    public function asignarProfesor(Request $request, Clase $clase){
        try {
            $clase->user_id = $request->teacher;
            $clase->save();
            return redirect()->route('clases.show', ['clase' => $clase->id])->with('msg', 'Se ha podido asignar la clase a este profesor correctamente');
        } catch (QueryException $e) {
            return redirect()->route('clases.show', ['clase' => $clase->id])->with('msg', 'Se ha podido asignar la clase a este profesor correctamente');
        }
    }
}
