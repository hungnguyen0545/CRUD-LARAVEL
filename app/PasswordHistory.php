<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordHistory extends Model
{
    protected $table = 'passwordHistory';

    public function scopecheckUserLoginFirstTime($query, $uid)
    {       
           return PasswordHistory::where('user_id',$uid)
                                ->get()
                                ->count();
    }
    public function scopecheckTheLatestChangedPassword($query, $uid)
    {
        return  PasswordHistory::where('user_id',$uid)
                                ->select('created_at')
                                ->orderBy('created_at','desc')
                                ->first();
    }
}