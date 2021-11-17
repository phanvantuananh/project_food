<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ManagerProductRequest extends FormRequest
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
        $rules = [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_content' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_quantity' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'category_id.required' => 'không được để trống',
            'product_name.required' => 'không được để trống',
            'product_price.required' => 'không được để trống',
            'product_content.required' => 'không được để trống',
            'product_quantity.required' => 'không được để trống',
        ];
        return $messages;
    }
}
