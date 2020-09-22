<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DIVISI extends Model
{
    protected $table = 'divisi';
    protected $guarded = [];

    public function karyawan(){
        return $this->hasMany(KARYAWAN::class,'divisi_id','id');
    }
}
