<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if(is_uploaded_file($request->file('image'))){

            if($request->user()->image != "default.png"){
                Storage::delete('public/img_perfil/'.$request->user()->image); // Borramos la foto antigua, ya que la vamos a sustituir
                $nombreFoto = time()."-".$request->file('image')->getClientOriginalName(); // Creamos un nombre para la foto
                $request->file('image')->storeAs('public/img_perfil/', $nombreFoto); // La subimos a la carpeta concreta

            }
            else{
                $nombreFoto = time()."-".$request->file('image')->getClientOriginalName(); // Creamos un nombre para la foto
                $request->file('image')->storeAs('public/img_perfil/', $nombreFoto); // La subimos a la carpeta concreta
            }
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
