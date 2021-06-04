<?php

namespace App\Models;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Model;

Class Mahasiswa_Matakuliah extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mahasiswa_matakuliah';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_mahasiswa','id_matakuliah'];

    public function matkul()
    {
        return $this->belongsTo(Matakuliah::class,'id_matakuliah');
    }

}