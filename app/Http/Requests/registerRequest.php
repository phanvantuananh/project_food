<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'age' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'required'
        ];
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
            'age.required' => 'Không được để trống',
            'address.required' => 'Không được để trống',
            'phone.required' => 'Không được để trống',
            'image.required' => 'Không được để trống'
        ];
        return $messages;
    }
}
