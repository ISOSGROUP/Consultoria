<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Auth;

class CreateUserRequest extends FormRequest
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
        $rules = [
            'name'=> 'required',
            //'email' => 'unique:users,email,'.Auth::id(),
            'email' => 'required|email|unique:users,email,'.Auth::id(),
           // 'email'=> 'required|email',
            'password'=> 'required',
            
        ];
        if ($this->is_email) {
            $rules['email'] = 'email';
        }
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo correo electrónico es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',

        ];

        return $messages;
    }
}
