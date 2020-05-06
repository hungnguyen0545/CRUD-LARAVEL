<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\PasswordHistory;
use App\Libs\Services\AuthServices\ChangedPasswordServices;
use Exception;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected function authenticated(Request $request, $user)
    {
        try{
            $uid = $user->id;
            if(PasswordHistory::CheckUserLoginFirstTime($uid) === 0)
            {
                $request->session()->put('must_change_pwd', true);
                return redirect('/edit-password')->with('alert', 'you need to change password at the first time login !');
            }
            else if( ChangedPasswordServices::CheckTime($uid) > 7)
            {
                $request->session()->put('must_change_pwd', true);
                return redirect('/edit-password')->with('alert', 'you need to change password after a week when you not login !');
            }
            return redirect('/');
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
     }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
