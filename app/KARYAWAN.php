<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KARYAWAN extends Model
{
    protected $table = 'karyawan';
    protected $guarded = [];

    public function divisi(){
        return $this->belongsTo(DIVISI::class, 'divisi_id','id');
    }
    public function jabatan(){
        return $this->belongsTo(JABATAN::class,'jabatan_id','id');
    }
    public function status(){
        return $this->belongsTo(STATUS::class,'status_id','id');
    }

    // Many to many 

    // public function hobi(){
    //     return $this->belongsToMany(hobiMany::class, 'hobi_karyawans', 'karyawan_id', 'hobi_id');
    // }
}
