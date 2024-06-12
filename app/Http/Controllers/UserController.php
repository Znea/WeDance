<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PDF;


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
    public function create(string $rol)
    {
        return view('users.create')->with('rol', $rol);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            if($request->rol == 'profesor')
            {
                User::create([
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'date_of_birth' => $request->date_of_birth,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'biography' => $request->biography,
                    'rol' => $request->rol,
                    'dni' => $request->dni,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->route('teachers')->with('msg', 'El profesor ha sido creado correctamente');
            }
            elseif($request->rol == 'alumno'){
                User::create([
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'date_of_birth' => $request->date_of_birth,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'category_id' => $this->categoria(Carbon::parse($request->date_of_birth)->format('Y'))->id ,
                    'rol' => $request->rol,
                    'dni' => $request->dni,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->route('students')->with('msg', 'El alumno ha sido creado correctamente');
            }
        } catch (QueryException $e) {
            if($request->rol == 'profesor')
            {
                return redirect()->route('teachers')->with('msg', 'El profesor no se ha podido crear');
            }
            elseif($request->rol == 'alumno'){
                return redirect()->route('students')->with('msg', 'El alumno no se ha podido crear');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $rol)
    {
        $user = User::findOrFail($id);

        return view('users.edit')->with('user', $user)->with('rol', $rol);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
                $user = User::findOrFail($id);
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->date_of_birth = $request->date_of_birth;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->dni = $request->dni;

                if(is_uploaded_file($request->file('image'))){

                    if($request->user()->image != "default.png"){
                        Storage::delete('public/img_perfil/'.$request->user()->image); // Borramos la foto antigua, ya que la vamos a sustituir
                        $nombreFoto = time()."-".$request->file('image')->getClientOriginalName(); // Creamos un nombre para la foto
                        $user->image = $nombreFoto;
                        $request->file('image')->storeAs('public/img_perfil/', $nombreFoto); // La subimos a la carpeta concreta

                    }
                    else{
                        $nombreFoto = time()."-".$request->file('image')->getClientOriginalName(); // Creamos un nombre para la foto
                        $user->image = $nombreFoto;
                        $request->file('image')->storeAs('public/img_perfil/', $nombreFoto); // La subimos a la carpeta concreta
                    }
                }

            if($request->rol == 'profesor'){
                $user->biography = $request->biography;
                $user->save();

                return redirect()->route('teachers')->with('msg', 'El profesor ha sido actualizado correctamente');
            }
            elseif($request->rol == 'alumno'){
                $user->category_id = $this->categoria(Carbon::parse($request->date_of_birth)->format('Y'))->id ;
                $user->save();

                return redirect()->route('students')->with('msg', 'El alumno ha sido actualizado correctamente');
            }
        } catch (QueryException $e) {
            if($request->rol == 'profesor')
            {
                return redirect()->route('teachers')->with('msg', 'El profesor no se ha podido actualizar');
            }
            elseif($request->rol == 'alumno'){
                return redirect()->route('students')->with('msg', 'El alumno no se ha podido actualizar');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $rol)
    {
        try {
            $user = User::findorFail($id);
            $user->delete();
            if($rol == 'profesor')
            {
                return redirect()->route('teachers')->with('msg', 'El profesor ha sido eliminado correctamente');
            }
            elseif($rol == 'alumno'){
                return redirect()->route('students')->with('msg', 'El alumno ha sido eliminado correctamente');
            }
        } catch (QueryException $e) {
            if($rol == 'profesor')
            {
                return redirect()->route('teachers')->with('msg', 'El profesor no se ha podido eliminar');
            }
            elseif($rol == 'alumno'){
                return redirect()->route('students')->with('msg', 'El alumno no se ha podido eliminar');
            }
        }
    }

    public function abrirModal(string $id, string $rol){
        if($rol == 'Profesor')
            return redirect()->route('teachers')->with('id', $id);
        elseif($rol == 'Alumno')
            return redirect()->route('students')->with('id', $id);
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

    private function categoria ( int $fecha){
        $amateur = Category::where('name', 'Amateur')->first();
        $baby = Category::where('name', 'Baby')->first();
        $senior = Category::where('name', 'Senior')->first();
        $juvenil = Category::where('name', 'Juvenil')->first();
        $infantil = Category::where('name', 'Infantil')->first();
        $fechaActual = Carbon::now()->format('Y');
        $edad = $fechaActual - $fecha;
        if($edad <= 7){
            return $baby;
        }
        elseif($edad >= 8 && $edad <= 11){
            return $infantil;
        }
        elseif($edad >= 12 && $edad <= 15){
            return $juvenil;
        }
        elseif($edad >= 16 && $edad <= 35){
            return $amateur;
        }
        else{
            return $senior;
        }
    }

    public function institucion(){
        return view('institucion');
    }

    public function descargarPlanIncendios(){
        $pdf = PDF::loadView('documento.planIncendios');
        return $pdf->download('plan_evacuacion.pdf');
    }
}
