<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Students;

class SameMssv implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $checkMssv = Students::CheckMssv($value);
        if($checkMssv != 0)
        return false;
        else 
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Your's Mssv has been exists ! Please fill other Mssv .";
    }
}
