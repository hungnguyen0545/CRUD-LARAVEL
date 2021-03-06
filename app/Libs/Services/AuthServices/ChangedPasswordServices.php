<?php 
namespace App\Libs\Services\AuthServices;

use App\User;
use App\PasswordHistory;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ChangedPasswordServices {
    public static function storePasswordHasChanged($request)
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
            throw new Exception($e->getMessage()); 
        }
    }
    public static function savePasswordHistoryAfterChanged()
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
            throw new Exception($e->getMessage()); 
        }
    }
    public static function checkTime($uid)
    {
        try{
            $TheLatestTimeChangedPass = PasswordHistory::checkTheLatestChangedPassword($uid);
            $current = Carbon::now();//addDays(8);
            return $current->diffInDays($TheLatestTimeChangedPass->created_at);
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); 
        }
       
    }
}