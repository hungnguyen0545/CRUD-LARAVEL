<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SameMssv;

class StoreStudentInfo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hoten' => 'required|string',
            'mssv' => ['max:8','string','required','regex:(\d{2}52\d{4})', new SameMssv],
            'khoa' => 'required',
            'nghenghiep' => 'required'
        ];
    }
}
