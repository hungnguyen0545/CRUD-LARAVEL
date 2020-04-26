<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Khoas extends Model
{
    protected $table = "khoas";

    public function sinhviens()
    {
        return $this->hasMany('App\sinhviens','khoa_id');
    }
}
