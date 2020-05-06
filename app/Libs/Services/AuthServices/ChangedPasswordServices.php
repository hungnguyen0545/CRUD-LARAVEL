<?php 
namespace App\Libs\Services\AuthServices;

use App\User;
use App\PasswordHistory;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ChangedPasswordServices {
    public static function StoredPasswordHasChanged($request)
    {
        DB::beginTransaction();
        try{
            User::find(auth()->user()->id)
            ->update(
                [
                    'password' => Hash::make($request->new_password)
                ]
            );
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback();
            return $e->getMessage();
        }
    }
    public static function SavedPasswordHistoryAfterChanged()
    {
        DB::beginTransaction();
        try{
            $password_history = new PasswordHistory();
            $password_history->user_id = auth()->user()->id;
            $password_history->save();
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback();
            return $e->getMessage();
        }
    }
    public static function CheckTime($uid)
    {
        try{
            $TheLatestTimeChangePass = PasswordHistory::CheckTheLatestChangedPassword($uid);
            $current = Carbon::now();//->addDays(8);
            return $current->diffInDays($TheLatestTimeChangePass->created_at);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
       
    }
}