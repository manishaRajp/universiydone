<?php

namespace App\Http\Requests\College;

use Illuminate\Foundation\Http\FormRequest;

class MeritStore extends FormRequest
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
            'merit_round_id' => 'required|integer',
            'merit' => 'required|integer',
        ];
    }
}
