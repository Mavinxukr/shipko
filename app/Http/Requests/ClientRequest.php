<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'          => 'required|max:100',
            'username'      => 'required|unique:clients,username',
            'phone'         => 'required|regex:/[0-9]{12}$/|unique:clients,phone',
            'email'         => 'required|unique:clients,email',
            'password'      => 'required|min:6',
            'country'       => 'required',
            'city'          => 'required',
            'zip'           => 'required|numeric',
            'address'       => 'required',
            'card_number'   => ['required','regex:/^[1-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/','unique:clients,card_number'],
            'image'         => 'nullable|file|mimes:jpeg,jpg,png'
        ];
    }
}
