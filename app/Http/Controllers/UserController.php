<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function destroy(string $id, string $rol)
    {
        $user = User::findorFail($id);
        $user->delete();
        if($rol == 'profesor')
        {
            return redirect()->route('teachers')->with('msg', 'El profesor ha sido eliminado correctamente');
        }
        elseif($rol == 'alumno'){
            return redirect()->route('students')->with('msg', 'El alumno ha sido eliminado correctamente');
        }
    }

    /**
     * Enseñar la vista de los usuarios que son profesores
     */
    public function teachers()
    {
        $teachers = User::where('rol', 'profesor')->get();
        return view('users.teachers')->with('teachers', $teachers);
    }

    /**
     * Enseñar la vista de los usuarios que son alumnos
     */
    public function students()
    {
        $students = User::where('rol', 'alumno')->get();
        return view('users.students')->with('students', $students);
    }
}
