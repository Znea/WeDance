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
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Clase $clase)
    {
        try {
            $studentClase = new StudentClase();
            $studentClase->clase_id = $clase->id;
            $studentClase->user_id = auth()->user()->id;
            $studentClase->save();

            return redirect()->route('clases.show', $clase->id )->with('msg', 'Te has apuntado a las clase de '.$clase->name);
        } catch (QueryException $e) {
            return redirect()->route('clases.show', $clase->id )->with('msg', 'Ha habido un error al apuntarte a las clase de '.$clase->name);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Clase $clase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {
        try {
            $studentClase = StudentClase::where('clase_id', $clase->id)->where('user_id', Auth::user()->id)->first();
            $studentClase->delete();

            return redirect()->route('clases.show', $clase->id )->with('msg', 'Te has desapuntado de la clase de '.$clase->name);
        } catch (QueryException $e) {
            return redirect()->route('clases.show', $clase->id )->with('msg', 'No te has podido desapuntar de la clase de '.$clase->name);
        }
    }
}
