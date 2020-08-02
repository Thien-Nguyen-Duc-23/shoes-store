<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
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
            'name'          => 'required|max:255',
            'email'         => 'required|max:255|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password'      => 'required|max:20|min:8|confirmed',
            'birthday'      => 'required',
            'status'        => 'required',
        ];
    }
}
