<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login.index');
    }

    public function getCreateLogin()
    {
        return view('login.create');
    }

    public function loginValidation(LoginUserRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->route('navbarIndex');
        }

        return back()->withErrors(['username' => 'Credenciais inválidas. Verifique seu login e senha.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginView')->with('message', 'Você foi desconectado com sucesso!');
    }
}
