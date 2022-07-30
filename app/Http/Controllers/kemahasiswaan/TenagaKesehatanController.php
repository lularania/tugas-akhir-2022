<?php

namespace App\Http\Controllers\kemahasiswaan;

use App\Http\Controllers\Controller;
use App\Models\Kemahasiswaan;
use Illuminate\Http\Request;
use App\Models\TenagaKesehatan;
use App\Models\Role;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Psikolog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class TenagaKesehatanController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->tenagakesehatan = new TenagaKesehatan();
        $this->role = new TenagaKesehatan();
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tenagakesehatan = $this->tenagakesehatan
                ->allData2()
                ->where('nama_tenaga_kesehatan', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $tenagakesehatan = $this->tenagakesehatan
                ->allData2()
                ->paginate(10);
        }
        
        $data = [
            'role1' => $this->role->countRole(3),
            'role2' => $this->role->countRole(4),
            'tenagakesehatan' => $tenagakesehatan,                      
        ];
        return view('kemahasiswaan.tenaga_kesehatan.index', $data);
    }

    public function show($id)
    {
        if (!$this->tenagakesehatan->detailData($id)) {
            abort(404);
        }

        $data = [
            'tenagakesehatan' => TenagaKesehatan::find($id),
        ];

        return view('kemahasiswaan.tenaga_kesehatan.detail', $data);
    }

    public function add()
    {
        $data = [
            'opsi_role' => DB::table('roles')
                ->whereNotIn('id', [1,2,5])
                ->get(),
        ];
        return view('kemahasiswaan.tenaga_kesehatan.add', $data);
    }

    public function store(Request $request)
    {
        Request()->validate(
            [
                'nama_tenaga_kesehatan' => 'required',
                'jabatan_tenaga_kesehatan' => 'required',
                'id_role' => 'required',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required',
                'link_meeting' => 'required',
                'foto_tenaga_kesehatan' => 'required|file|max:2048|mimes:jpeg,jpg,png',
            ],
            [
                'nama_tenaga_kesehatan.required' => 'Wajib diisi!',
                'jabatan_tenaga_kesehatan.required' => 'Wajib diisi!',
                'email.required' => 'Wajib diisi!',
                'password.required' => 'Wajib diisi!',
                'link_meeting.required' => 'Wajib diisi!',
                'foto_tenaga_kesehatan.required' => 'Mohon unggah foto tenaga kesehatan.',
                'foto_tenaga_kesehatan.max' => 'Ukuran maksimal 2 Mb.',
                'foto_tenaga_kesehatan.mimes' => 'Unggah file dalam format JPEG, JPG, dan PNG.',
            ]
        );

        $foto_tenaga_kesehatan = $request->foto_tenaga_kesehatan->store('files', 'public');

        $user = User::create([
            'id_role' => $request->id_role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole(Role::find($request->id_role)->name);

        $tenagakesehatan = TenagaKesehatan::create([
            'id_user' => $user->id,
            'nama_tenaga_kesehatan' => $request->nama_tenaga_kesehatan,
            'jabatan_tenaga_kesehatan' => $request->jabatan_tenaga_kesehatan,
            'foto_tenaga_kesehatan' => $foto_tenaga_kesehatan,
            'link_meeting' => $request->link_meeting,
        ]);

        if ($tenagakesehatan && $user) {
            switch ($request->id_role) {
                case 1:
                    $dokter = Dokter::create([
                        'id_tenaga_kesehatan' => $tenagakesehatan->id,
                        'created_by' => User::find(Auth::user()->id)->kemahasiswaan->id,
                    ]);
                    if ($dokter) {
                        break;
                    }

                case 2:
                    $psikolog = Psikolog::create([
                        'id_tenaga_kesehatan' => $psikolog->id,
                        'created_by' => User::find(Auth::user()->id)->kemahasiswaan->id,
                    ]);
                    if ($psikolog) {
                        break;
                    }
            }
            Alert::success('Sukses!', 'Data Berhasil Ditambahkan!');
        }

        return redirect('/kemahasiswaan/tenaga-kesehatan');
    }

    public function edit($id)
    {
        if (!$this->tenagakesehatan->detailData($id)) {
            abort(404);
        }

        $data = [
            'tenagakesehatan' => TenagaKesehatan::find($id),
            'opsi_role' => DB::table('roles')->whereNotIn('id', [TenagaKesehatan::find($id)->user->role->id, 1,2,5])->get(),
        ];

        return view('kemahasiswaan.tenaga_kesehatan.edit', $data);
    }

    public function update($id, Request $request)
    {
        Request()->validate(
            [
                'nama_tenaga_kesehatan' => 'required',
                'jabatan_tenaga_kesehatan' => 'required',
                'id_role' => 'required',
                'link_meeting' => 'required',
                'foto_tenaga_kesehatan' => 'required|file|max:2048|mimes:jpeg,jpg,png',
            ],
            [
                'nama_tenaga_kesehatan.required' => 'Wajib diisi!',
                'jabatan_tenaga_kesehatan.required' => 'Wajib diisi!',
                'link_meeting.required' => 'Wajib diisi!',
                'foto_tenaga_kesehatan.required' => 'Mohon unggah foto tenaga kesehatan.',
                'foto_tenaga_kesehatan.max' => 'Ukuran maksimal 2 Mb.',
                'foto_tenaga_kesehatan.mimes' => 'Unggah file dalam format JPEG, JPG, dan PNG.',
            ]
        );

        $file = TenagaKesehatan::where('id', $id)->first()->foto_tenaga_kesehatan;

        if ($request->hasFile('foto_tenaga_kesehatan')) {
            if ($file != null) {
                $oldfilepath = storage_path('app/public' . '/' . $file);
                unlink($oldfilepath);
            }
            $foto_tenaga_kesehatan = $request->foto_tenaga_kesehatan->store('files', 'public');
        } else {
            $foto_tenaga_kesehatan = $file;
        }
        
        $tenagakesehatan = TenagaKesehatan::findOrFail($id);
        $user = User::findOrFail($tenagakesehatan->user->id);

        $data = [
            'nama_tenaga_kesehatan' => Request()->nama_tenaga_kesehatan,
            'jabatan_tenaga_kesehatan' => Request()->jabatan_tenaga_kesehatan,
            'foto_tenaga_kesehatan' => $foto_tenaga_kesehatan,
            'link_meeting' => Request()->link_meeting,
        ];

        $tenagakesehatan->user->id_role = Request()->id_role;
        if ($tenagakesehatan->user->save()) {
            $user->syncChanges([Role::find(Request()->id_role)->name]);
            $updateTenagaKesehatan = TenagaKesehatan::where('id', $id)->update($data);
            if ($updateTenagaKesehatan) {
                Alert::success('Sukses!', 'Data Berhasil Diupdate!');
            }
        }

        return redirect('/kemahasiswaan/tenaga-kesehatan');
    }

    public function destroy($id)
    {
        $tenagakesehatan = TenagaKesehatan::find($id);
        if (!$tenagakesehatan) {
            abort(404);
        }

        $filename = TenagaKesehatan::where('id', $id)->first()->foto_tenaga_kesehatan;

        if ($filename) {
            $file = storage_path('app/public' . '/' . $filename);
            unlink($file);
        }

        switch ($tenagakesehatan->user->id_role) {
            case 1:
                if (DB::table('dokters')->where('id_tenaga_kesehatan', $id)->delete()) {
                    break;
                }

            case 2:
                if (DB::table('dokters')->where('id_tenaga_kesehatan', $id)->delete()) {
                    break;
                }
        }

        if (DB::statement('SET FOREIGN_KEY_CHECKS=0;')) {                            //! TODO
            $id_user = $tenagakesehatan->id_user;
            $tenagakesehatan =  TenagaKesehatan::find($id)->delete();
            $user = User::find($id_user)->delete();

            if ($tenagakesehatan && $user) {
                Alert::success('Sukses!', 'Data Berhasil Dihapus!');
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return redirect('/kemahasiswaan/tenaga-kesehatan');
    }
}
