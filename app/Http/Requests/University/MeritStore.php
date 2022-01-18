<?php

namespace App\Http\Requests\University;

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
            'round_no' => 'required|integer|between:1,3',
            'start_date' => 'required',
            'end_date' => 'required',
            'merit_result_declare_date'=> 'required',
            
        ];
    }
}
