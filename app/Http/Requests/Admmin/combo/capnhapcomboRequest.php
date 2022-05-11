<?php

namespace App\Http\Requests\Admmin\combo;

use Illuminate\Foundation\Http\FormRequest;

class capnhapcomboRequest extends FormRequest
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
            'tencombo'      => 'required',
            'chucnang'      => 'required',
            'giatien'      => 'required',
        ];
    }
}
