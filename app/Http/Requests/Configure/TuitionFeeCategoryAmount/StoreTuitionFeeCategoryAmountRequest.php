<?php

namespace App\Http\Requests\Configure\TuitionFeeCategoryAmount;

use Illuminate\Foundation\Http\FormRequest;

class StoreTuitionFeeCategoryAmountRequest extends FormRequest
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
            'category_id'=>'required|integer',
            'class_id'=>'required|integer',
            'amount'=>'required|numeric',
        ];
    }
}
