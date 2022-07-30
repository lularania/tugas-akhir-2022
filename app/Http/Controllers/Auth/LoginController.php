<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        //dd($request->session());
        if ($user->hasAnyRole(['kemahasiswaan', 'mahasiswa', 'dokter', 'psikolog', 'pengurus_tekkes'])) {
            if ($user->hasRole('kemahasiswaan')) {
                return redirect()->route('kemahasiswaan');
            } elseif ($user->hasRole('mahasiswa')) {
                if($user->is_verified == 0){
                    auth()->logout();
                    return redirect()->back()->with('alert-success', 'Your account is not verified yet, please check your email');
                }
                // if ($request->session()->has('informasiDetail')) {
                //     return redirect()->route('mahasiswa.informasi-kesehatan.detail');
                // }
                elseif ($request->session()->has('informasiDetail')) {
                    return redirect()->intended('/mahasiswa/informasi-kesehatan/detail/'.$id);
                }
                return redirect()->route('mahasiswa');
            } elseif ($user->hasRole('dokter')) {
                return redirect()->route('dokter');
            } elseif ($user->hasRole('psikolog')) {
                return redirect()->route('psikolog');
            }elseif ($user->hasRole('pengurus_tekkes')) {
                return redirect()->route('pengurus-tekkes');
            }
        }
        else {
            auth()->logout();
            return redirect()->back();
        }
    }

    // public function credentials(Request $request)
    // {
    //     if ($user->hasAnyRole(['mahasiswa'])){

    //     }
    //     return array_merge($request->only($this->email(), 'password'), ['is_verified' => 1]);
    // }
}