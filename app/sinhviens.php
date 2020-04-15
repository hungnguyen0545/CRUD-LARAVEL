<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sinhviens extends Model
{
    protected $table = 'sinhviens';
    protected $primaryKey='id';

    public function khoas()
    {
        return $this->belongsto('App\khoas','khoa_id');
    }

    public function scopeShowChart()
    {
        return $this
        ->rightJoin('khoas', 'sinhviens.khoa_id', '=', 'khoas.id')
        ->selectRaw('khoas.id,coalesce(count(sinhviens.id),0) as slsv')
        ->groupBy('khoas.id')
        ->get();
    }
    
    public function scopeShowStudent()
    {
        return $this::with('khoas');
    }

    public function scopeCountStudent()
    {
        return $this->count();
    }
}   
