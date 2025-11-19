<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\FormatHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $tahun = FormatHelper::getTahun($request->thnbln);
        $bulan = FormatHelper::getBulan($request->thnbln);
        $request->authenticate();

        $request->session()->regenerate();
        $request->session()->put('thnbln', $request->thnbln);
        $request->session()->put('default', $request->thnbln);
        $request->session()->put('tahun', $tahun);
        $request->session()->put('bulan', $bulan);
        $user = User::find(Auth::user()->id);
        $user->terakhir_login = now();
        $user->save();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Session::forget('thnbln');
        Session::forget('default');
        Session::forget('tahun');
        Session::forget('bulan');
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
