<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data = [
            'status' => 200,
            'pesan' => 'Akun Berhasil Dibuat'
        ];
        return response()->json($data);
    }

    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user){
            $data = [
                'status' => 401,
                'pesan' => 'Gagal Login',
                'data' => [
                    "token" => null
                ]
            ];
            return response()->json($data);
        }

        if(Hash::check($request->password, $user->password)){
            $newToken = Str::random(6);

            $user->update(['token' => $newToken]);

            $data = [
                'status' => 200,
                'pesan' => 'Berhasil Login',
                'data' => [
                    'token' => $newToken
                ]
            ];
        }else{
            $data = [
                'status' => 401,
                'pesan' => 'Gagal Login',
                'data' => [
                    "token" => null
                ]
            ];
        }

        return response()->json($data);
    }
}
