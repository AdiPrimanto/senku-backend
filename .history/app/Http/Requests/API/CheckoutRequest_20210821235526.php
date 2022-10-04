<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'requeired|max:255',
            'email' => 'requeired|email|max:255',
            'number' => 'requeired|max:255',
            'address' => 'requeired',
            'transaction_total' => 'requeired|integer',
        ];
    }
}
