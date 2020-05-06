<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordHistory extends Model
{
    protected $table = 'passwordHistory';

    public function scopeCheckUserLoginFirstTime($query, $uid)
    {       
           return PasswordHistory::where('user_id',$uid)
                                ->get()
                                ->count();
    }
    public function scopeCheckTheLatestChangedPassword($query, $uid)
    {
        return  PasswordHistory::where('user_id',$uid)
                                ->select('created_at')
                                ->orderBy('created_at','desc')
                                ->first();
    }
}