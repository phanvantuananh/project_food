<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ManagerOrderRequest extends FormRequest
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
            'order_user' => 'required',
            'order_email' => 'required',
            'order_phone' => 'required',
            'order_address' => 'required',
            'order_total' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'order_address.required' => 'không được để trống',
            'order_user.required' => 'không được để trống',
            'order_email.required' => 'không được để trống',
            'order_phone.required' => 'không được để trống',
            'order_total.required' => 'không được để trống',
        ];
        return $messages;
    }
}
