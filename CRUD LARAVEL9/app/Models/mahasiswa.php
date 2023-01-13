<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $guarded = ['id'];


    public function dosen()
    {
        return $this->belongsTo(dosen::class, 'dosen_id', 'id');
    }
    public function jurusan()
    {
        return $this->belongsTo(JurusanModel::class,'jurusan_id','id');
    }
}
