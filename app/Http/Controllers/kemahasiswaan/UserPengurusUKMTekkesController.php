<?php

namespace App\Http\Controllers\kemahasiswaan;

use Illuminate\Http\Request;
use App\Models\PengurusUKMTekkes;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserPengurusUKMTekkesController extends Controller
{
    public function __construct()
    {
        $this->tekkes = new PengurusUKMTekkes();
        $this->user = new User();
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tekkes = $this->tekkes->allData2()
            ->where('nrp', 'LIKE', '%' . $request->search . '%')->paginate(20);
        } else {
            $tekkes = $this->tekkes
                ->allData2()->paginate(20);
        }
        
        $data = [
            'tekkes' => $tekkes,
        ];

        return view('kemahasiswaan.pengurus_ukm_tekkes.index', $data);
    }

    public function show($id)
    {
        $tekkes = PengurusUKMTekkes::findOrFail($id);

        $data = [
            'tekkes' => $tekkes,
        ];

        return view('kemahasiswaan.pengurus_ukm_tekkes.detail', $data);
    }

    public function add()
    {
        $data = [
        'roles' => Role::find(5),  //* ukm tekkes
        ];

        return view('kemahasiswaan.pengurus_ukm_tekkes.add', $data);
    }

    public function validatePengurusUKMTekkes(Request $request)
    {
        $request->validate([
            'nrp' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'id_role' => 'required|integer',
            'password' => 'required|max:255',
        ], [
            'nrp.required' => 'wajib diisi!',
            'nrp.unique' => 'NRP ini telah digunakan.',
            'nama.required' => 'wajib diisi!',
            'jabatan.required' => 'wajib diisi!',
            'email.email' => 'Isi format Email dengan benar.',
            'email.unique' => 'Email ini telah digunakan.',
            'email.required' => 'Mohon isi Email.',
            'password.required' => 'Mohon isi Password.',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email|max:255',
        ]);
        $this->validatePengurusUKMTekkes($request);

        $user = User::create([
            'id_role' => $request->id_role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole(Role::find($request->id_role)->name);

        $userTekkes = PengurusUKMTekkes::create([
            'id_user' => $user->id,
            'nrp' => $request->nrp,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            //'created_by' => Kemahasiswaan::find(Auth::user()->id)->kemahasiswaan->id,
        ]);

        if ($user && $userTekkes) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }
        return redirect('/kemahasiswaan/user/pengurus-ukm-tekkes');
    }


    public function edit($id)
    {
        $tekkes = PengurusUKMTekkes::findOrFail($id);

        $data = [
            'tekkes' => $tekkes,
            'roles' => Role::find(5),
        ];

        return view('kemahasiswaan.pengurus_ukm_tekkes.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $this->validatePengurusUKMTekkes($request);

        $data = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        try {
            $id_user = PengurusUKMTekkes::find($id)->id_user;
            $user = User::where('id', $id_user)->update($data);
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Email sudah digunakan!');
            return redirect()->back();
        }

        $tekkes = PengurusUKMTekkes::where('id', $id)
            ->update([
                'nrp' => $request->nrp,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                //'updated_by' => Kemahasiswaan::find(Auth::user()->id)->id,
            ]);

        if ($user && $tekkes) {
            Alert::success('Sukses!', 'Data Berhasil Diubah!');
        }

        return redirect('/kemahasiswaan/user/pengurus-ukm-tekkes');
    }

    public function destroy($id)
    {
        $id_user = PengurusUKMTekkes::findOrFail($id)->id_user;

        $userTekkes = User::find($id_user)->tekkes->delete();
        $user = User::find($id_user)->delete();

        if ($user && $userTekkes) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }

        return redirect('/kemahasiswaan/user/pengurus-ukm-tekkes');
    }
}
