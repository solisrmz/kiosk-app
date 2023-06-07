<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    public function redirectTo() {
        $role = Auth::user()->role;
        switch ($role) {
            case 'admin':
                return '/admin';
                break;
            case 'asesor':
                return '/asesor';
                break;
            case 'director':
                return '/direccion-academica';
                break;
            case 'docente':
                return '/docente';
                break;
            case 'consulta':
                return '/consulta';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            }else{
                auth()->user()->generateCode();
                return redirect()->route('2fa.index');
            }
        }
        return redirect("login")->withSuccess('Ingresaste credenciales inválidas');
    }
}
