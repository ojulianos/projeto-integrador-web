<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'description' => 'required|description',
            'age_max' => 'required|age_max',
            'age_min' => 'required|age_min',
            
        ];

        $validaSenha = 'required|min:5|max:30';
        if (strlen(request()->id) <= 0) {
            $validRequest['email'] .= '|unique:users';
            $validRequest['password'] = $validaSenha;
        }

        return $validRequest;
    }
}
