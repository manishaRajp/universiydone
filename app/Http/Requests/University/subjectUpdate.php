<?php

namespace App\Http\Requests\University;

use Illuminate\Foundation\Http\FormRequest;

class subjectUpdate extends FormRequest
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
            'name' => 'required|Alpha',
            'code' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            // 'code.integer' => 'The code must be Digits.',
        ];
    }
}
