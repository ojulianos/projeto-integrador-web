<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinancialRequest extends FormRequest
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
        $validRequest = [
            'type' => 'required|max:200',
            'description' => 'required',
            'value' => 'required',
            'discount_value' => 'required',
            'addtional_value' => 'required',
            'date_maturiry' => 'required',
            'date_emission' => 'required',
            'date_payment' => 'required', 
            
        ];

        return $validRequest;
    }
}
