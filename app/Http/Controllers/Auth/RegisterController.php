<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Mahasiswa;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    // * Meng-override method showRegistrationForm() yang ada pada trait RegistersUsers
    // public function showRegistrationForm()
    // {
    //     return redirect('/login');
    // }

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'nrp' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'nama' => 'required',
            'id_role' => 'required|integer',
            'password' => 'required|confirmed|max:255|min:8',
            'email' => 'required|email|unique:users,email|max:255',
        ]); 
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->id_role = $request->id_role;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->save();
        $user->assignRole(Role::find($request->id_role)->name);
    
        $mahasiswa = new Mahasiswa();
        $mahasiswa->id_user = $user->id;
        $mahasiswa->id_role = $user->id_role;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->nrp = $request->nrp;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->angkatan = $request->angkatan;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->save();

        if($user && $mahasiswa != null) {
            // $login = Auth::loginUsingId($user->id, true);
            // $login->save();
            MailController::sendSignupEmail($user->email, $user->verification_code);
            // dd("test"); 
            return redirect()->back()->with('alert-success', 'Your account has been created. Please check email for verification link.');
        }

        return redirect()->back()->with('alert-success', 'Something went wrong');
    }

    public function verifyUser(){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if ($user != null){
            $user->is_verified = 1;
            $user->save();
            return redirect()->back()->with('alert-success', 'Your account is verified, please login first.');
        }
        return redirect()->back()->with('alert-success', 'Invalid Verification Code');
    }
}
