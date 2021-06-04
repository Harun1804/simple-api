<?php

namespace App\Models;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Model;

Class Matakuliah extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'matakuliah';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_matkul','jenis_matkul','sks','id_dosen'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'id_dosen');
    }
}