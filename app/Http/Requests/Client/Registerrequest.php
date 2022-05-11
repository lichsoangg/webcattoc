<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class Registerrequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|max:30',
            'repassword' => 'required|min:4|max:30|same:password',
            'hovaten' => 'required|min:4|max:30',
            'sodienthoai' => 'required|',
        ];
    }
}
