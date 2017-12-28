<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhitelistRequest extends FormRequest
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
            'rpname' => 'required',
            'town' => 'required',
            'sexe' => 'required',
            'birthday' => 'required|date|before:00-00-2001',
            'experiance' => 'required',
            'history' => 'required',
            'parrain' => "max:36"
        ];
    }
}
