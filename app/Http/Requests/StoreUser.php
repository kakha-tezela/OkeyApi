<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'firstname' => 'bail|required|regex:[A-Za-z]|string',
            'lastname'  => 'required|regex:[A-Za-z]|string',
            'email'     => 'required|email',
            'phone'     => 'required|numeric|size:9',           
        ];
    }
}
