<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name'          => 'nullable|max:50',
            'phone'         => 'nullable|regex:/[0-9]{12}$/|unique:clients,phone',
            'email'         => 'nullable|unique:clients,email',
            'country'       => 'nullable',
            'city'          => 'nullable',
            'zip'           => 'nullable|numeric',
            'address'       => 'nullable',
            'card_number'   => ['nullable','regex:/^[1-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/'],
        ];
    }
}
