<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registeredRequest extends FormRequest
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
            'fullname' => 'required',
            'email' => 'required|unique:App\BackEnd\UsersModel,email|email',
            'phone'=>'required',
            'password' => 'required|min:5',
            'confirm_password'=> 'required|same:password'
        ];
    }
}
