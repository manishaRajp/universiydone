<?php

namespace App\Http\Requests\college;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
           'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
           'email' => 'required|email',
           'contact_no' => 'required|integer|min:10',
           'address' => 'required',
        ];
    }
}
