<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        $role = DB::table('role_type_users')->get();
        //Llama a la vista auth.register y le envía el contenido de la variable $role (le envía los tipos de roles de usuario) para cargarlos posteriormente en un select de la vista register
        return view('auth.register',compact('role'));
    }

    //Recibe todos los campos del formulario register
    public function storeUser(Request $request)
    {
        //Realiza la validación de los datos
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $dt       = Carbon::now(); //Para obtener la hora y fecha actual
        $todayDate = $dt->toDayDateTimeString(); //obtiene la fecha de hoy
        
        //Ejecuta una consulta ORM Eloquent para insertar en la tabla User los datos recibidos del formulario
        User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'join_date' => $todayDate,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
        ]);

        //La clase Toastr es para mostrar mensajes
        Toastr::success('Create new account successfully :)','Success');
        //Redirigimos a la ruta login que carga la vista login
        return redirect('login');
    }
}
