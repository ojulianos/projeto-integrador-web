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
            'description' => 'required',
            'age_max' => 'required',
            'age_min' => 'required',
            
        ];

        return $validRequest;
    }
}
