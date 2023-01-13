<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;
    //Definisikan nama table

    //Definisikan column yang diproteksi
    protected $table = 'dosen';

    protected $guarded = ['id'];

    public function mahasiswa(){
        return $this->hasMany(mahasiswa::class,'dosen_id','id');
    }


}
