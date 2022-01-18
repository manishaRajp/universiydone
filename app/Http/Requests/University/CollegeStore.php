<?php

namespace App\Http\Requests\University;

use App\Rules\UpperCase;
use Illuminate\Foundation\Http\FormRequest;

class CollegeStore extends FormRequest
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
            'name' => 'required|unique:colleges',new UpperCase,
            'email' => 'required|email|unique:colleges',
            'contact_no' => 'required|unique:colleges',
            'address' => 'required|',
            'password' => 'required',
            'logo' => 'required|mimes:jpg,bmp,png',
        ];
    }
}
