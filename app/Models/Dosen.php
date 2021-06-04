<?php

namespace App\Models;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Model;

Class Dosen extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dosen';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nip','nama_dosen','email'];

    public function mataKuliah()
    {
        return $this->hasMany(Matakuliah::class,'id_dosen','id');
    }
}