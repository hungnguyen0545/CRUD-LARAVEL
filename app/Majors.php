<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Majors extends Model
{
    protected $table = "khoas";

    public function students()
    {
        return $this->hasMany('App\Students','khoa_id');
    }
}
