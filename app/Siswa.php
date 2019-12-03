<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    //
    protected $table = 'siswa';
    protected $fillable = ['nama', 'nis', 'alamat'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
