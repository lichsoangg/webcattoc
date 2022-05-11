<?php

namespace App\Http\Requests\Admmin;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
                'username'      =>'required|unique:admins,username',
                'password'      =>'required|min:8|max:30',
                'repassword'    =>'required|same:password',
        ];
    }
}
