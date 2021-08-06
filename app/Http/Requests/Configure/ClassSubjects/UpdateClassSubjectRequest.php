<?php

namespace App\Http\Requests\Configure\ClassSubjects;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassSubjectRequest extends FormRequest
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
            'subject_id'=>'nullable|integer',
            'class_id'=>'nullable|integer',
            'full_mark'=>'nullable|numeric',
            'success_mark'=>'nullable|numeric',
            'total_mark'=>'nullable|numeric',

        ];
    }
}
