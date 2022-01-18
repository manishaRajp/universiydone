<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class Marksstore extends FormRequest
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
            'subject_id' => 'required|unique:student_marks',
            'total_mark' => 'required|integer',
            'obtain_mark' => 'required|integer',
        ];
    }


    public function messages()
    {
        return [
            'subject_id.unique' => 'This Subject Marks Already Existed.',
        ];
    }
}
