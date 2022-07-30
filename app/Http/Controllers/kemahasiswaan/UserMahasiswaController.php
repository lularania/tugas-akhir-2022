<?php

namespace App\Http\Controllers\kemahasiswaan;

use Illuminate\Http\Request;
use App\Models\Kemahasiswaan;
use App\Models\Mahasiswa;
use App\Models\PermohonanLayanan;
use App\Models\User;
use App\Models\History;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa();
        $this->user = new User();
        $this->permohonan = new PermohonanLayanan();
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $mahasiswa = $this->mahasiswa->allData2()
            ->where('nrp', 'LIKE', '%' . $request->search . '%')->paginate(20);
        } else {
            $mahasiswa = $this->mahasiswa
                ->allData2()->paginate(20);
        }

        $data = [
            'mahasiswaall' => $this->mahasiswa->countMahasiswa(),
            'mahasiswa' => $mahasiswa,
            'prodi' => DB::table('prodi')->get(),
            'kelas' => DB::table('kelas')->get(),
            'angkatan' => DB::table('angkatan')->get(),       
        ];

        return view('kemahasiswaan.mahasiswa.index', $data);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $data = [
            'mahasiswa' => $mahasiswa,
        ];

        return view('kemahasiswaan.mahasiswa.detail', $data);
    }

    public function add()
    {
        $data = [
        'roles' => Role::find(2),  //* mahasiswa
        'prodi' => DB::table('prodi')->get(),
        'kelas' => DB::table('kelas')->get(),
        'angkatan' => DB::table('angkatan')->get(),
        ];

        return view('kemahasiswaan.mahasiswa.add', $data);
    }

    public function validateMahasiswa(Request $request)
    {
        $request->validate([
            'nrp' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'nama' => 'required',
            'id_role' => 'required|integer',
            'password' => 'required|max:255',
        ], [
            'nrp.required' => 'wajib diisi!',
            'nrp.unique' => 'NRP ini telah digunakan.',
            'prodi.required' => 'wajib diisi!',
            'angkatan.required' => 'wajib diisi!',
            'kelas.required' => 'wajib diisi!',
            'alamat.required' => 'wajib diisi!',
            'nama.required' => 'wajib diisi!',
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
        $this->validateMahasiswa($request);

        $user = User::create([
            'id_role' => $request->id_role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole(Role::find($request->id_role)->name);

        $userMahasiswa = Mahasiswa::create([
            'id_user' => $user->id,
            'prodi' => $request->prodi,
            'nrp' => $request->nrp,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'alamat' => $request->alamat,
            'kelas' => $request->kelas,
            // 'created_by' => Kemahasiswaan::find(Auth::user()->id)->kemahasiswaans->id,
        ]);

        if ($user && $userMahasiswa) {
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }
        return redirect('/mahasiswa');
    }


    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $data = [
            'mahasiswa' => $mahasiswa,
            'roles' => Role::find(2),
            'prodi' => DB::table('prodi')->get(),
            'kelas' => DB::table('kelas')->get(),
            'angkatan' => DB::table('angkatan')->get(),
        ];

        return view('kemahasiswaan.mahasiswa.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $this->validateMahasiswa($request);

        $data = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        try {
            $id_user = Mahasiswa::find($id)->id_user;
            $user = User::where('id', $id_user)->update($data);
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Email sudah digunakan!');
            return redirect()->back();
        }

        $mahasiswa = Mahasiswa::where('id', $id)
            ->update([
                'nrp' => $request->nip,
                'nama' => $request->nama,
                'prodi' => $request->prodi,
                'nrp' => $request->nrp,
                'nama' => $request->nama,
                'angkatan' => $request->angkatan,
                'alamat' => $request->alamat,
                'kelas' => $request->kelas,
                //'updated_by' => Kemahasiswaan::find(Auth::user()->id)->id,
            ]);

        if ($user && $mahasiswa) {
            Alert::success('Sukses!', 'Data Berhasil Diubah!');
        }

        return redirect('kemahasiswaan/user/mahasiswa');
    }

    public function destroy($id)
    {
        //$id_mahasiswa = PermohonanLayanan::findOrFail($id)->id_mahasiswa;
        $mahasiswaPermohonan = PermohonanLayanan::where('id_mahasiswa', $id)->get();
        
        $id_user = Mahasiswa::findOrFail($id)->id_user;
        $count=0;

        foreach ($mahasiswaPermohonan as $key => $value) {
            History::where('id_permohonan', $value->id)->delete();

            $mahasiswaPermohonan[$count]->delete();
            $count++;
        }
        $count=0;
        
        

        $userMahasiswa = User::find($id_user)->mahasiswa->delete();
        $user = User::find($id_user)->delete();

        if ($user && $userMahasiswa && $mahasiswaPermohonan) {
            Alert::success('Sukses!', 'Data Berhasil Dihapus!');
        }

        return redirect('kemahasiswaan/user/mahasiswa');
    }
}
