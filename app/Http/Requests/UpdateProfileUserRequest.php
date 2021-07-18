<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileUserRequest extends FormRequest
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
            'name'=>'string',
            'mobile'=>'string',
            'address'=>'string',
            'gender'=>'in:male,female',
            'fname'=>'string',
            'mname'=>'string',
            'barth_date',
        ];
    }
}
