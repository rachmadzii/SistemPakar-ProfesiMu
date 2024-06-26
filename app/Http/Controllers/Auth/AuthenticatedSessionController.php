<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flasher\Notyf\Prime\NotyfFactory;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request, NotyfFactory $flasher)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $flasher->addSuccess('Anda Berhasil Masuk');

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request, NotyfFactory $flasher)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $flasher->addSuccess('Anda Berhasil Keluar');

        return redirect('/login-admin');
    }
}
