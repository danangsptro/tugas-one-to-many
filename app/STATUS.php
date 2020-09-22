<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class STATUS extends Model
{
    protected $table = 'status';
    protected $guarded = [];    

    public function karyawan(){
        return $this->hasMany(KARYAWAN::class,'status_id','id');
    }
}
