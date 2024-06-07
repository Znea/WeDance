<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\StudentClase;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $vista)
{
        $clases = Auth::user()->students_clases->filter(function($clase) use ($vista) {
            if ($vista == 'apuntado') {
                return $clase->pivot->deleted_at === null;
            } elseif ($vista == 'desapuntado') {
                return $clase->pivot->deleted_at !== null;
            }
            return false;
        });

        return view('clases.recuperarClases')->with('clases', $clases)->with('vista', $vista);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Clase $clase)
    {
        try {
            $buscada = StudentClase::withTrashed()->where('clase_id', $clase->id)->where('user_id', auth()->user()->id)->first();
            if ($buscada == null) {
                $studentClase = new StudentClase();
                $studentClase->clase_id = $clase->id;
                $studentClase->user_id = auth()->user()->id;
                $studentClase->save();
            }
            else{
                if ($buscada->trashed()) { // Verificar si el registro está "eliminado suavemente"
                    $buscada->restore(); // Restaurar el registro
                }
            }

            return redirect()->route('clases.show', $clase->id )->with('msg', 'Te has apuntado a las clases de '.$clase->name);
        } catch (QueryException $e) {
            return redirect()->route('clases.show', $clase->id )->with('msg', 'Ha habido un error al apuntarte a las clases de '.$clase->name);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Clase $clase)
    {
        try {
            $buscada = StudentClase::withTrashed()->where('clase_id', $clase->id)->where('user_id', auth()->user()->id)->first();

            if ($buscada->trashed()) { // Verificar si el registro está "eliminado suavemente"
                $buscada->restore(); // Restaurar el registro
            }

            return redirect()->route('studentClases.index', ['vista' => 'desapuntado'] )->with('msg', 'Has vuelto a las clases de '.$clase->name);
        } catch (QueryException $e) {
            return redirect()->route('studentClases.index', ['vista' => 'desapuntado'])->with('msg', 'Ha habido un error al volver a las clases de '.$clase->name);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase, string $vista)
    {
        try {
            $studentClase = StudentClase::where('clase_id', $clase->id)->where('user_id', Auth::user()->id)->first();
            $studentClase->delete();

            if($vista == 'clases')
                return redirect()->route('clases.show', $clase->id )->with('msg', 'Te has desapuntado de la clase de '.$clase->name);
            else
                return redirect()->route('studentClases.index', ['vista' => 'apuntado'] )->with('msg', 'Te has desapuntado de las clases de '.$clase->name);
        } catch (QueryException $e) {
            if($vista == 'clases')
                return redirect()->route('clases.show', $clase->id )->with('msg', 'No te has podido desapuntar de la clase de '.$clase->name);
            else
                return redirect()->route('studentClases.index', ['vista' => 'apuntado'] )->with('msg', 'No te has podido desapuntar de las clases de '.$clase->name);
        }
    }
}
