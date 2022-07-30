<?php


namespace App\Http\Controllers\kemahasiswaan;

use Illuminate\Http\Request;
use App\Models\Kemahasiswaan;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserKemahasiswaanController extends Controller
{
    public function __construct()
    {
        $this->kemahasiswaan = new Kemahasiswaan();
        $this->user = new User();
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kemahasiswaan = $this->kemahasiswaan->allData2()
            ->where('nama', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $kemahasiswaan = $this->kemahasiswaan
                ->allData2()->paginate(10);
        }

        $data = [
            'kemahasiswaanall' => $this->kemahasiswaan->countKemahasiswaan(),
            'kemahasiswaan' => $kemahasiswaan,           
        ];

        return view('kemahasiswaan.kemahasiswaan.index', $data);
    }

    public function show($id)
    {
        $kemahasiswaan = Kemahasiswaan::findOrFail($id);

        $data = [
            'kemahasiswaan' => $kemahasiswaan,
        ];

        return view('kemahasiswaan.kemahasiswaan.detail', $data);
    }

    public function add()
    {
        $data = [
        'roles' => Role::find(1),  //* kemahasiswaan
        ];

        return view('kemahasiswaan.kemahasiswaan.add', $data);
    }

    public function validateKemahasiswaan(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
            'id_role' => 'required|integer',
            'password' => 'required|max:255',
        ], [
            'nip.required' => 'wajib diisi!',
            'nip.unique' => 'NIP ini telah digunakan.',
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
        $this->validateKemahasiswaan($request);

        $user = User::create([
            'id_role' => $request->id_role,
            'email' => $request->email,
            'is_verified' => 1,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole(Role::find($request->id_role)->name);

        $userKemahasiswaan = Kemahasiswaan::create([
            'id_user' => $user->id,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            //'created_by' => Kemahasiswaan::find(Auth::user()->id)->kemahasiswaan->id,
        ]);

        if ($user && $userKemahasiswaan) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }
        return redirect('kemahasiswaan/user/kemahasiswaan');
    }


    public function edit($id)
    {
        $kemahasiswaan = Kemahasiswaan::findOrFail($id);

        $data = [
            'kemahasiswaan' => $kemahasiswaan,
            'roles' => Role::find(1),
        ];

        return view('kemahasiswaan.kemahasiswaan.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $this->validateKemahasiswaan($request);

        $data = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_verified' => 1,
        ];

        try {
            $id_user = Kemahasiswaan::find($id)->id_user;
            $user = User::where('id', $id_user)->update($data);
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Email sudah digunakan!');
            return redirect()->back();
        }

        $kemahasiswaan = Kemahasiswaan::where('id', $id)
            ->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'updated_by' => Kemahasiswaan::find(Auth::user()->id)->id,
            ]);

        if ($user && $kemahasiswaan) {
            Alert::success('Sukses!', 'Data Berhasil Diubah!');
        }

        return redirect('kemahasiswaan/user/kemahasiswaan');
    }

    public function destroy($id)
    {
        $id_user = Kemahasiswaan::findOrFail($id)->id_user;

        $userKemahasiswaan = User::find($id_user)->kemahasiswaan->delete();
        $user = User::find($id_user)->delete();

        if ($user && $userKemahasiswaan) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }

        return redirect('kemahasiswaan/user/kemahasiswaan');
    }
 }