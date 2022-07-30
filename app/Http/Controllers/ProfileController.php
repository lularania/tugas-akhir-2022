<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->role = new Role();
    }

    public function index()
    {
        return view('profile');
    }

    public function updatePass($id)
    {
        Request()->validate([
            'password' => 'required|max:255',
        ], [
            'password.required' => 'Mohon isi Password.',
        ]);

        // dd(Request()->link_meeting);

        $data = [
            'password' => Hash::make(Request()->password),
            // 'link_meeting' => Request()->link_meeting,
        ];
         if ($this->user->updateData($id, $data)) {
            auth()->user()->tenagakesehatan()->update([
                'link_meeting' => Request()->link_meeting,
            ]);
            Alert::success('Sukses!', 'Data Berhasil Diubah!');
        };
        return redirect()->back();
    }
}