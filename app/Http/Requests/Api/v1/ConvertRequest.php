<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class ConvertRequest extends FormRequest
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
            'currency_from' => 'required|string|exists:rates:currency',
            'currency_to'   => 'required|string|exists:rates:currency',
            'value'         => 'required|numeric|min:0.01|max:9999999.99'
        ];
    }
}
