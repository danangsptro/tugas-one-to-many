<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JABATAN extends Model
{
    protected $table = 'jabatan';
    protected $guarded = [];

    public function karyawan(){
        return $this->hasMany(KARYAWAN::class,'jabatan_id', 'id');
    }
}
