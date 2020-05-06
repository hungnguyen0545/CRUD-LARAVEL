<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table='Giaoviens';
    protected $fillabel = ['id','hoten','khoa_is','gioitinh']; 
}
