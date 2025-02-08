<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm(){
        return view('AuthLogin');
    }

    public function loginProcess(Request $request){
        // Validación

        $credentials = $request->only(["email", "password"]);

        if(!Auth::attempt($credentials)){
            // Redireccionamos al usuario informandole lo sucedido
            return redirect('/iniciar-sesion')
            ->with('error', 'Las credenciales ingresadas no son correctas.')
            ->withInput();
        }

        return redirect('/')
        ->with('status.message', '¡Bienvenido al sitio web! ' . Auth::user()->email . ' ¡Disfrutalo!');
    }

    public function logoutProcess(Request $request){
        Auth::logout();

        $request->session()->invalidate(); // Eliminamos datos de la sesión y regenramos el id de la misma
        $request->session()->regenerateToken(); // Regeneramos el token de la csrf
        
        return redirect('/iniciar-sesion')
        ->with('status.message', '¡Se ha cerrado la sesión con éxito! Muchas gracias');
    }

    public function adminAccess(){
        // Obtener la instancia del usuario actualmente autenticado
        $user = Auth::user();

        // Verificar si el usuario es 'pepe@trueno' y las credenciales son válidas
        if ($user->is_admin == 0) {
            // Redireccionar si el usuario no tiene acceso
            return redirect('/')
                ->with('error', 'Acceso no autorizado. Solo usuarios con privilegios de administrador pueden ingresar al panel.');
        }

        // Redireccionar si el usuario no está autenticado
        if (!$user) {
            return redirect('/iniciar-sesion')
                ->with('error', 'Las credenciales ingresadas no son correctas.');
        }

        return redirect('/abm')
            ->with('status.message', '¡Bienvenido al panel administrador! ' . $user->email . ' ¡Cuidado con lo que haces!');
    }

    public function registerForm(){

        return view('register');
    }

    public function registerProcess(Request $request){

        $data = $request->except(['_token']);

        User::create($data);

        return redirect('/iniciar-sesion')
            -> with('status.message', 'Gracias por unirte ' . $data['email'] . ' ya podrás iniciar sesión');
    }

    public function showProfile(){

        $user = Auth::user();

        return view('profile.showProfile', ['user' => $user]);
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('profile.editProfile', ['user' => $user]);
    }

    // Se toman los datos ingresados por el usuario en el form y se realiza un update con las nuevas credenciales
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect('/profile')
            ->with('status.message', 'Perfil actualizado con éxito.');
    }

}