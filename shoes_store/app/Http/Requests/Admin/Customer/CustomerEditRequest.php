<?php

namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerEditRequest extends FormRequest
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
        define('GET_ID_URL', 3);

        return [
            'name'          => 'required|max:255',
            'email'         => 'required|max:255|email|unique:users,email,'. $this->segment(GET_ID_URL) .',id,deleted_at,NULL',
            'password'      => 'nullable|max:20|min:8|confirmed',
            'birthday'      => 'nullable',
            'status'        => 'required',
        ];
    }
}
