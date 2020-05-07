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

    public function scopeshowStudent()
    {
        return $this->with('khoas');
    }
    public function scopeshowChart()
    {
        return $this->rightJoin('khoas', 'sinhviens.khoa_id', '=', 'khoas.id')
                ->selectRaw('khoas.id,coalesce(count(sinhviens.id),0) as slsv')
                ->groupBy('khoas.id')
                ->get();
    }
    
    public function scopecountStudent()
    {
        return $this->count();
    }

    public function scopefetch($query,$agr)
    {
        return  $this->showStudent()
                ->WhereRaw("sinhviens.hoten like '%" . $agr . "%'")
                ->orWhereRaw("sinhviens.mssv like '%" . $agr . "%'")
                ->orWhereRaw("sinhviens.nghenghiep like '%" . $agr . "%'")
                ->paginate(5);
    }

    public function scopecountFetch($query,$agr)
    {
        return $this->ShowStudent()
        ->WhereRaw("sinhviens.hoten like '%" . $agr . "%'")
        ->orWhereRaw("sinhviens.mssv like '%" . $agr . "%'")
        ->orWhereRaw("sinhviens.nghenghiep like '%" . $agr . "%'")
        ->count();
    }

    public function scopecheckMssv($query,$mssv) {
        return Students::WhereRaw("mssv like '%".$mssv."%'")->count(); 
    }
    
    public function scopecheckStar($query , $id)
    {
        return Students::select("id")->find($id);
    }

}   

