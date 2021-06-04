<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::get();
        $data = [
            'status'    => 200,
            'pesan'     => 'Data Matakuliah Berhasil Diambil',
            'data' => $matakuliah
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_matkul' => 'required|string',
            'jenis_matkul' => 'required|in:praktek,teori',
            'sks' => 'required|integer',
            'id_dosen' => 'required'
        ]);

        Matakuliah::create($request->all());
        $matakuliah = matakuliah::orderBy('id','desc')->get();

        $data = [
            'status'    => 200,
            'pesan'     => 'Data matakuliah Berhasil Diinput',
            'data' => $matakuliah
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $matakuliah = Matakuliah::with('dosen')->findOrFail($id);
        $data = [
            'status'    => 200,
            'pesan'     => 'Data matakuliah Berhasil Diambil',
            'data' => $matakuliah
        ];
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_matkul' => 'required|string',
            'jenis_matkul' => 'required|in:praktek,teori',
            'sks' => 'required|integer',
            'id_dosen' => 'required'
        ]);

        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update([
            'nama_matkul' => $request->nama_matkul,
            'jenis_matkul' => $request->jenis_matkul,
            'sks' => $request->sks,
            'id_dosen' => $request->id_dosen
        ]);

        $data = [
            'status'    => 200,
            'pesan'     => 'Data matakuliah Berhasil Diubah',
            'data' => $matakuliah
        ];
        return response()->json($data);
    }

    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();

        $data = [
            'status'    => 200,
            'pesan'     => 'Data matakuliah Berhasil Dihapus'
        ];
        return response()->json($data);
    }
}
