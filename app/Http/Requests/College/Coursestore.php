<?php

namespace App\Http\Requests\College;

use Illuminate\Foundation\Http\FormRequest;

class Coursestore extends FormRequest
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
            'course_id' => 'required',
            'seat_no' => 'required|integer|between:0,100',
            'reserved_seat' => 'required|integer|between:0,100',
            'merit_seat' => 'required|integer|between:0,100',
        ];
    }
}
