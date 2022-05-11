<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ManagerUserRequest extends FormRequest
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
            'email' => 'required | email',
            'password' => 'required | string | min:8',
            'age' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Bạn không được để trống',
            'email.required' => 'Bạn không được để trống',
            'email.email' => 'Bạn nhập sai định dạng email',
            'password.required' => 'Bạn không được để trống',
            'password.string' => 'Bạn hãy đặt mật có cả kĩ tự và số',
            'password.min:8' => 'Bạn phải đặt tối thiểu là 8 kí tự',
            'age.required' => 'Bạn không được để trống',
            'address.required' => 'Bạn không được để trống',
            'phone.required' => 'Bạn không được để trống',
            'role.required' => 'Bạn không được để trống'
        ];
        return $messages;
    }
}
