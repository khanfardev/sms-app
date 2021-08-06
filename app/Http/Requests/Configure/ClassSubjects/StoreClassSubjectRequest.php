<?php

namespace App\Http\Requests\Configure\ClassSubjects;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassSubjectRequest extends FormRequest
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
            'class_id'=>'required|integer',
            'subject_id'=>'required|integer',
            'full_mark'=>'required|numeric',
            'success_mark'=>'required|numeric',
            'total_mark'=>'required|numeric',

        ];
    }
}
