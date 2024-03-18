<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $validRequest = [
            'name' => 'required|max:200',
            'email' => 'required|email',
            'birth_date' => 'required|date',
            'sex' => 'in:M,F,N',
            'permission' => 'in:A,P',
            'status' => 'in:A,I',
            'phone' => 'required',
            'address' => '',
            'zip_code' => 'required',
            'city' => 'required',
        ];

        $validaSenha = 'required|min:5|max:30';
        if (strlen(request()->id) <= 0) {
            $validRequest['email'] .= '|unique:users';
            $validRequest['password'] = $validaSenha;
        }

        return $validRequest;
    }
}