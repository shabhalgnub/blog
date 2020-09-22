<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class AdRequest extends FormRequest
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
            'title' => 'required|max:50',
            'text' => 'required',
            'price' => 'required|numeric|digits_between:1,10',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'ادخل عنوان الإعلان',
            'title.max'      => 'عنوان الاعلان يجب ان لا يتجاوز ال 50 حرف',
            'text.required'  => 'ادخل تفاصيل الاعلان',
            'price.required' => 'يحب ادخال سعر ل الاعلان',
            'price.numeric' => 'مكان ادخال السعر لزم يكون ارقام فقط',
            'price.digits_between' => 'السعر يجب ان لا يتجاوز ال10 ارقام',
        ];
    }
}
