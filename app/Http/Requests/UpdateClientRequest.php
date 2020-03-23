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
        dd($this->id);

        return [
            'name'          => 'nullable|max:50',
            'phone'         =>
                'nullable|regex:/[1-9]{1}-[0-9]{4}-[0-9]{3}-[0-9]{2}-[0-9]{2}$/|unique:clients,phone,'  . $this->id,
            'email'         => 'nullable|unique:clients,email,' . $this->id,
            'country'       => 'nullable',
            'city'          => 'nullable',
            'zip'           => 'nullable|numeric',
            'address'       => 'nullable',
            'card_number'   => ['nullable','regex:/^[1-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/'],
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,bmp'
        ];
    }
}
