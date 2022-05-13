<?php

namespace App\Http\Requests\datlich;

use Illuminate\Foundation\Http\FormRequest;

class datlichrequest extends FormRequest
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
            'ngaycat' => 'required|date|after_or_equal:today',
        ];

    }
}
