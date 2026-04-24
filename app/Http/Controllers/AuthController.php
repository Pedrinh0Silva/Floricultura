<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        // Tenta fazer o login
        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            // Redireciona para a lista de produtos após logar
            return redirect()->intended('/produtos'); 
        }

        // Se errar a senha
        return back()->withErrors([
            'login' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}