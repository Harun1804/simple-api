<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Mahasiswa_Matakuliah;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::get();
        $data = [
            'status'    => 200,
            'pesan'     => 'Data Mahasiswa Berhasil Diambil',
            'data' => $mahasiswa
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'npm' => 'required|integer|digits:7|unique:mahasiswa,npm',
            'nama_mahasiswa' => 'required|string',
            'kelas' => 'required|max:2',
            'jurusan' => 'required|string'
        ]);

        Mahasiswa::create($request->all());
        $mahasiswa = Mahasiswa::orderBy('id','desc')->get();

        $data = [
            'status'    => 200,
            'pesan'     => 'Data Mahasiswa Berhasil Diinput',
            'data' => $mahasiswa
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('mataKuliah')->findOrFail($id);

        $data = [
            'status'    => 200,
            'pesan'     => 'Data Mahasiswa Berhasil Diambil',
            'data' => $mahasiswa
        ];
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'npm' => 'required|integer|digits:7|unique:mahasiswa,npm',
            'nama_mahasiswa' => 'required|string',
            'kelas' => 'required|max:2',
            'jurusan' => 'required|string'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan
        ]);

        $data = [
            'status'    => 200,
            'pesan'     => 'Data Mahasiswa Berhasil Diubah',
            'data' => $mahasiswa
        ];
        return response()->json($data);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        $data = [
            'status'    => 200,
            'pesan'     => 'Data Mahasiswa Berhasil Dihapus'
        ];
        return response()->json($data);
    }

    public function tambahMatkul(Request $request)
    {
        $mahasiswa = Mahasiswa_Matakuliah::create($request->all());
        $mk = Matakuliah::findOrFail($mahasiswa->id_matakuliah);
        $mhs = Mahasiswa::findOrFail($mahasiswa->id_mahasiswa);

        $data = [
            'status'    => 200,
            'pesan'     => 'Data Matakuliah '.$mk->nama_matkul.' Berhasil Ditambahakan ke Mahasiswa ' . $mhs->nama_mahasiswa
        ];
        return response()->json($data);
    }
}
