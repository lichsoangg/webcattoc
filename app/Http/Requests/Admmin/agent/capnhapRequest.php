<?php

namespace App\Http\Requests\Admmin\agent;

use Illuminate\Foundation\Http\FormRequest;

class capnhapRequest extends FormRequest
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
            'hovaten'      => 'required',
            'sodienthoai'      => 'required',
            'diachi'      => 'required',
        ];
    }
}
