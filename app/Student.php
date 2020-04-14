<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'sinhviens';

    public function scopeShowChart()
    {
        return DB::table('sinhviens')
        ->rightJoin('khoas', 'sinhviens.khoa_id', '=', 'khoas.id')
        ->selectRaw('khoas.id,coalesce(count(sinhviens.id),0) as slsv')
        ->groupBy('khoas.id')
        ->get();
    }
    
    public function scopeShowStudent()
    {
        return DB::table('sinhviens')
        ->join('khoas', 'sinhviens.khoa_id', '=', 'khoas.id')
        ->select('sinhviens.*', 'khoas.tenkhoa');
    }
}
