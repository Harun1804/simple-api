<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::with('matakuliah')->get();
        $data = [
            'status'    => 200,
            'pesan'     => 'Data Dosen Berhasil Diambil',
            'data' => $dosen
        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nip' => 'required|unique:dosen,nip|max:15',
            'nama_dosen' => 'required|string',
            'email' => 'required|email|unique:dosen,email'
        ]);

        Dosen::create($request->all());
        $dosen = Dosen::with('matakuliah')->orderBy('id','desc')->get();

        $data = [
            'status'    => 200,
            'pesan'     => 'Data Dosen Berhasil Diinput',
            'data' => $dosen
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $dosen = Dosen::with('matakuliah')->findOrFail($id);
        $data = [
            'status'    => 200,
            'pesan'     => 'Data Dosen Berhasil Diambil',
            'data' => $dosen
        ];
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nip' => 'required|max:15',
            'nama_dosen' => 'required|string',
            'email' => 'required'
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update([
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'email' => $request->email,
        ]);

        $data = [
            'status'    => 200,
            'pesan'     => 'Data Dosen Berhasil Diubah',
            'data' => $dosen
        ];
        return response()->json($data);
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        $data = [
            'status'    => 200,
            'pesan'     => 'Data Dosen Berhasil Dihapus'
        ];
        return response()->json($data);
    }
}
