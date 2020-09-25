<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'role_id'  => 'nullable|numeric',
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users,email,' . $this->user,
            'password' => 'between:3,12',
            // 'image'    => 'nullable|mimes:jpeg,jpg,png|max:2048',
        ];
    }
}
