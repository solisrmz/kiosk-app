<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class TwoFAController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.2fa');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required',
        ]);

        $find = UserCode::where('user_id', auth()->user()->id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(2))
            ->first();

        if (!is_null($find)) {
            Session::put('user_2fa', auth()->user()->id);
            switch (Auth::user()->role){
                case 'director':
                        return redirect('direccion-academica');
                    break;
                case 'asesor':
                    return redirect('asesor');
                    break;
                case 'docente':
                    return redirect('docente');
                    break;
                case 'consulta':
                    return redirect('consulta');
                    break;
            }
        }

        return back()->with('error', 'El código ingresado es incorrecto');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        auth()->user()->generateCode();

        return back()->with('success', 'Se ha enviado el código a tu correo');
    }
}
