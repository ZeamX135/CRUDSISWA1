<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $visible = ['nama', 'kelas', 'jk', 'jurusan', 'alamat'];

    protected $fillable = ['nama', 'kelas', 'jk', 'jurusan', 'alamat'];
}
