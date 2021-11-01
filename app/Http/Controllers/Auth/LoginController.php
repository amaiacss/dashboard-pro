<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        //valida los campos recibidos email y password
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //Crea unas variables y les asignamos los datos recibidos
        $email    = $request->email;
        $password = $request->password;

        //Para obtener la fecha y hora actual
        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        //Array asociativo para guardar los datos de actividad en la tabla logs
        $activityLog = [
            'name'        => $email,
            'email'       => $email,
            'description' => 'has log in',
            'date_time'   => $todayDate,
        ];

        //Si los datos introducidos coinciden con los datos del email y password que tenemos en la tabla user y el campo status es 'Active'
        // if (Auth::attempt(['email'=>$email,'password'=>$password,'status'=>'Active'])) {
        if (Auth::attempt(['email'=>$email,'password'=>$password,'role_name'=>'Admin'])) {    
            //Inserta en la tabla activity_logs los datos del array $activityLog
            DB::table('activity_logs')->insert($activityLog);
            //Muestra un mensaje de Toastr
            Toastr::success('Login successfully :)','Success');
            //Redirige a la ruta home y carga la vista dashboard.dashboard
            // return redirect()->intended('home'); 
             //Redirige a la ruta home y carga la vista dashboard.dashboard
            return redirect()->intended('home'); //vista panel Admin

        //Sino si los datos de email y password coinciden con los de la tabla user y además el campo status es = null
        }elseif (Auth::attempt(['email'=>$email,'password'=>$password,'status'=> null])) {
            //Inserta en la tabla activity_logs los datos del array $activityLog
            DB::table('activity_logs')->insert($activityLog);
            //Muestra un mensaje de Toastr
            Toastr::success('Login successfully :)','Success');
            //Enviá a la ruta em/dashboard que carga la vista dashboard.emdashboard
            return redirect()->intended('em/dashboard'); //vista guest Normal User
        }
        //Si no es ninguna de las anteriores, quiere decir que o el email o el password no son correctos
        else{
            //Nos muestra un mensaje de Toastr
            Toastr::error('fail, WRONG USERNAME OR PASSWORD :)','Error');
            //Redirige a la ruta login 
            return redirect('login');
        }

    }

    public function logout()
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');

        $name       = $user->name;
        $email      = $user->email;
        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        $activityLog = [

            'name'        => $name,
            'email'       => $email,
            'description' => 'has logged out',
            'date_time'   => $todayDate,
        ];
        DB::table('activity_logs')->insert($activityLog);
        Auth::logout();
        Toastr::success('Logout successfully :)','Success');
        return redirect('login');
    }

}
