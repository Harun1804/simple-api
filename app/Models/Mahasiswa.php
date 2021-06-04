<?php

namespace App\Models;

use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Database\Eloquent\Model;

Class Mahasiswa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mahasiswa';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['npm','nama_mahasiswa','kelas','jurusan'];

    public function mataKuliah()
    {
        return $this->hasMany(Mahasiswa_MataKuliah::class,'id_mahasiswa');
    }
}