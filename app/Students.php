<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Students extends Model
{
    protected $table = 'sinhviens';
    protected $primaryKey='id';

    public function khoas()
    {
        return $this->belongsto('App\Majors','khoa_id');
    }

    public function scopeShowStudent()
    {
        return $this->with('khoas');
    }
    public function scopeShowChart()
    {
        return $this->rightJoin('khoas', 'sinhviens.khoa_id', '=', 'khoas.id')
                ->selectRaw('khoas.id,coalesce(count(sinhviens.id),0) as slsv')
                ->groupBy('khoas.id')
                ->get();
    }
    
    public function scopeCountStudent()
    {
        return $this->count();
    }

    public function scopeFetch($query,$agr)
    {
        return  $this->ShowStudent()
                ->WhereRaw("sinhviens.hoten like '%" . $agr . "%'")
                ->orWhereRaw("sinhviens.mssv like '%" . $agr . "%'")
                ->orWhereRaw("sinhviens.nghenghiep like '%" . $agr . "%'")
                ->paginate(5);
    }

    public function scopeCountFetch($query,$agr)
    {
        return $this->ShowStudent()
        ->WhereRaw("sinhviens.hoten like '%" . $agr . "%'")
        ->orWhereRaw("sinhviens.mssv like '%" . $agr . "%'")
        ->orWhereRaw("sinhviens.nghenghiep like '%" . $agr . "%'")
        ->count();
    }

    public function scopeCheckMssv($query,$mssv) {
        return Students::WhereRaw("mssv like '%".$mssv."%'")->count(); 
    }
    
    public function scopeCheckStar($query , $id)
    {
        return Students::select("id")->find($id);
    }

}   

