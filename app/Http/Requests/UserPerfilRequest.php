<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPerfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$data = isset($data['user'])? $data['user'] : $data;
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'user[name]' => 'required|max:255',
            'user[email]' => 'required|email|max:255|unique:users',
            'user[password]' => 'required|min:6|confirmed',
        ];
    }
}
