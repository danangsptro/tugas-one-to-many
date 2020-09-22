<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hobiMany extends Model
{
    protected $guarded = [];

    // public function karyawan(){
    //     return $this->belongToMany(KARYAWAN::class, 'hobi_karyawans', 'hobi_id', 'karyawan_id');
    // }
}
