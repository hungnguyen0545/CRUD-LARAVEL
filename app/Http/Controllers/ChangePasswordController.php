<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangedPassword;
use App\Libs\Services\AuthServices\ChangedPasswordServices;
use Exception;

class ChangePasswordController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.passwords.changePassword');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(ChangedPassword $request)
    {
        try{
            ChangedPasswordServices::StoredPasswordHasChanged($request);
            ChangedPasswordServices::SavedPasswordHistoryAfterChanged();
            $request->session()->forget('must_change_pwd');
            Auth::logout();
            return redirect('/login');
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
    }
}